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
        $this->db->insert_batch('jurnal', $jurnalDebit);
        $this->db->insert_batch('jurnal', $jurnalKredit);
    }


    public function insertJurnal($jurnal)
    {
        $this->db->insert_batch('jurnal', $jurnal);
    }

    public function jurnal($tgl = null)
    {
        if ($tgl) {

            return $this->db
                ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                        left join coa on coa.kode_coa =jurnal.kode_coa 
                        where month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]'
                        order by id_jurnal")
                ->result();
        }
        return $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa order by id_jurnal")
            ->result();
    }
    public function bukubesar($tgl = null)
    {




        if ($tgl) {

            $tgl = explode('-', $tgl);
        }

        $kas
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=101
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $penjualan
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=401
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $pembelian
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=500
                     
                     ")
            ->result();

        $retur_pembelian
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=501
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $modal
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=310
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $beban_gaji
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=510
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $beban_listrik
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=511
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();
            
        $beban_air
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=512
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $beban_perlengkapan
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=513
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();


        return [
            'kas' =>    $kas,
            'penjualan' =>    $penjualan,
            'pembelian' =>    $pembelian,
            'retur pembelian' =>    $retur_pembelian,
            'modal' =>    $modal,
            'beban gaji' =>    $beban_gaji,
            'beban listrik' =>    $beban_listrik,
            'beban air' =>    $beban_air,
            'beban perlengkapan' =>    $beban_perlengkapan,
        ];
    }


    public function neracaSaldo($tgl = null)
    {


        $tgl = explode('-', $tgl);
        return $this->db->query("select j.kode_coa,c.nama_coa,sum(nominal) as total from jurnal j
                            join coa c on c.kode_coa = j.kode_coa
                            where month(tgl_jurnal)=$tgl[1] and year(tgl_jurnal)=$tgl[0]
                            group by j.kode_coa
            
            ")->result();
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

    public function labarugi()
    {
        return $this->db->query("SELECT sum(total) as totalpenjualan, 
            (select sum(total) from beban where nama_beban='beban listrik') as beban_listrik ,
            (SELECT sum(nominal) as total_pembelian FROM jurnal where kode_coa=500) as total_pembelian
            from sales")->result();
    }
    public function modal_awal()
    {
        return $this->db->query("select total from modal where nama_modal='modal_awal'")->result()[0]->total;
    }
    public function total_persediaan()
    {
        return $this->db->query("select SUM( (select sum(total) from sales where id_drug =b.id) - (select sum(total) from purchase where id_drug =b.id) - (select sum(total) from purchase_return where id_drug =b.id) ) as total_persediaan from (select id from drugs)b ")->result()[0]->total_persediaan;
    }



    public function saldoAwal($tgl = null)
    {
        if ($tgl) {

            $tgl = explode('-', $tgl);
        }


        $penjualan
            = $this->db
            ->query("SELECT sum(total) as saldo_awal FROM sales where month(date)=($tgl[1]-1); ")
            ->result();

        $pembelian
            = $this->db
            ->query("SELECT sum(total) as saldo_awal FROM sales where month(date)=($tgl[1]-1); ")
            ->result();
        return [
            'penjualan' =>    $penjualan,
            'pembelian' =>    $pembelian,
        ];
    }
}
