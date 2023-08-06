<?php


class retur_pembelianModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select purchase_return.id,nota_num,date,d.name,harga_retur_pembelian,qty,total from purchase_return
                                join drugs d on d.id = purchase_return.id_drug
                                group by nota_num ')->result();
    }
    public function insert($data)
    {
        $this->db->insert_batch('purchase_return', $data);
        return $this->db->insert_id();
    }

    public function MaxId(){
        return $this->db->query('SELECT max(id) as id FROM apotek.purchase_return')->result();
    }

    public function no_nota()
    {
        return $this->db
            ->query('select nota_num from purchase_return where id = (SELECT max(id) FROM apotek.purchase_return)')
            ->result();
    }


    public function laporan(){
        return $this->db->query("select distinct b.date,b.name,
        (select sum(total) as total from apotek.purchase_return where date=b.date and id_drug=b.id_obat)
        as total from(
        SELECT d.name,d.id as id_obat,s.date FROM apotek.purchase_return s
        join apotek.drugs d on s.id_drug=d.id
        ) b ORDER BY b.date ASC
        ")->result();
    }

    public function no_purchase(){
        return $this->db->query("select nota_num from purchase group by nota_num")->result();
    }

    public function findPurchase($no_pembelian){
        return $this->db->query("select purchase.*,name from purchase 
                                left join drugs on purchase.id_drug=drugs.id
                                where nota_num='$no_pembelian'")->result();
    }



}
