<?php
defined('BASEPATH') or exit('No direct script access allowed');
class obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('obatModel');
        $this->load->model('satuanModel');
    }

    public function index()
    {

        $data = [
            'data' => $this->obatModel->index(),
            'title' => 'Daftar Obat',
            'lastId' => $this->obatModel->lastId(),
            'satuan' => $this->satuanModel->index(),
        ];

        $this->load->view('module/header', $data);
        $this->load->view('obat/drugs', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        $kode_obat = $this->input->post("kode_obat");
        $nama_obat = $this->input->post("nama_obat");
        $id_unit = $this->input->post("satuan");


        $arr = [
            "id" => null,
            "kode_obat" => $kode_obat,
            "name" => $nama_obat,
            "id_unit" => $id_unit,
            "stock" => 0,
        ];

        $this->obatModel->insert($arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Obat baru dengan nama " . $nama_obat . " dan kode " . $kode_obat . " ditambahkan</div>");
        redirect("obat");
    }

    public function getDrugById($id)
    {
        $drug = $this->obatModel->getDrugById((int)$id);
        echo json_encode($drug);
    }

    public function update()
    {
        $kode_obat = $this->input->post("kode_obat");
        $nama_obat = $this->input->post("nama_obat");
        $id_unit = $this->input->post("satuan");
        $id_obat = $this->input->post("id_obat");



        $arr = [
            "kode_obat" => $kode_obat,
            "name" => $nama_obat,
            "id_unit" => $id_unit,
        ];
       

        $this->obatModel->update($id_obat,$arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Obat baru dengan nama " . $nama_obat . " dan kode " . $kode_obat . " diubah</div>");
        redirect("obat");
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Obat',
            'data' => $this->obatModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('obat/laporan', $data);
        $this->load->view('module/footer');
    }

}

