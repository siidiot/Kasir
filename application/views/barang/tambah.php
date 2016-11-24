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
                      <h3>Tambah data Barang</h3>
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
  <?=form_open('barang/tambah', ['class'=>'form-horizontal'],'novalidate');?>

  <div class="control-group">
      <label class="control-label">ID Barang</label>
      <div class="controls">
        <input type="text" class="span6" name="id" value="<?=$kd?>" readonly value="" placeholder="Nama Kasir">
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Nama Barang</label>
      <div class="controls">
        <input type="text" class="span6" name="nama" required='required'   placeholder="Nama Barang">
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Kategori</label>
      <div class="controls">
        <select name="kategori">
          <?php foreach($all_kategori->result() as $k):?>
          <option value="<?=$k->kd_kategori?>"><?=$k->nm_kategori?></option>
        <?php endforeach?>
        </select>
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Satuan</label>
      <div class="controls">
        <input type="text" class="span6" name="satuan" required='required'  placeholder="Satuan">
      </div>
  </div>

  <div class="control-group">
      <label class="control-label">Harga Modal</label>
      <div class="controls">
        <input type="text" class="span6" name="modal" required='required'  placeholder="Harga Modal">
      </div>
  </div>

 <div class="control-group">
      <label class="control-label">Stok</label>
      <div class="controls">
        <input type="text" class="span6" name="stok" required='required'  placeholder="Stok">
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