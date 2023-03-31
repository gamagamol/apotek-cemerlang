<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('pembelianModel');
        $this->load->model('obatModel');
        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Pembelian';
        $data['data'] = $this->pembelianModel->index();
        $data['no_nota'] = $this->pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();

        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $tahun = date('Y');
        $lastId = (int)$arrNoNota[3] + 1;
        $data['no_nota'] = "cemerlang/pembelian/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('purchase/index', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {


        $arrPembelian = [
            "nota_num" => $this->input->post("nota_num"),
            "id_drug" => $this->input->post("id_drug"),
            "date" => $this->input->post("date"),
            "qty" => $this->input->post("qty"),
            "harga_pembelian" => $this->input->post("harga_pembelian"),
            "total" => $this->input->post("total"),
        ];
        $this->pembelianModel->insert($arrPembelian);

        $lastId = $this->pembelianModel->MaxId();
        $lastId = $lastId[0]->id;

        $arrJurnalDebet = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date"),
            'nominal' => $this->input->post("total"),
            'posisi_dr_cr'=>'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 500,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date"),
            'nominal' => $this->input->post("total"),
            'posisi_dr_cr' => 'kredit'

        ];

        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);


        $obat = $this->obatModel->getDrugById((int)$this->input->post("id_drug"));
        $obatStock=(int)$obat[0]['stock']-(int)$this->input->post("qty");
        $updateObat=['stock'=>$obatStock];
        $this->obatModel->update($obat[0]['id'],$updateObat);

        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Pembelian baru anda berhasil ditambahkan</div>");
        redirect("pembelian");
    }

    public function laporan(){
        $data=[
            'title'=>'Laporan Pembelian',
           'data'=> $this->pembelianModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('purchase/laporan', $data);
        $this->load->view('module/footer');
    }
    
    public function getStock(){
        $id_drug=$this->input->post('id_drug');
        $data=$this->obatModel->getDrugById((int)$id_drug);
        echo json_encode($data);

    }
}
