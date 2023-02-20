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
            'id_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl' => $this->input->post("date"),
            'debet' => $this->input->post("total"),
        ];
        $arrJurnalKredit = [
            'id_coa' => 401,
            'id_transaksi' => $lastId,
            'tgl' => $this->input->post("date"),
            'kredit' => $this->input->post("total"),
        ];

        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);



        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Pembelian baru anda berhasil ditambahkan</div>");
        redirect("pembelian");
    }
}
