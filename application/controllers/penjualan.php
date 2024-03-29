<?php
defined('BASEPATH') or exit('No direct script access allowed');
class penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('penjualanModel');
        $this->load->model('obatModel');
        $this->load->model('jurnalModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Penjualan';
        $data['data'] = $this->penjualanModel->index();
        $data['no_nota'] = $this->penjualanModel->no_nota();
        $data['obat'] = $this->obatModel->index();

        $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        $lastId = (int)$arrNoNota[3] + 1;



        $tahun = date('Y');
        $data['no_nota'] = "cemerlang/penjualan/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('module/footer');
    }

    public function create()
    {

        $data['title'] = 'Admin | Penjualan';
        $data['data'] = $this->penjualanModel->index();
        $data['no_nota'] = $this->penjualanModel->no_nota();
        $data['obat'] = $this->obatModel->index();

        if ($data['no_nota']) {

            $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
            $lastId = (int)$arrNoNota[3] + 1;
        } else {
            $lastId = 1;
        }
        $tahun = date('Y');
        $data['no_nota'] = "cemerlang/penjualan/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('sales/insert', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {

        $arrPenjualan = [];
        $totalKeseluruhan = 0;
        $totalStockKepake = 0;
        for ($i = 0; $i < count($this->input->post("arr_nota_num")); $i++) {


            $harga = $this->input->post("arr_harga_penjualan")[$i];
            $arrHarga = explode('.', $harga);
            $hrg = '';
            foreach ($arrHarga as $h) {
                $hrg .= $h;
            }

            $penjualan = [
                "nota_num" => $this->input->post("arr_nota_num")[$i],
                "id_drug" => $this->input->post("arr_id_drug")[$i],
                "date" => $this->input->post("arr_date")[$i],
                "qty" => $this->input->post("arr_jumlah")[$i],
                "harga_penjualan" => (int)$hrg,
                "total" => $this->input->post("arr_total")[$i],
            ];

            $totalKeseluruhan += $this->input->post("arr_total")[$i];
            $totalStockKepake += $this->input->post("arr_jumlah")[$i];

            array_push($arrPenjualan, $penjualan);
        }



        $lastId = $this->penjualanModel->insert($arrPenjualan);



        // $arrJurnalDebet = [];
        // $arrJurnalKredit = [];


        $jurnal = [
            [
                'kode_coa' => 101,
                'id_transaksi' => $lastId,
                'tgl_jurnal' => date('Y-m-d'),
                'nominal' => $totalKeseluruhan,
                'posisi_dr_cr' => 'debet'
            ],
            [
                'kode_coa' => 400,
                'id_transaksi' => $lastId,
                'tgl_jurnal' => date('Y-m-d'),
                'nominal' => $totalKeseluruhan,
                'posisi_dr_cr' => 'kredit'
            ],
            [
                'kode_coa' => 503,
                'id_transaksi' => $lastId,
                'tgl_jurnal' => date('Y-m-d'),
                'nominal' => $this->penjualanModel->calculateHPP($this->input->post("arr_id_drug")),
                'posisi_dr_cr' => 'debet'
            ],
            [
                'kode_coa' => 102,
                'id_transaksi' => $lastId,
                'tgl_jurnal' => date('Y-m-d'),
                'nominal' => $this->penjualanModel->calculateHPP($this->input->post("arr_id_drug")),
                'posisi_dr_cr' => 'kredit'
            ],

        ];


        $this->jurnalModel->insertJurnal($jurnal);


        $obat = $this->obatModel->getDrugById((int)$this->input->post("id_drug"));
        $obatStock = (int)$obat[0]['stock'] - (int)$totalStockKepake;
        $updateObat = ['stock' => $obatStock];
        $this->obatModel->update($obat[0]['id'], $updateObat);

        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Penjualan baru anda berhasil ditambahkan</div>");
        redirect("penjualan");
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Penjualan',
            'data' => $this->penjualanModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('sales/laporan', $data);
        $this->load->view('module/footer');
    }

    public function getStock()
    {
        $id_drug = $this->input->post('id_drug');
        $data = $this->obatModel->getDrugById((int)$id_drug);
        echo json_encode($data);
    }
}
