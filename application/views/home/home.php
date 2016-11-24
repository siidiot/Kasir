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
                      <h3>Selamat Datang Dihalaman Administrator</h3>
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

                    
                   
                    <?php if($this->session->flashdata('sukses')): ?>
                     <div class="alert alert-success"><?=$this->session->flashdata('sukses')?></div>
                     <?php endif?>
                     <div class="well">
                        <!-- block -->
                        <center>
                          <table>
                          	 <tr>
                          	 	<td> <img src="<?=base_url()?>ester/10.jpg" width="300px" height="300px"></td><td> <img src="<?=base_url()?>ester/7.jpg" width="300px" height="300px"></td>
                          	 </tr>
                          	 <tr>
                          	 	<td> <img src="<?=base_url()?>ester/3.jpg" width="300px" height="300px"></td><td> <img src="<?=base_url()?>ester/4.jpg" width="300px" height="300px"></td>
                          	 </tr>
                          </table>
                        </center>
                        <!-- /block -->
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