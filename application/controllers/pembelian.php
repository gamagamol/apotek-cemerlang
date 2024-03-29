<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('pembelianModel');
        $this->load->model('obatModel');
        $this->load->model('jurnalModel');
        $this->load->model('suppliersModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Pembelian';
        $data['data'] = $this->pembelianModel->index();
        $data['no_nota'] = $this->pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();


        // $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
        // $tahun = date('Y');
        // $lastId = (int)$arrNoNota[3] + 1;
        // $data['no_nota'] = "cemerlang/pembelian/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('purchase/index', $data);
        $this->load->view('module/footer');
    }

    public function create()
    {

        $data['title'] = 'Admin | Pembelian';
        $data['data'] = $this->pembelianModel->index();
        $data['no_nota'] = $this->pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();
        $data['supplier'] = $this->suppliersModel->index();

        //  print_r($data['no_nota']);die;
        if ($data['no_nota']) {

            $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
            $lastId = (int)$arrNoNota[3] + 1;
        } else {
            $lastId = 1;
        }
        $tahun = date('Y');
        $data['no_nota'] = "cemerlang/pembelian/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('purchase/insert', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {


        // $harga = $this->input->post("harga_pembelian");
        // $arrHarga = explode('.', $harga);
        // $hrg = '';
        // foreach ($arrHarga as $h) {
        //     $hrg .= $h;
        // }


        // $arrPembelian = [
        //     "nota_num" => $this->input->post("nota_num"),
        //     "id_drug" => $this->input->post("id_drug"),
        //     "date" => $this->input->post("date"),
        //     "qty" => $this->input->post("qty"),
        //     "harga_pembelian" => (int)$hrg,
        //     "total" => $this->input->post("total"),
        // ];
        // print_r($this->input->post());
        $arrPembelian = [];
        $totalKeseluruhan = 0;
        $totalStockKepake = 0;
        for ($i = 0; $i < count($this->input->post("arr_nota_num")); $i++) {


            $harga = $this->input->post("arr_harga_pembelian")[$i];
            $arrHarga = explode('.', $harga);
            $hrg = '';
            foreach ($arrHarga as $h) {
                $hrg .= $h;
            }

            $Pembelian = [
                "nota_num" => $this->input->post("arr_nota_num")[$i],
                "id_drug" => $this->input->post("arr_id_drug")[$i],
                "date" => $this->input->post("arr_date")[$i],
                "tgl_kadaluarsa" => $this->input->post("arr_tgl_kadaluarsa")[$i],
                "qty" => $this->input->post("arr_jumlah")[$i],
                "harga_Pembelian" => (int)$hrg,
                "total" => $this->input->post("arr_total")[$i],
            ];

            $totalKeseluruhan += $this->input->post("arr_total")[$i];
            $totalStockKepake += $this->input->post("arr_jumlah")[$i];

            array_push($arrPembelian, $Pembelian);
        }

        // print_r($arrPembelian);
        // die;



        $lastId = $this->pembelianModel->insert($arrPembelian);


        $arrJurnalDebet = [
            'kode_coa' => 102,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => date("Y-m-d"),
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => date("Y-m-d"),
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];
        // print_r($arrJurnalKredit);
        // print_r($arrJurnalDebet);
        // // die;
        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);


        $obat = $this->obatModel->getDrugById((int)$this->input->post("id_drug"));
        $obatStock = (int)$obat[0]['stock'] + (int)$totalStockKepake;
        $updateObat = ['stock' => $obatStock];
        $this->obatModel->update($obat[0]['id'], $updateObat);

        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Pembelian baru anda berhasil ditambahkan</div>");
        redirect("pembelian");
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Pembelian',
            'data' => $this->pembelianModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('purchase/laporan', $data);
        $this->load->view('module/footer');
    }

    public function getStock()
    {
        $id_drug = $this->input->post('id_drug');
        $data = $this->obatModel->getDrugById((int)$id_drug);
        echo json_encode($data);
    }


    public function getDrugsBysupplier($id_supplier)
    {
        echo json_encode([
            'data' => $this->obatModel->getDrugsBySupplier($id_supplier),
        ]);
    }
}
