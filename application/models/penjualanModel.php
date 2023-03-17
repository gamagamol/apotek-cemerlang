<?php


class penjualanModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select sales.id,nota_num,date,d.name,harga_penjualan,qty,total from sales
                                join drugs d on d.id = sales.id_drug')->result();
    }
    public function insert($data)
    {
        $this->db->insert('sales', $data);
    }

    public function MaxId(){
        return $this->db->query('SELECT max(id) as id FROM apotek.sales')->result();
    }

    public function no_nota()
    {
        return $this->db
            ->query('select nota_num from sales where id = (SELECT max(id) FROM apotek.sales)')
            ->result();
    }


    public function laporan(){
        return $this->db->query("select distinct b.date,b.name,
        (select sum(total) as total from apotek.sales where date=b.date and id_drug=b.id_obat)
        as total from(
        SELECT d.name,d.id as id_obat,s.date FROM apotek.sales s
        join apotek.drugs d on s.id_drug=d.id
        ) b ORDER BY b.date ASC
        ")->result();
    }



}
