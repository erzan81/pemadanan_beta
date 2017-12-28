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

            var tipe = $('input[name="tipe_data"]:checked').val();

            if(tipe == 1){

                $('#upload_lanjutan').hide('slow');
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload_dmp').hide('slow');     
                $('#nama_tabel').hide('slow');
                $('#upload_id_combo').hide('slow');

                $('#init_kolom').show('slow');    
                $('#upload_file_form').show('slow');
                $('#upload').show('slow');

            }else{

                $('#upload').hide('slow');
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload_lanjutan').hide('slow');
                $('#upload_id_combo').hide('slow');
                $('#upload_file_form').hide('slow');

                $('#upload_dmp').show('slow');
                $('#init_kolom').show('slow');
                $('#nama_tabel').show('slow');
                

            }


        });
      });

         $(function() {
          $('#jenis_upload2').on('click', function() {

            var tipe = $('input[name="tipe_data"]:checked').val();

            if(tipe == 1){

                
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload').hide('slow');  
                $('#upload_dmp').hide('slow');
                $('#init_kolom').hide('slow');    
                $('#nama_tabel').hide('slow');

                $('#upload_id_combo').show('slow');
                $('#upload_file_form').show('slow');
                $('#upload_lanjutan').show('slow');

            }else{

                $('#upload_lanjutan').hide('slow');
                $('#upload_dmp').hide('slow'); 
                $('#upload').hide('slow');  
                $('#upload_file_form').hide('slow');
                $('#init_kolom').hide('slow');  

                $('#upload_id_combo').show('slow');
                $('#nama_tabel').show('slow');
                $('#upload_lanjutan_dmp').show('slow');
                

            }

            //get_upload_temp_tandingan();
            
        });
      });


      $(function() {
          $('#tipe_data1').on('click', function() {

            var jenis = $('input[name="jenis_upload"]:checked').val();

            if(jenis == 1){

                $('#upload_lanjutan').hide('slow');
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload_dmp').hide('slow');     
                $('#nama_tabel').hide('slow');
                $('#upload_id_combo').hide('slow');

                $('#init_kolom').show('slow');    
                $('#upload_file_form').show('slow');
                $('#upload').show('slow');

            }else{

                $('#upload').hide('slow');
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload_dmp').hide('slow');
                $('#init_kolom').hide('slow');
                $('#nama_tabel').hide('slow');

                $('#upload_id_combo').show('slow');
                $('#upload_file_form').show('slow');
                $('#upload_lanjutan').show('slow');

            }

            
            

        });
      });

         $(function() {
          $('#tipe_data2').on('click', function() {

            var jenis = $('input[name="jenis_upload"]:checked').val();

            if(jenis == 1){

                $('#upload_lanjutan').hide('slow');
                $('#upload_lanjutan_dmp').hide('slow');
                $('#upload').hide('slow');  
                $('#upload_file_form').hide('slow');
                $('#upload_id_combo').hide('slow');

                $('#init_kolom').show('slow');    
                $('#nama_tabel').show('slow');
                $('#upload_dmp').show('slow'); 

            }else{

                $('#upload_lanjutan').hide('slow');
                $('#upload_dmp').hide('slow'); 
                $('#upload').hide('slow');  
                $('#upload_file_form').hide('slow');
                $('#init_kolom').hide('slow');  

                $('#upload_id_combo').show('slow');
                $('#nama_tabel').show('slow');
                $('#upload_lanjutan_dmp').show('slow');
                

            }

           
            
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

        $(function() {
            $('#upload_dmp').on('click', function() {
                submit_dmp();
            });
        });

        $(function() {
            $('#upload_lanjutan_dmp').on('click', function() {
                submit_dmp_lanjutan();
            });
        });
        

        


         $('#upload').on('click', function () {

            
            var file_data = $('#file').prop('files')[0];
            var kolom = get_kolom_check();
            var instansi = $('#cmb_instansi').val();
            var kegiatan = $('#keterangan').val();
            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('p_kolom', kolom);
            form_data.append('p_instansi_id', instansi);
            form_data.append('p_kegiatan', kegiatan);
            

            $('.myprogress').css('width', '0');
            $('#upload').prop('disabled', true);
            $('#bar_upload').show('fast');
            
            //console.log($('#file').val());

            if($('#file').val() == "" || kegiatan == ""){
                $('#pesan_notifikasi').html("Anda belum melengkapi isian form. Cek kembali file yang akan diupload dan kegiatan");
                $('#modalNotif').modal('show');
            }
            else if(kolom == null || kolom == ""){
                $('#pesan_notifikasi').html("Anda belum melengkapi isian kolom. Checklist pilihan anda pada tabel dibawah");
                $('#modalNotif').modal('show');
            }
            else{


                $.ajax({

                    url: BASE_URL+'admin/source/upload_file', // point to server-side controller method
                    
                    processData: false,
                    contentType: false,
                    data: form_data,
                    type: 'post',
                    xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = parseInt(percentComplete * 100);
                                        $('.myprogress').text(percentComplete + '%');
                                        $('.myprogress').css('width', percentComplete + '%');

                                    }
                                }, false);

                                xhr.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        console.log(percentComplete);
                                        $('.myprogress_lagi').css({
                                            width: percentComplete * 100 + '%'
                                        });
                                        $('.myprogress_lagi').text(percentComplete + '%');
                                    }
                                }, false);

                                return xhr;
                            },
                    
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
                        $('#upload').prop('disabled', false);

                        setTimeout(function(){ $('#bar_upload').hide('fast'); }, 3000);
                        
                    },
                    error: function (response) {
                        $('#msg').html(response); // display error response from the server
                    }

                });

            }

            
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

            $('.myprogress_rubah').css('width', '0');
            $('#upload_ulang').prop('disabled', true);
            $('#bar_upload_rubah').show('fast');

            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('param', param);
            form_data.append('jenis', jenis);
            
            if($('#file_perubahan').val() == ""){

                $('#pesan_notifikasi').html("Anda belum memilih file untuk diupload");
                $('#modalNotif').modal('show');

            }
            else if(jenis == "" || jenis == null){

                $('#pesan_notifikasi').html("Anda belum memilih ID UPLOAD ");
                $('#modalNotif').modal('show');

            }
            else{

                $.ajax({
                    url: BASE_URL+'admin/source/upload_file_ulang', // point to server-side controller method
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = parseInt(percentComplete * 100);
                                        $('.myprogress_rubah').text(percentComplete + '%');
                                        $('.myprogress_rubah').css('width', percentComplete + '%');

                                    }
                                }, false);
                                return xhr;
                            },
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

                        $('#upload_ulang').prop('disabled', false);

                        setTimeout(function(){ $('#bar_upload_rubah').hide('fast'); }, 3000);
                    },
                    error: function (response) {
                        $('#msg').html(response); // display error response from the server
                    }
                });


            }

                
            });

         $('#upload_lanjutan').on('click', function () {

            //$('#table_temp_upload input[name="pilih_lanjutan"]:checked').val();
            //$("#page-wrapper").loading();
            //$('#loadingnya').loading();
            //page-wrapper
            var file_data = $('#file').prop('files')[0];
            var kolom = get_kolom_check();
            //var instansi = $('#cmb_instansi').val();
            var input = $('#table_temp_upload input[name="pilih_lanjutan"]:checked').val();
            var fields = input.split(',');
            var id_upload = fields[0];
            var instansi = fields[1];


            $('.myprogress').css('width', '0');
            $('#upload_lanjutan').prop('disabled', true);
            $('#bar_upload').show('fast');

            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('p_kolom', kolom);
            form_data.append('p_instansi_id', instansi);
            form_data.append('p_id_upload', id_upload);

            if($('#file').val() == ""){

                $('#pesan_notifikasi').html("Anda belum memilih file untuk diupload");
                $('#modalNotif').modal('show');

            }
            else if(input == "" || input == null){

                $('#pesan_notifikasi').html("Anda belum memilih ID UPLOAD ");
                $('#modalNotif').modal('show');

            }
            else{

                //form_data.append()
                    $.ajax({
                        url: BASE_URL+'admin/source/upload_file_lanjutan', // point to server-side controller method
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = parseInt(percentComplete * 100);
                                        $('.myprogress').text(percentComplete + '%');
                                        $('.myprogress').css('width', percentComplete + '%');

                                    }
                                }, false);
                                return xhr;
                            },
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

                            $('#upload_lanjutan').prop('disabled', false);

                            setTimeout(function(){ $('#bar_upload').hide('fast'); }, 3000);
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });

            }

                    
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
    var coba = "";

    $("#table_kolom tbody").find("tr").each(function (index) {

        var tempKolom = $(this).find('td').toArray();
        var no_urut = tempKolom[0].innerHTML;
        var kolom = $('input[name="pilih'+no_urut+'"]:checked').val();
        var pk = $('input[name="pk'+no_urut+'"]:checked').val();
        var is_score = $('input[name="score'+no_urut+'"]:checked').val();
        var is_select = $('input[name="is_select'+no_urut+'"]:checked').val();
        var is_cleansing = $('input[name="is_cleansing'+no_urut+'"]:checked').val();
        //console.log(temp);
        if(kolom == NaN || kolom == undefined ){
            //do nothing
        } 
        else{

            if(pk == undefined){
                pk = "";
            }

            if(is_score == undefined){
                is_score = "";
            }

            if(is_select == undefined){
                is_select = "";
            }

            if(is_cleansing == undefined){
                is_cleansing = "";
            }

            selected += kolom + pk + is_score + is_select + is_cleansing + ';';
        }
    
        
    });

    
    str1 = selected.replace(/;$/, "") + "";
    console.log(str1);
    return str1;
}

function get_detail_temp_upload(header, id_upload, nama_table, mode_upload) {

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
        var mode = mode_upload;

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
                    p_nama_table: p_nama_table,
                    p_mode_upload: mode
                },
                "dataSrc": function (json) {
                    //console.log(json);
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
                  '<td align="center"><a href="javascript:get_detail_temp_upload(\''+value.HEADER_KOLOM+'\',\''+value.ID_UPLOAD+'\',\''+value.NAMA_TABEL+'\',\''+value.MODE_UPLOAD+'\')" class="btn btn-info btn-xs")><span class="fa fa-search"></span> See Detail</a></td>'+
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
    $("#tabel_bad").dataTable().fnDestroy();
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
                  '<td align="left">' + value.KEGIATAN + '</td>' +
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
    $("#tabel_perubahan").dataTable().fnDestroy();
    $.ajax({
          "url": BASE_URL + "admin/source/get_upload_bad",
          "type": "POST",
          success: function (json) {
            var obj = JSON.parse(json);
            var number = 1;

            //console.log(json);
            $("#tabel_bad tbody").empty();
            $.each(obj, function (i, value) {
                strRow =
                  '<tr>' +
                  '<td align="center">'+number+'</td>' +
                  '<td align="left">' + value.NAMA_INSTANSI + '</td>' +
                  '<td align="left">' + value.ID_UPLOAD + '</td>' +
                  '<td align="center">' + value.UPLOAD_KE + '</td>' +
                  '<td align="left">' + value.NAMA_TABEL + '</td>' +
                  '<td align="left">' + value.KEGIATAN + '</td>' +
                  '<td align="center"><a href="javascript:get_detail_temp_upload(\''+value.HEADER_KOLOM+'\',\''+value.ID_UPLOAD+'\',\''+value.NAMA_TABEL+'\',\''+value.MODE_UPLOAD+'\')" class="btn btn-info btn-xs")><span class="fa fa-search"></span> See Detail</a></td>'+
                  '<td align="center" style="padding:0px;"><input type="radio"  name="radio_perubahan_bad" value="'+value.INSTANSI_ID+','+value.ID_UPLOAD+','+value.UPLOAD_KE+'" style="height:25px; width:25px;"/></td>' +
                  '</tr>';
                number++;
                $("#tabel_bad tbody").append(strRow);

                
            });
            
            $("#tabel_bad").dataTable();    
            $('#loadingnya').loading('stop');
                            

          }
      });

}

function submit_dmp(){

    var file_data = $('#p_nama_file').val();
            var kolom = get_kolom_check();
            var instansi = $('#cmb_instansi').val();
            var kegiatan = $('#keterangan').val();
            

    $.ajax({
        url: BASE_URL+'admin/source/submit_upload_dmp', // point to server-side controller method
        data: {'p_nama_file' : file_data,
               'p_kolom' : kolom,
               'p_instansi_id' : instansi,
               'p_kegiatan' : kegiatan
              },
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
            //console.log(response); // display error response from the server
            $('#loadingnya').loading('stop');
        }
    });
}

function submit_dmp_lanjutan(){

    var file_data = $('#p_nama_file').val();
    var input = $('#table_temp_upload input[name="pilih_lanjutan"]:checked').val();
    var fields = input.split(',');
    var id_upload = fields[0];
    var instansi = fields[1];


    $.ajax({
        url: BASE_URL+'admin/source/submit_upload_dmp_lanjutan', // point to server-side controller method
        data: {'p_instansi_id' : instansi,
               'p_id_upload' : id_upload,
               'p_nama_file' : file_data
              },
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
            //get_conf_cleansing(id_upload);
            
        },
        error: function (response) {
            //console.log(response); // display error response from the server
            $('#loadingnya').loading('stop');
        }
    });
}




