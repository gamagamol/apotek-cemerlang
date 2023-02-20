<?php


class retur_pembelianModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select purchase_return.id,nota_num,date,d.name,harga_retur_pembelian,qty,total from purchase_return
                                join drugs d on d.id = purchase_return.id_drug')->result();
    }
    public function insert($data)
    {
        $this->db->insert('purchase_return', $data);
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



}
