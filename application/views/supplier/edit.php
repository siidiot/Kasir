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
                      <h3>Edit Data Supplier</h3>
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
  <?=form_open('supplier/edit/'.$supplier->kd_supplier, ['class'=>'form-horizontal'],'novalidate');?>
   <div class="control-group">
      <label class="control-label">Nama Supplier</label>
      <div class="controls">
        <input type="text" class="span6" name="nama" required='required'  value="<?=$supplier->nm_supplier?>" placeholder="Nama Supplier">
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Alamat</label>
      <div class="controls">
        <textarea name="alamat"><?=$supplier->alamat?></textarea>
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">No Telepon</label>
      <div class="controls">
        <input type="text" class="span6" name="phone" required='required' value="<?=$supplier->no_telepon?>" placeholder="Nomor Telepon">
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