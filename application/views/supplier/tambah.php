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
                      <h3>Tambah Data Supplier</h3>
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
  <?=form_open('supplier/tambah', ['class'=>'form-horizontal'],'novalidate');?>
  <div class="control-group">
      <label class="control-label">ID Supplier</label>
      <div class="controls">
        <input type="text" class="span6" name="id" value="<?=$kd?>" readonly  value="" placeholder="Nama Supplier">
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Nama Supplier</label>
      <div class="controls">
        <input type="text" class="span6" name="nama" required='required'  value="" placeholder="Nama Supplier">
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Alamat</label>
      <div class="controls">
        <textarea name="alamat"></textarea>
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">No Telepon</label>
      <div class="controls">
        <input type="text" class="span6" name="phone" required='required'  placeholder="Nomor Telepon">
      </div>
  </div>
 
      <div class="control-group">
      <div class="controls">
        <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
        <button type="reset" class="btn">Batal</button>
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