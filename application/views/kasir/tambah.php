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
                      <h3>Tambah data kasir</h3>
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
  <?=form_open('kasir/tambah', ['class'=>'form-horizontal'],'novalidate');?>
  <div class="control-group">
      <label class="control-label">ID Kasir</label>
      <div class="controls">
        <input type="text" class="span6" name="id" value="<?=$kd?>" readonly value="" placeholder="Nama Kasir">
      </div>
  </div>
   <div class="control-group">
      <label class="control-label">Nama Kasir</label>
      <div class="controls">
        <input type="text" class="span6" name="nama" required='required'  value="" placeholder="Nama Kasir">
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Username</label>
      <div class="controls">
        <input type="text" class="span6" name="username" required='required' id="tempat_lahir" value="" placeholder="Username">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
        <input type="text" class="span6" name="password" required='required' id="tempat_lahir" value="" placeholder="Password">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Status</label>
      <div class="controls">
      <p>
        <input type="radio" class="span1" name="status"  checked value="admin"  >Admin<br>
        <input type="radio" class="span1" name="status"   value="user">User</p>
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