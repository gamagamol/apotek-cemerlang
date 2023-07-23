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
        $this->db->insert_batch('purchase', $data);
        return $this->db->insert_id();
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


    public function laporan(){
        return $this->db->query("select distinct b.date,b.name,
        (select sum(total) as total from apotek.purchase where date=b.date and id_drug=b.id_obat)
        as total from(
        SELECT d.name,d.id as id_obat,s.date FROM apotek.purchase s
        join apotek.drugs d on s.id_drug=d.id
        ) b ORDER BY b.date ASC
        ")->result();
    }



}
