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



}
