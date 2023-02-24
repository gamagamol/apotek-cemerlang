<?php
defined('BASEPATH') or exit('No direct script access allowed');
class jurnal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Jurnal';
        $data['data'] = $this->jurnalModel->jurnal();
      
        $this->load->view('module/header', $data);
        $this->load->view('laporan/jurnal', $data);
        $this->load->view('module/footer');
    }


    public function buku_besar(){

        $data['title'] = 'Admin | Buku Besar';
        $data['data'] = $this->jurnalModel->bukubesar();

        $this->load->view('module/header', $data);
        $this->load->view('laporan/bukubesar', $data);
        $this->load->view('module/footer');
    }

}
