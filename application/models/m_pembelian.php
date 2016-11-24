<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelian extends CI_Model {

	public function pembelian($data, $barang, $harga, $update_stok){
      $this->db->insert('tbl_pembelian', $data);
      $harga_jual = $harga + ($harga * 0.2);
      $this->db->update('tbl_barang',array('harga_modal'=>$harga,'harga_jual'=>$harga_jual,'stok'=>$update_stok),array('kd_barang'=>$barang));
	}
    public function edit_pembelian($data, $barang, $harga, $update_stok,$id){
      $this->db->update('tbl_pembelian', $data,array('kd_transaksi'=>$id));
      $harga_jual = $harga + ($harga * 0.2);
      $this->db->update('tbl_barang',array('harga_modal'=>$harga,'harga_jual'=>$harga_jual,'stok'=>$update_stok),array('kd_barang'=>$barang));
	}
	public function lihat_pembelian(){
		return $this->db->query("SELECT tp.*,ts.nm_supplier, tb.nm_barang,tk.nm_kasir
			                     FROM tbl_pembelian AS tp, tbl_supplier AS ts, tbl_barang AS tb, tbl_kasir AS tk
			                     WHERE tp.kd_supplier=ts.kd_supplier AND tp.kd_barang=tb.kd_barang AND tp.kd_kasir=tk.kd_kasir ORDER BY tp.kd_transaksi DESC");
	}
  public function lihat_pembelian_periode1($tgl1,$tgl2,$barang){
    return $this->db->query("SELECT tp.*,ts.nm_supplier, tb.nm_barang,tk.nm_kasir
                           FROM tbl_pembelian AS tp, tbl_supplier AS ts, tbl_barang AS tb, tbl_kasir AS tk
                           WHERE tp.kd_supplier=ts.kd_supplier AND tp.kd_barang=tb.kd_barang AND tp.kd_kasir=tk.kd_kasir AND tb.kd_barang='$barang' AND tp.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'");
  }
  public function lihat_pembelian_periode2($tgl1,$tgl2){
    return $this->db->query("SELECT tp.*,ts.nm_supplier, tb.nm_barang,tk.nm_kasir
                           FROM tbl_pembelian AS tp, tbl_supplier AS ts, tbl_barang AS tb, tbl_kasir AS tk
                           WHERE tp.kd_supplier=ts.kd_supplier AND tp.kd_barang=tb.kd_barang AND tp.kd_kasir=tk.kd_kasir AND tp.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2'");
  }
   public function lihat_pembelian_periode3($barang){
    return $this->db->query("SELECT tp.*,ts.nm_supplier, tb.nm_barang,tk.nm_kasir
                           FROM tbl_pembelian AS tp, tbl_supplier AS ts, tbl_barang AS tb, tbl_kasir AS tk
                           WHERE tp.kd_supplier=ts.kd_supplier AND tp.kd_barang=tb.kd_barang AND tp.kd_kasir=tk.kd_kasir AND tb.kd_barang='$barang'");
  }
	public function get_id($id){
		return $this->db->get_where('tbl_pembelian',array('kd_transaksi'=>$id));
	}
    public function edit($data,$id){
    	$this->db->update('tbl_pembelian',$data,array('kd_transaksi'=>$id));
    }
    public function hapus($id){
    	$this->db->delete('tbl_pembelian',array('kd_transaksi'=>$id));
    }
}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */