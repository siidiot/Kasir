<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

public function __construct()
     {
     	parent::__construct();
     	$this->load->model('m_kategori');
     	chek_session();
     }
	public function index()
	{
		$data['all_kategori']  = $this->m_kategori->get_all();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','kategori/lihat', $data);
	}

	public function tambah(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$data = array(
				    'kd_kategori'=>$id,
					'nm_kategori'=>$nama,
				);
			$this->m_kategori->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil masuk');
			redirect('kategori','refresh');
		}
		$thn= date('Y');
		$namafile= substr($thn,-2);
		$data['kd']  = autonumber("tbl_kategori","kd_kategori",3,"03$namafile");
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','kategori/tambah',$data);
	}
	public function edit($id){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama');
			$data = array(
					'nm_kategori'=>$nama,
				);
			$this->m_kategori->edit($data,$id);
			$this->session->set_flashdata('sukses', 'Data Berhasil diupdate');
			redirect('kategori','refresh');
		}
		$data['kategori']  = $this->m_kategori->get_id($id)->row();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','kategori/edit', $data);
	}
	public function hapus($id){
    	$this->m_kategori->hapus($id);
    	$this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
    	redirect('kategori','refresh');
    }

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */