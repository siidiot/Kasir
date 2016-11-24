<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model { 

	function lihat_penjualan(){
		return $this->db->query("SELECT tp.*,td.*, SUM(td.qty * td.harga) AS subtotal,tb.nm_barang,tb.kd_barang,tk.nm_kasir
FROM tbl_penjualan AS tp, tbl_penjualan_detail AS td, tbl_kasir AS tk, tbl_barang AS tb
WHERE tp.kd_transaksi=td.kd_transaksi AND tp.kd_kasir=tk.kd_kasir AND td.kd_barang=tb.kd_barang GROUP BY tp.kd_transaksi"  );
	}
	function lihat_penjualan_periode1($tgl1, $tgl2,$barang){
		return $this->db->query("SELECT td.*, tp.*,SUM(td.qty * td.harga) AS subtotal,tb.nm_barang,tb.kd_barang,tk.nm_kasir
FROM tbl_penjualan AS tp, tbl_penjualan_detail AS td, tbl_kasir AS tk, tbl_barang AS tb
WHERE tp.kd_transaksi=td.kd_transaksi AND tp.kd_kasir=tk.kd_kasir AND td.kd_barang=tb.kd_barang AND tb.kd_barang='$barang' AND tp.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2' GROUP BY td.kd_transaksi_detail ORDER BY tp.kd_transaksi DESC");
	}
  function lihat_penjualan_periode2($tgl1, $tgl2){
    return $this->db->query("SELECT td.*, tp.*,SUM(td.qty * td.harga) AS subtotal,tb.nm_barang,tb.kd_barang,tk.nm_kasir
FROM tbl_penjualan AS tp, tbl_penjualan_detail AS td, tbl_kasir AS tk, tbl_barang AS tb
WHERE tp.kd_transaksi=td.kd_transaksi AND tp.kd_kasir=tk.kd_kasir AND td.kd_barang=tb.kd_barang AND tp.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2' GROUP BY td.kd_transaksi_detail ORDER BY tp.kd_transaksi DESC");
  }
  function lihat_penjualan_periode3($barang){
    return $this->db->query("SELECT td.*, tp.*,SUM(td.qty * td.harga) AS subtotal,tb.nm_barang,tb.kd_barang,tk.nm_kasir
FROM tbl_penjualan AS tp, tbl_penjualan_detail AS td, tbl_kasir AS tk, tbl_barang AS tb
WHERE tp.kd_transaksi=td.kd_transaksi AND tp.kd_kasir=tk.kd_kasir AND td.kd_barang=tb.kd_barang AND tb.kd_barang='$barang' GROUP BY td.kd_transaksi_detail ORDER BY tp.kd_transaksi DESC");
  }
   public function slip($id)
   {
   	  return $this->db->query("SELECT td.*, tp.*,tb.nm_barang,tb.kd_barang,tk.nm_kasir
FROM tbl_penjualan AS tp, tbl_penjualan_detail AS td, tbl_kasir AS tk, tbl_barang AS tb
WHERE tp.kd_transaksi=td.kd_transaksi AND tp.kd_kasir=tk.kd_kasir AND td.kd_barang=tb.kd_barang AND tp.kd_transaksi='$id'");
   }
	public function simpan_barang(){
		$id_barang = $this->input->post('barang');
		$qty       = $this->input->post('qty');
    $cek  = $this->db->get_where("tbl_penjualan_detail",array('kd_barang'=>$id_barang,'status'=>'0'))->num_rows();
     if($cek>0){
         $this->session->set_flashdata('error',"Maaf, anda dapat menginput  barang yang sama ");
         redirect('penjualan/tambah','refresh')  ;
      }
		$barang = $this->db->get_where('tbl_barang',array('kd_barang'=>$id_barang))->row_array();
    $stok = $barang['stok'];
    $nm_barang = $barang['nm_barang'];
     if($stok==0){
         $this->session->set_flashdata('error',"Maaf stok $nm_barang saat ini adalah kosong ");
         redirect('penjualan/tambah','refresh')  ;
      }elseif ($stok<$qty) {
          $this->session->set_flashdata('error',"Maaf jumlah barang yang diinput terlalu banyak, stok $nm_barang saat ini adalah $stok ");
          redirect('penjualan/tambah','refresh')  ;
        }
     
		$data   = array(
					'kd_barang' => $id_barang,
					'qty'		=>$qty,
					'harga' 	=> $barang['harga_jual']
			);
		$this->db->insert('tbl_penjualan_detail',$data);
	}
	 function tampilkan_detail_transaksi()
    {
        $query  ="SELECT td.kd_transaksi_detail,td.qty,td.harga,b.nm_barang,b.harga_jual
                FROM tbl_penjualan_detail as td,tbl_barang as b
                WHERE b.kd_barang=td.kd_barang and td.status='0'";
        return $this->db->query($query);
    }
    function selesai($data){
      $this->db->insert('tbl_penjualan',$data);
      $last_id=  $this->db->query("select kd_transaksi from tbl_penjualan order by kd_transaksi desc")->row_array();
      $this->db->update('tbl_penjualan_detail',array('kd_transaksi'=>$last_id['kd_transaksi'],'status'=>'1'),array('status'=>'0'));
    }

     public function getKurangStok($kd_barang,$kurangi)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }

     function hapusitem($id)
    {
        $this->db->delete('tbl_penjualan_detail',array('kd_transaksi_detail'=>$id));
    }
}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */