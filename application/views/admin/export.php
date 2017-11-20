
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
                                            <th class="text-center" width="13%">ID UPLOAD</th>
                                            <th class="text-center" width="20%">UPLOAD KE</th>
                                            <th class="text-center" width="20%">NAMA TABEL</th>

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

<div class="modal fade" id="modalNotif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Informasi </h3></center>
        </div>
        
        <div class="modal-body" >
            <center><p id="pesan_notifikasi"></p></center>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                    "aTargets": [5],
                    "sClass": "gede",
                    "mRender": function (data, type, full) {
                        //console.log("full : ",full);
                        var vEdit = '<center>'+
                                        '<a href="#" class="btn btn-danger btn-xs" onclick="get_param(\'DMP\',\'ALL\',\''+$.param(full)+'\')"><span class="fa fa-download"></span> FINAL</a>'+
                                    '<center>';
                        
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
                {"data": "ID_UPLOAD", "defaultContent": ""},
                {"data": "NAMA_TABEL", "defaultContent": ""}
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
                "<th style='text-align:center' width='10%'>STEP KE</th>" +
                "<th style='text-align:center' width='15%'>NAMA TABEL</th>" +
                "<th style='text-align:center' width='10%'>JUMLAH DATA</th>" +
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

                      '</tr>';
            number++;
        });
        ret_valueT += "</tbody></table>";

        return ret_valueT;

    }

    var parseQueryString = function (querystring) {
        var qsObj = new Object();
        if (querystring) {
            var parts = querystring.replace(/\?/, "").split("&");
            var up = function (k, v) {
                var a = qsObj[k];
                if (typeof a == "undefined") {
                    qsObj[k] = [v];
                }
                else if (a instanceof Array) {
                    a.push(v);
                }
            };
            for (var i in parts) {
                var part = parts[i];
                var kv = part.split('=');
                if (kv.length == 1) {
                    var v = decodeURIComponent(kv[0] || "");
                    up(null, v);
                }
                else if (kv.length > 1) {
                    var k = decodeURIComponent(kv[0] || "");
                    var v = decodeURIComponent(kv[1] || "");
                    up(k, v);
                }
            }
        }
        return qsObj;
    };


    function get_param(jenis, tipe, data){

        var qsObj = parseQueryString(data);
        
        var p_tipe = tipe;

        

        //console.log(qsObj);

        if(p_tipe == "ALL"){

            var instansi_id = qsObj.INSTANSI_ID[0];
            var id_upload = qsObj.ID_UPLOAD[0];
            var p_jenis = jenis;
            var nama_tabel = qsObj.NAMA_TABEL[0];

            //console.log("ALL");

            export_all(instansi_id, id_upload, p_jenis, nama_tabel);

        }
        else{

            var instansi_id = qsObj.INSTANSI_ID[0];
            var step_ke = qsObj.STEP_KE[0];
            var id_upload = qsObj.ID_UPLOAD[0];
            var nama_tabel = qsObj.NAMA_TABEL[0];
            var p_jenis = jenis;

            export_single(instansi_id, step_ke, id_upload, nama_tabel, p_jenis);

            //console.log("NOT");
        }

    }

    function export_single(instansi_id, step_ke, id_upload, nama_tabel, p_jenis){

        $.ajax({
            url: BASE_URL+'admin/export/export_single', // point to server-side controller method
            data: {
                    p_instansi_id : instansi_id,
                    p_id_upload : id_upload,
                    p_step_ke : step_ke,
                    p_nama_tabel : nama_tabel,
                    p_jenis_file : p_jenis
                  },
            type: 'post',
            success: function (response) {
                
                $('#pesan_notifikasi').html("Proses Final Berhasil Disubmit");
                $('#modalNotif').modal('show');
                //$('#msg').html(response); // display success response from the server
                $('#loadingnya').loading('stop');

                get_main_instansi();
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

    }

    function export_all(instansi_id, id_upload, p_jenis, tabel){

        $.ajax({
            url: BASE_URL+'admin/export/export_all', // point to server-side controller method
            data: {
                    p_instansi_id : instansi_id,
                    p_id_upload : id_upload,
                    p_jenis_file : p_jenis,
                    p_nama_tabel : tabel

                  },
            type: 'post',
            success: function (response) {
                
                $('#pesan_notifikasi').html("Proses Final Berhasil Disubmit");
                $('#modalNotif').modal('show');
                //$('#msg').html(response); // display success response from the server
                $('#loadingnya').loading('stop');

                get_main_instansi();
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

    }



</script>