<?php


class obatModel extends CI_Model
{

    public function index()
    {
        return $this->db->query('select drugs.id as id_obat,units.name as satuan,drugs.name,kode_obat,stock from drugs join units on drugs.id_unit = units.id')->result();
    }
    public function insert($data)
    {
        $this->db->insert('drugs', $data);
    }

    public function lastId()
    {
        $last_row = $this->db->order_by('id', "desc")
            ->limit(1)
            ->get('drugs')
            ->row();
        $arrstr = str_split($last_row->kode_obat);
        $last = number_format($arrstr[2]);
        return $laststr = "OB" . ($last + 1);
    }

    public function getDrugById($id)
    {
        return $this->db->get_where('drugs', ['id' => $id])->result_array();
    }

    public function update($id, $data)
    {
        $this->db->where(['id' => $id]);
        $this->db->update('drugs', $data);
    }

    public function getDrugsBySupplier($id_supplier)
    {

        return $this->db->query("SELECT * FROM suppliers s
        left join drugs d on s.id=d.id_supplier where d.id_supplier=$id_supplier")->result();
    }
    public function laporan()
    {
        return $this->db->query("select distinct b.date,b.name,
        (select sum(total) as total from apotek.drugs where date=b.date and id_drug=b.id_obat)
        as total from(
        SELECT d.name,d.id as id_obat,s.date FROM apotek.drugs s
        join apotek.drugs d on s.id_drug=d.id
        ) b ORDER BY b.date ASC
        ")->result();
    }
}
