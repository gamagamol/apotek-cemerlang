<?php
defined('BASEPATH') or exit('No direct script access allowed');
class penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('penjualanModel');
        $this->load->model('obatModel');
        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Penjualan';
        $data['data'] = $this->penjualanModel->index();
        $data['no_nota'] = $this->penjualanModel->no_nota();
        $data['obat'] = $this->obatModel->index();

        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $tahun = date('Y');
        $lastId = (int)$arrNoNota[3] + 1;
        $data['no_nota'] = "cemerlang/penjualan/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        $harga= $this->input->post("harga_penjualan");
        $arrHarga=explode('.',$harga);
        $hrg='';
        foreach($arrHarga as $h){
            $hrg.=$h;
        }

        $arrPenjualan = [
            "nota_num" => $this->input->post("nota_num"),
            "id_drug" => $this->input->post("id_drug"),
            "date" => $this->input->post("date"),
            "qty" => $this->input->post("qty"),
            "harga_penjualan" => $hrg,
            "total" => $this->input->post("total"),
        ];
        $this->penjualanModel->insert($arrPenjualan);

        $lastId = $this->penjualanModel->MaxId();
        $lastId = $lastId[0]->id;

        $arrJurnalDebet = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date"),
            'nominal' => $this->input->post("total"),
            'posisi_dr_cr'=>'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 400,
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

        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Penjualan baru anda berhasil ditambahkan</div>");
        redirect("penjualan");
    }

    public function laporan(){
        $data=[
            'title'=>'Laporan Penjualan',
           'data'=> $this->penjualanModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('sales/laporan', $data);
        $this->load->view('module/footer');
    }

    public function getStock(){
        $id_drug=$this->input->post('id_drug');
        $data=$this->obatModel->getDrugById((int)$id_drug);
        echo json_encode($data);

    }
}
