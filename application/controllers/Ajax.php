<?php
class Ajax extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('apotek_models');
  }

  public function getcoa() {
    $coa = $this->db->get("coa")->result();
    echo json_encode($coa);
  }
  
  public function drugs() {
    $data['obat'] = $this->apotek_models->get_data_query('select drugs.*, units.name as unit_name from drugs, units where drugs.id_unit = units.id')->result();
    echo json_encode($data);
  }

  public function adddrug($kode_obat) {
    $drugs = $this->db->get_where('drugs', ["kode_obat" => $kode_obat])->result();
    echo json_encode($drugs);
  }

  public function editdrug($id) {
    $drugs = $this->db->get_where('drugs', ["id" => $id])->result();
    echo json_encode($drugs);
  }
  
  public function purchases() {
    $purchases = $this->db->query("select purchase.id as idp, purchase.*, suppliers.name, drugs.name as dn from purchase inner join suppliers on purchase.id_supplier = suppliers.id inner join drugs on purchase.id_drug = drugs.id order by purchase.date desc")->result();
    echo json_encode($purchases);
  }
  
  public function purchasedetail(){
    $id = $this->input->get("id");
    
    $detail = $this->db->query("select * from purchase inner join drugs on purchase.id_drug = drugs.id where purchase.id = ". $id)->result();
    
    echo json_encode($detail);
  }
  
  public function sales(){
    $sales = $this->db->query('select sales.id as ids, sales.*, drugs.name as dn, drugs.* from sales inner join drugs on sales.id_drug = drugs.id order by sales.date desc')->result();
    
    echo json_encode($sales);
  }
  public function saledetail(){
    $id = $this->input->get("id");
    
    $detail = $this->db->query("select sales.id as ids, sales.*, drugs.name as dn, drugs.* from sales inner join drugs on sales.id_drug = drugs.id where sales.id = ". $id)->result();
    
    echo json_encode($detail);
  }
  
  public function getunit() {
    $units = $this->db->get("units")->result();
    
    echo json_encode($units);
  }

  public function debt() {
    $debt = $this->db->get("debt")->result();
    echo json_encode($data);
  }

  public function adddebt($debt) {
    $debt = $this->db->get_where("debt")->result();
    echo json_encode($debt);
  }
  public function editdebt($id) {
    $debt = $this->db->get_where("debt")->result();
    echo json_encode($debt);
  }

  public function receivable() {
    $receivable = $this->db->get("receivable")->result();
    echo json_encode($data);
  }

  public function addreceivable($receivable) {
    $receivable = $this->db->get_where("receivable")->result();
    echo json_encode($receivable);
  }
  public function editreceivable($id) {
    $receivable = $this->db->get_where("receivable")->result();
    echo json_encode($receivable);
  }

  public function capital() {
    $capital = $this->db->get("capital")->result();
    echo json_encode($data);
  }

  public function addcapital($capital) {
    $capital = $this->db->get_where("capital")->result();
    echo json_encode($capital);
  }
  public function editcapital($id) {
    $capital = $this->db->get_where("capital")->result();
    echo json_encode($capital);
  }
}