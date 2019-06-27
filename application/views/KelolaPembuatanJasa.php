<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">KELOLA DATA PEMBUATAN JASA DAN PROPERTIE JASA</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Kelola Data Pembuatan Jasa Dan propertie Jasa</a>
        </li>
        <li class="active">
            Data Pembuatan Jasa Dan Propertie Jasa
        </li>
    </ol>
</div>
<!--Judul-->
<div id="developJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 70%;
                     height: 90%;
                     overflow: scroll;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Pembuatan Jasa</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Pembuatan Jasa</div>
                    <div class="panel-body">
                        <div class="col-lg-6" id="load">
                            <div class="form-group">
                                <label for="TGL PEMBUATAN AWAL">TGL PEMBUATAN AWAL</label>
                                <input type="date"   name="tglPembuatan" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="tglPembuatan">
                                <input type="text" style="display: none;"  name="idJasaRuangan" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="idJasaRuangan">
                            </div>
                        </div>
                        <div class="col-lg-6" id="load">
                            <div class="form-group">
                                <label for="DUE DATE PEMBUATAN">DUE DATE PEMBUATAN</label>
                                <input type="date"   name="dueDatePembuatan" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="dueDatePembuatan">
                            </div>
                        </div>
                        <div class="col-lg-12" id="load">
                            <div class="form-group">
                                <label for="BANYAK PEKERJA">BANYAK PEKERJA</label>
                                <input type="number"   name="banyakPekerja" parsley-trigger="change" required placeholder="Banyak Pekerja" class="form-control" id="banyakPekerja">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Task</div>
                    <div class="panel-body">
                        <button id="addTask" class="btn btn-primary" onclick="addTask()">Add Task</button>
                        <table class="table dataTable" id="tabelTask">
                            <thead>
                                <tr>
                                    <td>Nama Task</td>
                                    <td>Date Task Mulai</td>
                                    <td>Date Task Selesai</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type='text' class='form-control' placeholder='Nama Task' name='namaTask[]' id='namaTask'/></td>
                                    <td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskMulai[]' id='tglTaskMulai'/></td>
                                    <td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskSelesai[]' id='tglTaskSelesai'/></td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataDevelop()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div id="progresJasa" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style=" width: 70%;
                     height: 90%;
                     overflow: scroll;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Progres Jasa</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Pembuatan Jasa</div>
                    <div class="panel-body">
                        <div class="col-lg-6" id="load">
                            <div class="form-group">
                                <label for="TGL PEMBUATAN AWAL">TGL PEMBUATAN AWAL</label>
                                <input type="date"   name="tglPembuatanProgres" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="tglPembuatanProgres">
                                <input type="text" style="display: none;"  name="idJasaRuanganProgres" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="idJasaRuanganProgres">
                                <input type="text" style="display: none;"  name="idPembuatanJasaProgres" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="idPembuatanJasaProgres">
                            </div>
                        </div>
                        <div class="col-lg-6" id="load">
                            <div class="form-group">
                                <label for="DUE DATE PEMBUATAN">DUE DATE PEMBUATAN</label>
                                <input type="date"   name="dueDatePembuatanProgres" parsley-trigger="change" required placeholder="Tgl" class="form-control" id="dueDatePembuatanProgres">
                            </div>
                        </div>
                        <div class="col-lg-12" id="load">
                            <div class="form-group">
                                <label for="BANYAK PEKERJA">BANYAK PEKERJA</label>
                                <input type="number"   name="banyakPekerjaProgres" parsley-trigger="change" required placeholder="Banyak Pekerja" class="form-control" id="banyakPekerjaProgres">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Task</div>
                    <div class="panel-body">
                        <!--<button id="addTask" class="btn btn-primary" onclick="addTaskProgres()">Add Task</button>-->
                        <table class="table dataTable" id="tabelTaskProgres">
                            <thead>
                                <tr>
                                    <td>Nama Task</td>
                                    <td>Date Task Mulai</td>
                                    <td>Date Task Selesai</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
<!--                                <tr>
                                    <td><input type='text' class='form-control' placeholder='Nama Task' name='namaTaskProgres[]' id='namaTaskProgres'/></td>
                                    <td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskMulaiProgres[]' id='tglTaskMulaiProgres'/></td>
                                    <td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskSelesaiProgres[]' id='tglTaskSelesaiProgres'/></td>
                                    <td>-</td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataProgres()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
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


<h3>PEMBUATAN JASA</h3>
<div class="col-lg-12">
    <div class="panel panel-color panel-custom">
        <!--                <div class="panel-heading">
                            <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaruJasa()">Tambah Data Jasa</button>
                        </div>-->
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="tabelJasa" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Nama Jasa</th>
                        <th>Harga Jasa</th>
                        <th>Deskripsi Jasa</th>
                        <th>Status</th>
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


<script>
    var tableJasa;
    function addTask() {
        var task = "<tr>"
                + "<td><input type='text' class='form-control' placeholder='Nama Task' name='namaTaskProgres[]' id='namaTaskProgres'/></td>"
                + "<td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskMulaiProgres[]' id='tglTaskMulaiProgres'/></td>"
                + "<td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskSelesaiProgres[]' id='tglTaskSelesaiProgres'/></td>"
                + "<td><button id='deleteTask' class='btn btn-primary' onclick='deleteTask(this)'>Delete</button></td>"
                + "</tr>";
        $("#tabelTask > tbody").append(task);
    }

    function deleteTask(row) {
        $(row).parent().parent().remove();
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
                "url": "<?php echo base_url(); ?>index.php/KelolaJasa/viewDataJasaDevelop",
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



    function pembuatanJasaRuanganTask(idJasa) {
        $("#idJasaRuangan").val(idJasa);
        $("#developJasa").modal("show");
    }

    function progresJasaRuanganTask(idJasa) {
        $("#idJasaRuanganProgres").val(idJasa);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getPembuatanJasaByIdJasaRuangan",
            data: {idJasaRuangan: idJasa},
            success: function (data) {
                var detail = jQuery.parseJSON(data);
//                tglPembuatanProgres
//idJasaRuanganProgres
//idPembuatanJasaProgres
//dueDatePembuatanProgres
//banyakPekerjaProgres

                $("#tglPembuatanProgres").val(detail["tglPembuatan"]);
                $("#idJasaRuanganProgres").val(detail["idjasaruangan"]);
                $("#idPembuatanJasaProgres").val(detail["idPegawaiMembuatJasaRuangan"]);
                $("#dueDatePembuatanProgres").val(detail["dueDatePembuatan"]);
                $("#banyakPekerjaProgres").val(detail["banyakPekerja"]);
            }
        });


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getTaskByIdJasaRuangan",
            data: {idJasaRuangan: idJasa},
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                var task = "";
                if (detail != null) {
                    for (var x = 0; x < detail.length; x++) {
                        task += "<tr>"
                                + "<td><input type='text' class='form-control' placeholder='Nama Task' name='namaTaskProgres[]' id='namaTaskProgres'value='" + detail[x]["namaTask"] + "'/><input type='text' style='display:none' class='form-control' placeholder='Nama Task' name='idTaskProgres[]' id='idTaskProgres'value='" + detail[x]["idTask"] + "'/></td>"
                                + "<td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskMulaiProgres[]' id='tglTaskMulaiProgres' value='" + detail[x]["tglTaskMulai"] + "'/></td>"
                                + "<td><input type='date' class='form-control' placeholder='Nama Task' name='tglTaskSelesaiProgres[]' id='tglTaskSelesaiProgres' value='" + detail[x]["tglTaskSelesai"] + "'/></td>";
                        if (detail[x]["statusTask"] == "onprogres") {
                            task += "<td><select class='form-control' id='statusTaskProgres' name='statusTaskProgres[]'><option value='onprogres' selected>On Progres</option><option value='close'>Close</option></select></td>";

                        } else if (detail[x]["statusTask"] == "close") {
                            task += "<td><select class='form-control' id='statusTaskProgres' name='statusTaskProgres[]'><option value='onprogres'>On Progres</option><option value='close' selected>Close</option></select></td>";
                        }
                        task += "</tr>";
                    }
                    $("#tabelTaskProgres > tbody").html(task);
                }
            }
        });

        $("#progresJasa").modal("show");
    }

//    function hapusDataJasa(idJasaRuangan) {
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>index.php/KelolaJasa/deleteJasa",
//            data: {idJasaRuangan: idJasaRuangan},
//            success: function (data) {
//                var status = jQuery.parseJSON(data);
//                if (status["status"] == "1") {
//                    $('#succes_message').html(status["message"]);
//                    $('#NotifSucces').modal('show');
//                    setTimeout(function () {
//                        $('#NotifSucces').modal('hide');
//                    }, 2000);
//                    tableJasa.api().ajax.reload();
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



    function simpanDataDevelop() {
        $("#developJasa").modal("hide");

        var namaTask = [];
        $('input[name^="namaTask"]').each(function () {
            namaTask.push($(this).val());
        });

        var tglTaskMulai = [];
        $('input[name^="tglTaskMulai"]').each(function () {
            tglTaskMulai.push($(this).val());
        });

        var tglTaskSelesai = [];
        $('input[name^="tglTaskSelesai"]').each(function () {
            tglTaskSelesai.push($(this).val());
        });

        var idJasaRuangan = $("#idJasaRuangan").val();
        var tglPembuatan = $("#tglPembuatan").val();
        var dueDatePembuatan = $("#dueDatePembuatan").val();
        var banyakPekerja = $("#banyakPekerja").val();

        var fd = new FormData();
        fd.append("idJasaRuangan", idJasaRuangan);
        fd.append("tglPembuatan", tglPembuatan);
        fd.append("dueDatePembuatan", dueDatePembuatan);
        fd.append("banyakPekerja", banyakPekerja);
        fd.append("namaTask", namaTask);
        fd.append("tglTaskMulai", tglTaskMulai);
        fd.append("tglTaskSelesai", tglTaskSelesai);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/tambahDevelop",
            data: {idJasaRuangan: idJasaRuangan, tglPembuatan: tglPembuatan, dueDatePembuatan: dueDatePembuatan, banyakPekerja: banyakPekerja, namaTask: namaTask, tglTaskMulai: tglTaskMulai, tglTaskSelesai: tglTaskSelesai},
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
    function simpanDataProgres() {
        $("#progresJasa").modal("hide");

        var idTask = [];
        $('input[name^="idTaskProgres"]').each(function () {
            idTask.push($(this).val());
        });
        var statusTaskProgres = [];
        statusTaskProgres = $('select[name="statusTaskProgres[]"]').map(function () {
            if ($(this).val())
                return $(this).val();
        }).get();

        var namaTask = [];
        $('input[name^="namaTaskProgres"]').each(function () {
            namaTask.push($(this).val());
        });

        var tglTaskMulai = [];
        $('input[name^="tglTaskMulaiProgres"]').each(function () {
            tglTaskMulai.push($(this).val());
        });

        var tglTaskSelesai = [];
        $('input[name^="tglTaskSelesaiProgres"]').each(function () {
            tglTaskSelesai.push($(this).val());
        });

        var idJasaRuangan = $("#idJasaRuanganProgres").val();
        var idPembuatanJasaProgres = $("#idPembuatanJasaProgres").val();
        var tglPembuatan = $("#tglPembuatanProgres").val();
        var dueDatePembuatan = $("#dueDatePembuatanProgres").val();
        var banyakPekerja = $("#banyakPekerjaProgres").val();

        var fd = new FormData();
        fd.append("idJasaRuangan", idJasaRuangan);
        fd.append("idPembuatanJasaProgres", idPembuatanJasaProgres);
        fd.append("tglPembuatan", tglPembuatan);
        fd.append("dueDatePembuatan", dueDatePembuatan);
        fd.append("banyakPekerja", banyakPekerja);
        fd.append("idTask", idTask);
        fd.append("namaTask", namaTask);
        fd.append("tglTaskMulai", tglTaskMulai);
        fd.append("tglTaskSelesai", tglTaskSelesai);
        fd.append("statusTaskProgres", statusTaskProgres);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaJasa/editProgres",
            data: {idJasaRuangan: idJasaRuangan, tglPembuatan: tglPembuatan, dueDatePembuatan: dueDatePembuatan, banyakPekerja: banyakPekerja, namaTask: namaTask, tglTaskMulai: tglTaskMulai, tglTaskSelesai: tglTaskSelesai, idPembuatanJasaProgres: idPembuatanJasaProgres, idTask: idTask, statusTaskProgres: statusTaskProgres},
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
//
//    function getDataJenisJasa() {
//        //    alert(idMitra);
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>index.php/KelolaJasa/getDataJenisJasa",
//            success: function (data) {
//                var detail = jQuery.parseJSON(data);
//                //                document.write(detail);
//                if (detail["data"] != null && detail["data"] != "") {
//                    var option = "";
//                    for (var x = 0; x < detail["data"].length; x++) {
//                        option += "<option value='" + detail["data"][x]["idJenisJasa"] + "'>" + detail["data"][x]["namaJenisJasa"] + "</option>";
//                    }
//                    $("#idJenisJasaRuangan").html(option);
//                    $("#idJenisJasaRuanganEdit").html(option);
//                }
//            }
//        });
//        //        $("#EditDataPropertie").modal("show");
//    }

    $(document).ready(function () {
        loadDataTableJasa();

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

