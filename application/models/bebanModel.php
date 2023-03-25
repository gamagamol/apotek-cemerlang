<?php


class bebanModel extends CI_Model
{

    public function index()
    {


        return $this->db->query('select beban.id,nota_num,date,nama_beban,total from beban')->result();
    }
    public function insert($data)
    {
        $this->db->insert('beban', $data);
    }

    public function MaxId(){
        return $this->db->query('SELECT max(id) as id FROM apotek.beban')->result();
    }

    public function no_nota()
    {
        return $this->db
            ->query('select nota_num from beban where id = (SELECT max(id) FROM apotek.beban)')
            ->result();
    }



}
