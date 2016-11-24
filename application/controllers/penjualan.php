<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_konsumen','m_barang','m_penjualan'));
		$this->load->library('cfpdf');
		chek_session();
	}
    public function index(){
    	$data['penjualan']  = $this->m_penjualan->lihat_penjualan();
    	$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
    	$this->template->load('template','penjualan/lihat_penjualan', $data);
    }
   
	public function tambah()
	{
		if(isset($_POST['submit'])){
		   $this->m_penjualan->simpan_barang();
		   redirect('penjualan/tambah','refresh');
		}
		$data['barang']  = $this->db->query(" SELECT * FROM tbl_barang WHERE stok>0");
		$data['t_detail'] = $this->m_penjualan->tampilkan_detail_transaksi();
		$thn= date('Y');
		$bln=date('m');
		$namafile= substr($thn,-2);
		$data['kd']  = autonumber("tbl_penjualan","kd_transaksi",3,"$namafile$bln");
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','penjualan/tambah', $data);
	}
	public function selesai(){
		 $id = $this->input->post('id');
		 $cek = $this->db->get_where("tbl_penjualan",array('kd_transaksi'=>$id))->num_rows();
		if ($cek>0) {
			 $this->session->set_flashdata('error',"Maaf, data tersebut sudah ada");
         redirect('penjualan/tambah','refresh')  ;
		}
		$stok = $this->db->get_where('tbl_penjualan_detail',array('kd_transaksi'=>''));
         foreach($stok->result() as $items){
            $kd_barang = $items->kd_barang;
            $qty = $items->qty;
          
            $update = $this->m_penjualan->getKurangStok($kd_barang,$qty);
            $key = $kd_barang;
            $this->db->update("tbl_barang",array('stok'=>$update),array('kd_barang'=>$key));
        }
      
        $date = date('Y-m-d');
        $kd_kasir = $this->session->userdata('kode');
        $data = array(
        	     'kd_transaksi' => $id,
        	     'tgl_transaksi' => $date,
        	     'kd_kasir'   => $kd_kasir,
        	     'nm_konsumen' => $this->input->post('konsumen')
        	     );
        $this->m_penjualan->selesai($data);
		  $data['slip']   = $this->m_penjualan->slip($id);
		  $data['nm_konsumen'] = $this->db->get_where('tbl_penjualan', array('kd_transaksi'=>$id))->row();
		  $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		  $this->load->view('laporan/slip_penjualan', $data);
	}
	public function cetak_slip($id)
	{
		$data['slip']   = $this->m_penjualan->slip($id);
		$data['nm_konsumen'] = $this->db->get_where('tbl_penjualan', array('kd_transaksi'=>$id))->row();
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->load->view('laporan/slip_penjualan', $data);
	}
	function hapus()
    {
        $id=  $this->uri->segment(3);
        $this->m_penjualan->hapusitem($id);
        redirect('penjualan/tambah');
    }
    


}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */