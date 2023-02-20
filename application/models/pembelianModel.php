<?php


class pembelianModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select purchase.id,nota_num,date,d.name,harga_pembelian,qty,total from purchase
                                join drugs d on d.id = purchase.id_drug')->result();
    }
    public function insert($data)
    {
        $this->db->insert('purchase', $data);
    }

    public function MaxId(){
        return $this->db->query('SELECT max(id) as id FROM apotek.purchase')->result();
    }

    public function no_nota()
    {
        return $this->db
            ->query('select nota_num from purchase where id = (SELECT max(id) FROM apotek.purchase)')
            ->result();
    }



}
