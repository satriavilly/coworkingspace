<!--Judul-->
<div class="col-sm-12">
    <h4 class="page-title">LAPORAN PROPERTIE</h4>
    <ol class="breadcrumb">
        <li>
            <a href="#">Laporan Propertie</a>
        </li>
        <li class="active">
            Laporan Propertie
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
                            <th>Tanggal Pengadaan</th>
                            <th>Status Pengadaan</th>
                            <th>Jumlah Pengadaan</th>
                            <th>Satuan</th>
                            <th>Nama Propertie</th>
                            <th>Stock gudang</th>
                            <th>Nama Mitra</th>
                            <th>Nama Pegawai</th>
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

    function loadDataTableLaporanPengadaan() {
        table = $('#example').dataTable({
            "scrollX": true,
//            "paging": true,
//            "responsive" : true,
            "processing": true, //Feature control the processing indicator.
//            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/PengadaanBarang/loadDataTableLaporanPengadaan",
                "type": "POST",
                "data": {firstDate: "-", lastDate: "-"}
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
        loadDataTableLaporanPengadaan();
    });

    function filter() {
        var firstDate = $("#firstDate").val();
        var lastDate = $("#lastDate").val();
        table.fnDestroy();
        table = $('#example').dataTable({
            "processing": true, //Feature control the processing indicator.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo base_url(); ?>index.php/PengadaanBarang/loadDataTableLaporanPengadaan",
                "type": "POST",
                "data": {firstDate: firstDate, lastDate: lastDate}
            },
        });
    }
</script>

