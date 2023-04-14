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


    public function buku_besar()
    {

        $data['title'] = 'Admin | Buku Besar';
        $data['data'] = $this->jurnalModel->bukubesar();

        $this->load->view('module/header', $data);
        $this->load->view('laporan/bukubesar', $data);
        $this->load->view('module/footer');
    }

    public function neracaSaldo()
    {
        $data['title'] = 'Admin | Neraca Saldo';
        $data['data'] = $this->jurnalModel->neracaSaldo();
        // print_r($data);die;
        $this->load->view('module/header', $data);
        $this->load->view('laporan/neracaSaldo', $data);
        $this->load->view('module/footer');
    }

    public function persediaan()
    {
        $data['title'] = 'Admin | Persediaan';
        $data['data'] = $this->jurnalModel->persediaan();
       
        $this->load->view('module/header', $data);
        $this->load->view('laporan/persediaan', $data);
        $this->load->view('module/footer');
    }

    public function penjualan()
    {
        $data['title'] = 'Admin | Penjualan';
        $data['data'] = $this->jurnalModel->penjualan();
       
        $this->load->view('module/header', $data);
        $this->load->view('sales/laporan', $data);
        $this->load->view('module/footer');
    }

    public function pembelian()
    {
        $data['title'] = 'Admin | Pembelian';
        $data['data'] = $this->jurnalModel->pembelian();
       
        $this->load->view('module/header', $data);
        $this->load->view('purchase/laporan', $data);
        $this->load->view('module/footer');
    }

    public function retur_pembelian()
    {
        $data['title'] = 'Admin | Retur_pembelian';
        $data['data'] = $this->jurnalModel->retur_pembelian();
       
        $this->load->view('module/header', $data);
        $this->load->view('purchase_return/laporan', $data);
        $this->load->view('module/footer');
    }

}
