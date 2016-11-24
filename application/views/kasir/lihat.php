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
                      <h3>Data kasir</h3>
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

                    
                    <?php if($this->session->flashdata('sukses')): ?>
                     <div class="alert alert-success"><?=$this->session->flashdata('sukses')?></div>
                     <?php endif?>

                     <div class="well">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">data kasir</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <?php $tbh = "<i class=' icon-plus icon-white'></i>"?>
                                         <?=anchor('kasir/tambah', 'Tambah'.$tbh, ['class'=>'btn btn-success']);?>
                                      </div>
                                     
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th><p align="center">No</th>
                                                <th><p align="center">Kode Kasir</th>
                                                <th><p align="center">Nama Kasir</th>
                                                <th><p align="center">Username</th>
                                                <th><p align="center">Status</th>
                                                <th><p align="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $no=1;foreach($all_kasir->result() as $k):?>
                                            <tr>
                                                <td><p align="center"><?=$no?></td>
                                                 <td><p align="center"><?=$k->kd_kasir?></td>
                                                  <td><p align="center"><?=$k->nm_kasir?></td>
                                                 <td><p align="center"><?=$k->username?></td>
                                                 <td><p align="center"><?=$k->status?></td>
                                                 <td><p align="center">
                                                     <?=anchor('kasir/edit/'.$k->kd_kasir, 'Edit',['class'=>'btn btn-default btn-sm']);?>
                                                     <?=anchor('kasir/hapus/'.$k->kd_kasir, 'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('yakin akan menghapus data ini??')"]);?>
                                                 </td>
                                            </tr>
                                           <?php $no++;endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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