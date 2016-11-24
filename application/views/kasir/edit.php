<div class="container-fluid">
            <div class="row-fluid">
                <div class="span1">
                    
                </div>
                <!--/span-->

                <div class="span10" id="content">

                    
                   

                    <div>
                        <!-- block -->
                            <img src="<?=base_url()?>img/bgr.jpg" height="100px" width="100%">
                        <!-- /block -->
                    </div>
                    <div class="well">
                      <h3>Edit data kasir</h3>
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
  <?=form_open('kasir/edit/'.$kasir->kd_kasir, ['class'=>'form-horizontal'],'novalidate');?>
   <div class="control-group">
      <label class="control-label">Nama Kasir</label>
      <div class="controls">
        <input type="text" class="span6" name="nama" required='required'  value="<?=$kasir->nm_kasir?>">
      </div>
  </div>
 <div class="control-group">
      <label class="control-label">Username</label>
      <div class="controls">
        <input type="text" class="span6" name="username" required='required' value="<?=$kasir->username?>">
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
        <input type="text" class="span6" name="password" >
      </div>
  </div>
  <div class="control-group">
      <label class="control-label">Status</label>
      <div class="controls">
      <p>
        <input type="radio" class="span1" name="status"  <?=$kasir->status=='admin'?'checked':''?> value="admin"  >Admin<br>
        <input type="radio" class="span1" name="status"  <?=$kasir->status=='user'?'checked':''?> value="user">User</p>
      </div>
  </div>
      <div class="control-group">
      <div class="controls">
        <button type="submit" name="submit" class="btn btn-primary">Batal</button>
        
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