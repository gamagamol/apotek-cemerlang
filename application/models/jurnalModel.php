<?php


class jurnalModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select sales.id,nota_num,date,d.name,harga_penjualan,qty,total from sales
                                join drugs d on d.id = sales.id_drug')->result();
    }
    public function insert($jurnalDebit,$jurnalKredit)
    {
        $this->db->insert('jurnal', $jurnalDebit);
        $this->db->insert('jurnal', $jurnalKredit);
    }

  
}
