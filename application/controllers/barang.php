<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
     public function __construct()
     {
     	parent::__construct();
     	$this->load->model(array('m_barang','m_kategori'));
     	chek_session();
     }
	public function index()
	{
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$data['all_barang']  = $this->m_barang->get_all();
		$this->template->load('template','barang/lihat', $data);
	}
	
	public function tambah(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$modal = $this->input->post('modal');
			$stok = $this->input->post('stok');
			$jual = $modal + ($modal * 0.2);
			$data = array(
				    'kd_barang'=>$id,
					'nm_barang'=>$nama,
					'kd_kategori'=>$kategori,
					'satuan'=>$satuan,
					'harga_modal'=>$modal,
					'harga_jual'=>$jual,
					'stok' => $stok
				);
			$this->m_barang->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Berhasil masuk');
			redirect('barang','refresh');
		}
		$thn= date('Y');
		$namafile= substr($thn,-2);
		$data['kd']  = autonumber("tbl_barang","kd_barang",3,"04$namafile");
		$data['all_kategori']  = $this->m_kategori->get_all();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','barang/tambah', $data);
	}
    public function edit($id){
		if(isset($_POST['submit'])){
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$modal = $this->input->post('modal');
			$jual = $this->input->post('jual');
			$stok = $this->input->post('stok');
			$data = array(
					'nm_barang'=>$nama,
					'kd_kategori'=>$kategori,
					'satuan'=>$satuan,
					'harga_modal'=>$modal,
					'harga_jual'=>$jual,
					'stok' => $stok
				);
			$this->m_barang->edit($data, $id);
			$this->session->set_flashdata('sukses', 'Data Berhasil Diedit');
			redirect('barang','refresh');
		}
		$data['all_kategori']  = $this->m_kategori->get_all();
		$data['barang']  = $this->m_barang->get_id($id)->row();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','barang/edit', $data);
	}
	 public function hapus($id){
    	$this->m_barang->hapus($id);
    	$this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
    	redirect('barang','refresh');
    }
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */