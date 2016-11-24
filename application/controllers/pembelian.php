 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_supplier','m_barang','m_pembelian'));
		chek_session();
	}
    public function index(){
    	$data['pembelian']  = $this->m_pembelian->lihat_pembelian();
    	$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
    	$this->template->load('template','pembelian/lihat_pembelian', $data);
    }
	public function tambah()
	{
		if(isset($_POST['submit'])){
			$id = $this->input->post('id');
			$tgl = $this->input->post('tgl');
			$supplier = $this->input->post('supplier');
			$barang = $this->input->post('barang');
			$harga = $this->input->post('harga');
			$qty = $this->input->post('qty');
			$ket = $this->input->post('ket');
            $subtotal = $qty * $harga;
			$data = array(
				    'kd_transaksi' => $id,
					'tgl_transaksi' => $tgl,
					'kd_supplier'   => $supplier,
					'kd_barang'     => $barang,
					'harga_beli'    => $harga,
					'qty'           => $qty,
					'ket'           => $ket,
					'subtotal'      => $subtotal,
					'kd_kasir'      => $this->session->userdata('kode')
 				);
			$cek_stok = $this->m_barang->get_id($barang)->row();
            $update_stok = $cek_stok->stok + $qty;
			$this->m_pembelian->pembelian($data,$barang,$harga,$update_stok);
			redirect('pembelian','refresh');
		}
		$data['supplier']  = $this->m_supplier->get_all();
		$data['barang']  = $this->m_barang->get_all();
		$thn= date('Y');
		$bln=date('m');
		$namafile= substr($thn,-2);
		$data['kd']  = autonumber("tbl_pembelian","kd_transaksi",3,"$namafile$bln");
		$data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
		$this->template->load('template','pembelian/tambah', $data);
	}
	public function edit($id){
		if(isset($_POST['submit'])){
			$tgl = $this->input->post('tgl');
			$supplier = $this->input->post('supplier');
			$barang = $this->input->post('barang');
			$harga = $this->input->post('harga');
			$qty = $this->input->post('qty');
			$ket = $this->input->post('ket');
            $subtotal = $qty * $harga;
			$data = array(
					'tgl_transaksi' => $tgl,
					'kd_supplier'   => $supplier,
					'kd_barang'     => $barang,
					'harga_beli'    => $harga,
					'qty'           => $qty,
					'ket'           => $ket,
					'subtotal'      => $subtotal
 				);
			$cek_qty_pembelian = $this->m_pembelian->get_id($id)->row();
			$cek_stok = $this->m_barang->get_id($barang)->row();
			$cek_stok_lama = $this->m_barang->get_id($cek_qty_pembelian->kd_barang)->row();
			if($cek_qty_pembelian->kd_barang==$barang){
				$selisih = $qty - $cek_qty_pembelian->qty;
	            $update_stok = $cek_stok->stok + $selisih;
	            $this->m_pembelian->edit_pembelian($data,$barang,$harga,$update_stok, $id);
            }else{
            	 $update_stok = $cek_stok->stok + $qty;
                 $update_stok_lama = $cek_stok_lama->stok - $qty;
                 $this->db->update('tbl_barang',array('stok'=> $update_stok_lama),array('kd_barang'=>$cek_qty_pembelian->kd_barang));
            	 $this->m_pembelian->edit_pembelian($data,$barang,$harga,$update_stok, $id);
            }
			
			redirect('pembelian','refresh');
		}
	  $data['supplier']  = $this->m_supplier->get_all();
	  $data['barang']  = $this->m_barang->get_all();
	  $data['pembelian'] = $this->m_pembelian->get_id($id)->row();
	  $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
      $this->template->load('template','pembelian/edit', $data);
	}
	public function hapus($id){
		$this->m_pembelian->hapus($id);
    	$this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
    	redirect('pembelian','refresh');
	}


}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */