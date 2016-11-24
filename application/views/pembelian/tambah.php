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
                      <h3>Form Tambah pembelian barang</h3>
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
  <?=form_open('pembelian/tambah', ['class'=>'form-horizontal'],'novalidate');?>
  <div class="control-group">
      <label class="control-label">NO Transaksi</label>
      <div class="controls">
        <input type="text" class="span6" name="id" value="<?=$kd?>" readonly value="" placeholder="Nama Kasir">
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Tgl Trans</label>
      <div class="controls">
        <input type="Date" class="span3" name="tgl" required='required'  >
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Supplier</label>
      <div class="controls">
        <select name="supplier" class="span5">
          <?php foreach($supplier->result() as $s):?>
          <option value="<?=$s->kd_supplier?>"><?=$s->nm_supplier?></option>
        <?php endforeach?>
        </select>
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Nama Barang</label>
      <div class="controls">
        <select name="barang" class="span5" multiple="multiple">
          <?php foreach($barang->result() as $s):?>
          <option value="<?=$s->kd_barang?>"><?=$s->nm_barang?></option>
        <?php endforeach?>
        </select>
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Harga</label>
      <div class="controls">
        <input type="text" class="span5" name="harga" required='required'  placeholder="Harga Modal">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Jumlah Item</label>
      <div class="controls">
        <input type="text" class="span5" name="qty" required='required'  placeholder="Jumlah Item..">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Keterangan</label>
      <div class="controls">
        <textarea name="ket"></textarea>
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