<?php

class suppliersModel extends CI_Model
{

    public function index()
    {
        return $this->db->get('suppliers')->result();
    }
    public function insert($data)
    {
        return $this->db->insert('suppliers', $data);
    }

    public function getsupplierById($id)
    {
        return $this->db->get_where('suppliers', ['id' => $id])->result_array();
    }
    public function update($id, $data)
    {
  
        $this->db->where(['id' => $id])->update('suppliers', $data);
    }
}
