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
                      <h3>Form Edit Penjualan Barang</h3>
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

                    
                   

                     <div class="well">
  <?=form_open('penjualan/edit/'.$penjualan->kd_transaksi, ['class'=>'form-horizontal'],'novalidate');?>
   <div class="control-group">
      <label class="control-label">Tgl Trans</label>
      <div class="controls">
        <input type="Date" class="span3" name="tgl" value="<?=$penjualan->tgl_transaksi?>"required='required'  >
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Konsumen</label>
      <div class="controls">
        <select name="konsumen" class="span5">
          <?php foreach($konsumen->result() as $s):?>
          <option <?=$penjualan->kd_konsumen==$s->kd_konsumen?'selected':''?> value="<?=$s->kd_konsumen?>"><?=$s->nm_konsumen?></option>
        <?php endforeach?>
        </select>
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Nama Barang</label>
      <div class="controls">
        <select name="barang" class="span5">
          <?php foreach($barang->result() as $s):?>
          <option <?=$penjualan->kd_barang==$s->kd_barang?'selected':''?>  value="<?=$s->kd_barang?>"><?=$s->nm_barang?></option>
        <?php endforeach?>
        </select>
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Kuantitas</label>
      <div class="controls">
        <input type="text" class="span5" name="qty" required='required' value="<?=$penjualan->qty?>" placeholder="Kuantitas..">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Keterangan</label>
      <div class="controls">
        <textarea name="ket"><?=$penjualan->ket?></textarea>
      </div>
  </div>

      <div class="control-group">
      <div class="controls">
        <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
        <button type="reset" class="btn">Hapus Data</button>
      </div>
      </div>
      
  </form>
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