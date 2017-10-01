
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color: black">
                    Export Data
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="form-group">

                                <label>List Data Upload</label>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_export" >
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="7%">#</th>
                                            <th class="text-center" width="20%">NAMA INSTANSI</th>
                                            <th class="text-center" width="20%">ID UPLOAD</th>
                                            <th class="text-center" width="20%">UPLOAD KE</th>
                                            <th class="text-center" width="20%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>


                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        
    </div>
    <!-- /.row -->
</div>

<script type="text/javascript">
    
    var tabel_export;


    $(document).ready(function() {

        $('#upload').on('click', function () {
            submit();
        });

        get_export();
        
    });


    function submit(){

        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
            form_data.append('files', file_data);

        $.ajax({
            url: BASE_URL+'admin/export/upload', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                $('#msg').html(response);
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

    }

    function get_export() {
        $('#tabel_export').dataTable().fnDestroy();
        tabel_export = $('#tabel_export').DataTable({
            "processing": true,
            "serverSide": false,
            "autoWidth": false,
            "aoColumnDefs": [
                {
                    "bSortable": false,
                    "aTargets": [0,1]
                },
                {
                    "aTargets": [4],
                    "sClass": "gede",
                    "mRender": function (data, type, full) {
                        //console.log("full : ",full);
                        var vEdit = '<center><a href="#" class="btn btn-success btn-xs")><span class="fa fa-download"></span> Export</a><center>';
                        
                        return vEdit;
                    }
                }
            ],
            
            "ajax": {
                "url": BASE_URL + "admin/export/get",
                "type": "POST",
                "dataSrc": function (json) {
                    //console.log(json);
                    return json.MAIN;
                }
            },


            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "NAMA_INSTANSI", "defaultContent": ""},
                {"data": "INSTANSI_ID", "defaultContent": ""},
                {"data": "ID_UPLOAD", "defaultContent": ""}
            ],
            "drawCallback": function () {
                $('th').removeClass('sorting_asc');
                //initDataTableInformasiPengadaan();


                
            }


        });

        $('#tabel_export').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = tabel_export.row(tr);
                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child(formatPSS(row.data())).show();
                        tr.addClass('shown');
                    }
                });

        // Show all child nodes
        // $("#table_temp_upload").DataTable().rows().every(function () {
        //     this.child(formatPSS(this.data())).show();
        //     this.nodes().to$().addClass('shown');
        // });
    }

    function formatPSS(d) {
        var number = 1;
        var ret_valueT = "";

        //console.log(ret_valueT);
        ret_valueT =
                "<table class='table' cellpadding='5' cellpadding='1' cellspacing='1' border='1' width='80%'>" +
                "<thead class='judul' style='color:black'>" +
                "<th style='text-align:center' width='5%'>No</th>" +
                "<th style='text-align:center' width='10%'>INSTANSI ID</th>" +
                "<th style='text-align:center' width='15%'>NAMA INSTANSI</th>" +
                "<th style='text-align:center' width='15%'>ID UPLOAD</th>" +
                "<th style='text-align:center' width='15%'>STEP KE</th>" +
                "<th style='text-align:center' width='20%'>NAMA TABEL</th>" +
                "<th style='text-align:center' width='10%'>JUMLAH DATA</th>" +
                "<th style='text-align:center' width='10%'>AKSI</th>" +
                "</thead>"+
                "<tbody>";



        $.each(d.DETIL, function (i, value) {
            ret_valueT +=
                      '<tr>' +
                      '<td align="center">'+number+'</td>' +
                      '<td align="center">' + value.INSTANSI_ID + '</td>' +
                      '<td align="left">' + value.NAMA_INSTANSI + '</td>' +
                      '<td align="left">' + value.ID_UPLOAD + '</td>' +
                      '<td align="center">'+value.STEP_KE+'</td>'+
                      '<td >'+value.NAMA_TABEL+'</td>'+
                      '<td align="center">' + value.JUMLAH_DATA + '</td>' +
                      '<td align="center"><a href="#" class="btn btn-info btn-xs")><span class="fa fa-download"></span> Export</a></td>'+
                      '</tr>';
            number++;
        });
        ret_valueT += "</tbody></table>";

        return ret_valueT;

    }



</script>