<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">KELOLA DATA JASA</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Input Data Jasa</a>
        </li>
        <li class="active">
            Data Jasa
        </li>
    </ol>
</div>
<!--Judul-->
<div id="AddDataJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Jasa</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS JASA RUANGAN">JENIS JASA RUANGAN</label>
                    <select name="idJenisJasaRuangan" id="idJenisJasaRuangan" class="form-control">

                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaJasa" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaJasa">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="HARGA JASA">HARGA JASA</label>
                    <input type="text"   name="hargaJasa" parsley-trigger="change" required placeholder="Harga" class="form-control" id="hargaJasa">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS JASA">STATUS JASA</label>
                    <select name="statusJasa" id="statusJasa" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                        <option value="develop">Develop</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="DESKRIPSI JASA">DESKRIPSI JASA</label>
                    <input type="text"   name="deskripsiJasa" parsley-trigger="change" required placeholder="Deskripsi" class="form-control" id="deskripsiJasa">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="GAMBAR">GAMBAR 1</label>
                    <input type="file" id="image1" name="image1" parsley-trigger="change" class="form-control" id="image">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="GAMBAR">GAMBAR 2</label>
                    <input type="file" id="image2" name="image2" parsley-trigger="change" class="form-control" id="image">
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataJasa()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div id="EditDataJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Jasa</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS JASA RUANGAN">JENIS JASA RUANGAN</label>
                    <select name="idJenisJasaRuanganEdit" id="idJenisJasaRuanganEdit" class="form-control">

                    </select>
                    <input type="text"  style="display: none;"  name="idJasaRuangan" parsley-trigger="change" required placeholder="Nama" class="form-control" id="idJasaRuangan">

                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaJasaEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaJasaEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="HARGA JASA">HARGA JASA</label>
                    <input type="text"   name="hargaJasaEdit" parsley-trigger="change" required placeholder="Harga" class="form-control" id="hargaJasaEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS JASA">STATUS JASA</label>
                    <select name="statusJasaEdit" id="statusJasaEdit" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                        <option value="develop">Develop</option>
                        <option value="onprogres">onprogres</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="DESKRIPSI JASA">DESKRIPSI JASA</label>
                    <input type="text"   name="deskripsiJasaEdit" parsley-trigger="change" required placeholder="Deskripsi" class="form-control" id="deskripsiJasaEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="GAMBAR">GAMBAR 1</label>
                    <div class="form-group text-center" id="img1">

                    </div>
                    <input type="file" id="image1Edit" name="image1Edit" parsley-trigger="change" class="form-control" id="image">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="GAMBAR">GAMBAR 2</label>
                    <div class="form-group text-center" id="img2">

                    </div>
                    <input type="file" id="image2Edit" name="image2Edit" parsley-trigger="change" class="form-control" id="image">
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="rubahDataJasa()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div id="EditPropertie" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Data Propertie Jasa</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS JASA">PROPERTIE</label>
                    <select name="idPropertie" id="idPropertie" class="form-control">

                    </select>
                    <input type="text" style="display: none"  name="idJasaRuanganForPropertie" parsley-trigger="change" required placeholder="Jumlah" class="form-control" id="idJasaRuanganForPropertie">

                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JUMLAH PROPERTIE">JUMLAH PROPERTIE</label>
                    <input type="number"   name="jumlahPropertie" parsley-trigger="change" required placeholder="Jumlah" class="form-control" id="jumlahPropertie">
                </div>
            </div>

            <div class="modal-footer">
                <button id="tambah" onclick="rubahDataPropertieJasa()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
                <br/>
                <br/>
                <br/>
                <div class="col-lg-12" id="load" style="text-align: left">
                    <h3>List properti Jasa</h3>
                    <table id="tabelPropertieJasa"class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nama Propertie</th>
                                <th>Jumlah Propertie</th>
                            </tr>
                        </thead>
                        <tbody>  

                        </tbody>
                    </table>
                </div> 
            </div>

        </div>
    </div>
</div>

<div id="AddDataJenisJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Jenis Jasa</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaJenisJasa" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaJenisJasa">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS JASA">STATUS JASA</label>
                    <select name="statusJenisJasa" id="statusJenisJasa" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataJenisJasa()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div id="EditDataJenisJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Jenis Jasa</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaJenisJasaEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaJenisJasaEdit">
                    <input type="text"  style="display: none;" name="idJenisJasaEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="idJenisJasaEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS JASA">STATUS JASA</label>
                    <select name="statusJenisJasaEdit" id="statusJenisJasaEdit" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button id="edit" onclick="rubahDataJenisJasa()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
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
<div class="panel panel-default">
    <div class="panel-footer"> 
        <ul class="nav nav-pills" >
            <li class="active"><a data-toggle="tab" href="#Jasa" >Jasa</a></li>
            <li><a data-toggle="tab" href="#JenisJasa" >Jenis Jasa</a></li>
        </ul>
    </div>

</div>

<div class="tab-content">
    <div id="Jasa" class="tab-pane fade in active">
        <h3>JASA</h3>
        <div class="col-lg-12">
            <div class="panel panel-color panel-custom">
                <div class="panel-heading">
                    <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaruJasa()">Tambah Data Jasa</button>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="tabelJasa" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nama Jasa</th>
                                <th>Harga Jasa</th>
								<th>Status</th>
                                <th>Deskripsi Jasa</th>
                                <th>Gambar 1</th>
                                <th>Gambar 2</th>
                                <th >ACTION</th>
                            </tr>
                        </thead>
                        <tbody>  

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="JenisJasa" class="tab-pane fade">
        <h3>JENIS JASA</h3>
        <div class="col-lg-12">
            <div class="panel panel-color panel-custom">
                <div class="panel-heading">
                    <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaruJenisJasa()">Tambah Data Jenis Jasa</button>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover" id="tabelJenisJasa" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis Jasa</th>
                                <th>Status Jenis Jasa</th>
                                <th >ACTION</th>
                            </tr>
                        </thead>
                        <tbody>  

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var tableJasa;
    var tableJenisJasa;

    $(window).resize(function () {
        tableJasa.fnDraw(true)
        tableJenisJasa.fnDraw(true)
    });

    function loadDataTableJenisJasa() {
        tableJenisJasa = $('#tabelJenisJasa').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaJasa/viewDataJenisJasa",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [3], //last column
                    "orderable": false, //set not orderable
                },
            ],
        });
//        tableJenisJasa.draw();

    }

    function loadDataTableJasa() {
        tableJasa = $('#tabelJasa').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaJasa/viewDataJasa",
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
//        tableJasa.draw();
    }
    function readURL(input, location) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(location).html("<img src=" + e.target.result + " alt='your image' style='width:100px;height:100px'/>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image1Edit").change(function () {
        readURL(this, "#img1");
    });
    $("#image2Edit").change(function () {
        readURL(this, "#img2");
    });

    function tambahDataBaruJasa() {
        getDataJenisJasa();
        $("#AddDataJasa").modal("show");
    }
    function tambahDataBaruJenisJasa() {
        $("#AddDataJenisJasa").modal("show");
    }

    function simpanDataJenisJasa() {
        $("#AddDataJenisJasa").modal("hide");
        var namaJenisJasa = $("#namaJenisJasa").val();
        var statusJenisJasa = $("#statusJenisJasa option:selected").val();

        var fd = new FormData();
        fd.append("namaJenisJasa", namaJenisJasa);
        fd.append("statusJenisJasa", statusJenisJasa);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/tambahJenisJasa",
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
                    tableJenisJasa.api().ajax.reload();
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
    function rubahDataPropertieJasa() {
        $("#EditPropertie").modal("hide");
        var idJasaRuangan = $("#idJasaRuanganForPropertie").val();
        var jumlahPropertie = $("#jumlahPropertie").val();
        var idPropertie = $("#idPropertie option:selected").val();

        var fd = new FormData();
        fd.append("idJasaRuangan", idJasaRuangan);
        fd.append("jumlahPropertie", jumlahPropertie);
        fd.append("idPropertie", idPropertie);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/tambahDataPropertieJasa",
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
                        getDataPropertie();
                        editPropertie(idJasaRuangan);
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

    function editPropertie(idJasa) {
        $("#idJasaRuanganForPropertie").val(idJasa);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getPropertieJasa",
            data: {idJasa: idJasa},
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                var tabel = "";
                if (detail["data"] != null && detail["data"] != "") {

                    for (var x = 0; x < detail["data"].length; x++) {
                        tabel += "<tr><td>" + (x + 1) + "</td><td>" + detail["data"][x]["namaPropertie"] + "</td><td>" + detail["data"][x]["jumlahPropertieJasa"] + "</td></tr>";
                    }
                    $("#tabelPropertieJasa > tbody").html(tabel);
                }
                $("#tabelPropertieJasa > tbody").html(tabel);
            }
        });
        $("#EditPropertie").modal("show");
    }

    function bukaModulRubahDataJenisJasa(idJenisJasa) {
//    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getJenisJasaById",
            data: {idJenisJasa: idJenisJasa},
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                $("#idJenisJasaEdit").val(detail['idJenisJasa']);
                $("#namaJenisJasaEdit").val(detail['namaJenisJasa']);
                $("#statusJenisJasaEdit").val(detail['statusJenisJasa']);
            }
        });
        $("#EditDataJenisJasa").modal("show");
    }
    function bukaModulRubahDataJasa(idJasa) {
        getDataJenisJasa();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getJasaById",
            data: {idJasa: idJasa},
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                $("#idJasaRuangan").val(detail['idJasaRuangan']);
                $("#idJenisJasaRuanganEdit").val(detail['idJenisJasa']);
                $("#namaJasaEdit").val(detail['namaJasaRuangan']);
                $("#hargaJasaEdit").val(detail['hargaJasaRuangan']);
                $("#statusJasaEdit").val(detail['statusJasa']);
                $("#deskripsiJasaEdit").val(detail['deskripsiJasa']);
                $("#img1").html("<img src='data:" + detail['fileTypeJasa1'] + ";base64," + detail['gambarJasa1'] + "' style='width:100px; height:100px;'/>");
                $("#img2").html("<img src='data:" + detail['fileTypeJasa2'] + ";base64," + detail['gambarJasa2'] + "' style='width:100px; height:100px;'/>");
            }
        });
        $("#EditDataJasa").modal("show");
    }

    function rubahDataJenisJasa() {
        $("#EditDataJenisJasa").modal("hide");

        var idJenisJasaEdit = $("#idJenisJasaEdit").val();
        var namaJenisJasaEdit = $("#namaJenisJasaEdit").val();
        var statusJenisJasaEdit = $("#statusJenisJasaEdit option:selected").val();
//alert(idJenisJasaEdit);
        var fd = new FormData();
        fd.append("idJenisJasa", idJenisJasaEdit);
        fd.append("namaJenisJasa", namaJenisJasaEdit);
        fd.append("statusJenisJasa", statusJenisJasaEdit);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/editJenisJasa",
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
//                document.write(data);
                var status = jQuery.parseJSON(data);
//                document.write(status["message"]);
                if (status["status"] == "1") {
                    $('#succes_message').html(status["message"]);
                    $('#NotifSucces').modal('show');
                    setTimeout(function () {
                        $('#NotifSucces').modal('hide');
                    }, 2000);
                    tableJenisJasa.api().ajax.reload();
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

    function hapusDataJenisJasa(idJenisJasa) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/deleteJenisJasa",
            data: {idJenisJasa: idJenisJasa},
            success: function (data) {
                var status = jQuery.parseJSON(data);
                if (status["status"] == "1") {
                    $('#succes_message').html(status["message"]);
                    $('#NotifSucces').modal('show');
                    setTimeout(function () {
                        $('#NotifSucces').modal('hide');
                    }, 2000);
                    tableJenisJasa.api().ajax.reload();
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
    function hapusDataJasa(idJasaRuangan) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/deleteJasa",
            data: {idJasaRuangan: idJasaRuangan},
            success: function (data) {
                var status = jQuery.parseJSON(data);
                if (status["status"] == "1") {
                    $('#succes_message').html(status["message"]);
                    $('#NotifSucces').modal('show');
                    setTimeout(function () {
                        $('#NotifSucces').modal('hide');
                    }, 2000);
                    tableJasa.api().ajax.reload();
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



    function simpanDataJasa() {
        $("#AddDataJasa").modal("hide");
        var idJenisJasaRuangan = $("#idJenisJasaRuangan").val();
        var namaJasa = $("#namaJasa").val();
        var hargaJasa = $("#hargaJasa").val();
        var statusJasa = $("#statusJasa").val();
        var deskripsiJasa = $("#deskripsiJasa").val();
        var image1 = $('#image1')[0].files[0];
        var image2 = $('#image2')[0].files[0];

        var fd = new FormData();
        fd.append("idJenisJasaRuangan", idJenisJasaRuangan);
        fd.append("namaJasa", namaJasa);
        fd.append("hargaJasa", hargaJasa);
        fd.append("statusJasa", statusJasa);
        fd.append("deskripsiJasa", deskripsiJasa);
        fd.append("image1", image1);
        fd.append("image2", image2);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/tambahJasa",
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
                    tableJasa.api().ajax.reload();
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

    function rubahDataJasa() {
        $("#EditDataJasa").modal("hide");
        var idJenisJasaRuangan = $("#idJenisJasaRuanganEdit").val();
        var idJasaRuangan = $("#idJasaRuangan").val();
        var namaJasa = $("#namaJasaEdit").val();
        var hargaJasa = $("#hargaJasaEdit").val();
        var statusJasa = $("#statusJasaEdit").val();
        var deskripsiJasa = $("#deskripsiJasaEdit").val();
        var image1 = $('#image1Edit')[0].files[0];
        var image2 = $('#image2Edit')[0].files[0];

        var fd = new FormData();
        fd.append("idJasaRuangan", idJasaRuangan);
        fd.append("idJenisJasaRuangan", idJenisJasaRuangan);
        fd.append("namaJasa", namaJasa);
        fd.append("hargaJasa", hargaJasa);
        fd.append("statusJasa", statusJasa);
        fd.append("deskripsiJasa", deskripsiJasa);
        fd.append("image1", image1);
        fd.append("image2", image2);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/editJasa",
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
                    tableJasa.api().ajax.reload();
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

    function getDataJenisJasa() {
        //    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getDataJenisJasa",
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                //                document.write(detail);
                if (detail["data"] != null && detail["data"] != "") {
                    var option = "";
                    for (var x = 0; x < detail["data"].length; x++) {
                        option += "<option value='" + detail["data"][x]["idJenisJasa"] + "'>" + detail["data"][x]["namaJenisJasa"] + "</option>";
                    }
                    $("#idJenisJasaRuangan").html(option);
                    $("#idJenisJasaRuanganEdit").html(option);
                }
            }
        });
        //        $("#EditDataPropertie").modal("show");
    }
    function getDataPropertie() {
        //    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getDataPropertie",
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                //                document.write(detail);
                if (detail["data"] != null && detail["data"] != "") {
                    var option = "";
                    for (var x = 0; x < detail["data"].length; x++) {
                        option += "<option value='" + detail["data"][x]["idPropertie"] + "'>" + detail["data"][x]["namaPropertie"] + "(" + detail["data"][x]["stockGudang"] + ")</option>";
                    }
                    $("#idPropertie").html(option);
                }
            }
        });
    }

    $(document).ready(function () {
        loadDataTableJasa();
        loadDataTableJenisJasa();
        getDataPropertie();

    });











    function bukaModulRubahData(idMitra) {
//    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaMitra/getMitraById",
            data: {idMitra: idMitra},
            success: function (data) {
                var detail = jQuery.parseJSON(data);


                $("#idMitra").val(detail['idMitra']);
                $("#namaMitraEdit").val(detail['namaMitra']);
                $("#jenisMitraEdit").val(detail['jenisMitra']);
                $("#noTelpMitraEdit").val(detail['noTelpMitra']);
                $("#emailMitraEdit").val(detail['emailMitra']);
                $("#alamatMitraEdit").val(detail['alamatMitra']);
                $("#statusMitraEdit").val(detail['statusMitra']);

            }
        });
        $("#EditDataMitra").modal("show");
    }
    function rubahData() {
        $("#EditDataMitra").modal("hide");

        var idMitra = $("#idMitra").val();
        var namaMitra = $("#namaMitraEdit").val();
        var jenisMitra = $("#jenisMitraEdit").val();
        var noTelpMitra = $("#noTelpMitraEdit").val();
        var emailMitra = $("#emailMitraEdit").val();
        var alamatMitra = $("#alamatMitraEdit").val();
        var statusMitra = $("#statusMitraEdit").val();

        var fd = new FormData();
        fd.append("idMitra", idMitra);
        fd.append("namaMitra", namaMitra);
        fd.append("jenisMitra", jenisMitra);
        fd.append("noTelpMitra", noTelpMitra);
        fd.append("emailMitra", emailMitra);
        fd.append("alamatMitra", alamatMitra);
        fd.append("statusMitra", statusMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaMitra/editMitra",
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
//                document.write(data);
                var status = jQuery.parseJSON(data);
//                document.write(status["message"]);
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

    function hapusData(idMitra) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaMitra/deleteMitra",
            data: {idMitra: idMitra},
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

</script>

