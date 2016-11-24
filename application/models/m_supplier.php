<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

	public function get_all(){
		$data = $this->db->get('tbl_supplier');
		return $data;
	}
    public function get_id($id){
		$data = $this->db->query("SELECT * FROM tbl_supplier WHERE kd_supplier='$id'");
		return $data;
	}
	public function tambah($data){
    	$this->db->insert('tbl_supplier',$data);
    }
    public function edit($data,$id){
    	$this->db->update('tbl_supplier',$data,array('kd_supplier'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_supplier',array('kd_supplier'=>$id));
    }

}

/* End of file m_supplier.php */
/* Location: ./application/models/m_supplier.php */