<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">PENGADAAN BARANG</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Pengadaan Barang</a>
        </li>
        <li class="active">
            Data Pengadaan
        </li>
    </ol>
</div>
<!--Judul-->
<!--modal-->


<div id="AddDataPengadaan" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Pengadaan</h4>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="pill" href="#selectPropertie">Pilih Propertie</a></li>
                <li><a data-toggle="pill" href="#insertPengadaan">Input Pengadaan</a></li>
            </ul>
            <div class="tab-content">
                <div id="selectPropertie" class="tab-pane fade in active">
                    <h3>Pilih Metode Propertie</h3>
                    <div class="col-lg-12" id="load">
                        <div class="form-group">
                            <select name="metodePropertie" id="metodePropertie" class="form-control" onchange="statusPropertie(this.value)">
                                <option value="selectPropertie" selected="">Pilih Propertie</option>
                                <option value="newPropertie">Insert Propertie Baru</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 selectPropertie" id="load">
                        <div class="form-group">
                            <label for="PROPERTIE">NAMA PROPERTIE</label>
                            <select name="idPropertie" id="idPropertie" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 newPropertie" id="load" style="display: none">
                        <div class="form-group">
                            <label for="NAMA">NAMA</label>
                            <input type="text"   name="namaPropertie" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaPropertie">
                        </div>
                    </div>
                    <div class="col-lg-6 newPropertie" id="load" style="display: none">
                        <div class="form-group">
                            <label for="MITRA">MITRA</label>
                            <select name="idMitra" id="idMitra" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 newPropertie" id="load" style="display: none">
                        <div class="form-group">
                            <label for="STATUS PROPERTIE">STATUS PROPERTIE</label>
                            <select name="statusPropertie" id="statusPropertie" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 newPropertie" id="load" style="display: none">
                        <div class="form-group">
                            <label for="STOCK GUDANG">STOCK GUDANG</label>
                            <input type="number"  name="stockGudang" parsley-trigger="change" required placeholder="STOCK GUDANG" class="form-control" id="stockGudang">
                        </div>
                    </div>
                </div>
                <div id="insertPengadaan" class="tab-pane fade">
                    <h3>Pengadaan</h3>
                    <div class="col-lg-6" id="load">
                        <div class="form-group">
                            <label for="TANGGAL PENGADAAN">TANGGAL PENGADAAN</label>
                            <input type="date"  name="tglPengadaan" parsley-trigger="change" required  class="form-control" id="tglPengadaan">
                        </div>
                    </div>
                    <div class="col-lg-6" id="load">
                        <div class="form-group">
                            <label for="STATUS PENGADAAN">STATUS PENGADAAN</label>
                            <select name="statusPengadaan" id="statusPengadaan" class="form-control">
                                <option value="onprogress" selected="">On Progress</option>
                                <option value="close">Close</option>
                                <option value="cancel">Cancel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6" id="load">
                        <div class="form-group">
                            <label for="JUMLAH PENGADAAN">JUMLAH PENGADAAN</label>
                            <input type="text"  name="jumlahPengadaan" parsley-trigger="change" required placeholder="Jumlah Pengadaan" class="form-control" id="jumlahPengadaan">
                        </div>
                    </div>
                    <div class="col-lg-6" id="load">
                        <div class="form-group">
                            <label for="SATUAN">SATUAN</label>
                            <input type="text"  name="satuan" parsley-trigger="change" required placeholder="Satuan" class="form-control" id="satuan">
                        </div>
                    </div>
                    <div class="col-lg-12 text-right" id="load">
                        <button id="tambah" onclick="simpanDataPengadaan()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                        <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="EditDataPengadaan" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Mitra</h4>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="STATUS PENGADAAN">STATUS PENGADAAN</label>
                    <select name="statusPengadaanEdit" id="statusPengadaanEdit" class="form-control" onchange="feedbackPengadaan(this.value)">
                        <option value="onprogress">On Progress</option>
                        <option value="close">Close</option>
                        <option value="cancel">Cancel</option>
                    </select>
                    <input type="text" style="display: none;" name="idPengadaanEdit" parsley-trigger="change" required placeholder="Deksripsi" class="form-control" id="idPengadaanEdit">
                </div>
            </div>
            <div class="col-lg-12 feedbackPengadaan" id="load" style="display: none">
                <div class="form-group">
                    <label for="RATING PENGADAAN">RATING PENGADAAN</label>
                    <select name="ratingPengadaan" id="ratingPengadaan" class="form-control">
                        <option value="1">Bintang 1</option>
                        <option value="2">Bintang 2</option>
                        <option value="3">Bintang 3</option>
                        <option value="4">Bintang 4</option>
                        <option value="5">Bintang 5</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12 feedbackPengadaan" id="load" style="display: none">
                <div class="form-group">
                    <label for="DERIPSI PENGADAAN">DESKRIPSI PENGADAAN</label>
                    <input type="text"  name="deskripsiPengadaan" parsley-trigger="change" required placeholder="Deksripsi" class="form-control" id="deskripsiPengadaan">
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="rubahData()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>


<div id="NotifSucces" class="modal fade " aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="alert alert-success">
                <strong>Well done!</strong> <div id="succes_message"></div>
            </div>
        </div>
    </div>
</div>
<div id="NotifFailed" class="modal fade " aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div  class="alert alert-danger">
                <strong>Failed</strong> <div id="failed_message"></div>
            </div>
        </div>
    </div>
</div>
<!--/modal--> 

<div class="col-lg-12">
    <div class="panel panel-color panel-custom">
        <div class="panel-heading">
            <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaru()">Tambah Data Pengadaan</button>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Nama Propertie</th>
                        <th>Nama Mitra</th>
                        <th>Tanggal Pengadaan</th>
                        <th>Status Pengadaan</th>
                        <th>Jumlah pengadaan</th>
                        <th>Satuan</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>  

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    function statusPropertie(status) {
//        alert(status);
        if (status == "selectPropertie") {
            $(".selectPropertie").css("display", "");
            $(".newPropertie").css("display", "none");
        } else {
            $(".selectPropertie").css("display", "none");
            $(".newPropertie").css("display", "");
        }
    }
    function feedbackPengadaan(status) {
//        alert(status);
        if (status == "close") {
            $(".feedbackPengadaan").css("display", "");
        } else {
            $(".feedbackPengadaan").css("display", "none");
        }
    }


    var table;

    function loadDataTablePengadaan() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/PengadaanBarang/viewDataPengadaan",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [7], //last column
                    "orderable": false, //set not orderable
                },
            ],
        });
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#img").html("<img src=" + e.target.result + " alt='your image' style='width:100px;height:100px'/>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageEdit").change(function () {
        readURL(this);
    });

    $(document).ready(function () {
        getDataMitra();
        getDataPropertie();
        loadDataTablePengadaan();
    });
    function tambahDataBaru() {
        $("#AddDataPengadaan").modal("show");
    }

    function simpanDataPengadaan() {
        $("#AddDataPengadaan").modal("hide");
        var metodePropertie = $("#metodePropertie").val();
        var idPropertie = $("#idPropertie").val();
        var namaPropertie = $("#namaPropertie").val();
        var idMitra = $("#idMitra option:selected").val();
        var statusPropertie = $("#statusPropertie option:selected").val();
        var statusPengadaan = $("#statusPengadaan option:selected").val();
        var stockGudang = $("#stockGudang").val();
        var tglPengadaan = $("#tglPengadaan").val();
        var jumlahPengadaan = $("#jumlahPengadaan").val();
        var satuan = $("#satuan").val();


        var fd = new FormData();
        fd.append("metodePropertie", metodePropertie);
        fd.append("idPropertie", idPropertie);
        fd.append("namaPropertie", namaPropertie);
        fd.append("idMitra", idMitra);
        fd.append("statusPropertie", statusPropertie);
        fd.append("statusPengadaan", statusPengadaan);
        fd.append("stockGudang", stockGudang);
        fd.append("tglPengadaan", tglPengadaan);
        fd.append("jumlahPengadaan", jumlahPengadaan);
        fd.append("satuan", satuan);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/PengadaanBarang/tambahPengadaan",
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
                    table.api().ajax.reload();
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

    function bukaModulRubahData(idPengadaan) {
//    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/PengadaanBarang/getPengadaanById",
            data: {idPengadaan: idPengadaan},
            success: function (data) {
                var detail = jQuery.parseJSON(data);

                $("#statusPengadaanEdit").val(detail['statusPengadaan']);
                $("#idPengadaanEdit").val(detail['idPengadaanPropertie']);
            }
        });
        $("#EditDataPengadaan").modal("show");
    }
    function rubahData() {
        $("#EditDataPengadaan").modal("hide");

        var idPengadaan = $("#idPengadaanEdit").val();
        var ratingPengadaan = $("#ratingPengadaan option:selected").val();
        var deskripsiPengadaan = $("#deskripsiPengadaan").val();
        var statusPengadaan = $("#statusPengadaanEdit option:selected").val();

        var fd = new FormData();
        fd.append("idPengadaan", idPengadaan);
        fd.append("statusPengadaan", statusPengadaan);
        fd.append("ratingPengadaan", ratingPengadaan);
        fd.append("deskripsiPengadaan", deskripsiPengadaan);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/PengadaanBarang/editPengadaan",
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
//                document.write(data);
                var status = jQuery.parseJSON(data);
                if (status["status"] == "1") {
                    $('#succes_message').html(status["message"]);
                    $('#NotifSucces').modal('show');
                    setTimeout(function () {
                        $('#NotifSucces').modal('hide');
                    }, 2000);
                    table.api().ajax.reload();
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

//    function hapusData(idMitra) {
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>index.php/KelolaMitra/deleteMitra",
//            data: {idMitra: idMitra},
//            success: function (data) {
//                var status = jQuery.parseJSON(data);
//                if (status["status"] == "1") {
//                    $('#succes_message').html(status["message"]);
//                    $('#NotifSucces').modal('show');
//                    setTimeout(function () {
//                        $('#NotifSucces').modal('hide');
//                    }, 2000);
//                    table.api().ajax.reload();
//                } else {
//                    $('#failed_message').html(status["message"]);
//                    $('#NotifFailed').modal('show');
//                    setTimeout(function () {
//                        $('#NotifFailed').modal('hide');
//                    }, 2000);
//                }
//            }
//        });
//    }

    function getDataMitra() {
        //    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/PengadaanBarang/getDataMitra",
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                //                document.write(detail);
                if (detail["data"] != null && detail["data"] != "") {
                    var option = "";
                    for (var x = 0; x < detail["data"].length; x++) {
                        option += "<option value='" + detail["data"][x]["idMitra"] + "'>" + detail["data"][x]["namaMitra"] + "</option>";
                    }
                    $("#idMitra").html(option);
                }
            }
        });
        //        $("#EditDataPropertie").modal("show");
    }
    function getDataPropertie() {
        //    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/PengadaanBarang/getDataPropertie",
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                //                document.write(detail);
                if (detail["data"] != null && detail["data"] != "") {
                    var option = "";
                    for (var x = 0; x < detail["data"].length; x++) {
                        option += "<option value='" + detail["data"][x]["idPropertie"] + "'>" + detail["data"][x]["namaPropertie"] + "</option>";
                    }
                    $("#idPropertie").html(option);
                }
            }
        });
        //        $("#EditDataPropertie").modal("show");
    }
</script>

