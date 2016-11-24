<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_pembelian','m_penjualan'));
		chek_session();
	}

	public function pembelian()
	{
		if(isset($_POST['submit'])){
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
            $barang = $this->input->post('barang');
			$this->session->set_userdata(array('tgl1'=>$tgl1, 'tgl2'=>$tgl2,'barang'=>$barang));
            if($tgl1 AND $barang !=null){
              $data['pembelian']  = $this->m_pembelian->lihat_pembelian_periode1($tgl1, $tgl2,$barang);
              //  echo "1";
            }elseif($tgl1!=null){
              $data['pembelian']  = $this->m_pembelian->lihat_pembelian_periode2($tgl1, $tgl2);
                //echo "2";
            }elseif($barang!=null){
            $data['pembelian']  = $this->m_pembelian->lihat_pembelian_periode3($barang);
                //echo "3";
            }else{
                $this->session->set_flashdata('error', 'Tanggal dan jenis barang salah satau harus dipilih!!');
                redirect('laporan/pembelian','refresh');
            }
			
            $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
             $data['barang']  = $this->db->query("SELECT tb.nm_barang,tb.kd_barang FROM tbl_pembelian AS b, tbl_barang AS tb WHERE b.kd_barang=tb.kd_barang GROUP BY tb.kd_barang ")->result();
		    $this->template->load('template', 'laporan/pembelian', $data);
		}else{
			 $array_items = array('tgl1' => '', 'tgl2' => '','barang'=>'');
		    $this->session->unset_userdata($array_items);
			$data['pembelian']  = $this->m_pembelian->lihat_pembelian();
            $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
            $data['barang']  = $this->db->query("SELECT tb.nm_barang,tb.kd_barang FROM tbl_pembelian AS b, tbl_barang AS tb WHERE b.kd_barang=tb.kd_barang GROUP BY tb.kd_barang ")->result();
			$this->template->load('template', 'laporan/pembelian', $data);
	    }
	}
	public function cetak_semua_pembelian($tgl1=null, $tgl2=null,$barang=null){
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A3');
        $pdf->AddPage();
        $pdf->ln(20);
         $pdf->Image(base_url('img/2.jpg'),120,15,35,35);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(110, 55, 'LAPORAN PEMBELIAN');
         
        $pdf->SetFontSize(12);
        if($tgl1!=null AND $tgl2==null){
            $pdf->SetFont('Arial','','L');
            $pdf->Text(110, 60, 'Jenis Barang :');
        }elseif($tgl1!=null AND $barang!=null){
             $pdf->SetFont('Arial','B','L');
            $pdf->Text(110, 60, 'Periode           :');
            $pdf->Text(110, 65, 'Jenis Barang  :');
        }else{
            $pdf->SetFont('Arial','B','L');
            $pdf->Text(110, 60, 'Periode :');
        }
        
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        if ($tgl1==NULL AND $barang==NULL) {
             $x  = $this->db->query("SELECT * FROM tbl_pembelian ORDER BY tgl_transaksi ASC")->row();
             $y  = $this->db->query("SELECT * FROM tbl_pembelian ORDER BY tgl_transaksi DESC")->row();
        	 $pdf->Text(130, 60, date('d-m-Y',strtotime($x->tgl_transaksi)) .' sd '. date('d-m-Y',strtotime($y->tgl_transaksi)));
              $data=  $this->m_pembelian->lihat_pembelian();
         }elseif($tgl1!=NULL AND $barang!=NULL){
            $brg = $this->db->get_where('tbl_barang', array('kd_barang'=>$barang))->row();
               $x  = $this->db->query("SELECT * FROM tbl_pembelian ORDER BY tgl_transaksi ASC")->row();
             $y  = $this->db->query("SELECT * FROM tbl_pembelian ORDER BY tgl_transaksi DESC")->row();
             $pdf->Text(145, 60, date('d-m-Y',strtotime($x->tgl_transaksi)) .' sd '. date('d-m-Y',strtotime($y->tgl_transaksi)));
             $pdf->Text(145, 65, "$brg->nm_barang");
              $data=  $this->m_pembelian->lihat_pembelian_periode1($tgl1,$tgl2,$barang);
        }elseif($tgl1!=NULL AND $tgl2!=NULL){
        	 $pdf->Text(130, 60, date('d-m-Y',strtotime($tgl1)) .' sd '. date('d-m-Y',strtotime($tgl2)));
             $data=  $this->m_pembelian->lihat_pembelian_periode2($tgl1,$tgl2);
        }else{
            $brg = $this->db->get_where('tbl_barang', array('kd_barang'=>$tgl1))->row();
            $pdf->Text(140, 60, "$brg->nm_barang");
             $data=  $this->m_pembelian->lihat_pembelian_periode3($tgl1);
        }
       
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 55, 'Toko gadget plus');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 60, 'Jln.Tegar Beriman Cibinong Bogor');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 65, 'telp.081285701924');
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
        $pdf->Text(220, 70, 'Tanggal Cetak :');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(255, 70, date('d-m-Y'));
         $pdf->SetFont('Arial','','L');
        $pdf->ln(32);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
          $pdf->SetFillColor(202,248,198);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 10, 'No', 1,0,'C',true);
        $pdf->Cell(35, 10, 'No Transaksi', 1,0,'L',true);
        $pdf->Cell(35, 10, 'Tgl Transaksi', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Nama Supplier', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Nama Barang', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Harga Beli', 1,0,'L',true);
        $pdf->Cell(50, 10, 'Subtotal', 1,1,'L',true);

   		
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
        	 $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, $no, 1,0);
        $pdf->Cell(35, 10, $r->kd_transaksi, 1,0);
        $pdf->Cell(35, 10, date('d-m-Y',strtotime($r->tgl_transaksi)), 1,0);
        $pdf->Cell(45, 10, $r->nm_supplier, 1,0);
        $pdf->Cell(45, 10, $r->nm_barang, 1,0);
        $pdf->Cell(45, 10, 'Rp. '.number_format($r->harga_beli,0,',','.'), 1,0);
        $pdf->Cell(50, 10, 'Rp. '.number_format($r->subtotal,0,',','.'), 1,1);
         $no++;
         $total += $r->subtotal;
       }
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(215, 10, 'Total', 1,0,'R',1);
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
         $pdf->Cell(50, 10, 'Rp. '.number_format($total,0,',','.'), 1,1);
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
         $pdf->Cell(255, 10, 'Mengetahui', 0,1,'R');
          $pdf->Cell(255, 12, '', 0,1,'R');
          $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
          $pdf->Cell(257, 12, "Kepala Toko", 0,1,'R');
       

   		 if ($tgl1==null) {
      		    $nama_file = 'semua_data_pembelian';
	        }else{
	            $nama_file = 'lap_pembelian_'.$tgl1.'_sd_'.$tgl2;
	        }
        $pdf->Output($nama_file.'.pdf','i');
	}
	public function penjualan()
	{
		if(isset($_POST['submit'])){
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			 $barang = $this->input->post('barang');
            $this->session->set_userdata(array('tgl1'=>$tgl1, 'tgl2'=>$tgl2,'barang'=>$barang));
            if($tgl1 AND $barang !=null){
              $data['penjualan']  = $this->m_penjualan->lihat_penjualan_periode1($tgl1, $tgl2,$barang);
              //  echo "1";
            }elseif($tgl1!=null){
              $data['penjualan']  = $this->m_penjualan->lihat_penjualan_periode2($tgl1, $tgl2);
                //echo "2";
            }elseif($barang!=null){
            $data['penjualan']  = $this->m_penjualan->lihat_penjualan_periode3($barang);
                //echo "3";
            }else{
                $this->session->set_flashdata('error', 'Tanggal dan jenis barang salah satau harus dipilih!!');
                 redirect('laporan/penjualan','refresh');
            }
            $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
            $data['barang']  = $this->db->query("SELECT  tb.nm_barang ,tb.kd_barang FROM tbl_penjualan AS j, tbl_penjualan_detail AS det ,tbl_barang AS tb WHERE tb.kd_barang=det.kd_barang AND j.kd_transaksi=det.kd_transaksi GROUP BY tb.kd_barang")->result();
		    $this->template->load('template', 'laporan/penjualan', $data);
		}else{
			 $array_items = array('tgl1' => '', 'tgl2' => '','barang'=>'');
		    $this->session->unset_userdata($array_items);
			$data['penjualan']  = $this->m_penjualan->lihat_penjualan();
            $data['stk']  = $this->db->query("SELECT * FROM tbl_barang WHERE stok<4")->result();
            $data['barang']  = $this->db->query("SELECT tb.nm_barang,tb.kd_barang FROM tbl_penjualan AS j, tbl_penjualan_detail AS det ,tbl_barang AS tb WHERE tb.kd_barang=det.kd_barang AND j.kd_transaksi=det.kd_transaksi GROUP BY tb.kd_barang")->result();
			$this->template->load('template', 'laporan/penjualan', $data);

	    }
	}
	public function cetak_semua_penjualan($tgl1=null, $tgl2=null, $barang=null){
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A3');
        $pdf->AddPage();
        $pdf->ln(20);
        $pdf->ln(20);
     
         $pdf->Image(base_url('img/2.jpg'),120,15,35,35);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(110, 55, 'LAPORAN PENJUALAN');
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
         if($tgl1!=null AND $tgl2==null){
            $pdf->SetFont('Arial','','L');
            $pdf->Text(110, 60, 'Jenis Barang :');
        }elseif($tgl1!=null AND $barang!=null){
             $pdf->SetFont('Arial','B','L');
            $pdf->Text(110, 60, 'Periode           :');
            $pdf->Text(110, 65, 'Jenis Barang  :');
        }else{
            $pdf->SetFont('Arial','B','L');
            $pdf->Text(110, 60, 'Periode :');
        }
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
       if ($tgl1==NULL AND $barang==NULL) {
             $x  = $this->db->query("SELECT * FROM tbl_penjualan ORDER BY tgl_transaksi ASC")->row();
             $y  = $this->db->query("SELECT * FROM tbl_penjualan ORDER BY tgl_transaksi DESC")->row();
             $pdf->Text(130, 60, "$x->tgl_transaksi sd $y->tgl_transaksi");
              $data=  $this->m_penjualan->lihat_penjualan();
         }elseif($tgl1!=NULL AND $barang!=NULL){
            $brg = $this->db->get_where('tbl_barang', array('kd_barang'=>$barang))->row();
               $x  = $this->db->query("SELECT * FROM tbl_penjualan ORDER BY tgl_transaksi ASC")->row();
             $y  = $this->db->query("SELECT * FROM tbl_penjualan ORDER BY tgl_transaksi DESC")->row();
             $pdf->Text(145, 60, "$x->tgl_transaksi sd $y->tgl_transaksi");
             $pdf->Text(145, 65, "$brg->nm_barang");
              $data=  $this->m_penjualan->lihat_penjualan_periode1($tgl1,$tgl2,$barang);
        }elseif($tgl1!=NULL AND $tgl2!=NULL){
             $pdf->Text(130, 60, "$tgl1 sd $tgl2");
             $data=  $this->m_penjualan->lihat_penjualan_periode2($tgl1,$tgl2);
        }else{
            $brg = $this->db->get_where('tbl_barang', array('kd_barang'=>$tgl1))->row();
            $pdf->Text(140, 60, "$brg->nm_barang");
             $data=  $this->m_penjualan->lihat_penjualan_periode3($tgl1);
        }
       
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 55, 'Toko gadget plus');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 60, 'Jln.Tegar Beriman Cibinong Bogor');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 65, 'telp.081285701924');
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
        $pdf->Text(220, 70, 'Tanggal Cetak :');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(255, 70, date('d-m-Y'));
         $pdf->SetFont('Arial','','L');
        $pdf->ln(15);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
          $pdf->SetFillColor(248,202,198);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 10, 'No', 1,0,'C',true);
        $pdf->Cell(35, 10, 'No Transaksi', 1,0,'L',true);
        $pdf->Cell(35, 10, 'Tgl Transaksi', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Nama Konsumen', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Nama Barang', 1,0,'L',true);
        $pdf->Cell(45, 10, 'Harga Item', 1,0,'L',true);
        $pdf->Cell(50, 10, 'Subtotal', 1,1,'L',true);

	  
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
        	 $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, $no, 1,0);
        $pdf->Cell(35, 10, $r->kd_transaksi, 1,0);
        $pdf->Cell(35, 10, $r->tgl_transaksi, 1,0);
        $pdf->Cell(45, 10, $r->nm_konsumen, 1,0);
        $pdf->Cell(45, 10, $r->nm_barang, 1,0);
        $pdf->Cell(45, 10, 'Rp. '.number_format($r->harga,0,',','.'), 1,0);
        $pdf->Cell(50, 10, 'Rp. '.number_format($r->subtotal,0,',','.'), 1,1);
         $no++;
         $total += $r->subtotal;
       }
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(215, 10, 'Total', 1,0,'R',1);
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
         $pdf->Cell(50, 10, 'Rp. '.number_format($total,0,',','.'), 1,1);
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
         $pdf->Cell(255, 10, 'Mengetahui', 0,1,'R');
          $pdf->Cell(255, 12, '', 0,1,'R');
          $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
          $pdf->Cell(257, 12, "Kepala Toko", 0,1,'R');
       

   		 if ($tgl1==null) {
      		    $nama_file = 'semua_data_penjualan';
	        }else{
	            $nama_file = 'lap_penjualan_'.$tgl1.'_sd_'.$tgl2;
	        }
        $pdf->Output($nama_file.'.pdf','i');
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */