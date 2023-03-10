<?php 


class obatModel extends CI_Model{

    public function index(){
        return $this->db->query('select drugs.id as id_obat,units.name as satuan,drugs.name,kode_obat,stock from drugs join units on drugs.id_unit = units.id')->result();
    }
    public function insert($data){
        $this->db->insert('drugs',$data);
    }
    
    public function lastId(){
        $last_row = $this->db->order_by('id', "desc")
            ->limit(1)
            ->get('drugs')
            ->row();
        $arrstr = str_split($last_row->kode_obat);
        $last = number_format($arrstr[2]);
        return $laststr = "OB" . ($last + 1);
    }

    public function getDrugById($id){
        return $this->db->get_where('drugs',['id'=>$id])->result_array();
    }

    public function update($id,$data){
       $this->db->where(['id'=>$id]);
       $this->db->update('drugs',$data);
    }

}
