<?php

class coaModel extends CI_Model
{

    public function index()
    {
        return $this->db->get('coa')->result();
    }
    public function insert($data)
    {
        return $this->db->insert('coa', $data);
    }

    public function getCoaById($id)
    {
        return $this->db->get_where('coa', ['id_coa' => $id])->result_array();
    }
    public function update($id, $data)
    {
  
        $this->db->where(['id_coa' => $id])->update('coa', $data);
    }
}
