<?php
defined('BASEPATH') or exit('No direct script access allowed');
class satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('satuanModel');
    }

    public function index()
    {

        $data = [
            'data' => $this->satuanModel->index(),
            'title' => 'Daftar Satuan',
        ];

        $this->load->view('module/header', $data);
        $this->load->view('satuan/units', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        
        $satuan=$this->input->post("satuan");

        $arr = [
            "name" =>$this->input->post("satuan"),
        ];

        $this->satuanModel->insert($arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Sataun baru dengan nama " . $satuan . " dan kode " . $satuan . " ditambahkan</div>");
        redirect("satuan");
    }

    public function getUnitsById($id)
    {
        $satuan = $this->satuanModel->getUnitsById((int)$id);
        echo json_encode($satuan);
    }

    public function update()
    {
        $id = $this->input->post("id");
        $nama = $this->input->post("nama");
      
        // var_dump($_POST);


        $arr = [
            "name" => $nama,
        ];
        // var_dump($arr);die;


        $this->satuanModel->update((int)$id, $arr);
        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Satuan baru dengan nama $nama berhasil diubah</div>");
        redirect("satuan");
    }
}
