<?php


class modalModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select modal.id,nota_num,date,nama_modal,total from modal')->result();
    }
    public function insert($data)
    {
        $this->db->insert('modal', $data);
    }

    public function MaxId(){
        return $this->db->query('SELECT max(id) as id FROM apotek.modal')->result();
    }

    public function no_nota()
    {
        return $this->db
            ->query('select nota_num from modal where id = (SELECT max(id) FROM apotek.modal)')
            ->result();
    }

    public function perubahan_modal()
    {
        return $this->db
            ->query("select DISTINCT (select sum(total) from modal where nama_modal='modal_awal ') as modal_awal,(select sum(total) from modal where nama_modal='bertambah ') as bertambah, (select sum(total) from modal where nama_modal='berkurang') as berkurang from modal")
            ->result();
    }

}
