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


        <!-- DataTables CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url() ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                    <div style="padding: 10px ">
                        <p style="color: white; font-size: 12px">
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
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="panel panel-default">
                                <div class="panel-heading">History Penyewaan</div>
                                <div class="panel-body">
                                    <div class="col-lg-6" id="load">
                                        <table class="table-hover table-striped table-bordered" id="tabelPemesanan"  >
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px;">No</th>
                                                    <th>Nama Jasa</th>
                                                    <th>Tanggal Booking</th>
                                                    <th>Tanggal Selesai Booking</th>
                                                    <th>Feedback</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6" id="load">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">FeedBack</div>
                                            <div class="panel-body">
                                                <div id="feedBack" style="display: none">
                                                    <div class="col-lg-12" id="load">
                                                        <div class="form-group">
                                                            <label for="RATING">Rating</label>
                                                            <div id="stars" class="starrr"></div>
                                                            <input type="text" style="display: none"  name="ratingPemesanan" parsley-trigger="change" required placeholder="" class="form-control" id="ratingPemesanan">
                                                            <input type="text"  style="display: none" name="idPemesanan" parsley-trigger="change" required placeholder="" class="form-control" id="idPemesanan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="DESKRIPSI">Deskripsi</label>
                                                            <input type="text" name="deskripsiPemesanan" parsley-trigger="change" required placeholder="Deskripsi" class="form-control" id="deskripsiPemesanan">
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" onclick="simpanFeedBack();">Simpan</button>
                                                            <button class="btn btn-primary" onclick="cancelFeedBack();">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="<?php echo base_url() ?>assetsCustomer/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assetsCustomer/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112788955-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112788955-1');
</script>
    <script>
                                                                $(document)
                                                                        .ajaxStart(function () {
                                                                            $("#loadingModal").modal("show");
                                                                        })
                                                                        .ajaxStop(function () {
                                                                            $("#loadingModal").modal("hide");
                                                                        });



                                                                var __slice = [].slice;

                                                                (function ($, window) {
                                                                    var Starrr;

                                                                    Starrr = (function () {
                                                                        Starrr.prototype.defaults = {
                                                                            rating: void 0,
                                                                            numStars: 5,
                                                                            change: function (e, value) {}
                                                                        };

                                                                        function Starrr($el, options) {
                                                                            var i, _, _ref,
                                                                                    _this = this;

                                                                            this.options = $.extend({}, this.defaults, options);
                                                                            this.$el = $el;
                                                                            _ref = this.defaults;
                                                                            for (i in _ref) {
                                                                                _ = _ref[i];
                                                                                if (this.$el.data(i) != null) {
                                                                                    this.options[i] = this.$el.data(i);
                                                                                }
                                                                            }
                                                                            this.createStars();
                                                                            this.syncRating();
                                                                            this.$el.on('mouseover.starrr', 'span', function (e) {
                                                                                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
                                                                            });
                                                                            this.$el.on('mouseout.starrr', function () {
                                                                                return _this.syncRating();
                                                                            });
                                                                            this.$el.on('click.starrr', 'span', function (e) {
                                                                                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
                                                                            });
                                                                            this.$el.on('starrr:change', this.options.change);
                                                                        }

                                                                        Starrr.prototype.createStars = function () {
                                                                            var _i, _ref, _results;

                                                                            _results = [];
                                                                            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                                                                                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
                                                                            }
                                                                            return _results;
                                                                        };

                                                                        Starrr.prototype.setRating = function (rating) {
                                                                            if (this.options.rating === rating) {
                                                                                rating = void 0;
                                                                            }
                                                                            this.options.rating = rating;
                                                                            this.syncRating();
                                                                            return this.$el.trigger('starrr:change', rating);
                                                                        };

                                                                        Starrr.prototype.syncRating = function (rating) {
                                                                            var i, _i, _j, _ref;

                                                                            rating || (rating = this.options.rating);
                                                                            if (rating) {
                                                                                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                                                                                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                                                                                }
                                                                            }
                                                                            if (rating && rating < 5) {
                                                                                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                                                                                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                                                                                }
                                                                            }
                                                                            if (!rating) {
                                                                                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                                                                            }
                                                                        };

                                                                        return Starrr;

                                                                    })();
                                                                    return $.fn.extend({
                                                                        starrr: function () {
                                                                            var args, option;

                                                                            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                                                                            return this.each(function () {
                                                                                var data;

                                                                                data = $(this).data('star-rating');
                                                                                if (!data) {
                                                                                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                                                                                }
                                                                                if (typeof option === 'string') {
                                                                                    return data[option].apply(data, args);
                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                })(window.jQuery, window);

                                                                $(function () {
                                                                    return $(".starrr").starrr();
                                                                });

                                                                $(document).ready(function () {

                                                                    $('#stars').on('starrr:change', function (e, value) {
                                                                        $('#ratingPemesanan').val(value);
                                                                    });

//            $('#stars-existing').on('starrr:change', function (e, value) {
//                $('#ratingPemesanan').val(value);
//            });
                                                                });









                                                                var tabelPemesanan;
                                                                $(document).ready(function () {
//            simpanDataJasa();
//            $('#NotifSucces').modal('show');
                                                                    getDataPemesanan();

                                                                });

                                                                function getDataPemesanan() {
                                                                    tabelPemesanan = $('#tabelPemesanan').dataTable({
                                                                        "searching": true,
                                                                        "sorting": false,
                                                                        "bLengthChange": true,
                                                                        "scrollX": true,
//                "iDisplayLength": 5,
                                                                        "pagingType": "simple",
//            "paging": true,
//            "responsive" : true,
                                                                        "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
                                                                        "order": [], //Initial no order.
                                                                        // Load data for the table's content from an Ajax source
                                                                        "ajax": {
                                                                            "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/viewDataPemesananByUser",
                                                                            "type": "POST"
                                                                        },
                                                                        //Set column definition initialisation properties.

                                                                    });
                                                                }

                                                                function feedBack(idPemesanan) {
                                                                    $("#feedBack").fadeToggle("slow", "linear");
                                                                    $("#idPemesanan").val(idPemesanan);
                                                                }
                                                                function simpanFeedBack() {
                                                                    var idPemesanan = $("#idPemesanan").val();
                                                                    var ratingPemesanan = $("#ratingPemesanan").val();
                                                                    var deskripsiPemesanan = $("#deskripsiPemesanan").val();


                                                                    var fd = new FormData();
                                                                    fd.append("idPemesanan", idPemesanan);
                                                                    fd.append("ratingPemesanan", ratingPemesanan);
                                                                    fd.append("deskripsiPemesanan", deskripsiPemesanan);

                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "<?php echo base_url(); ?>index.php/KelolaPelanggan/tambahFeedBack",
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
                                                                                    $("#feedBack").fadeToggle("slow", "linear");
                                                                                    tabelPemesanan.api().ajax.reload();
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
                                                                function cancelFeedBack() {
                                                                    $("#feedBack").fadeToggle("slow", "linear");
                                                                    $("#idPemesanan").val();
                                                                }
    </script>

</html>
