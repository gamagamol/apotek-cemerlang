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
    public function bukubesar($tgl)
    {

        $tgl = explode('-', $tgl);
      

        $penjualan
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=401
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $pembelian
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=500")
            ->result();


        return [
            'penjualan' =>    $penjualan,
            // 'pembelian' =>    $pembelian,
        ];
    }

    public function saldoAwal($tgl)
    {
        $tgl = explode('-', $tgl);


        $penjualan
            = $this->db
            ->query("SELECT sum(total) as saldo_awal FROM sales where month(date)=($tgl[1]-1); ")
            ->result();
        return [
            'penjualan' =>    $penjualan,
            // 'pembelian' =>    $pembelian,
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

    public function persediaan($drug_id, $tgl = null)
    {
        $where = " where id =$drug_id ";

        if ($tgl != null) {

            $tgl = explode('-', $tgl);

            $where = " where id = $drug_id and month(b.date)=$tgl[1] and year(b.date)=$tgl[0]";
        }



        return $this->db->query("select * from (
                    select d.id,p.qty,p.harga_pembelian,p.total,p.date,c.nama_coa from drugs d
                    join purchase p on d.id=p.id_drug 
                    join jurnal j on j.id_transaksi=p.id
                    join coa c on j.kode_coa =c.kode_coa where c.kode_coa=500
                    union
                    select d.id,p.qty,p.harga_penjualan,p.total,p.date,c.nama_coa  from drugs d
                    join sales p on d.id=p.id_drug 
                    join jurnal j on j.id_transaksi=p.id
                    join coa c on j.kode_coa =c.kode_coa where c.kode_coa=401
                    union
                    select d.id,p.qty,p.harga_retur_pembelian,p.total,p.date,c.nama_coa  from drugs d
                    join purchase_return p on d.id=p.id_drug 
                    join jurnal j on j.id_transaksi=p.id
                    join coa c on j.kode_coa =c.kode_coa where c.kode_coa=501

                    ) b 
                    $where 
                    order by b.date")->result();
    }
}
