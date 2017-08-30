$(document).ready(function() {

	get_upload_temp_tandingan();

	$(function() {
	    $('#kembali_detail').on('click', function() {
	        $('#detail_row').hide('slow');
	        $('#main_row').show('slow');
	    });
	});

    get_ref_cleansing();
    get_main_temp();

	$('#btn_gabung').on('click', function () {

         submit_penggabungan();

    });

    $('#btn_tambah_conf').on('click', function () {

         get_param();

    });

    $('#btn_submit_conf').on('click', function () {

         submit_conf();

    });

});

function submit_penggabungan(){

	var param = $('#table_temp_upload input[name="pilih_gabung"]:checked').val();
	var temp_ignore = $('input[name="ignore_bad"]:checked').val();
	var ignore = 0;

	if(temp_ignore == 'YA'){
		ignore = 1;
	}
	else{
		ignore = 0;
	}
    var form_data = new FormData();
    form_data.append('param', param);
    form_data.append('ignore_bad', ignore);
    
    $('#loadingnya').loading();

    $.ajax({
        url: BASE_URL+'admin/verifikasi/submit_penggabungan', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response) {
            data = JSON.parse(response);
         
            if(data.out_rowcount == 1){
                $('#pesan_notifikasi').html("Data Berhasil Digabung.");
            }
            else{
                $('#pesan_notifikasi').html(data.msgerror);
            }

            $('#loadingnya').loading('stop');

            $('#modalNotif').modal('show');
            get_upload_temp_tandingan();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_upload_temp_tandingan() {
    $('#table_temp_upload').dataTable().fnDestroy();
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
                    var vEdit = '<center><input type="radio" class="radio" name="pilih_gabung" value="'+full.ID_UPLOAD+','+full.INSTANSI_ID+'" style="width:25px; height:25px;" /><center>';
                    
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
            "<table class='table' cellpadding='5' cellpadding='1' cellspacing='1' border='1' width='80%'>" +
            "<thead class='judul' style='color:black'>" +
            "<th style='text-align:center' width='5%'>No</th>" +
            "<th style='text-align:center' width='5%'>UPLOAD KE</th>" +
            "<th style='text-align:center' width='15%'>NAMA FILE</th>" +
            "<th style='text-align:center' width='10%'>JML DATA</th>" +
            "<th style='text-align:center' width='20%'>HEADER KOLOM</th>" +
            "<th style='text-align:center' width='20%'>NAMA TABEL</th>" +
            "<th style='text-align:center' width='10%'>CREATE DATE</th>" +
            "<th style='text-align:center' width='10%'>DETAIL</th>" +
            "</thead>"+
            "<tbody>";



    $.each(d.DETIL, function (i, value) {
        ret_valueT +=
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
                  '</tr>';
        number++;
    });
    ret_valueT += "</tbody></table>";

    return ret_valueT;

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


function get_ref_cleansing(){

    $.ajax({
        url: BASE_URL+'admin/verifikasi/get_ref_cleansing', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_referensi tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + value.NO_URUT + '</td>' +
                          '<td align="center">' + value.ID_KOLOM + '</td>' +
                          '<td align="center">' + value.ID_CLEANSING + '</td>' +
                          '<td align="left">' + value.KETERANGAN + '</td>' +
                          '<td align="center"><input type="checkbox" class="radio" name="pilih_referensi" value="'+value.ID_KOLOM+','+value.ID_CLEANSING+'" style="width:25px; height:25px;" /></td>'+
                                                                                       // "'+value.HEADER_KOLOM+'","'+value.ID_UPLOAD+'","'+value.NAMA_TABEL+'"
                          '</tr>';
                $('#tabel_referensi tbody').append(ret_valueT);
            });


            $("#tabel_referensi").tableDnD({
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
            
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_main_temp(){

    $("#cleansing_main").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/verifikasi/get_temp_main', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#cleansing_main tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + value.NAMA_INSTANSI + '</td>' +
                          '<td align="center">' + value.INSTANSI_ID + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="left">' + value.KEGIATAN + '</td>' +
                          '<td align="center"><input type="radio" class="radio" name="pilih_main" onclick="get_conf_cleansing(\''+value.ID_UPLOAD+'\')" value="'+value.INSTANSI_ID+','+value.ID_UPLOAD+'" style="width:25px; height:25px;" /></td>'+
                                                                                       // "'+value.HEADER_KOLOM+'","'+value.ID_UPLOAD+'","'+value.NAMA_TABEL+'"
                          '</tr>';
                $('#cleansing_main tbody').append(ret_valueT);
            });
            $("#cleansing_main").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_conf_cleansing(param){

    $("#tabel_conf").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/verifikasi/get_conf_cleansing', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        data: {p_id_upload: param},
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_conf tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + value.NO_URUT + '</td>' +
                          '<td align="center">' + value.ID_KOLOM + '</td>' +
                          '<td align="center">' + value.ID_CLEANSING + '</td>' +
                          '</tr>';
                $('#tabel_conf tbody').append(ret_valueT);
            });
            $("#tabel_conf").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_param(){

    var selected = "";
    var param_main = $('input[name="pilih_main"]:checked').val();
    var main = param_main.split(',');

    var instansi = main[0];
    var id_upload = main[1];
    // di split dulu cuy
    var no_urut =1;

    var data = [];

    $('#loadingnya').loading();
    $('#tabel_referensi input[name="pilih_referensi"]:checked').each(function() {

        var param_referensi = $(this).val();
        var ref = param_referensi.split(',');

        var id_cleansing = ref[1];
        var id_kolom = ref[0];

        var temp = {'p_instansi_id' : instansi,
                    'p_id_upload' : id_upload,
                    'p_id_cleansing' : id_cleansing,
                    'p_id_kolom' : id_kolom,
                    'p_no_urut' : no_urut
                    };
        
        data.push(temp);
        no_urut++;
    });

    $.ajax({
        url: BASE_URL+'admin/verifikasi/tambah_conf', // point to server-side controller method
        data: {data: data},
        type: 'post',
        success: function (response) {
            var data = JSON.parse(response);

            if(data.out_rowcount == 1){
                $('#pesan_notifikasi').html("Referensi Berhasil Ditambahkan.");
            }
            else{
                $('#pesan_notifikasi').html(data.msgerror);
            }

            $('#loadingnya').loading('stop');

            $('#modalNotif').modal('show');
            get_conf_cleansing(id_upload);
            
        },
        error: function (response) {
            console.log(response); // display error response from the server
            $('#loadingnya').loading('stop');
        }
    });
   
}

function submit_conf(){

    var param_main = $('input[name="pilih_main"]:checked').val();
    var main = param_main.split(',');

    var instansi = main[0];
    var id_upload = main[1];

    $('#loadingnya').loading();
    $.ajax({
        url: BASE_URL+'admin/verifikasi/submit_conf', // point to server-side controller method
        data: {'p_instansi_id' : instansi,
               'p_id_upload' : id_upload
              },
        type: 'post',
        success: function (response) {
            var data = JSON.parse(response);

            if(data.out_rowcount == 1){
                $('#pesan_notifikasi').html("Referensi Berhasil Disimpan.");
            }
            else{
                $('#pesan_notifikasi').html(data.msgerror);
            }

            $('#loadingnya').loading('stop');

            $('#modalNotif').modal('show');
            
            
        },
        error: function (response) {
            console.log(response); // display error response from the server
            $('#loadingnya').loading('stop');
        }
    });

}


