<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsumen extends CI_Model {

	public function get_all(){
		$data = $this->db->get('tbl_konsumen');
		return $data;
	}
    public function get_id($id){
		$data = $this->db->query("SELECT * FROM tbl_konsumen WHERE kd_konsumen='$id'");
		return $data;
	}
	public function tambah($data){
    	$this->db->insert('tbl_konsumen',$data);
    }
    public function edit($data,$id){
    	$this->db->update('tbl_konsumen',$data,array('kd_konsumen'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_konsumen',array('kd_konsumen'=>$id));
    }

}

/* End of file m_supplier.php */
/* Location: ./application/models/m_supplier.php */