<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">KELOLA DATA MITRA</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Input Data Mitra</a>
        </li>
        <li class="active">
            Data Mitra
        </li>
    </ol>
</div>
<!--Judul-->
<!--modal-->
<div id="AddDataMitra" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Mitra</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaMitra" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaMitra">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS MITRA">JENIS MITRA</label>
                    <select name="jenisMitra" id="jenisMitra" class="form-control">
                        <option value="CV">CV</option>
                        <option value="PT">PT</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS MITRA">STATUS MITRA</label>
                    <select name="statusMitra" id="statusMitra" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="EMAIL MITRA">EMAIL MITRA</label>
                    <input type="text"  name="emailMitra" parsley-trigger="change" required placeholder="Email" class="form-control" id="emailMitra">
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="ALAMAT MITRA">ALAMAT MITRA</label>
                    <input type="text"  name="alamatMitra" parsley-trigger="change" required placeholder="Alamat" class="form-control" id="alamatMitra">
                </div>
            </div><div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="No Telphone">No TELFON MITRA</label>
                    <input type="text"  name="noTelpMitra" parsley-trigger="change" required placeholder="No Handphone" class="form-control" id="noTelpMitra">
                </div>
            </div>

            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataMitra()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div id="EditDataMitra" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Mitra</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaMitraEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaMitraEdit">
                    <input type="text" style="display: none"  name="idMitra" parsley-trigger="change" required placeholder="Nama" class="form-control" id="idMitra">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS MITRA">JENIS MITRA</label>
                    <select name="jenisMitraEdit" id="jenisMitraEdit" class="form-control">
                        <option value="CV">CV</option>
                        <option value="PT">PT</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS MITRA">STATUS MITRA</label>
                    <select name="statusMitraEdit" id="statusMitraEdit" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="EMAIL MITRA">EMAIL MITRA</label>
                    <input type="text"  name="emailMitraEdit" parsley-trigger="change" required placeholder="Email" class="form-control" id="emailMitraEdit">
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="ALAMAT MITRA">ALAMAT MITRA</label>
                    <input type="text"  name="alamatMitraEdit" parsley-trigger="change" required placeholder="Alamat" class="form-control" id="alamatMitraEdit">
                </div>
            </div><div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="No Telphone">No TELFON MITRA</label>
                    <input type="text"  name="noTelpMitraEdit" parsley-trigger="change" required placeholder="No Handphone" class="form-control" id="noTelpMitraEdit">
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
            <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaru()">Tambah Data Mitra</button>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Nama Mitra</th>
                        <th>Jenis Mitra</th>
                        <th>No Telpon Mitra</th>
                        <th>Email Mitra</th>
                        <th>Alamat Mitra</th>
                        <th>Status Mitra</th>
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
    var table;

    function loadDataTableMitra() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaMitra/viewDataMitra",
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
        loadDataTableMitra();
    });
    function tambahDataBaru() {
        $("#AddDataMitra").modal("show");
    }

    function simpanDataMitra() {
        $("#AddDataMitra").modal("hide");
        var namaMitra = $("#namaMitra").val();
        var jenisMitra = $("#jenisMitra option:selected").val();
        var noTelpMitra = $("#noTelpMitra").val();
        var emailMitra = $("#emailMitra").val();
        var alamatMitra = $("#alamatMitra").val();
        var statusMitra = $("#statusMitra option:selected").val();


        var fd = new FormData();
        fd.append("namaMitra", namaMitra);
        fd.append("jenisMitra", jenisMitra);
        fd.append("noTelpMitra", noTelpMitra);
        fd.append("emailMitra", emailMitra);
        fd.append("alamatMitra", alamatMitra);
        fd.append("statusMitra", statusMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaMitra/tambahMitra",
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

