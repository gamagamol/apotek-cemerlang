<?php
defined('BASEPATH') or exit('No direct script access allowed');
class suppliers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('suppliersModel');
    }

    public function index()
    {

        $data = [
            'data' => $this->suppliersModel->index(),
            'title' => 'Daftar Pemasok',
          
        ];

        $this->load->view('module/header', $data);
        $this->load->view('suppliers/suppliers', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        $nama = $this->input->post("nama");
        $hp = $this->input->post("hp");
        $alamat = $this->input->post("alamat");


        $arr = [
            "name" => $nama,
            "hp" => $hp,
            "address" => $alamat,
        ];

        $this->suppliersModel->insert($arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Pemasok baru dengan nama  $nama  ditambahkan</div>");
        redirect("suppliers");
    }

    public function getsupplierById($id)
    {
        $supplier = $this->suppliersModel->getsupplierById((int)$id);
        echo json_encode($supplier);
    }

    public function update()
    {
        $nama = $this->input->post("nama");
        $hp = $this->input->post("hp");
        $alamat = $this->input->post("alamat");
        $id = $this->input->post("id");
        

        $arr = [
            "name" => $nama,
            "hp" => $hp,
            "address" => $alamat,
        ];


        $this->suppliersModel->update($id, $arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Pemasok baru dengan nama $nama diubah</div>");
        redirect("suppliers");
    }
}
