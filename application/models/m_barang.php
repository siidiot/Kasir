<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function get_all(){
		$data = $this->db->query("SELECT tb.*,tg.nm_kategori  FROM tbl_barang AS tb,tbl_kategori AS tg WHERE tb.kd_kategori=tg.kd_kategori ORDER BY tb.nm_barang ASC");
		return $data;
	}
    public function get_id($id){
		$data = $this->db->query("SELECT * FROM tbl_barang WHERE kd_barang='$id' ");
		return $data;
	}
	public function tambah($data){
    	$this->db->insert('tbl_barang',$data);
    }
    public function edit($data,$id){
    	$this->db->update('tbl_barang',$data,array('kd_barang'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_barang',array('kd_barang'=>$id));
    }

}
/* End of file m_supplier.php */
/* Location: ./application/models/m_supplier.php */