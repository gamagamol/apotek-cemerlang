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


        $arrPenjualan = [
            "nota_num" => $this->input->post("nota_num"),
            "id_drug" => $this->input->post("id_drug"),
            "date" => $this->input->post("date"),
            "qty" => $this->input->post("qty"),
            "harga_penjualan" => $this->input->post("harga_penjualan"),
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
            'kode_coa' => 401,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date"),
            'nominal' => $this->input->post("total"),
            'posisi_dr_cr' => 'kredit'

        ];

        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);



        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Penjualan baru anda berhasil ditambahkan</div>");
        redirect("penjualan");
    }
}
