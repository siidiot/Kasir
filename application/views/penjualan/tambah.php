  <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1">
                    
                </div>
                <!--/span-->

                <div class="span10" id="content">

                    
                   
                    <div >
                        <!-- block -->
                            <img src="<?=base_url()?>img/bgr.jpg" height="100px" width="100%">
                        <!-- /block -->
                    </div>
                     <div class="well">
                        <!-- block -->
                            <h3>Form Tambah Penjualan Barang</h3>
                        <!-- /block -->
                    </div>
                </div>

                 <div class="span1">
                    
                </div>
            </div>
            
           
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1">
                    
                </div>
                <!--/span-->

                <div class="span10" id="content">

                    
                   
                   <?php if($this->session->flashdata('error')):?>
                   <div class="alert alert-danger"><?=$this->session->flashdata('error');?></div>
                 <?php endif?>
                     <div class="well">
  <?=form_open('penjualan/tambah', ['class'=>'form-horizontal'],'novalidate');?>
  
    <table class="table table-bordered">
       <tr>
         <td><select name="barang" class="span5" required="required">
         <option>==pilih barang==</option>
          <?php foreach($barang->result() as $s):?>

          <option value="<?=$s->kd_barang?>"><?=$s->nm_barang?></option>
        <?php endforeach?>
        </select> <input type="text" name="qty" required="required" placeholder="QTY" class="form-control"></td>
       </tr>
       <tr>
         <td> <button type="submit" name="submit" class="btn btn-default">Tambah</button></td>
       </tr>
    </table>
  </form>
  
   <table class="table table-bordered">
       <tr>
         <th colspan="6">DETAIL TRANSAKSI</th>
       </tr>
       <tr>
         <th>No</th>
         <th>Nama Barang</th>
         <th>QTY</th>
         <th>Harga</th>
         <th>Subtotal</th>
         <th>Cancel</th>
       </tr>
       <?php $no=1; $total=0;
          foreach($t_detail->result() as $t): 
            $subtotal = $t->qty * $t->harga_jual;
            $total += $subtotal;
       ?>
       <tr>
         <td><?=$no?></td>
         <td><?=$t->nm_barang?></td>
         <td><?=$t->qty?></td>
         <td>Rp. <?=number_format($t->harga_jual,0,',','.')?></td>
         <td>Rp. <?=number_format($subtotal,0,',','.')?></td>
         <td><?=anchor('penjualan/hapus/'.$t->kd_transaksi_detail, 'Hapus', 'attributes');?></td>
       </tr>
     <?php $no++; endforeach;?>
     <tr>
       <th colspan="5"> 
      
       <p align="right">Total</p></th><td>Rp. <?=number_format($total,0,',','.')?></td>
     </tr>
    </table>
    <?=form_open('penjualan/selesai', ['class'=>'form-horizontal'],'novalidate');?>
     <table class="table table-bordered">
       <tr>
         <td ><p  align="right">
      KD Transaksi &nbsp;&nbsp;&nbsp;
        <input type="text" class="span3" name="id" value="<?=$kd?>" readonly value="" placeholder="Nama Kasir">
      </p> </td>
       </tr>
       <tr>
         <td ><p  align="right">
      Nama Konsumen &nbsp;&nbsp;&nbsp;
        <input type="text" class="span3" name="konsumen" required='required'  placeholder="Nama Konsumen...">
      </p> </td>
       </tr>
       <tr>
         <td>
           <p align="right"> <button type="submit" name="submit" class="btn btn-success">Simpan</button></td>
       </tr>
    </table>
</div>
                </div>

                 <div class="span1">
                    
                </div>
            </div>
            <hr>
            <footer>
                <p align="center">&copy;  Ester Desindo NB 2016</p>
            </footer>
        </div>