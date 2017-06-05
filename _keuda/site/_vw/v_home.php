
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Website Dispenda Provinsi Kalimantan Tengah,Website Badan Keuangan Daerah Prov Kalteng">
        <meta name="author" content="BocahLinux">

        <title><?php echo $judul_page;?></title>
            
        
        <link href="<?php echo base_url();?>assets/flat_theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/font/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/font/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/flat_theme/css/main.css" rel="stylesheet">


        <!--[if lt IE 9]>
        
        <script src="<?php echo base_url();?>assets/flat_theme/js/respond.min.js"></script>
        <script src="<?php echo base_url();?>assets/flat_theme/js/html5shiv.js"></script>

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plug/notify/pnotify.custom.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plug/notify/animate.css">

        <script src="<?php echo base_url();?>assets/plug/notify/pnotify.custom.js"></script>
        <![endif]-->  
        
        <script src="<?php echo base_url();?>assets/flat_theme/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/flat_theme/js/jquery.js"></script>
        
        <script src="<?php echo base_url();?>assets/flat_theme/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/flat_theme/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url();?>assets/flat_theme/js/main.js"></script>
        

        <script src="<?php echo base_url();?>assets/plug/notify/notify.js"></script>

    </head>

    <body>
        <!--header-->
        <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>assets/file/img-logo/logo2.png" alt="logo" style="min-width:50%;max-width:90% ">
                    </a>
                </div>
                <!-- menu atas -->
                <?php $this->view('v_menu');?>
            </div>
        </header>

        <?php $this->load->view($content);?>

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; Copyleft 2016 - <?php echo $footer;?>
                    </div>
                    <div class="col-sm-6">
                        <ul class="pull-right">
                            <li>Desain System by 
                                <a href="http://bocahlinux.id" target="_blank"> <b> BocahLinux</b></a>
                            </li>
                            <li>
                                <a id="gototop" class="gototop" href="#">
                                    <i class="icon-chevron-up"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    </body>
</html>