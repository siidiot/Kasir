
<!DOCTYPE html>
<html>
    
    <head>
        <title>.::TOKO GADGET PLUS::.</title>
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
        <script src="<?=base_url()?>assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Toko gadget plus</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                               <form action="http://localhost/kasir/index.php/auth" class="navbar-form pull-right" method="post" accept-charset="utf-8"><div style="display:none">

</div>              <input class="form-control span2" type="text" name="username" placeholder="Username..." value="">
              <input class="form-control span2" type="password" name="password" placeholder="Password...">
              <button type="submit" name="submit" class="btn btn-primary "><i class="icon-share icon-white"></i> Log in</button>
           </form>

                                </a>
                                <ul class="dropdown-menu">
                                    
                                    
                                    <li>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                       
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1">
                    
                </div>
                <!--/span-->

                <div class="span10" id="content">

                    
                   <?php if($this->session->flashdata('wrong')):?>
                    <div class="alert alert-danger"><?=$this->session->flashdata('wrong')?></div>
                  <?php endif?>
                     <div class="well">
                        <!-- block -->
                            <h2>Selamat Datang di Sistem Informasi Penjualan barang Toko gadget plus</h2>
        <p>Sistem Informasi ini merupahkan sistem untuk melakukan transaksi penjualan dan pembelian barang pada Toko gadget plus. Silahkan masukkan username dan password.</p>
        
                        <!-- /block -->
                    </div>
                </div>

                 <div class="span1">
                    
                </div>
            </div>
            
           
        </div>
        
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