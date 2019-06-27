<!DOCTYPE html>
 <?php if ($this->session->userdata("role") && $this->session->userdata("role")!="member") { 
	redirect("Dashboard/home");
 }?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Coworking Space</title>
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>assetsCustomer/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assetsCustomer/css/shop-homepage.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="font-size: 12px; font-weight: bold">
            <div class="container">
                <div class="topbar-left">
                    <div class="text-center">
                        <img width="100"class="logo img-circle"src="<?php echo base_url() ?>assets/images/final.png"/>

                    </div>
                </div>  
                <?php if ($this->session->userdata('role') == 'member') { ?>
                    <div>
                        <p style="color: white; size: auto">
                            Hai.. <?php echo $this->session->userdata('username') ?>
                        </p>
                    </div>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php
                        if ($this->session->userdata("role") == 'member') {
                            ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/User/logout">Logout  <span class="sr-only">(current)</span></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/Dashboard/loginPelanggan">Login  <span class="sr-only">(current)</span></a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ?>index.php/Dashboard">Home
                                <!--<span class="sr-only">(current)</span>-->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
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
            <div class="row">


                <div class="col-lg-2">

                    <h1 class="my-4">Coworking Space</h1>
                    <?php if (!$this->session->userdata("role")) { ?>
                        <div class="list-group">
                            <a href="<?php echo base_url() ?>index.php/Dashboard/loginAdmin" class="list-group-item">Login Admin</a>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata("role")) { ?>
                        <div class="list-group">
                            <a href="<?php echo base_url() ?>index.php/Dashboard/historyPenyewaan" class="list-group-item">History Penyewaan</a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-lg-10">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
                        <li><a data-toggle="tab" href="#menu1">Signup</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="panel panel-default">
                                <div class="panel-heading">Login</div>
                                <div class="panel-body">
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Username</label>
                                            <input type="text"   name="username" parsley-trigger="change" required placeholder="Username" class="form-control" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="NAMA">Password</label>
                                            <input type="password"   name="password" parsley-trigger="change" required placeholder="Username" class="form-control" id="password">
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary" onclick="login()">Sign</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <h3>Dengan Menjadi Member</h3>
                                        <p>Anda akan mendapatkan berbagai promo yang kami sediakan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="panel panel-default">
                                <div class="panel-heading">Daftar</div>
                                <div class="panel-body">
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Username</label>
                                            <input type="text"   name="usernameDaftar" parsley-trigger="change" required placeholder="Username" class="form-control" id="usernameDaftar">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Password</label>
                                            <input type="text"   name="passwordDaftar" parsley-trigger="change" required placeholder="Password" class="form-control" id="passwordDaftar">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Nama</label>
                                            <input type="text"   name="nama" parsley-trigger="change" required placeholder="Nama" class="form-control" id="nama">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Email</label>
                                            <input type="email"   name="email" parsley-trigger="change" required placeholder="Email" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NO HP">No HP</label>
                                            <input type="text"   name="nohp" parsley-trigger="change" required placeholder="No Hp" class="form-control" id="nohp">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="Alamat">Alamat</label>
                                            <input type="text"   name="alamat" parsley-trigger="change" required placeholder="Alamat" class="form-control" id="alamat">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="JENIS KELAMIN">Jenis Kelamin</label>
                                            <select id="jk" name="jk" class="form-control">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="form-group">
                                            <label for="NAMA">Organisasi</label>
                                            <input type="text"   name="organisasi" parsley-trigger="change" required placeholder="Organisasi" class="form-control" id="organisasi">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="load">
                                        <h4>Pernyataan</h4>
                                        <p>Semua data diatas diisi dengan sebenar-benarnya</p>
                                    </div>
                                    <div class="col-lg-12" id="load">
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary" onclick="signUp()">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-9 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark" style="border-top: 1px solid rgba(0, 0, 0, 0.1);
                bottom: 0px;
                color: #58666e;
                text-align: left !important;
                padding: 20px 30px;
                position: absolute;
                right: 0px;
                left: 0px;" >
            <div class="container">
                <p class="m-0 text-center text-white">Coworking Space</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <div id="NotifSucces" class="modal fade " aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert alert-success">
                            <strong>Well done!</strong> <div id="succes_message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="NotifFailed" class="modal fade " aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div  class="alert alert-danger">
                            <strong>Failed</strong> <div id="failed_message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112788955-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112788955-1');
</script>
    <script src="<?php echo base_url() ?>assetsCustomer/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assetsCustomer/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <script>

                                                $(document)
                                                        .ajaxStart(function () {
                                                            $("#loadingModal").modal("show");
                                                        })
                                                        .ajaxStop(function () {
                                                            $("#loadingModal").modal("hide");
                                                        });
                                                $(document).ready(function () {
//            simpanDataJasa();
//            $('#NotifSucces').modal('show');
                                                });

                                                function login() {
                                                    var username = $("#username").val();
                                                    var password = $("#password").val();

                                                    var fd = new FormData();
                                                    fd.append("username", username);
                                                    fd.append("password", password);

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo base_url(); ?>index.php/User/loginMember",
                                                        data: fd,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function (data) {
                                                            var status = jQuery.parseJSON(data);
                                                            if (status["status"] == "1") {
                                                                $('#succes_message').html(status["message"]);
                                                                $('#NotifSucces').modal('show');
                                                                setTimeout(function () {
                                                                    $('#NotifSucces').modal('hide');
                                                                    window.location.replace("<?php echo base_url(); ?>Dashboard/");
                                                                }, 2000);
                                                            } else {
                                                                $('#failed_message').html(status["message"]);
                                                                $('#NotifFailed').modal('show');
                                                                setTimeout(function () {
                                                                    $('#NotifFailed').modal('hide');
                                                                }, 2000);
                                                            }
                                                        }
                                                    });
                                                }

                                                function signUp() {
                                                    var username = $("#usernameDaftar").val();
                                                    var password = $("#passwordDaftar").val();
                                                    var nama = $("#nama").val();
                                                    var email = $("#email").val();
                                                    var nohp = $("#nohp").val();
                                                    var alamat = $("#alamat").val();
                                                    var jk = $("#jk option:selected").val();
                                                    var organisasi = $("#organisasi").val();

                                                    var fd = new FormData();
                                                    fd.append("username", username);
                                                    fd.append("password", password);
                                                    fd.append("nama", nama);
                                                    fd.append("email", email);
                                                    fd.append("nohp", nohp);
                                                    fd.append("alamat", alamat);
                                                    fd.append("jk", jk);
                                                    fd.append("organisasi", organisasi);

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo base_url(); ?>index.php/KelolaPelanggan/tambahMember",
                                                        data: fd,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function (data) {
                                                            var status = jQuery.parseJSON(data);
                                                            if (status["status"] == "1") {
                                                                $('#succes_message').html(status["message"]);
                                                                $('#NotifSucces').modal('show');
                                                                setTimeout(function () {
                                                                    $('#NotifSucces').modal('hide');
                                                                }, 2000);
                                                            } else {
                                                                $('#failed_message').html(status["message"]);
                                                                $('#NotifFailed').modal('show');
                                                                setTimeout(function () {
                                                                    $('#NotifFailed').modal('hide');
                                                                }, 2000);
                                                            }
                                                        }
                                                    });
                                                }
    </script>

</html>
