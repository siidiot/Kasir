<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
     public function __construct()
     {
     	parent::__construct();
     	if ($this->session->userdata('status')!='admin') {
     		redirect('supplier','refresh');
     	}
     	$this->load->model('m_kasir');
     	chek_session();
     }
	public function index()
	{
		$data['all_kasir']  = $this->m_kasir->get_all();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','kasir/lihat', $data);
	}
	public function tambah(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			$data = array(
				    'kd_kasir' => $id,
					'nm_kasir'=>$nama,
					'username'=>$username,
					'password'=>md5($password),
					'status' =>$status
				);
			$this->m_kasir->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil masuk');
			redirect('kasir','refresh');
		}
		$thn= date('Y');
		$namafile= substr($thn,-2);
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$data['kd']  = autonumber("tbl_kasir","kd_kasir",3,"01$namafile");
		$this->template->load('template','kasir/tambah',$data);
	}
	public function edit($id){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			if($password==''){
				$data = array(
					'nm_kasir'=>$nama,
					'username'=>$username,
					'status' =>$status
				);
			}else{
				$data = array(
					'nm_kasir'=>$nama,
					'username'=>$username,
					'password'=>md5($password),
					'status' =>$status
				);
			}
			
			$this->m_kasir->edit($data,$id);
			$this->session->set_flashdata('sukses', 'Data Berhasil diedit');
			redirect('kasir','refresh');
		}
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		  $data['kasir'] = $this->m_kasir->get_id($id)->row();
          $this->template->load('template','kasir/edit',$data);
    }
    public function hapus($id){
    	$this->m_kasir->hapus($id);
    	$this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
    	redirect('kasir','refresh');
    }

}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */