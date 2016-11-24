<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kasir');
		penjualan();
	}

	public function index()
	{
		if(isset($_POST['submit'])){

			$nama = $this->input->post('username');
			$pass = $this->input->post('password');
			$login = $this->m_kasir->login($nama, md5($pass));

			if($login==1){
				$kasir = $this->db->get_where('tbl_kasir',array('username'=>$nama))->row();
                $this->session->set_userdata(array('status_login'=>'oke','status'=>$kasir->status,'kode'=>$kasir->kd_kasir));
                redirect('home');
			}else{
			    $this->session->set_flashdata('wrong', 'username dan password salah !');
				redirect('Auth','refresh');
			}
		}
		$this->load->view('login');
	}
    public function logout(){
    	$this->session->sess_destroy();
    	redirect('auth','refresh');
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */