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

    public function create()
    {

        $data['title'] = 'Admin | Beban';
        $data['data'] = $this->bebanModel->index();
        $data['no_nota'] = $this->bebanModel->no_nota();

        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $tahun = date('Y');
        $lastId = (int)$arrNoNota[3] + 1;
        $data['no_nota'] = "cemerlang/beban/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('beban/insert', $data);
        $this->load->view('module/footer');
    }


    public function insert()
    {


        $arrbeban = [];
        $totalKeseluruhan = 0;
        for ($i = 0; $i < count($this->input->post("nota_num")); $i++) {
            $beban = [
                "nota_num" => $this->input->post("nota_num")[$i],
                "date" => $this->input->post("date")[$i],
                "nama_beban" => $this->input->post("nama_beban")[$i],
                "total" => $this->input->post("total")[$i],
            ];

            $totalKeseluruhan += $this->input->post("total")[$i];
           

            array_push($arrbeban, $beban);
        }




        $lastId = $this->bebanModel->insert($arrbeban);

        $arrJurnalDebet = [
            'kode_coa' => 510,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];

        $arrJurnalDebet = [
            'kode_coa' => 511,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];

        $arrJurnalDebet = [
            'kode_coa' => 512,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];

        $arrJurnalDebet = [
            'kode_coa' => 513,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];

        $arrJurnalDebet = [
            'kode_coa' => 514,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];


        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);



        $this->session->set_flashdata("msg", "<div class='alert alert-success'>beban baru anda berhasil ditambahkan</div>");
        redirect("beban");
    }
}