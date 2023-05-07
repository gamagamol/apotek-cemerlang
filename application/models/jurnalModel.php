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


        return [
            'penjualan' =>    $penjualan,
        ];
    }


    public function neracaSaldo()
    {
        return $this->db->query("SELECT nama_coa,sum(nominal) as total,posisi_dr_cr FROM apotek.jurnal j
            join apotek.coa c on j.kode_coa= c.kode_coa
            where c.kode_coa=401
            group by nama_coa,posisi_dr_cr
            union
            SELECT nama_coa,sum(nominal) as total,posisi_dr_cr FROM apotek.jurnal j
            join apotek.coa c on j.kode_coa= c.kode_coa
            where c.kode_coa=101
            group by nama_coa,posisi_dr_cr")->result();
            
    }

    public function persediaan(){
        return $this->db->query("select * from (select date,qty,harga_penjualan as harga,total,nama_coa from apotek.sales
                                join jurnal on jurnal.id_transaksi = sales.id 
                                join coa on coa.kode_coa=jurnal.kode_coa
                                where coa.kode_coa=401
                                union
                                select date,qty,harga_pembelian as harga,total,nama_coa from apotek.purchase
                                join jurnal on jurnal.id_transaksi = purchase.id
                                join coa on coa.kode_coa=jurnal.kode_coa
                                where coa.kode_coa=500) b
                                order by b.date asc")->result();
    }

    public function labarugi(){
        return $this->db->query("SELECT sum(total) as totalpenjualan, (select sum(total) from beban) as totalbeban from sales")->result();
    }

}
