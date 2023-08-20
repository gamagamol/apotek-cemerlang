<?php
defined('BASEPATH') or exit('No direct script access allowed');
class jurnal extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('jurnalModel');
        $this->load->model('obatModel');
        $this->load->model('obatModel');
    }

    public function index()
    {

        $tgl = $this->input->get('tgl');
        if ($tgl) {
            $date = explode('-', $tgl);
            $data['title'] = 'Admin | Jurnal';
            $data['data'] = $this->jurnalModel->jurnal($date);
        } else {
            $data['title'] = 'Admin | Jurnal';
            $data['data'] = $this->jurnalModel->jurnal();
        }




        $this->load->view('module/header', $data);
        $this->load->view('laporan/jurnal', $data);
        $this->load->view('module/footer');
    }


    public function buku_besar()
    {

        $data['title'] = 'Admin | Buku Besar';



        $this->load->view('module/header', $data);
        $this->load->view('laporan/bukubesar', $data);
        $this->load->view('module/footer');
    }

    public function buku_besarAjax($tgl)
    {


        echo json_encode([
            'data' => $this->jurnalModel->bukubesar($tgl),
            'saldo_awal' => $this->jurnalModel->saldoAwal($tgl)
        ]);
    }



    public function neracaSaldo()
    {
        $data['title'] = 'Admin | Neraca Saldo';

        // print_r($data);die;
        $this->load->view('module/header', $data);
        $this->load->view('laporan/neracaSaldo', $data);
        $this->load->view('module/footer');
    }


    public function neracaSaldoAjax($tgl)
    {
        echo json_encode($this->jurnalModel->neracaSaldo($tgl));
    }

    public function persediaan()
    {
        $data['title'] = 'Admin | Persediaan';
        $data['data'] = $this->obatModel->index();
        // print_r($data);die;

        $this->load->view('module/header', $data);
        $this->load->view('laporan/persediaan', $data);
        $this->load->view('module/footer');
    }


    public function getDataPersediaan($drug_id, $date = null)
    {
        if ($date != null) {

            echo json_encode($this->jurnalModel->persediaan($drug_id, $date));
        } else {

            echo json_encode($this->jurnalModel->persediaan($drug_id, $date));
        }
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

    public function labarugi()
    {
        $data['title'] = 'Admin | labarugi';
        $data['data'] = $this->jurnalModel->labarugi();
        // print_r($data['data'][0]);die;

        $this->load->view('module/header', $data);
        $this->load->view('laporan/labarugi', $data);
        $this->load->view('module/footer');
    }
}
