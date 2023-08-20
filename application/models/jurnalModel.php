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

        $persediaan_obat
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=102
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
                     ->result();

        $penjualan
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=400
                     and month(tgl_jurnal)='$tgl[1]' and year(tgl_jurnal)='$tgl[0]' ")
            ->result();

        $hpp
            = $this->db
            ->query("select tgl_jurnal,nama_coa,posisi_dr_cr,nominal from jurnal
                     left join coa on coa.kode_coa =jurnal.kode_coa where coa.kode_coa=503
                     
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
            'persediaan_obat' =>    $persediaan_obat,
            'penjualan' =>    $penjualan,
            'hpp' =>    $hpp,
            'retur_pembelian' =>    $retur_pembelian,
            'modal' =>    $modal,
            'beban_gaji' =>    $beban_gaji,
            'beban_listrik' =>    $beban_listrik,
            'beban_air' =>    $beban_air,
            'beban_perlengkapan' =>    $beban_perlengkapan,
        ];
    }


    public function neracaSaldo($tgl = null)
    {
        $tgl = explode('-', $tgl);
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
                    join coa c on j.kode_coa =c.kode_coa where c.kode_coa=102
                    union
                    select d.id,p.qty,p.harga_penjualan,p.total,p.date,c.nama_coa  from drugs d
                    join sales p on d.id=p.id_drug 
                    join jurnal j on j.id_transaksi=p.id
                    join coa c on j.kode_coa =c.kode_coa where c.kode_coa=400
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
        return $this->db->query("
        SELECT sum(total) as totalpenjualan, 
            (select sum(total) from beban where nama_beban='beban listrik') as beban_listrik ,
            (SELECT sum(nominal) as total_pembelian FROM jurnal where kode_coa=102) as total_pembelian,
            (SELECT sum(nominal) as beban_air FROM jurnal where kode_coa=512) as beban_air,
             (SELECT sum(nominal) as beban_gaji FROM jurnal where kode_coa=510) as beban_gaji,
             (SELECT sum(nominal) as beban_perlengkapan FROM jurnal where kode_coa=513) as beban_perlengkapan
            from sales
            ")->result();
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

        $bulan=$tgl[1]-1;

        $penjualan
            = $this->db
            ->query("SELECT sum(total) as saldo_awal_penjualan FROM sales where month(date)='$bulan'")
            ->result();

            
        $hpp
        = $this->db
        ->query("SELECT sum(nominal) as saldo_awal_hpp FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=503")
        ->result();

        // $persediaan_obat
        //     = $this->db
        //     ->query("SELECT sum(nominal) as saldo_awal_persediaan_obat FROM purchase where month(date)='$bulan' ")
        //     ->result();

        $persediaan_obat
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_persediaan_obat FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=102")
            ->result();

        $kas
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_kas FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=101")
            ->result();
        $modal
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_modal FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=310")
            ->result();

        // $modal
        //     = $this->db
        //     ->query("SELECT sum(nominal) as saldo_awal_modal FROM modal where month(date)='$bulan'")
        //     ->result();

        $retur_pembelian
            = $this->db
            ->query("SELECT sum(total) as saldo_awal_retur_pembelian FROM purchase_return where month(date)='$bulan'; ")
            ->result();


       $beban_gaji
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_beban_gaji FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=510")
            ->result();

        $beban_listrik
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_beban_listrik FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=511")
            ->result();

        $beban_air
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_beban_air FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=512")
            ->result();

        $beban_perlengkapan
            = $this->db
            ->query("SELECT sum(nominal) as saldo_awal_beban_perlengkapan FROM jurnal where month(tgl_jurnal)='$bulan' and kode_coa=513")
            ->result();

        return [
            'penjualan' =>    $penjualan,
            'persediaan_obat' =>    $persediaan_obat,
            'kas' =>    $kas,
            'modal' =>    $modal,
            'retur_pembelian' =>    $retur_pembelian,
            'hpp' =>    $hpp,
            'beban_gaji' =>    $beban_gaji,
            'beban_listrik' =>    $beban_listrik,
            'beban_air' =>    $beban_air,
            'beban_perlengkapan' =>    $beban_perlengkapan,

        ];
    }
}
