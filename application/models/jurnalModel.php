<?php


class jurnalModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select sales.id,nota_num,date,d.name,harga_penjualan,qty,total from sales
                                join drugs d on d.id = sales.id_drug')->result();
    }
    public function insert($jurnalDebit, $jurnalKredit)
    {
        $this->db->insert('jurnal', $jurnalDebit);
        $this->db->insert('jurnal', $jurnalKredit);
    }

    public function jurnal()
    {
        return $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa")
            ->result();
    }
    public function bukubesar()
    {
        $penjualan
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=401")
            ->result();


            return [$penjualan];
    }
}
