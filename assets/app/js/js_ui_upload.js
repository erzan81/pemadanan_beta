$(document).ready(function() {

        // $('#cmb_instansi').select2({
        //     dropdownAutoWidth : true,
        //     width: '100%'
        // });
      
        

        get_upload_temp_tandingan();

         // 1. Upload Baru
         // 2. Upload Lanjutan
         $(function() {
          $('#jenis_upload1').on('click', function() {

            $('#upload_id_combo').hide('slow');
            $('#upload_lanjutan').hide('slow');
            $('#instansi_form').show('slow');
            $('#keterangan_form').show('slow');
            $('#init_kolom').show('slow');
            $('#upload').show('slow');

        });
      });

         $(function() {
          $('#jenis_upload2').on('click', function() {

            $('#upload_lanjutan').show('slow');
            $('#upload_id_combo').show('slow');
            $('#keterangan_form').hide('slow');
            $('#instansi_form').hide('slow');
            $('#upload').hide('slow');
            $('#init_kolom').hide('slow');

            //get_upload_temp_tandingan();
            
        });
      });


         // 1. Upload Ulang
         // 2. Upload Bad
        $(function() {
            $('#pilihan_update1').on('click', function() {
                get_upload_ulang();
                $("#tabel_bad").dataTable().fnDestroy();
                $('#tabel_bad').hide('slow');
                $('#tabel_perubahan').show('slow');
            });
        });

        $(function() {
            $('#pilihan_update2').on('click', function() {
                get_upload_bad();
                $("#tabel_perubahan").dataTable().fnDestroy();
                $('#tabel_perubahan').hide('slow');
                $('#tabel_bad').show('slow');
            });
        });

        $(function() {
            $('#kembali_detail').on('click', function() {
                $('#detail_row').hide('slow');
                $('#main_row').show('slow');
            });
        });

        $(function() {
            $('#tab_perubahan_data').on('click', function() {
                get_upload_ulang();
            });
        });

         $('#upload').on('click', function () {

            $('#loadingnya').loading();
            var file_data = $('#file').prop('files')[0];
            var kolom = get_kolom_check();
            var instansi = $('#cmb_instansi').val();
            var kegiatan = $('#keterangan').val();
            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('p_kolom', kolom);
            form_data.append('p_instansi_id', instansi);
            form_data.append('p_kegiatan', kegiatan);
                
            
            $.ajax({


                url: BASE_URL+'admin/source/upload_file', // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    
                    //console.log(response);
                    data = JSON.parse(response);
                    //console.log(data);

                    if(data.out_rowcount == 1){
                        $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                    }
                    else{
                        $('#pesan_notifikasi').html(data.msgerror);
                    }

                    $('#loadingnya').loading('stop');

                    $('#modalNotif').modal('show');
                    get_upload_temp_tandingan();
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the server
                }

            });
        });


         $('#upload_ulang').on('click', function () {

            $('#loadingnya').loading();
            var file_data = $('#file_perubahan').prop('files')[0];
            var jenis = $('input[name="pilihan_update"]:checked').val();

            if(jenis == 1){
                var param = $('#tabel_perubahan input[name="radio_perubahan"]:checked').val();
            }
            else{
                var param = $('#tabel_bad input[name="radio_perubahan_bad"]:checked').val();
            }


            
            
            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('param', param);
            form_data.append('jenis', jenis);
            
                $.ajax({
                    url: BASE_URL+'admin/source/upload_file_ulang', // point to server-side controller method
                    dataType: 'text', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                        //$('#msg').html(response);
                        //get_upload_temp_tandingan();
                        //console.log(response);
                        data = JSON.parse(response);
                        //console.log(data);
                        

                        if(data.out_rowcount == 1){
                            $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                        }
                        else{
                            $('#pesan_notifikasi').html(data.msgerror);
                        }

                        $('#loadingnya').loading('stop');
                        $('#modalNotif').modal('show');
                        get_upload_temp_tandingan();
                    },
                    error: function (response) {
                        $('#msg').html(response); // display error response from the server
                    }
                });
            });

         $('#upload_lanjutan').on('click', function () {

            //$('#table_temp_upload input[name="pilih_lanjutan"]:checked').val();
            //$("#page-wrapper").loading();
            $('#loadingnya').loading();
            //page-wrapper
            var file_data = $('#file').prop('files')[0];
            var kolom = get_kolom_check();
            //var instansi = $('#cmb_instansi').val();
            var input = $('#table_temp_upload input[name="pilih_lanjutan"]:checked').val();
            var fields = input.split(',');
            var id_upload = fields[0];
            var instansi = fields[1];


            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('p_kolom', kolom);
            form_data.append('p_instansi_id', instansi);
            form_data.append('p_id_upload', id_upload);

                    //form_data.append()
                    $.ajax({
                        url: BASE_URL+'admin/source/upload_file_lanjutan', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            //get_upload_temp_tandingan();

                            data = JSON.parse(response);
                            //console.log(data);

                            if(data.out_rowcount == 1){
                                $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                            }
                            else{
                                $('#pesan_notifikasi').html(data.msgerror);
                            }

                            $('#modalNotif').modal('show');
                            //$('#msg').html(response); // display success response from the server
                            $('#loadingnya').loading('stop');
                            get_upload_temp_tandingan();
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });
                });



    // Make a nice striped effect on the table
    //$("#table_kolom tr:even').addClass('alt')");

    // Initialise the second table specifying a dragClass and an onDrop function that will display an alert
    $("#table_kolom").tableDnD({
        onDragClass: "myDragClass",
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var debugStr = "Row dropped was "+row.id+". New order: ";
            for (var i=0; i<rows.length; i++) {
                debugStr += rows[i].id+" ";
            }
            $(table).parent().find('.result').text(debugStr);
        },
        onDragStart: function(table, row) {
            $(table).parent().find('.result').text("Started dragging row "+row.id);
        }
    });
});

function get_kolom_check(){

    var selected = "";
    
    $('#table_kolom input[name="pilih"]:checked').each(function() {

        selected += $(this).val()+ ';';

    });

    str1 = selected.replace(/;$/, "") + "";

    return str1;
}

function get_detail_temp_upload(header, id_upload, nama_table) {

    $('#loadingnya').loading();
    var valData= header;
    var valNew = valData.split(',');
    var header_kolom = [];
    var kolom_data =[];

    //console.log(header);

    $('#label_id_upload').html(id_upload);
    $('#label_nama_tabel').html(nama_table);

    $("#tabel_detail > thead > tr").empty();
    //$("#tabel_detail > thead").append("<tr><tr>");


    for(var i=0;i<valNew.length;i++){

        var strRow =

        '<th class="text-center">' + valNew[i] + '</th>';

        $("#tabel_detail > thead > tr:first").append(strRow);
        //console.log(valNew[i]);

        header_kolom.push(valNew[i]);
        var temp="";

        temp = {"mData": valNew[i], "defaultContent": ""};
            
        kolom_data.push(temp)

        temp = ""    


    }

    //console.log(kolom_data);
    setTimeout(function(){ 


        var p_id_upload = id_upload;
        var p_nama_table = nama_table;

        $("#tabel_detail").dataTable().fnDestroy();
        $("#tabel_detail > tbody").empty();
        tableTemplate = $('#tabel_detail').DataTable({

            "processing": true,
            "language": {
                "loadingRecords": "&nbsp;",
                "processing": "Loading..."
            },
            "serverSide": true,
            "aoColumnDefs": [
            {
                "aTargets": [0],
                "bSortable": false
            }
            ],
            "ajax": {
                "url": BASE_URL+'admin/source/get_detil_temp_upload',
                "type": "POST",
                "data": {
                    header: header_kolom,
                    p_id_upload: p_id_upload,
                    p_nama_table: p_nama_table
                },
                "dataSrc": function (json) {
                    console.log(json);
                    return json.data;
                }, error: function (request, status, error) {
                    //showMessage(request.responseText);
                    //closeLoader();
                }
            },
            "columns": kolom_data,
            
            "drawCallback": function (settings) {
                $('th').removeClass('sorting_asc');

            }
        });

        tableTemplate.on('error', function () {
            alert('error');
        });

    }, 100);

    //$("#tabel_detail").append("<tbody> </tbody>");
    $('#main_row').hide('slow');
    $('#detail_row').show('slow');
    $('#loadingnya').loading('stop');
    

}



function get_upload_temp_tandingan() {
    $('#table_temp_upload').dataTable().fnDestroy();
    $('#table_temp_upload tbody').empty();
    table_jancuk = $('#table_temp_upload').DataTable({
        "processing": true,
        "serverSide": false,
        "autoWidth": false,
        "aoColumnDefs": [
            {
                "bSortable": false,
                "aTargets": [0,1,2,3,4,5]
            },
            {
                "aTargets": [5],
                "sClass": "gede",
                "mRender": function (data, type, full) {
                    //console.log("full : ",full);
                    var vEdit = '<center><input type="radio" class="radio" name="pilih_lanjutan"  value="'+full.ID_UPLOAD+','+full.INSTANSI_ID+'" style="width:25px; height:25px;" /><center>';
                    
                    return vEdit;
                }
            }
        ],
        
        "ajax": {
            "url": BASE_URL + "admin/source/get_temp_upload",
            "type": "POST",
            "dataSrc": function (json) {
                console.log(json);
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
            {"data": "KEGIATAN", "defaultContent": ""}
        ],
        "drawCallback": function () {
            $('th').removeClass('sorting_asc');
            //initDataTableInformasiPengadaan();
        }


    });

    $('#table_temp_upload').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table_jancuk.row(tr);
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
            "<table class='table' cellpadding='5' cellpadding='1' cellspacing='1' border='1'>" +
            "<thead class='judul' style='color:black'>" +
            "<th style='text-align:center' width='5%'>No</th>" +
            "<th style='text-align:center' width='5%'>UPLOAD KE</th>" +
            "<th style='text-align:center' width='15%'>NAMA FILE</th>" +
            "<th style='text-align:center' width='10%'>JML DATA</th>" +
            "<th style='text-align:center' width='20%'>HEADER KOLOM</th>" +
            "<th style='text-align:center' width='20%'>NAMA TABEL</th>" +
            "<th style='text-align:center' width='10%'>CREATE DATE</th>" +
            "<th style='text-align:center' width='10%'>DETAIL</th>" +
            "</thead>";



    $.each(d.DETIL, function (i, value) {
        ret_valueT +=
                '<tbody>' +
                  '<tr>' +
                  '<td align="center">'+number+'</td>' +
                  '<td align="center">' + value.UPLOAD_KE + '</td>' +
                  '<td align="center">' + value.NAMA_FILE + '</td>' +
                  '<td align="center">' + value.JML_DATA + '</td>' +
                  '<td >'+value.HEADER_KOLOM+'</td>'+
                  '<td >'+value.NAMA_TABEL+'</td>'+
                  '<td align="center">' + value.CREATE_DATE + '</td>' +
                  '<td align="center"><a href="javascript:get_detail_temp_upload(\''+value.HEADER_KOLOM+'\',\''+value.ID_UPLOAD+'\',\''+value.NAMA_TABEL+'\')" class="btn btn-info btn-xs")><span class="fa fa-search"></span> See Detail</a></td>'+
                                                                               // "'+value.HEADER_KOLOM+'","'+value.ID_UPLOAD+'","'+value.NAMA_TABEL+'"
                  '</tr>' +
                  '</tbody>';   
        number++;
    });
    ret_valueT += "</table>";

    return ret_valueT;

}

//perubahan data

function get_upload_ulang(){

    var strRow="";
    $('#loadingnya').loading();
    $("#tabel_perubahan").dataTable().fnDestroy();
    $.ajax({
          "url": BASE_URL + "admin/source/get_upload_ulang",
          "type": "POST",
          success: function (json) {
            var obj = JSON.parse(json);
            var number = 1;
            $("#tabel_perubahan tbody").empty();
            $.each(obj, function (i, value) {
                strRow =
                  '<tr>' +
                  '<td align="center">'+number+'</td>' +
                  '<td align="left">' + value.NAMA_INSTANSI + '</td>' +
                  '<td align="left">' + value.ID_UPLOAD + '</td>' +
                  '<td align="center">' + value.UPLOAD_KE + '</td>' +
                  '<td align="center" style="padding:0px;"><input type="radio" class="radio" name="radio_perubahan" value="'+value.INSTANSI_ID+','+value.ID_UPLOAD+','+value.UPLOAD_KE+'" style="height:25px; width:25px;"/></td>' +
                  '</tr>';
                number++;
                $("#tabel_perubahan tbody").append(strRow);

                

            });
            
            $("#tabel_perubahan").dataTable();
            $('#loadingnya').loading('stop');

          }
      });

}


function get_upload_bad(){

    var strRow="";
    $('#loadingnya').loading();
    $("#tabel_bad").dataTable().fnDestroy();
    $.ajax({
          "url": BASE_URL + "admin/source/get_upload_bad",
          "type": "POST",
          success: function (json) {
            var obj = JSON.parse(json);
            var number = 1;
            $("#tabel_bad tbody").empty();
            $.each(obj, function (i, value) {
                strRow =
                  '<tr>' +
                  '<td align="center">'+number+'</td>' +
                  '<td align="left">' + value.NAMA_INSTANSI + '</td>' +
                  '<td align="left">' + value.ID_UPLOAD + '</td>' +
                  '<td align="center">' + value.UPLOAD_KE + '</td>' +
                  '<td align="left">' + value.NAMA_TABEL + '</td>' +
                  '<td align="center"><a href="javascript:get_detail_temp_upload(\''+value.HEADER_KOLOM+'\',\''+value.ID_UPLOAD+'\',\''+value.NAMA_TABEL+'\')" class="btn btn-info btn-xs")><span class="fa fa-search"></span> See Detail</a></td>'+
                  '<td align="center" style="padding:0px;"><input type="radio" class="radio" name="radio_perubahan_bad" value="'+value.INSTANSI_ID+','+value.ID_UPLOAD+','+value.UPLOAD_KE+'" style="height:25px; width:25px;"/></td>' +
                  '</tr>';
                number++;
                $("#tabel_bad tbody").append(strRow);

                
            });
            
            $("#tabel_bad").dataTable();    
            $('#loadingnya').loading('stop');
                            

          }
      });

}




