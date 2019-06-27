<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">KELOLA PELANGGAN</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Kelola pelanggan</a>
        </li>
        <li class="active">
            Kelola Pelanggan
        </li>
    </ol>
</div>
<div class="col-lg-12">
    <div class="panel panel-color panel-custom">
        <div class="panel-heading">
            <div class="col-sm-6" id="load">
                <div class="form-group text-left">
                    <label for="PHOTO" style="color: white">JENIS KELAMIN</label>
                    <select class="form-control" id="jk" name="jk">
                        <option value="-">Semua</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <!--            <div class="col-sm-6" id="load">
                            <div class="form-group text-left">
                                <label for="PHOTO" style="color: white">ORGANISASI</label>
                                <select class="form-control" id="organisasi" name="organisasi">
                                    <option value="-">Semua</option>
                                </select>
                            </div>
                        </div>-->
            <div class="col-sm-6" id="load">
                <div class="form-group text-left">
                    <label for="PHOTO" style="color: white">BANYAK PENYEWAAN</label>
                    <select class="form-control" id="banyakPenyewaan" name="banyakPenyewaan">
                        <option value="-">Semua</option>
                        <option value="1">Lebih Dari 1 Kali</option>
                        <option value="5">Lebih Dari 5 Kali</option>
                        <option value="10">Lebih Dari 10 Kali</option>
                        <option value="15">Lebih Dari 15 Kali</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6" id="load">
                <div class="form-group text-left">
                    <label for="PHOTO" style="color: white">RATA RATA RATE FEEDBACK</label>
                    <select class="form-control" id="avgRating" name="avgRating">
                        <option value="-">Semua</option>
                        <option value="1"> >= 1 Bintang</option>
                        <option value="2"> >= 2 Bintang</option>
                        <option value="3"> >= 3 Bintang</option>
                        <option value="4"> >= 4 Bintang</option>
                        <option value="5">5 Bintang</option>
                    </select>
                </div>
            </div>
            <div style="width: 25%; color: white">
                <button id="filter" class="form-control btn-primary" onclick="filter()">Filter</button>
            </div>
        </div>
        <div class="panel-body">
            <div style="text-align: right">
                <button id="print" class="btn btn-instagram" onclick="kirimIklanEmail()" style="width: 10%">Kirim Iklan</button>
                <br/>
                <br/>
                <br/>
            </div>
            <div class="panel panel-default" id="kirimEmail" style="display: none">
                <div class="panel-heading">Kirim Iklan</div>
                <div class="panel-body">
                    <div class="col-sm-6" id="load">
                        <div class="form-group text-left">
                            <label for="PHOTO" >SUBJECT</label>
                            <input type="text" id="subjectEmail" name="subjectEmail" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12" id="load">
                        <div class="form-group text-left">
                            <label for="PHOTO" >Message</label>
                            <textarea class="form-control" id="messageEmail" name="messageEmail"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6" id="load">
                        <div class="form-group text-right">
                            <input type="button" value="Kirim" name="kirim" class="form-control btn-instagram" onclick="sendEmail()"/>
                        </div>
                    </div>
                </div>
            </div>
            <div id="printneun">
                <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%" border="1">
                    <thead>
                        <tr>
                            <th style="width: 10px;">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email Pelanggan</th>
                            <th>No HP Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Jenis Kelamin</th>
                            <th>Organisasi</th>
                            <th>Rata-rata Rating Penyewaan</th>
                            <th>Banyak Melakukan Penyewaan</th>
                            <th>Pilih All  <br/><input type="checkbox" id="checkAll"></th>  
                        </tr>
                    </thead>
                    <tbody>  

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    function kirimIklanEmail() {
        $("#kirimEmail").fadeToggle("slow");
    }
    function sendEmail() {
//        alert("asdasd");
        $("#kirimEmail").fadeToggle("hide");
        var email = [];
        $(':checkbox:checked').each(function (i) {
            email[i] = $(this).val();
        });

        var subjectEmail = $("#subjectEmail").val();
        var messageEmail = $("#messageEmail").val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPelanggan/sendMail",
            data: {subjectEmail: subjectEmail, messageEmail: messageEmail, email: email},
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

    function print() {
        table.fnDestroy();
        var divToPrint = document.getElementById("printneun");
        var html = "<center><h3>Data Pengadaan</h3></center>" + divToPrint.outerHTML
        newWin = window.open("");
        newWin.document.write(html);
        newWin.print();
        newWin.close();
        table = $('#example').dataTable();
        filter();
    }
    var table;

    function loadDataTablePelanggan() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/loadDataTablePelanggan",
                "type": "POST",
                "data": {jk: "-", organisasi: "-", banyakPenyewaan: "-", avgRating: "-"}
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

    $(document).ready(function () {
        loadDataTablePelanggan();
    });

    function filter() {
        var jk = $("#jk").val();
        var organisasi = $("#organisasi").val();
        var banyakPenyewaan = $("#banyakPenyewaan").val();
        var avgRating = $("#avgRating").val();
        table.fnDestroy();
        table = $('#example').dataTable({
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/loadDataTablePelanggan",
                "type": "POST",
                "data": {jk: jk, organisasi: organisasi, banyakPenyewaan: banyakPenyewaan, avgRating: avgRating}
            },
        });
    }
</script>
