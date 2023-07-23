<?php
defined('BASEPATH') or exit('No direct script access allowed');
class modal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('modalModel');
        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | modal';
        $data['data'] = $this->modalModel->index();
        $data['no_nota'] = $this->modalModel->no_nota();


        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $tahun = date('Y');
        // print_r($arrNoNota);
        $lastId = (int)$arrNoNota[3] + 1;
        $data['no_nota'] = "cemerlang/modal/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('modal/index', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {


        $arrmodal = [
            "nota_num" => $this->input->post("nota_num"),
            "date" => $this->input->post("date"),
            "nama_modal" => $this->input->post("nama_modal"),
            "total" => $this->input->post("total"),
        ];
        $this->modalModel->insert($arrmodal);

        $lastId = $this->modalModel->MaxId();
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



        $this->session->set_flashdata("msg", "<div class='alert alert-success'>modal baru anda berhasil ditambahkan</div>");
        redirect("modal");
    }
    public function perubahan_modal (){
        $data['title'] = 'Admin | modal';
        $data['data'] = $this->modalModel->perubahan_modal();
        $data['labarugi'] = $this->jurnalModel->labarugi();

        $this->load->view('module/header', $data);
        $this->load->view('modal/perubahan_modal', $data);
        $this->load->view('module/footer');
    }

}
