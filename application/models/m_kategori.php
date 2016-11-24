<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function get_all(){
		$data = $this->db->get('tbl_kategori');
		return $data;
	}
	  public function get_id($id){
		$data = $this->db->query("SELECT * FROM tbl_kategori WHERE kd_kategori='$id'");
		return $data;
	}
    public function tambah($data){
    	$this->db->insert('tbl_kategori',$data);
    }
    public function edit($data,$id){
    	$this->db->update('tbl_kategori',$data,array('kd_kategori'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_kategori',array('kd_kategori'=>$id));
    }
}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */