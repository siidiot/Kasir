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
                      <h3>Laporan pembelian per periode</h3>
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
                      <?php if($this->session->flashdata('error')): ?>
                     <div class="alert alert-danger"><?=$this->session->flashdata('error')?></div>
                     <?php endif?>
                     <div class="well">
                        <!-- block -->
                        <?=form_open('laporan/pembelian', ['class'=>'form-horizontal'],'novalidate');?>
                        <table class="table table-bordered">
                            <tr class="alert alert-warning">
                                <th colspan="4">Periode Pembelian</th>
                            </tr>
                            <tr>
                                <td>Periode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="date" name="tgl1" >&nbsp;&nbsp;Sd&nbsp;&nbsp;<input type="date" name="tgl2" >
                               &nbsp;&nbsp;&nbsp;&nbsp; Nama Barang
                                
                                    <select class="form-control" name="barang">
                                    <option></option>
                                       <?php foreach($barang as $b):?>

                                        <option value="<?=$b->kd_barang?>"><?=$b->nm_barang?></option>
                                    <?php endforeach?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td><td  align="right"><input type="submit" name="submit" class="btn btn-primary btn-sm" value="Tampilkan"></td>
                            </tr>
                        </table>
                        </form>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">data pembelian</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                     
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Cetak <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                          <?php
                                             $tgl1 = $this->session->userdata('tgl1');
                                             $tgl2 = $this->session->userdata('tgl2');
                                             $bar  = $this->session->userdata('barang');
                                          ?>
                                           <?php if(!empty($tgl1 AND $bar)):?>
                                            <li><?=anchor('laporan/cetak_semua_pembelian/'.$tgl1.'/'.$tgl2.'/'.$bar, 'Cetak PDF', ['target'=>'_blank']);?></li>
                                        <?php elseif(!empty($tgl1)):?>
                                            <li><?=anchor('laporan/cetak_semua_pembelian/'.$tgl1.'/'.$tgl2, 'Cetak PDF', ['target'=>'_blank']);?></li>
                                        <?php elseif(!empty($barang)):?>
                                            <li><?=anchor('laporan/cetak_semua_pembelian/'.$bar, 'Cetak PDF', ['target'=>'_blank']);?></li>
                                        <?php else:?>
                                             <li><?=anchor('laporan/cetak_semua_pembelian', 'Cetak PDF', ['target'=>'_blank']);?></li>
                                        <?php endif?>
                                         </ul>
                                      </div>
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th><p align="center">Kode Trans</th>
                                                <th><p align="center">Tgl Trans</th>
                                                <th><p align="center">Nama Supplier</th>
                                                <th><p align="center">Nama Barang</th>
                                                <th><p align="center">Harga Beli</th>
                                                <th><p align="center">QTY</th>
                                                <th><p align="center">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($pembelian->result() as $s):?>
                                            <tr>
                                                  <td><p align="center"><?=$s->kd_transaksi?></td>
                                                 <td><p align="center"><?=date('d-m-Y',strtotime($s->tgl_transaksi))?></td>
                                                 <td><p align="center"><?=$s->nm_supplier?></td>
                                                 <td><p align="center"><?=$s->nm_barang?></td>
                                                 <td><p align="center">Rp. <?=number_format($s->harga_beli,0,",",".")?></td>
                                                 <td><p align="center"><?=$s->qty?></td>
                                                 <td><p align="center">Rp. <?=number_format($s->subtotal,0,",",".")?></td>
                                                 
                                            </tr>
                                           <?php endforeach?>
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