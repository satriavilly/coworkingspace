<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- <link rel="shortcut icon" href="assets/images/favicon_1.ico"> -->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/final.png">

        <title>Coworking Space</title>

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
        <style type="text/css">
            .logo{
                height:100px;
                /*width:100px;*/    
            }

            body, html {
                height: 100%;

            }
        </style>
    </head>
    <body style=" height: 100%; background-image:  url('<?php echo base_url() ?>assets/images/coworkingspace.jpg');background-repeat:no-repeat;
          background-size:100% ; background-position: center;">
        <div class="content" >
            <div class="clearfix"></div>
            <!--<div class="account-pages"></div>-->

            <div class="wrapper-page"  >
                <div class="card-box" style="background-color: #ffffff; opacity: 0.9;">
                    <div class="panel-heading text-center">
                        <img class="logo "src="<?php echo base_url() ?>assets/images/final.png"/>
                    </div>

                    <div class="panel-body " >
                        <center><p class="login-box-msg">Sign in to start your session</p></center>
                        <center><p class="login-box-msg"><?php echo $this->session->flashdata('gagal'); ?></p></center>
                                <!--<form class="form-horizontal m-t-20" action="<?php echo base_url(); ?>index.php/dashboard/home">-->
                        <?php
                        echo form_open('User/login');
                        ?>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="username" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn  btn-block " style="color:#F7F8D6;background:#06799F;"type="submit">
                                    <b>  Login</b>
                                </button>
                            </div>
                        </div>
                        </form>                                           
                        <!--<button class="btn  btn-block " style="color:#F7F8D6;background:#A77A39;" data-toggle="modal" data-target="#fullCalModal">Daftar Ekstrakulikuler</button>-->
                    </div>
                </div>
            </div>

        </div>     

    </body>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>


    <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>
</html>