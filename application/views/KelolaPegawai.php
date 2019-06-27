<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">KELOLA DATA PEGAWAI</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Input Data Master</a>
        </li>
        <li class="active">
            Data Pegawai
        </li>
    </ol>
</div>
<!--Judul-->
<!--modal-->
<div id="AddDataPegawai" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Pegawai</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaPegawai" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaPegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="KODE PEGAWAI">KODE PEGAWAI</label>
                    <input type="text"  name="kodePegawai" parsley-trigger="change" required placeholder="Kode Pegawai" class="form-control" id="kodePegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="EMAIL PEGAWAI">EMAIL PEGAWAI</label>
                    <input type="text"  name="emailPegawai" parsley-trigger="change" required placeholder="Email" class="form-control" id="emailPegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="No Telphone">No Handphone</label>
                    <input type="text"  name="noHpPegawai" parsley-trigger="change" required placeholder="No Handphone" class="form-control" id="noHpPegawai">
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="ALAMAT PEGAWAI">ALAMAT PEGAWAI</label>
                    <input type="text"  name="alamatPegawai" parsley-trigger="change" required placeholder="Alamat" class="form-control" id="alamatPegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="TANGGAL LAHIR">TANGGAL LAHIR</label>
                    <input type="date"  name="tglLahirPegawai" parsley-trigger="change" required  class="form-control" id="tglLahirPegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS KELAMIN">JENIS KELAMIN</label>
                    <select name="jenisKelaminPegawai" id="jenisKelaminPegawai" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JABATAN">JABATAN</label>
                    <select name="jabatanPegawai" id="jabatanPegawai" class="form-control">
                        <option value="STAFF">STAFF</option>
                        <option value="OWNER">OWNER</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="ROLE">ROLE</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">admin</option>
                        <option value="customer">customer</option>
                        <option value="produser">produser</option>
                        <option value="supplier">supplier</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="PHOTO">PHOTO</label>
                    <input type="file" id="image" name="image" parsley-trigger="change" class="form-control" id="image">
                </div>
            </div>
            <div class="modal-footer">
                <button id="tambah" onclick="simpanDataPegawai()" class="btn btn-primary" style="background: #728C00;color: #ffffff; ">Simpan</button>
                <button type="button" style="background: #11141B;color: #ffffff; " class="btn btn-primary "data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>



<div id="EditDataPegawai" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Edit Data Pegawai</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaPegawaiEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaPegawaiEdit">
                    <input type="text" style="display: none;"  name="idPegawai" parsley-trigger="change" required placeholder="Nama" class="form-control" id="idPegawai">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="KODE PEGAWAI">KODE PEGAWAI</label>
                    <input type="text"  name="kodePegawaiEdit" parsley-trigger="change" required placeholder="Kode Pegawai" class="form-control" id="kodePegawaiEdit">
                    <input type="text" style="display: none;" name="kodePegawaiOriginal" parsley-trigger="change" required placeholder="Kode Pegawai" class="form-control" id="kodePegawaiOriginal">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="EMAIL PEGAWAI">EMAIL PEGAWAI</label>
                    <input type="text"  name="emailPegawaiEdit" parsley-trigger="change" required placeholder="Email" class="form-control" id="emailPegawaiEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="No Telphone">No Handphone</label>
                    <input type="text"  name="noHpPegawaiEdit" parsley-trigger="change" required placeholder="No Telphone" class="form-control" id="noHpPegawaiEdit">
                    <input type="text" style="display: none;" name="noHpPegawaiOriginal" parsley-trigger="change" required placeholder="No Telphone" class="form-control" id="noHpPegawaiOriginal">
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="ALAMAT PEGAWAI">ALAMAT PEGAWAI</label>
                    <input type="text"  name="alamatPegawaiEdit" parsley-trigger="change" required placeholder="Alamat" class="form-control" id="alamatPegawaiEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="TANGGAL LAHIR">TANGGAL LAHIR</label>
                    <input type="date"  name="tglLahirPegawaiEdit" parsley-trigger="change" required  class="form-control" id="tglLahirPegawaiEdit">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="JENIS KELAMIN">JENIS KELAMIN</label>
                    <select name="jenisKelaminPegawaiEdit" id="jenisKelaminPegawai" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group">
                    <label for="JABATAN">JABATAN</label>
                    <select name="jabatanPegawaiEdit" id="jabatanPegawai" class="form-control">
                        <option value="STAFF">STAFF</option>
                        <option value="OWNER">OWNER</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group text-center" id="img">

                </div>
            </div>
            <div class="col-lg-12" id="load">
                <div class="form-group text-center">
                    <label for="PHOTO">PHOTO</label>
                    <input type="file" name="imageEdit" parsley-trigger="change" class="form-control" id="imageEdit">
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
            <button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaru()">Tambah Data Pegawai</button>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Nama Pegawai</th>
                        <th>Kode Pegawai</th>
                        <th>Email Pegawai</th>
                        <th>No Hp Pegawai</th>
                        <th>Alamat Pegawai</th>
                        <th>Jenis Kelamin Pegawai</th>
                        <th>Tgl Lahir Pegawai</th>
                        <th>Foto Pegawai</th>
                        <th style="width: 20%">ACTION</th>
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

    function loadDataTablePegawai() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaPegawai/viewDataPegawai",
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
        loadDataTablePegawai();
    });
    function tambahDataBaru() {
        $("#AddDataPegawai").modal("show");
    }

    function simpanDataPegawai() {
        $("#AddDataPegawai").modal("hide");
        var kodePegawai = $("#kodePegawai").val();
        var namaPegawai = $("#namaPegawai").val();
        var alamatPegawai = $("#alamatPegawai").val();
        var noHpPegawai = $("#noHpPegawai").val();
        var emailPegawai = $("#emailPegawai").val();
        var tglLahirPegawai = $("#tglLahirPegawai").val();
        var jabatanPegawai = $("#jabatanPegawai option:selected").val();
        var role = $("#role").val();
        var jenisKelaminPegawai = $("#jenisKelaminPegawai option:selected").val();
        var image = $('#image')[0].files[0];

        var fd = new FormData();
        fd.append("kodePegawai", kodePegawai);
        fd.append("namaPegawai", namaPegawai);
        fd.append("alamatPegawai", alamatPegawai);
        fd.append("noHpPegawai", noHpPegawai);
        fd.append("emailPegawai", emailPegawai);
        fd.append("tglLahirPegawai", tglLahirPegawai);
        fd.append("jabatanPegawai", jabatanPegawai);
        fd.append("role", role);
        fd.append("jenisKelaminPegawai", jenisKelaminPegawai);
        fd.append("image", image);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPegawai/tambahPegawai",
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

    function bukaModulRubahData(idPegawai) {
//    alert(idPegawai);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPegawai/getPegawaiById",
            data: {idPegawai: idPegawai},
            success: function (data) {
//                document.write(data);
                var detail = jQuery.parseJSON(data);
//                alert(detail['data'][0]);
//
//                $data['namaPegawai'] = $detail - > namaPegawai;
//                        $data['kodePegawai'] = $detail - > kodePegawai;
//                        $data['emailPegawai'] = $detail - > emailPegawai;
//                        $data['noHpPegawai'] = $detail - > noHpPegawai;
//                        $data['alamatPegawai'] = $detail - > alamatPegawai;
//                        $data['tglLahirPegawai'] = $detail - > tglLahirPegawai;
//                        $data['jenisKelaminPegawai'] = $detail - > jenisKelaminPegawai;
//                        $data['jabatanPegawai'] = $detail - > jabatanPegawai;
//                        $data['fotoPegawai'] = $detail - > fotoPegawai;
//                        $data['fotoPegawai'] = base64_encode($detail - > fotoPegawai);
//


                $("#idPegawai").val(detail['idPegawai']);
                $("#kodePegawaiEdit").val(detail['kodePegawai']);
                $("#kodePegawaiOriginal").val(detail['kodePegawai']);
                $("#namaPegawaiEdit").val(detail['namaPegawai']);
                $("#alamatPegawaiEdit").val(detail['alamatPegawai']);
                $("#noHpPegawaiEdit").val(detail['noHpPegawai']);
                $("#noHpPegawaiOriginal").val(detail['noHpPegawai']);
                $("#emailPegawaiEdit").val(detail['emailPegawai']);
                $("#tglLahirPegawaiEdit").val(detail['tglLahirPegawai']);
                $("#jenisKelaminPegawaiEdit").val(detail['jenisKelaminPegawai']);
                $("#jabatanPegawaiEdit").val(detail['jabatanPegawai']);

                $("#img").html("<img src='data:" + detail['fileTypePegawai'] + ";base64," + detail['fotoPegawai'] + "' style='width:100px; height:100px;'/>");
//                $("#jenisKelaminEdit").html(jk);

            }
        });
        $("#EditDataPegawai").modal("show");
    }
    function rubahData() {
        $("#EditDataPegawai").modal("hide");
        var idPegawai = $("#idPegawai").val();
        var kodePegawai = $("#kodePegawaiEdit").val();
        var kodePegawaiOriginal = $("#kodePegawaiOriginal").val();
        var namaPegawai = $("#namaPegawaiEdit").val();
        var alamatPegawai = $("#alamatPegawaiEdit").val();
        var noHpPegawai = $("#noHpPegawaiEdit").val();
        var noHpPegawaiOriginal = $("#noHpPegawaiOriginal").val();
        var emailPegawai = $("#emailPegawaiEdit").val();
        var tglLahirPegawai = $("#tglLahirPegawaiEdit").val();
        var jenisKelaminPegawai = $("#jenisKelaminPegawaiEdit option:selected").val();
        var jabatanPegawai = $("#jabatanPegawaiEdit option:selected").val();
        var image = $('#imageEdit')[0].files[0];
//        alert(tanggalLahir);

        var fd = new FormData();
        fd.append("idPegawai", idPegawai);
        fd.append("kodePegawai", kodePegawai);
        fd.append("kodePegawaiOriginal", kodePegawaiOriginal);
        fd.append("namaPegawai", namaPegawai);
        fd.append("alamatPegawai", alamatPegawai);
        fd.append("noHpPegawai", noHpPegawai);
        fd.append("noHpPegawaiOriginal", noHpPegawaiOriginal);
        fd.append("emailPegawai", emailPegawai);
        fd.append("tglLahirPegawai", tglLahirPegawai);
        fd.append("jenisKelaminPegawai", jenisKelaminPegawai);
        fd.append("jabatanPegawai", jabatanPegawai);
        fd.append("image", image);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPegawai/editPegawai",
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

    function hapusData(idPegawai, idUser) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPegawai/deletePegawai",
            data: {idPegawai: idPegawai, idUser: idUser},
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

