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

        <title>Coworking space</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>assetsCustomer/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assetsCustomer/css/shop-homepage.css" rel="stylesheet">


        <!-- DataTables CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <div class="topbar-left">
                    <div class="text-center">
                        <img width="100"class="logo img-circle"src="<?php echo base_url() ?>assets/images/final.png"/>

                    </div>
                </div>  
                <!--<a class="navbar-brand" href="#">Coworking Space</a>-->
                <?php if ($this->session->userdata('role') == 'member') { ?>
                    <div style="padding: 10px   ">
                        <br/>
                        <p style="color: white;font-size: 12px">
                            Hai.. <?php echo $this->session->userdata('username') ?>
                        </p>
                    </div>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" style="font-size: 12px; font-weight: bold">
                    <ul class="navbar-nav ml-auto">
                        <?php
                        if ($this->session->userdata("role") == 'member') {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/User/logout">Logout  <span class="sr-only">(current)</span></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/Dashboard/loginPelanggan">Login  <span class="sr-only">(current)</span></a>
                            </li>
                        <?php } ?>
                        <li class="nav-item active">
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
                <!-- /.col-lg-3 -->

                <div class="col-lg-10">

                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?php echo base_url(); ?>indeximg/1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url(); ?>indeximg/2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo base_url(); ?>indeximg/3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <h2>Daftar Jasa Ruangan</h2>
                    <hr>
                    <div class="row" id="ListDataJasa">

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
            <div id="bookingModal" class="modal fade" role="dialog" >
                <div class="modal-dialog modal-lg" style=" width: 90%;
                     height: 90%;
                     overflow: scroll;">

                    <!-- Modal content-->
                    <div class="modal-content" >
                        <div class="modal-body">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button> <br/><br/>
                            </div>
                            <div class="col-lg-6" id="load">
                                <div class="form-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">List Pembokingan</div>
                                        <div class="panel-body">
                                            <p style="color: red;">Harap untuk melihat pembookingan terlebih dahulu</p>
                                            <table class="table-hover table-striped table-bordered" id="tabelPemesanan"  >
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px;">No</th>
                                                        <th>Nama Jasa</th>
                                                        <th>Tanggal Booking</th>
                                                        <th>Tanggal Selesai Booking</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" id="load">
                                <div class="form-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detail Jasa</div>
                                        <div class="panel-body">
                                            <div id="detailJasa">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->session->userdata("role") == "member") { ?>
                                <div class="col-lg-12" id="load">
                                    <div class="form-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Pemesanan Tempat</div>
                                            <div class="panel-body">
                                                <div class="col-lg-6" id="load">
                                                    <div class="form-group">
                                                        <label for="DATE">TANGGAL MULAI</label>
                                                        <input type="date"  name="tglBooking" parsley-trigger="change" required placeholder="Email" class="form-control" id="tglBooking">
                                                        <input type="text" style="display: none;"  name="idJasaRuangan" parsley-trigger="change" required placeholder="Email" class="form-control" id="idJasaRuangan">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" id="load">
                                                    <div class="form-group">
                                                        <label for="DATE">TANGGAL SELESAI</label>
                                                        <input type="date"  name="tglSelesaiBooking" parsley-trigger="change" required placeholder="Email" class="form-control" id="tglSelesaiBooking">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="load">
                                                    <div class="form-group">
                                                        <a href="javascript:;" class="btn btn-block btn-lg btn-success" onclick="simpanPemesanan()"><span class="glyphicon glyphicon-shopping-cart"></span> PESAN</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-12" id="load">
                                    <div class="form-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Pemesanan Tempat</div>
                                            <div class="panel-body">
                                                <center>Lakukan login terlebih dahulu untuk melakukan pemesanan</center>
                                                <div class="col-lg-12" id="load">
                                                    <div class="form-group">
                                                        <a href="<?php echo base_url() ?>index.php/Dashboard/loginPelanggan" class="btn btn-block btn-lg btn-success"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->


        <!-- Modal -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Coworking Space</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bookingModal">Open Modal</button>-->
    </body>

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

<!--    <script src="<?php echo base_url() ?>assetsCustomer/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assetsCustomer/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112788955-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112788955-1');
</script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



    <script>

                                                        $(document)
                                                                .ajaxStart(function () {
                                                                    $("#loadingModal").modal("show");
                                                                })
                                                                .ajaxStop(function () {
                                                                    $("#loadingModal").modal("hide");
                                                                });
                                                        var tabelPemesanan;
                                                        $(document).ready(function () {
                                                            getDataJasaRuangan();

                                                            tabelPemesanan = $('#tabelPemesanan').dataTable({
                                                                "searching": false,
                                                                "sorting": false,
                                                                "bLengthChange": false,
                                                                "scrollX": true,
                                                                "iDisplayLength": 5,
                                                                "pagingType": "simple",
//            "paging": true,
//            "responsive" : true,
                                                                "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
                                                                "order": [], //Initial no order.
                                                                // Load data for the table's content from an Ajax source
                                                                "ajax": {
                                                                    "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/viewDataPemesanan",
                                                                    "type": "POST"
                                                                },
                                                                //Set column definition initialisation properties.

                                                            });
                                                        });
                                                        function simpanPemesanan() {
                                                            var idJasaRuangan = $("#idJasaRuangan").val();
                                                            var tglBooking = $("#tglBooking").val();
                                                            var tglSelesaiBooking = $("#tglSelesaiBooking").val();

                                                            var fd = new FormData();
                                                            fd.append("idJasaRuangan", idJasaRuangan);
                                                            fd.append("tglBooking", tglBooking);
                                                            fd.append("tglSelesaiBooking", tglSelesaiBooking);

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "<?php echo base_url(); ?>index.php/KelolaPelanggan/tambahPemesanan",
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
                                                                        tabelPemesanan.api().ajax.reload();
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


                                                        function getDataJasaRuangan() {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "<?php echo base_url(); ?>index.php/KelolaJasa/getDataJasaJoinJenisJasa",
                                                                success: function (data) {
                                                                    var data = jQuery.parseJSON(data);


                                                                    if (data['idJasaRuangan'] != null) {
                                                                        var listJasa = "";
                                                                        for (var x = 0; x < data['idJasaRuangan'].length; x++) {
                                                                            listJasa += "<div class='col-lg-4 col-md-6 mb-4'>"
                                                                                    + "<div class='card h-100'>"
                                                                                    + "<a href='javascript:;' onclick='booking(" + data['idJasaRuangan'][x] + ")'><img class='card-img-top' src='data:" + data['fileTypeJasa1'][x] + ";base64," + data['gambarJasa1'][x] + "' width='700' height='300'  alt=''></a>"
                                                                                    + "<div class='card-body'>"
                                                                                    + "<h4 class='card-title'>"
                                                                                    + "<a href='javascript:;' onclick='booking(" + data['idJasaRuangan'][x] + ")'>" + data['namaJasaRuangan'][x] + "</a>"
                                                                                    + " </h4>"
                                                                                    + "<h5>Rp." + data['hargaJasaRuangan'][x] + "</h5>"
                                                                                    + "<p class='card-text'>Untuk info lebih lanjut klik link diatas</p>"
                                                                                    + "</div>"
                                                                                    + "<div class='card-footer'>"
                                                                                    + " <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>"
                                                                                    + " </div>"
                                                                                    + "</div>"
                                                                                    + "</div>";

                                                                        }

                                                                        $("#ListDataJasa").html(listJasa);
                                                                    }

                                                                }
                                                            });
                                                        }

                                                        function booking(idJasa) {
                                                            $("#bookingModal").modal({backdrop: 'static',
                                                                keyboard: false});
                                                            $("#bookingModal").modal("show");
                                                            var windowHeight = $(window).height();
                                                            var windowWidth = $(window).width();
                                                            var boxHeight = $('.modal-dialog').height();
                                                            var boxWidth = $('.modal-dialog').width();
                                                            $('.modal-dialog').css({'top': ((windowHeight - boxHeight) / 4)}
                                                            );

                                                            $("#idJasaRuangan").val(idJasa);

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "<?php echo base_url(); ?>index.php/KelolaJasa/getDataJasaJoinJenisJasaById",
                                                                data: {idJasa: idJasa},
                                                                success: function (data) {
                                                                    var data = jQuery.parseJSON(data);

                                                                    var propertie = "";
                                                                    if (data["dataPropertie"] != null) {
                                                                        propertie += "<ul>";
                                                                        for (var x = 0; x < data["dataPropertie"].length; x++) {
                                                                            propertie += "<li>" + data["dataPropertie"][x]["namaPropertie"] + "(" + data["dataPropertie"][x]["jumlahPropertieJasa"] + ")</li>"
                                                                        }
                                                                        propertie += "</ul>";
                                                                    }
                                                                    var detailJasa = "<table class='table table-hover table-striped'>"
                                                                            + "<tbody>"
                                                                            + "<tr>"
                                                                            + "  <td>Nama Jasa</td><td>:</td>"
                                                                            + "  <td>" + data["namaJasaRuangan"] + "</td>"
                                                                            + "</tr>"
                                                                            + "<tr>"
                                                                            + "  <td>Jenis Jasa</td><td>:</td>"
                                                                            + "  <td>" + data["namaJenisJasa"] + "</td>"
                                                                            + "</tr>"
                                                                            + "<tr>"
                                                                            + "  <td>Deskripsi</td><td>:</td>"
                                                                            + "  <td>" + data["deskripsiJasa"] + "</td>"
                                                                            + "</tr>"
                                                                            + "<tr>"
                                                                            + "  <td>Harga</td><td>:</td>"
                                                                            + "  <td>Rp" + data["hargaJasaRuangan"] + " /day</td>"
                                                                            + "</tr>"
                                                                            + "<tr>"
                                                                            + " <td>Propertie</td><td>:</td>"
                                                                            + "<td>" + propertie + "</td>"
                                                                            + "</tr>"
                                                                            + "</tbody>"
                                                                            + "Gambar 1 <img class='card-img-top' src='data:" + data['fileTypeJasa1'] + ";base64," + data['gambarJasa1'] + "' width='50' height='100'  alt=''><br/><br/><br/>"
                                                                            + "gambar 2 <img class='card-img-top' src='data:" + data['fileTypeJasa2'] + ";base64," + data['gambarJasa2'] + "' width='50' height='100'  alt=''>"
                                                                            + "</table>";

                                                                    $("#detailJasa").html(detailJasa);

                                                                }
                                                            });

                                                        }
    </script>

</html>
