<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasir extends CI_Model {
   
	public function login($nama, $pass){
       $login = $this->db->query("SELECT * FROM tbl_kasir WHERE username='$nama' AND password='$pass'")->num_rows();

       if($login >0){
       	return 1;
       }else{
       	return 0;
       }
	}
	public function get_all(){
		$data = $this->db->get('tbl_kasir');
		return $data;
	}
	public function get_id($id){
		$data = $this->db->query("SELECT * FROM tbl_kasir WHERE kd_kasir='$id'");
		return $data;
	}
	
    public function tambah($data){
    	$this->db->insert('tbl_kasir',$data);
    }
    public function edit($data,$id){
    	$this->db->update('tbl_kasir',$data,array('kd_kasir'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_kasir',array('kd_kasir'=>$id));
    }

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */