<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template', 'home/home',$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */