<?php
defined('BASEPATH') or exit('No direct script access allowed');
class coa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('coaModel');
    }

    public function index()
    {

        $data = [
            'data' => $this->coaModel->index(),
            'title' => 'Daftar Akun',

        ];

        $this->load->view('module/header', $data);
        $this->load->view('coa/coa', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        $kode_coa = $this->input->post("kode_coa");
        $nama_coa = $this->input->post("nama_coa");
        $header_coa = $this->input->post("header_coa");


        $arr = [
            "kode_coa" => $kode_coa,
            "nama_coa" => $nama_coa,
            "header_coa" => $header_coa,
        ];

       

        $this->coaModel->insert($arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Akun baru dengan nama  $nama_coa  ditambahkan</div>");
        redirect("coa");
    }

    public function getCoaById($id)
    {
        $coa = $this->coaModel->getCoaById((int)$id);
        echo json_encode($coa);
    }

    public function update()
    {
        $id_coa = $this->input->post("id_coa");
        $kode_coa = $this->input->post("kode_coa");
        $nama_coa = $this->input->post("nama_coa");
        $header_coa = $this->input->post("header_coa");


        $arr = [
            "kode_coa" => $kode_coa,
            "nama_coa" => $nama_coa,
            "header_coa" => $header_coa,
        ];

        // var_dump($arr);die;


        $this->coaModel->update($id_coa, $arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Akun baru dengan nama $nama_coa diubah</div>");
        redirect("coa");
    }
}
