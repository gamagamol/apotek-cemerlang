<?php

class satuanModel extends CI_Model
{

    public function index()
    {
        return $this->db->get('units')->result();
    }
    public function insert($data)
    {
        return $this->db->insert('units', $data);
    }

    public function getUnitsById($id)
    {
        return $this->db->get_where('units', ['id' => $id])->result_array();
    }
    public function update($id, $data)
    {
        $this->db->where(['id' => $id])->update('units', $data);
    }
}
