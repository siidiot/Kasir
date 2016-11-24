
<!DOCTYPE html>
<html>
    
    <head>
        <title>.::PROGRAM PENJUALAN TOKO::.</title>
        <!-- Bootstrap -->
        <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?=base_url()?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?=base_url()?>assets/assets/styles.css" rel="stylesheet" media="screen">
        <link href="<?=base_url()?>assets/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style type="text/css">
           .img { 
               
                -webkit-background-size: 100% 100%;
                -moz-background-size: 100% 100%;
                -o-background-size: 100% 100%;
                background-size: 100% 100%;
            }
        </style>
        <script src="<?=base_url()?>assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
         <script src="<?=base_url()?>assets/validator.min.js"></script>
    </head>
    
    <body class="img" background="<?=base_url()?>img/bg.jpg">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <?php echo anchor('home', 'Toko gadget plus',['class'=>'brand']) ?>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-question-sign"></i>Info Stok<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                         <?php foreach($stk as $r):?>           
                       <?php if($r->stok==0):?>     
                        <li class="alert alert-danger">
                        <?php else:?>
                        <li> 
                        <?php endif?> 
                            <a href="#">
                                <div>
                                    <strong><?=$r->nm_barang?></strong>
                                   
                                </div>
                               <?php if($r->stok==0):?>
                                <div>Stok Habis</div>
                               <?php else:?>
                                <div><?=$r->stok?></div>
                               <?php endif?>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php endforeach?>

                        <li>
                            <a class="text-center" href="<?=base_url()?>index.php/barang">
                                <strong>Lihat Semua Barang</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Administrator <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    
                                    
                                    <li>
                                        <a tabindex="-1" href="<?=base_url()?>index.php/auth/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                           
                         
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Master <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                  <?php if($this->session->userdata('status')=='admin'):?>
                                    <li>
                                       <?=anchor('kasir', 'Data Kasir');?>
                                    </li>
                                <?php endif?>
                                     <li>
                                       <?=anchor('supplier', 'Data Supplier');?>
                                    </li>
                                    
                                    <li>
                                       <?=anchor('kategori', 'Data Kategori');?>
                                    </li>
                                    <li>
                                       <?=anchor('barang', 'Data Barang');?>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Transaksi <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=anchor('pembelian', 'Pembelian');?>
                                    </li>
                                    <li>
                                         <?=anchor('penjualan', 'Penjualan');?>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Laporan<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?=anchor('laporan/pembelian', 'Pembelian Per Periode');?>
                                    </li>
                                    <li>
                                        <?=anchor('laporan/penjualan', 'Penjualan Per Periode');?>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <?=$contents?>
        <!--/.fluid-container-->

        <script src="<?=base_url()?>assets/vendors/jquery-1.9.1.js"></script>
        <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="<?=base_url()?>assets/assets/scripts.js"></script>
        <script src="<?=base_url()?>assets/assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>