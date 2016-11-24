<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
     public function __construct()
     {
     	parent::__construct();
     	$this->load->model('m_supplier');
     	chek_session();
     }
	public function index()
	{
		$data['all_supplier']  = $this->m_supplier->get_all();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','supplier/lihat', $data);
	}
	
	public function tambah(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$phone = $this->input->post('phone');
			$data = array(
				    'kd_supplier'=>$id,
					'nm_supplier'=>$nama,
					'alamat'=>$alamat,
					'no_telepon'=>$phone
				);
			$this->m_supplier->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil masuk');
			redirect('supplier','refresh');
		}
		$thn= date('Y');
		$namafile= substr($thn,-2);
		$data['kd']  = autonumber("tbl_supplier","kd_supplier",3,"02$namafile");
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','supplier/tambah',$data);
	}
    public function edit($id){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$phone = $this->input->post('phone');
			$data = array(
					'nm_supplier'=>$nama,
					'alamat'=>$alamat,
					'no_telepon'=>$phone
				);
			$this->m_supplier->edit($data, $id);
			$this->session->set_flashdata('sukses', 'Data Berhasil Diedit');
			redirect('supplier','refresh');
		}
		$data['supplier']  = $this->m_supplier->get_id($id)->row();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','supplier/edit', $data);
	}
	 public function hapus($id){
    	$this->m_supplier->hapus($id);
    	$this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
    	redirect('supplier','refresh');
    }
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */