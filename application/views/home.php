<!DOCTYPE html>
<?php
if (!$this->session->userdata("username")) {
    redirect("/Dashboard/loginAdmin");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/final.png">

        <title>Coworking Space</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">

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
        <!-- DataTables CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
        <style>
            #logoEkskul:hover{
                cursor: pointer;
            }
            #boxx:hover{
                background-color: #DDCEFF;
            }
        </style>

        <link href="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />

        <script src="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url() ?>index.php/Dashboard/home" class="logo">Coworking Space</a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <!-- ganti warna header -->
                <div class="navbar navbar-default"  style="background-color: #343a40;"role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <!--                                <button class="button-menu-mobile open-left">
                                                                    <i class="ion-navicon"></i>
                                                                </button>-->
                                <span class="clearfix"></span>
                            </div>
                            <!--
                                                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                                                         <input type="text" placeholder="Search..." class="form-control">
                                                                         <a href=""><i class="fa fa-search"></i></a>
                                                                    </form>
                            -->

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle " data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger"><div id="notifCount1">0</div></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right"><div id="notifCount2">0</div></span>Notification</li>
                                        <li class="list-group nicescroll notification-list" id="listNotif">
                                        <li>
                                            <a href="javascript:void(0);" class="list-group-item text-right">
                                                <small class="font-600">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--                                <li class="hidden-xs">
                                                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                                                </li>
                                                                <li class="hidden-xs">
                                                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                                                                </li>-->
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>assets/images/envato.jpg"alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="https://analytics.google.com/analytics/web/?authuser=0#realtime/rt-overview/a112788955w168036822p168202209/" target='_blank'><i class="ti-search m-r-5"></i> Google Analityc</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                        <li><a href="<?php echo base_url(); ?>index.php/User/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul class="nav" id="side-menu">
                            <div id="slide" class="profile center" align="center">
                                <div class="profile_pic"> 
                                    <img alt="user-img" style="height:100px;width:100px;"class="img-circle" src="<?php echo base_url(); ?>assets/images/envato.jpg"/>
                                </div>
                            </div>
                            <div class="profile_info">
                                <br>
                                <span>
                                    <p align="center">
                                        <?php
                                        echo $this->session->userdata('username');
                                        ?>
                                    </p>
                                </span>
                            </div>
                            <hr>
                        </ul>
                        <ul class="navbar-nav">
                            <li>
                                <a href="<?php echo base_url() ?>index.php/Dashboard/home"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                            </li>
                            <!--                            <li class="has_sub">
                                                            <a href="javascript:;" data-toggle="collapse" data-target="#menu1"><i class="fa fa-dribbble"></i> CRM <i class="fa fa-fw fa-caret-down"></i></a>
                                                            <ul class="list-unstyled">-->
                            <?php if ($this->session->userdata("role") == "customer" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/kelolaDataPelanggan"> Kelola Data Pelanggan</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "customer" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/laporanPemesanan"> Laporan Pemesanan</a></li><?php } ?>
                            <!--                                </ul>
                                                        </li>-->
                            <!--                            <li class="has_sub">
                                                            <a href="javascript:;" data-toggle="collapse" data-target="#menu2"><i class="fa fa-fw fa-edit"></i> ERP <i class="fa fa-fw fa-caret-down"></i></a>
                                                            <ul class="list-unstyled">-->
                            <?php if ($this->session->userdata("role") == "produser" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/kelolaPegawai"> Kelola Pegawai</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "produser" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/kelolaPembuatanJasa"> Kelola Pembuatan Jasa</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "produser" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/kelolaJasa"> Kelola Jasa</a></li><?php } ?>
                            <!--                                </ul>
                                                        </li>-->
                            <!--                            <li class="has_sub">
                                                            <a href="javascript:;" data-toggle="collapse" data-target="#menu3"><i class="glyphicon glyphicon-list-alt"></i> SCM<i class="fa fa-fw fa-caret-down"></i></a>
                                                            <ul class="list-unstyled">-->
                            <?php if ($this->session->userdata("role") == "supplier" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/monitoringDataPropertie"> Monitoring Data Propertie</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "supplier" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/kelolaMitra"> Kelola Mitra</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "supplier" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/pengadaanBarang"> Pengadaan Barang</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "supplier" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/laporanPropertie"> Laporan Propertie</a></li><?php } ?>
                            <?php if ($this->session->userdata("role") == "produser" || $this->session->userdata("role") == "admin") { ?><li><a href="<?php echo base_url() ?>index.php/Dashboard/laporanPembuatanJasa"> Laporan Pembuatan Jasa</a></li><?php } ?>
                        </ul>
                        <!--</li>-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container"  >
                        <!--                        <div class="modal hide" id="loadingModal" data-backdrop="static" data-keyboard="false">
                                                    <div class="modal-header">
                                                        <h1>Processing...</h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="progress progress-striped active">
                                                            <div class="bar" style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div id="loadingModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">

                                <!-- Modal content-->
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div class="progress progress-lg">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                Loading..
                                            </div>
                                        </div> 
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!--                         Page-Title 
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h4 class="page-title">Dashboard</h4>
                                                        <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <div class="card-box" style="background: #FFFFFF;">
                                    <div class="row">
                                        <?php echo $this->load->view($content); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    Coworking Space
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <!--            <div class="side-bar right-bar nicescroll">
                            <h4 class="text-center">Chat</h4>
                            <div class="contact-list nicescroll">
                                <ul class="list-group contacts-list">
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-1.jpg" alt="">
                                            </div>
                                            <span class="name">Chadengle</span>
                                            <i class="fa fa-circle online"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-2.jpg" alt="">
                                            </div>
                                            <span class="name">Tomaslau</span>
                                            <i class="fa fa-circle online"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-3.jpg" alt="">
                                            </div>
                                            <span class="name">Stillnotdavid</span>
                                            <i class="fa fa-circle online"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-4.jpg" alt="">
                                            </div>
                                            <span class="name">Kurafire</span>
                                            <i class="fa fa-circle online"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-5.jpg" alt="">
                                            </div>
                                            <span class="name">Shahedk</span>
                                            <i class="fa fa-circle away"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-6.jpg" alt="">
                                            </div>
                                            <span class="name">Adhamdannaway</span>
                                            <i class="fa fa-circle away"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-7.jpg" alt="">
                                            </div>
                                            <span class="name">Ok</span>
                                            <i class="fa fa-circle away"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-8.jpg" alt="">
                                            </div>
                                            <span class="name">Arashasghari</span>
                                            <i class="fa fa-circle offline"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-9.jpg" alt="">
                                            </div>
                                            <span class="name">Joshaustin</span>
                                            <i class="fa fa-circle offline"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-10.jpg" alt="">
                                            </div>
                                            <span class="name">Sortino</span>
                                            <i class="fa fa-circle offline"></i>
                                        </a>
                                        <span class="clearfix"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->




    </body>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112788955-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112788955-1');
</script>

    <script>
	

        var resizefunc = [];
    </script>

    <!-- jQuery  -->

    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/peity/jquery.peity.min.js"></script>

    <!-- jQuery  -->
    <script src="<?php echo base_url() ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


            <!--<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>-->
    <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

    <script src="<?php echo base_url() ?>assets/pages/jquery.dashboard.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

    <script type="text/javascript">

        $(document)
                .ajaxStart(function () {
                    $("#loadingModal").modal("show");
                })
                .ajaxStop(function () {
                   $("#loadingModal").modal("hide");
                });
				
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();

        });

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
            });
//            $("select").select2();

        });
    </script>
    <script>
        $(document).ready(function () {

//            getNotifikasi();

        });

        function getNotifikasi() {
            setTimeout(function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/notifikasi/viewNotifikasi",
                    success: function (data) {
//                    document.write(data);
                        var detail = jQuery.parseJSON(data);
//                        document.write(detail.length);
                        $("#notifCount1").html(detail.length);
                        $("#notifCount2").html(detail.length);
                        var listNotif = "";
                        for (var x = 0; x < detail.length; x++) {
                            listNotif += "<a href='javascript:void(0); ' class='list - group - item'>";
                            listNotif += "<div class=media'>";
                            listNotif += "<div class='pull - left p - r - 10'>";
                            listNotif += "<em class='fa fa - bell - o fa - 2x text - danger'></em>";
                            listNotif += "</div>";
                            listNotif += "<div class='media - body'>";
                            listNotif += "<h5 class='media - heading'>Pemberitahuan</h5>";
                            listNotif += "<p class='m - 0'>";
                            listNotif += "<small><span class='text - primary font - 600'></span> " + detail[x]["message"] + "</small>";
                            listNotif += "</p>"
                            listNotif += "</div>";
                            listNotif += "</div>";
                            listNotif += "</a>";
                        }
                        $("#listNotif").html(listNotif);
                        getNotifikasi();

                    }
                });
            }, 2000);
        }
    </script>

</html>