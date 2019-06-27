<!--Judul-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="col-sm-12">
    <h4 class="page-title">LAPORAN PENYEWAAN JASA</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Laporan Penyewaan Jasa</a>
        </li>
        <li class="active">
            Laporan Penyewaan Jasa
        </li>
    </ol>
</div>
<div class="col-lg-12">
    <div class="panel panel-color panel-custom">
        <div class="panel-heading">
            <div style="width: 50%; color: white">
                Dari <input type="date" class="form-control"  id="firstDate"/> s/d
                <input type="date" class="form-control"  id="lastDate"/>
                <br/>
                <button id="filter" class="form-control btn-primary" onclick="filter()">Filter</button>

            </div>
        </div>
        <div class="panel-body">
            <div style="text-align: right">
                <button id="print" class="btn btn-instagram" onclick="print()" style="width: 10%">Print</button>
                <br/>
                <br/>
                <br/>
            </div>
            <div id="printneun">
                <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%" border="1">
                    <thead>
                        <tr>
                            <th style="width: 10px;">No</th>
                            <th>Nama Ruangan</th>
                            <th>Nama Pemesan</th>
                            <th>Tgl Booking</th>
                            <th>Status Pemesanan</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>  

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div id="curve_chart" style="width: 100%; height: 500px; overflow: auto;"></div>
</div>

<script>
    var table;
    var dataChartLinePengadaan = new Array();
    function getDataChartLinePengadaan() {
        //    alert(idMitra);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/KelolaPelanggan/getDataChartLinePendapatan",
            success: function (data) {
                var detail = jQuery.parseJSON(data);
                if (detail["data"] != null && detail["data"] != "") {

                    for (var x = 0; x < detail["data"].length; x++) {
                        var temp1 = String(detail["data"][x]["periode"]);
                        var temp2 = parseInt(detail["data"][x]["pendapatan"]);
//                        var temp3 = parseInt(detail["data"][x]["close"]);


                        dataChartLinePengadaan.push([temp1, temp2]);
                    }

                }
            }, async: false
        });
        //        alert(dataChartLinePengadaan);
        //        $("#EditDataPropertie").modal("show");
    }
    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Pendapatan');
//        data.addColumn('number', 'Close');

        data.addRows(dataChartLinePengadaan);

        var options = {
            chart: {
                title: 'Chart Pendapatan',
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
    function print() {
        table.fnDestroy();
        var divToPrint = document.getElementById("printneun");
        var html = "<center><h3>Laporan Penyewaan</h3></center>" + divToPrint.outerHTML
        newWin = window.open("");
        newWin.document.write(html);
        newWin.print();
        newWin.close();
        table = $('#example').dataTable();
        filter();
    }

    function loadDataTableLaporanPemesanan() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/loadDataTableLaporanPemesanan",
                "type": "POST",
                "data": {firstDate: "-", lastDate: "-"}
            },
            //Set column definition initialisation properties.

        });
    }

    $(document).ready(function () {
        loadDataTableLaporanPemesanan();


        getDataChartLinePengadaan();
        //        alert(dataChartLinePengadaan);
        google.charts.load('current', {'packages': ['line']});
        google.charts.setOnLoadCallback(drawChart);
    });

    function filter() {
        var firstDate = $("#firstDate").val();
        var lastDate = $("#lastDate").val();
        table.fnDestroy();
        table = $('#example').dataTable({
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/KelolaPelanggan/loadDataTableLaporanPemesanan",
                "type": "POST",
                "data": {firstDate: firstDate, lastDate: lastDate}
            },
        });
    }
</script>

