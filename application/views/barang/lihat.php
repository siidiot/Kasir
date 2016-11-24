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
                      <h3>Data Barang</h3>
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
                                <div class="muted pull-left">data barang</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="barang/tambah"><button class="btn btn-success">Tambah <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                    
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th class="center"><p align="center">No</th>
                                                <th class="center"><p align="center">Kode Barang</th>
                                                <th class="center"><p align="center">Nama Barang</th>
                                                <th><p align="center">Nama Kategori</th>
                                                <th><p align="center">Satuan</th>
                                                <th><p align="center">Harga Modal</th>
                                                <th><p align="center">Harga Jual</th>
                                                <th><p align="center">Stok</th>
                                                <th><p align="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $no=1;foreach($all_barang->result() as $s):?>
                                            <tr>
                                                <td><p align="center"><?=$no?></td>
                                                 <td><p align="center"><?=$s->kd_barang?></td>
                                                  <td><p align="center"><?=$s->nm_barang?></td>
                                                 <td><p align="center"><?=$s->nm_kategori?></td>
                                                 <td><p align="center"><?=$s->satuan?></td>
                                                 <td><p align="center">Rp. <?=number_format($s->harga_modal,0,",",".")?></td>
                                                 <td><p align="center">Rp. <?=number_format($s->harga_jual,0,",",".")?></td>
                                                 <td><p align="center"><?=$s->stok?></td>
                                                 <td><p align="center">
                                                     <?=anchor('barang/edit/'.$s->kd_barang, 'Edit',['class'=>'btn btn-default btn-sm']);?>
                                                     <?=anchor('barang/hapus/'.$s->kd_barang, 'Hapus',['class'=>'btn btn-danger btn-sm','onclick'=>"return confirm('yakin akan menghapus data ini??')"]);?>
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