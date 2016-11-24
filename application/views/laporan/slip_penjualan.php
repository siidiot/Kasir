<?php
$pdf=new FPDF('L','mm','A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        
       $pdf->Image(base_url('img/2.jpg'),80,7,25,25);
         $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 20, 'Toko gadget plus');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(10, 25, '(HANDPHONE AND GADGET CENTER)');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 35, 'telp. 83939292');
        $pdf->Text(10, 30, 'jln.tegar beriman cibinong bogor');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(10, 35, 'telp. 83939292');
         $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->Text(135, 20, 'Jakarta :'.date('d-m-Y'));
        $pdf->Text(135, 25, 'Kepada Yth :'.$nm_konsumen->nm_konsumen);
        
         $pdf->SetFont('Arial','','L');
        $pdf->ln(20);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
          $pdf->SetFillColor(192,188,188);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(25, 10, 'QTY', 1,0,'L',true);
        $pdf->Cell(65, 10, 'Nama Barang', 1,0,'L',true);
        $pdf->Cell(30, 10, 'ID Barang', 1,0,'L',true);
        $pdf->Cell(35, 10, 'Harga', 1,0,'L',true);
        $pdf->Cell(35, 10, 'Jumlah', 1,1,'L',true);
   		$pdf->SetFont('Arial','','L');
         $total = 0;
        foreach ($slip->result() as $r)
        {
        $subtotal = $r->qty * $r->harga;
        $total +=$subtotal;
       $pdf->Cell(25, 8, $r->qty, 1,0);
        $pdf->Cell(65, 8, $r->nm_barang, 1,0);
        $pdf->Cell(30, 8, $r->kd_barang, 1,0);
        $pdf->Cell(35, 8, 'Rp. '.number_format($r->harga,0,',','.'), 1,0);
        $pdf->Cell(35, 8, 'Rp. '.number_format($subtotal,0,',','.'), 1,1);
         
        }
$pdf->SetFont('Arial','','L');
         $pdf->Cell(25, 10, '', 0,0,'C');
        $pdf->Cell(40, 10, "Tanda Terima, ", 0,0,'C');$pdf->Cell(35, 10, "Hormat Kami, ", 0,0,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->Cell(55, 10, 'JUMLAH TOTAL', 0,0,'R');
        $pdf->Cell(45, 10, 'Rp. '.number_format($total,0,',','.'), 0,1,'L');
       $pdf->cell(25); $pdf->Cell(40, 18, "$nm_konsumen->nm_konsumen", 0,0,'C');
        $pdf->Cell(35, 18, "GADGET PLUS", 0,0,'C');
        $pdf->Output();
?>