<?php
defined('BASEPATH') or exit('No direct script access allowed');
class beban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('bebanModel');
        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | beban';
        $data['data'] = $this->bebanModel->index();
        $data['no_nota'] = $this->bebanModel->no_nota();


        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $tahun = date('Y');
        $lastId = (int)$arrNoNota[3] + 1;
        $data['no_nota'] = "cemerlang/beban/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('beban/index', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {


        $arrbeban = [
            "nota_num" => $this->input->post("nota_num"),
            "date" => $this->input->post("date"),
            "nama_beban" => $this->input->post("nama_beban"),
            "total" => $this->input->post("total"),
        ];
        $this->bebanModel->insert($arrbeban);

        $lastId = $this->bebanModel->MaxId();
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



        $this->session->set_flashdata("msg", "<div class='alert alert-success'>beban baru anda berhasil ditambahkan</div>");
        redirect("beban");
    }
}
