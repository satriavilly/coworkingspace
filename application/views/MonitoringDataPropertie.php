<!--Judul-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="col-sm-12">
    <h4 class="page-title">MONITORING DATA PROPERTIE</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Monitoring Data Propertie</a>
        </li>
        <li class="active">
            Monitoring Data Propertie
        </li>
    </ol>
</div>
<!--Judul-->
<div id="EditDataPropertie" class="modal fade" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalTitle" class="modal-title"> Form Mitra</h4>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="NAMA">NAMA</label>
                    <input type="text"   name="namaPropertieEdit" parsley-trigger="change" required placeholder="Nama" class="form-control" id="namaPropertieEdit">
                    <input type="text" style="display: none"  name="idPropertie" parsley-trigger="change" required placeholder="Nama" class="form-control" id="idPropertie">
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="MITRA">MITRA</label>
                    <select name="namaMitraEdit" id="namaMitraEdit" class="form-control">

                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STATUS PROPERTIE">STATUS PROPERTIE</label>
                    <select name="statusPropertieEdit" id="statusPropertieEdit" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6" id="load">
                <div class="form-group">
                    <label for="STOCK GUDANG">STOCK GUDANG</label>
                    <input type="number"  name="stockGudangEdit" parsley-trigger="change" required placeholder="STOCK GUDANG" class="form-control" id="stockGudangEdit">
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
    <div id="curve_chart" style="width: 100%; height: 500px; overflow: auto;"></div>
</div>
<div class="col-lg-12">
    <div class="panel panel-color panel-custom">
                <div class="panel-heading">
                     <b style="color: #ffffff">List Pengadaan</b>
                   
                </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="pengadaan" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Nama Propertie</th>
                        <th>Status Pengadaan</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>  

                </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="col-lg-12">
        <div class="panel panel-color panel-custom">
                    <div class="panel-heading">
                        <!--<button id="tambah" class="btn btn-primary" style="background: #728C00;color: #ffffff; " onclick="tambahDataBaru()">Tambah Data Mitra</button>-->
                        <b style="color: #ffffff">List Propertie</b>
                    </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px;">No</th>
                            <th>Nama Propertie</th>
                            <th>Nama Perusahaan</th>
                            <th>Status Propertie</th>
                            <th>Stock Gudang</th>
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
        var tablePengadaan;

        function loadDataTablePengadaan() {
            tablePengadaan = $('#pengadaan').dataTable({
                "scrollX": true,
                //            "paging": true,
                //            "responsive" : true,
                "processing": true, //Feature control the processing indicator.
                //            "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/viewDataPengadaan",
                    "type": "POST"
                },
            });
        }
        var table;

        function loadDataTablePropertie() {
            table = $('#example').dataTable({
                "scrollX": true,
                //            "paging": true,
                //            "responsive" : true,
                "processing": true, //Feature control the processing indicator.
                //            "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/viewDataPropertie",
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                    {
                        "targets": [5], //last column
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

        $(document).ready(function () {
            loadDataTablePropertie();
            loadDataTablePengadaan();
            getDataMitra();
            getDataChartLinePengadaan();
            //        alert(dataChartLinePengadaan);
            google.charts.load('current', {'packages': ['line']});
            google.charts.setOnLoadCallback(drawChart);
        });

        function bukaModulRubahData(idPropertie) {
            //    alert(idMitra);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/getPropertieById",
                data: {idPropertie: idPropertie},
                success: function (data) {
                    var detail = jQuery.parseJSON(data);
                    $("#idPropertie").val(detail['idPropertie']);
                    $("#namaPropertieEdit").val(detail['namaPropertie']);
                    $("#namaMitraEdit").val(detail['idMitra']);
                    $("#statusPropertieEdit").val(detail['statusPropertie']);
                    $("#stockGudangEdit").val(detail['stockGudang']);
                }
            });
            $("#EditDataPropertie").modal("show");
        }
        function getDataMitra() {
            //    alert(idMitra);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/getDataMitra",
                success: function (data) {
                    var detail = jQuery.parseJSON(data);
                    //                document.write(detail);
                    if (detail["data"] != null && detail["data"] != "") {
                        var option = "";
                        for (var x = 0; x < detail["data"].length; x++) {
                            option += "<option value='" + detail["data"][x]["idMitra"] + "'>" + detail["data"][x]["namaMitra"] + "</option>";
                        }
                        $("#namaMitraEdit").html(option);
                    }
                }
            });
            //        $("#EditDataPropertie").modal("show");
        }
        //    var dataChartLinePengadaan = [["Date", "OnProgress", "Closee"]];
        var dataChartLinePengadaan = new Array();
        function getDataChartLinePengadaan() {
            //    alert(idMitra);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/getDataChartLinePengadaan",
                success: function (data) {
                    var detail = jQuery.parseJSON(data);
                    if (detail["data"] != null && detail["data"] != "") {

                        for (var x = 0; x < detail["data"].length; x++) {
                            var temp1 = String(detail["data"][x]["tglPengadaan"]);
                            var temp2 = parseInt(detail["data"][x]["onprogress"]);
                            var temp3 = parseInt(detail["data"][x]["close"]);


                            dataChartLinePengadaan.push([temp1, temp2, temp3]);
                        }

                    }
                }, async: false
            });
            //        alert(dataChartLinePengadaan);
            //        $("#EditDataPropertie").modal("show");
        }

        function rubahData() {
            $("#EditDataPropertie").modal("hide");

            var idPropertie = $("#idPropertie").val();
            var namaPropertie = $("#namaPropertieEdit").val();
            var idMitra = $("#namaMitraEdit option:selected").val();
            var statusPropertie = $("#statusPropertieEdit option:selected").val();
            var stockGudang = $("#stockGudangEdit").val();

            var fd = new FormData();
            fd.append("idPropertie", idPropertie);
            fd.append("namaPropertie", namaPropertie);
            fd.append("idMitra", idMitra);
            fd.append("statusPropertie", statusPropertie);
            fd.append("stockGudang", stockGudang);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/MonitoringDataPropertie/editPropertie",
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


        // Line Chart

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date');
            data.addColumn('number', 'OnProgress');
            data.addColumn('number', 'Close');
          
            data.addRows(dataChartLinePengadaan);

            var options = {
                chart: {
                    title: 'Chart Pengadaan Propertie',
                    subtitle: 'Dalam kurun bulan'
                },
                width: 900,
                height: 500,
                axes: {
                    x: {
                        0: {side: 'top'}
                    }
                }
            };

            var chart = new google.charts.Line(document.getElementById('curve_chart'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }

    </script>

