<?php
defined('BASEPATH') or exit('No direct script access allowed');
class retur_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('retur_pembelianModel');
        $this->load->model('obatModel');
        $this->load->model('jurnalModel');
        $this->load->model('pembelianModel');
    }

    public function index()
    {

        $data['title'] = 'Admin | Retur Pembelian';
        $data['data'] = $this->retur_pembelianModel->index();
        $data['no_nota'] = $this->retur_pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();




        $this->load->view('module/header', $data);
        $this->load->view('purchase_return/index', $data);
        $this->load->view('module/footer');
    }
    public function create()
    {

        $data['title'] = 'Admin | Retur Pembelian';
        $data['data'] = $this->retur_pembelianModel->index();
        $data['no_nota'] = $this->retur_pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();
        $data['no_pembelian'] = $this->retur_pembelianModel->no_purchase();


        if ($data['no_nota']) {
            $arrNoNota = explode('/', $data['no_nota'][0]->nota_num);
            $lastId = (int)$arrNoNota[3] + 1;
        } else {
            $lastId = 1;
        }
        



        $tahun = date('Y');
        $data['no_nota'] = "cemerlang/returpembelian/$tahun/$lastId";

        $this->load->view('module/header', $data);
        $this->load->view('purchase_return/insert', $data);
        $this->load->view('module/footer');
    }

    public function insert()
    {
        $arrReturPembelian = [];
        $totalKeseluruhan = 0;
        $totalStockKepake = 0;
        for ($i = 0; $i < count($this->input->post("nota_num")); $i++) {



            $harga = $this->input->post("harga_retur_pembelian")[$i];
            $arrHarga = explode('.', $harga);
            $hrg = '';
            foreach ($arrHarga as $h) {
                $hrg .= $h;
            }

            $Returpembelian = [
                "nota_num" => $this->input->post("nota_num")[$i],
                "id_drug" => $this->input->post("id_drug")[$i],
                "date" => $this->input->post("date")[$i],
                "qty" => $this->input->post("arr_jumlah")[$i],
                "harga_retur_pembelian" => $hrg,
                "total" => $this->input->post("total")[$i],
            ];

            // print_r($Returpembelian);die;


            $totalKeseluruhan += $this->input->post("total")[$i];
            $totalStockKepake += $this->input->post("arr_jumlah")[$i];

            array_push($arrReturPembelian, $Returpembelian);
        }

        $data['title'] = 'Admin | Retur Pembelian';
        $data['data'] = $this->retur_pembelianModel->index();
        $data['no_nota'] = $this->retur_pembelianModel->no_nota();
        $data['obat'] = $this->obatModel->index();


        $lastId = $this->retur_pembelianModel->insert($arrReturPembelian);

        $arrJurnalDebet = [
            'kode_coa' => 101,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'debet'
        ];
        $arrJurnalKredit = [
            'kode_coa' => 501,
            'id_transaksi' => $lastId,
            'tgl_jurnal' => $this->input->post("date")[0],
            'nominal' => $totalKeseluruhan,
            'posisi_dr_cr' => 'kredit'

        ];

        $this->jurnalModel->insert($arrJurnalDebet, $arrJurnalKredit);


        $obat = $this->obatModel->getDrugById((int)$this->input->post("id_drug"));
        $obatStock = (int)$obat[0]['stock'] + (int)$totalStockKepake;
        $updateObat = ['stock' => $obatStock];
        $this->obatModel->update($obat[0]['id'], $updateObat);

        $this->session->set_flashdata("msg", "<div class='alert alert-success'>Retur Pembelian baru anda berhasil ditambahkan</div>");
        redirect("retur_pembelian");
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan retur_pembelian',
            'data' => $this->retur_pembelianModel->laporan(),
        ];
        // print_r($data);
        $this->load->view('module/header', $data);
        $this->load->view('purchase_return/laporan', $data);
        $this->load->view('module/footer');
    }

    public function getStock()
    {
        $id_drug = $this->input->post('id_drug');
        $data = $this->obatModel->getDrugById((int)$id_drug);
        echo json_encode($data);
    }


    public function findPurchase()
    {
        $no_pembelian = $this->input->post('no_pembelian');
        echo json_encode($this->retur_pembelianModel->findPurchase($no_pembelian));
    }
}
