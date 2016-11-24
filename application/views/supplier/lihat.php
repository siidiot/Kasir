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
                      <h3>Tampil Data Supplier</h3>
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
                                <div class="muted pull-left">data supplier</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="supplier/tambah"><button class="btn btn-success">Tambah <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th><p align="center">No</th>
                                                <th><p align="center">Kode Supplier</th>
                                                <th><p align="center">Nama Supplier</th>
                                                <th><p align="center">Alamat</th>
                                                <th><p align="center">No Telp</th>
                                                <th><p align="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $no=1;foreach($all_supplier->result() as $s):?>
                                            <tr>
                                                <td><p align="center"><?=$no?></td>
                                                 <td><p align="center"><?=$s->kd_supplier?></td>
                                                  <td><p align="center"><?=$s->nm_supplier?></td>
                                                 <td><p align="center"><?=$s->alamat?></td>
                                                 <td><p align="center"><?=$s->no_telepon?></td>
                                                 <td><p align="center">
                                                     <?=anchor('supplier/edit/'.$s->kd_supplier, 'Edit',['class'=>'btn btn-default btn-sm']);?>
                                                     <?=anchor('supplier/hapus/'.$s->kd_supplier, 'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('yakin akan menghapus data ini??')"]);?>
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