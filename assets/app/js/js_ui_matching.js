
var table_jancuk;

var p_instansi_id;
var p_id_upload_init;
var p_step_ke;
var p_step_acuan;
var p_is_paralel;

$(document).ready(function() {

    get_data_final();
    //get_acuan_step();
    //get_metode_pemadanan("123");

    $('#btn_proses_kolom').on('click', function () {

         get_all_kolom_value();

    });

    $('#proses_pemadanan').on('click', function () {

         get_proses_pemadanan();

    });

    $('#btn_proses_kolom_edit').on('click', function () {

         get_all_kolom_value_upd();

    });

    

    

    $('#btn_inisialisasi').on('click', function () {

        init_pemadanan();

    } );

    $('#detail_kembali').on('click', function () {

        $('#detail_final').hide('slow');
        $('#main_final').show('slow');
        

    } );

});

function get_data_final(){

    $("#tabel_main_final").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/matching/get_data_final', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_main_final tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + value.NAMA_INSTANSI + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="center">' + value.KEGIATAN + '</td>' +
                          '<td align="center">' + value.NAMA_TABEL + '</td>' +
                          '<td align="center">' + value.CREATE_DATE + '</td>' +
                          '<td class="text-center"><input type="radio" name="pilih_main" value="'+value.ID_UPLOAD+','+value.INSTANSI_ID+'" onclick="get_metode_pemadanan(\''+value.ID_UPLOAD+'\'); get_kolom_pemadanan(\''+value.ID_UPLOAD+'\')" style="width:25px; height:25px;" /></td>'+
                          '</tr>';
                $('#tabel_main_final tbody').append(ret_valueT);
            });
            $("#tabel_main_final").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_pemadanan_main(id_upload){

    $("#table_final_pemadanan").dataTable().fnDestroy();
    //$("#table_final_pemadanan").empty();
    $.ajax({
        url: BASE_URL+'admin/matching/get_pemadanan_final', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        data: {p_id_upload : id_upload},
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#table_final_pemadanan tbody').empty();
            var number = 1;
            $.each(data, function (i, value) {

                

                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + number + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="center">' + value.STEP_KE + '</td>' +
                          '<td align="center">' + value.NAMA_TABEL + '</td>' +
                          '<td align="center">' + value.STATUS_PEMADANAN + '</td>' +
                          '<td align="center">' +
                            '<a href="#" onclick="get_pemadanan_detail(\''+value.ID_UPLOAD+'\',\''+value.STEP_KE+'\')" ><span class="btn btn-success btn-xs">DETAIL</span></a>'+
                            '  <a href="#" onclick="submit_pemadanan_job(\''+value.ID_UPLOAD+'\',\''+value.STEP_KE+'\')"><span class="btn btn-info btn-xs">Proses</span></a>'+
                          '</td>' +
                          '</tr>';
                $('#table_final_pemadanan tbody').append(ret_valueT);

                number++;
            });
            $("#table_final_pemadanan").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}


function submit_pemadanan_job(id_upload, step_ke){

    $.ajax({
        url: BASE_URL+'admin/matching/submit_pemadanan_job', // point to server-side controller method
        data: {p_id_upload : id_upload, p_step_ke : step_ke},
        type: 'post',
        success: function (response) {

            data = JSON.parse(response);
                //console.log(data);

            if(data.out_rowcount == 1){
                $('#pesan_notifikasi').html("Proses Pemadanan Sudah Diantrikan Ke Job. Silakan Cek Menu Monitoring Untuk Melihat Proses dan Hasilnya");
            }
            else{
                $('#pesan_notifikasi').html(data.msgerror);
            }

            $('#modalNotif').modal('show');
            //$('#msg').html(response); // display success response from the server
            $('#loadingnya').loading('stop');

            //get_pemadanan_main(id_upload);

        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_pemadanan_detail(id_upload, step_ke){

    $("#table_final_pemadanan_detil").dataTable().fnDestroy();
    //$("#table_final_pemadanan").empty();
    $.ajax({
        url: BASE_URL+'admin/matching/get_pemadanan_final_detil', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        data: {p_id_upload : id_upload, p_step_ke : step_ke},
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#table_final_pemadanan_detil tbody').empty();
            var number = 1;
            $.each(data, function (i, value) {

                var script = [];


                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + number + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="center">' + value.ID_MV + '</td>' +
                          '<td align="center">' + value.STEP_KE + '</td>' +
                          '<td align="center">' + value.STATUS_PEMADANAN + '</td>' +
                          '<td align="center"><a href="#" onclick="get_kodenya(\''+i+'\')"><span class="btn btn-info btn-xs">Lihat Script</span></a><span id="kode'+i+'" style="display:none">' +value.SCRIPT+'</span></td>' +
                          '</tr>';
                $('#table_final_pemadanan_detil tbody').append(ret_valueT);

                //console.log(script[0].ini);

                script = [];
                kodenya = "";
                number++;


            });
            $("#table_final_pemadanan_detil").dataTable();

            $('#main_final').hide('slow');
            $('#detail_final').show('slow');
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_kodenya(i){
    
    var kodenya = $('#kode'+i+'').html();
    $("#modal_lihat_kode").modal('show');
    $("#isi_kode").html(kodenya);


    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
    //alert(kodenya);
    //alert("kode : " + kode);
}


function get_proses_pemadanan(){

    $("#tabel_proses").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/matching/get_data_final', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_proses tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center" width="20%">' + value.NAMA_INSTANSI + '</td>' +
                          '<td align="center" width="20%">' + value.ID_UPLOAD + '</td>' +
                          '<td align="center" width="20%">' + value.KEGIATAN + '</td>' +
                          '<td align="center" width="20%">' + value.NAMA_TABEL + '</td>' +
                          '<td align="center" width="12%">' + value.CREATE_DATE + '</td>' +
                          '<td class="text-center" width="8%"><input type="radio" name="pilih_proses" value="'+value.ID_UPLOAD+','+value.INSTANSI_ID+'" onclick="get_pemadanan_main(\''+value.ID_UPLOAD+'\')" style="width:25px; height:25px;" /></td>'+
                          '</tr>';
                $('#tabel_proses tbody').append(ret_valueT);
            });
            $("#tabel_proses").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}


function get_kolom_pemadanan(id_upload){

    
    $.ajax({
        url: BASE_URL+'admin/matching/get_kolom_pemadanan', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        data : {p_id_upload : id_upload},
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_kolom_pemadanan tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          
                          '<td align="left">' + value.ID_KOLOM + '</td>' +
                          '<td align="center"><input type="checkbox" name="is_matching_'+i+'" value="YA"/></td>' +

                          '<td align="center">'+
                            '<select class="form-control metode" id="metode_'+i+'" onchange="aksi_metode(\''+i+'\')">'+
                                '<option value="EM">Exact Match</option>'+
                                '<option value="JW">Jaro Winkler</option>'+
                                '<option value="ED">Edit Distance Similarity</option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<select class="form-control atribut" id="atribut_'+i+'" disabled="disabled">'+
                                '<option value="="> = </option>'+
                                '<option value=">=" > >= </option>'+
                                '<option value=">"> > </option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<input type="text" class="form-control nilai" id="nilai_'+i+'" value="100" readonly="readonly"/>'+
                          '</td>'+

                          '<td align="center">'+
                            '<input class="is_digit" type="checkbox"  name="is_digit_'+i+'" value="YA"/>'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="text" class="form-control digit" />'+
                          '</td>'+

                          '</tr>';
                $('#tabel_kolom_pemadanan tbody').append(ret_valueT);


                //exact match boleh "=" saja
                //else boleh semua

                
            });
            
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function aksi_metode(param){

  var metode = $('#metode_'+param).val();

  if(metode == "EM"){

    $('#nilai_'+param).val(100);
    $('#atribut_'+param).val("=").change();
    $('#atribut_'+param).prop('disabled', true);
    $('#nilai_'+param).prop('readonly', true);

  }
  else{

    $('#nilai_'+param).val(0);
    $('#atribut_'+param).val("=").change();
    $('#atribut_'+param).prop('disabled', false);
    $('#nilai_'+param).prop('readonly', false);

  }
  
}


function aksi_metode_upd(param){

  var metode = $('#upd_metode_'+param).val();

  if(metode == "EM"){

    $('#upd_nilai_'+param).val(100);
    $('#upd_atribut_'+param).val("=").change();
    $('#upd_atribut_'+param).prop('disabled', true);
    $('#upd_nilai_'+param).prop('readonly', true);

  }
  else{

    $('#upd_nilai_'+param).val(0);
    $('#upd_atribut_'+param).val("=").change();
    $('#upd_atribut_'+param).prop('disabled', false);
    $('#upd_nilai_'+param).prop('readonly', false);

  }
  
}

function get_all_kolom_value(){

  var temp_id_upload = $('input[name="pilih_main"]:checked').val();
  var fields = temp_id_upload.split(',');
  var id_upload = fields[0];
  var instansi = fields[1];

  var list_pemadanan = [];

  $("#tabel_kolom_pemadanan tbody").find("tr").each(function (index) {

            var tempPemadanan = $(this).find('td').toArray();
            var id_kolom = $(tempPemadanan[0]).html();
            var metode = $(this).closest('tr').find('.metode').val();
            var atribut = $(this).closest('tr').find('.atribut').val();
            var nilai = $(this).closest('tr').find('.nilai').val();
            var temp_is_digit = $('input[name="is_digit_'+index+'"]:checked').val();
            var temp_is_matching = $('input[name="is_matching_'+index+'"]:checked').val();
            var digit = $(this).closest('tr').find('.digit').val();

            var is_digit;
            var is_matching;
            if(temp_is_digit == "YA"){
              is_digit = 1;
            }
            else{
              is_digit = 0;
            }

            if(temp_is_matching == "YA"){
              is_matching = 1;
            }
            else{
              is_matching = 0;
            }


            var material = {
                p_id_kolom: id_kolom,
                p_metode: metode,
                p_atribut: atribut,
                p_nilai: nilai,
                p_is_digit: is_digit,
                p_digit: digit,
                p_is_proses: is_matching,
                p_id_upload: id_upload,
                p_instansi_id: instansi

            };

            list_pemadanan.push(material);
            
            //console.log(list_pemadanan)

        });


        $.ajax({
            url: BASE_URL+'admin/matching/submit_metode_pemadanan', // point to server-side controller method
            data: {data : JSON.stringify(list_pemadanan)},
            type: 'post',
            success: function (response) {
                //get_upload_temp_tandingan();

                data = JSON.parse(response);
                //console.log(data);

                if(data.out_rowcount == 1){
                    $('#pesan_notifikasi').html("Berhasil Disimpan.");
                }
                else{
                    $('#pesan_notifikasi').html(data.msgerror);
                }

                $('#modalNotif').modal('show');
                //$('#msg').html(response); // display success response from the server
                $('#loadingnya').loading('stop');
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

}


function get_metode_pemadanan(p_id_upload) {


    $('#table_acuan_step').dataTable().fnDestroy();
    $('#table_acuan_step > tbody').empty();
     table_jancuk = $('#table_acuan_step').DataTable({
        "processing": true,
        "serverSide": false,
        "autoWidth": false,
        "aoColumnDefs": [
            {
                "bSortable": false,
                "aTargets": [0,1,2,3,4,5]
            },

            {
                "aTargets": [4],
                "sClass": "text-center",
                "mRender": function (data, type, full) {
                    //console.log("full : ",full);

                    var status = full.STATUS;
                    
                    return status;
                }
            },

            {
                "aTargets": [5],
                "sClass": "text-center",
                "mRender": function (data, type, full) {
                    //console.log("full : ",full.FLAG_TOMBOL);
                    if(full.FLAG_TOMBOL == 0){
                      var vProses = '<a href="#" class="btn btn-info btn_inisialisasi" onclick="inisialisasi_proses(\''+full.INSTANSI_ID+'\',\''+full.ID_UPLOAD+'\',\''+full.STEP_KE+'\')">Proses</a> <a href="#" class="btn btn-danger" onclick="get_kolom_pemadanan_edit(\''+full.ID_UPLOAD+'\',\''+full.STEP_KE+'\')">Edit Metode</a> ';
                    }
                    else{
                      var vProses = "";
                    }
                    
                    
                    return vProses;
                }
            }
        ],
        
        "ajax": {
            "url": BASE_URL + "admin/matching/get_metode_pemadanan",
            "data": {p_id_upload: p_id_upload},
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
                "defaultContent": '<img src="http://www.datatables.net/examples/resources/details_open.png"></img>'
            },
            {"data": "STEP_KE", "defaultContent": ""},
            {"data": "NAMA_INSTANSI", "defaultContent": ""},
            {"data": "ID_UPLOAD", "defaultContent": ""}
        ],
        "drawCallback": function () {
            $('th').removeClass('sorting_asc');
            //initDataTableInformasiPengadaan();

            //var table = $('#table_acuan_step').DataTable();
 
            // $('#table_acuan_step tbody').on( 'click', 'tr', function () {

            //     //var this_acuan = $('#table_acuan_step tbody > tr');
            //     var data =  table_jancuk.row( this ).data();
                
            //     //console.log(data);

            //     p_instansi_id = data.INSTANSI_ID;
            //     p_id_upload_init = data.ID_UPLOAD;
            //     p_step_ke = data.STEP_KE;
            //     p_step_acuan = $(this).closest('tr').find('.acuan').html();
            //     p_is_paralel = "S";

            //     if(data.FLAG_TOMBOL == 0){

            //         $("#pesan_inisialisasi").html("Apakah Anda Yakin Akan Proses Inisialisasi "+p_id_upload_init+"");
            //         $("#modal_init").modal('show');

            //     }


                
            // } );

            
        }


    });


    

    $('#table_acuan_step tbody').on('click', 'td.details-control', function () {
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

    //$('#table_acuan_step').('refresh');

    //Show all child nodes
    // $('#table_acuan_step').dataTable().rows().every(function () {
    //     this.child(formatPSS(this.data())).show();
    //     this.nodes().to$().addClass('shown');
    // });
}

function inisialisasi_proses(instansi, id_upload, step_ke){
                p_instansi_id = instansi;
                p_id_upload_init = id_upload;
                p_step_ke = step_ke;
                p_step_acuan = null;
                p_is_paralel = "S";

                $("#pesan_inisialisasi").html("Apakah Anda Yakin Akan Proses Inisialisasi "+p_id_upload_init+"");
                $("#modal_init").modal('show');
}


function formatPSS(d) {
    var number = 1;
    var ret_valueT = "";

    //console.log(ret_valueT);
    ret_valueT =
            "<table class='table' cellpadding='5' cellpadding='1' cellspacing='1' border='1'>" +
            "<thead class='judul' style='color:black'>" +
            "<th style='text-align:center' width='5%'>No</th>" +
            "<th style='text-align:center' width='10%'>ID KOLOM</th>" +
            "<th style='text-align:center' width='10%'>IS PROSES</th>" +
            "<th style='text-align:center' width='10%'>IS DIGIT</th>" +
            "<th style='text-align:center' width='10%'>DIGIT</th>" +
            "<th style='text-align:center' width='20%'>METODE</th>" +
            "<th style='text-align:center' width='20%'>NILAI</th>" +
            "<th style='text-align:center' width='10%'>ATRIBUT</th>" +
            "</thead>";



    $.each(d.DETIL, function (i, value) {
        ret_valueT +=
                '<tbody>' +
                  '<tr>' +
                  '<td align="center">'+number+'</td>' +
                  '<td align="center">' + value.ID_KOLOM + '</td>' +
                  '<td align="center">' + value.IS_PROSES + '</td>' +
                  '<td align="center">' + value.IS_DIGIT + '</td>' +
                  '<td align="center">'+ value.DIGIT +'</td>'+
                  '<td align="center">'+ value.METODE +'</td>'+
                  '<td align="center">' + value.NILAI + '</td>' +
                  '<td align="center">' + value.ATRIBUT + '</td>' +
                  '</tr>' +
                  '</tbody>';   
        number++;
    });
    ret_valueT += "</table>";

    return ret_valueT;

}


function get_acuan_step(p_id_upload, p_is_paralel = null, p_step_ke){

    var combo_acuan = "";
    $.extend({
        xResponse: function () {
            
            $.ajax({
                url: BASE_URL+'admin/matching/get_acuan_step',
                data: {
                        p_id_upload: p_id_upload,
                        p_step_ke: p_step_ke,
                        p_is_paralel: p_is_paralel
                      },
                type: 'post',
                async: false,
                success: function (response) {
                    
                  data = JSON.parse(response);
                  combo_acuan = "<span class='acuan'>"+data[0].ACUAN_STEP+"</span>";
                  
                }
            });
            // Return the response text
            return combo_acuan;
        }
    });

    var xData = $.xResponse();


    return xData;
}

function init_pemadanan(){
    $('#list_step_pemadanan').loading();

    $.ajax({
            url: BASE_URL+'admin/matching/submit_init_pemadanan', // point to server-side controller method
            data: {
                    p_instansi_id : p_instansi_id,
                    p_step_ke : p_step_ke,
                    p_step_acuan : null,
                    p_is_paralel : p_is_paralel,
                    p_id_upload : p_id_upload_init
                  },
            type: 'post',
            success: function (response) {
                //get_upload_temp_tandingan();

                data = JSON.parse(response);
                //console.log(data);

                if(data.out_rowcount == 1){
                    $('#pesan_notifikasi').html("Berhasil Diproses.");
                }
                else{
                    $('#pesan_notifikasi').html(data.msgerror);
                }

                $('#modalNotif').modal('show');
                //$('#msg').html(response); // display success response from the server

                get_metode_pemadanan(p_id_upload_init);
                $('#list_step_pemadanan').loading('stop');
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });


}


function get_kolom_pemadanan_edit(id_upload, step_ke){

    


    $.ajax({
        url: BASE_URL+'admin/matching/get_kolom_pemadanan_upd', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        data : {p_id_upload : id_upload, p_step_ke : step_ke},
        type: 'post',
        success: function (response) {

            console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_kolom_pemadanan_edit tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          
                          '<td align="left">' + value.ID_KOLOM + '</td>' +
                          '<td align="center"><input type="checkbox" name="upd_is_matching_'+i+'" value="YA"/></td>' +

                          '<td align="center">'+
                            '<select class="form-control metode" id="upd_metode_'+i+'" onchange="aksi_metode_upd(\''+i+'\')">'+
                                '<option value="EM">Exact Match</option>'+
                                '<option value="JW">Jaro Winkler</option>'+
                                '<option value="ED">Edit Distance Similarity</option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<select class="form-control atribut" id="upd_atribut_'+i+'" >'+
                                '<option value="="> = </option>'+
                                '<option value=">="> >= </option>'+
                                '<option value=">"> > </option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<input type="text" class="form-control nilai" id="upd_nilai_'+i+'" value="100"/>'+
                          '</td>'+

                          '<td align="center">'+
                            '<input class="is_digit" type="checkbox"  name="upd_is_digit_'+i+'" value="YA"/>'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="text" class="form-control digit" id="upd_digit_'+i+'"/>'+
                          '</td>'+

                          '<td align="center" style="display:none">'+
                            '<input type="hidden" class="form-control step_ke" value="'+step_ke+'"/>'+
                          '</td>'+

                          '</tr>';
                $('#tabel_kolom_pemadanan_edit tbody').append(ret_valueT);

                var is_matching;
                var is_digit;
                if(value.IS_PROSES == 0){ is_matching = false; }else{ is_matching = true }
                if(value.IS_DIGIT == 0){ is_digit = false; }else{ is_digit = true }

                $('#upd_metode_'+i).val(value.METODE);
                $('#upd_atribut_'+i).val(value.ATRIBUT);
                $('#upd_nilai_'+i).val(value.NILAI);
                $('#upd_digit_'+i).val(value.DIGIT);
                $('input:checkbox[name=upd_is_matching_'+i+']').prop('checked', is_matching);
                $('input:checkbox[name=upd_is_digit_'+i+']').prop('checked', is_digit);
                
                
                
            });

            $('#modalEdit').modal('show');
            
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}


function get_all_kolom_value_upd(){

  var temp_id_upload = $('input[name="pilih_main"]:checked').val();
  var fields = temp_id_upload.split(',');
  var id_upload = fields[0];
  var instansi = fields[1];

  var list_pemadanan = [];

  $("#tabel_kolom_pemadanan_edit tbody").find("tr").each(function (index) {

            var tempPemadanan = $(this).find('td').toArray();
            var id_kolom = $(tempPemadanan[0]).html();
            var metode = $(this).closest('tr').find('.metode').val();
            var atribut = $(this).closest('tr').find('.atribut').val();
            var nilai = $(this).closest('tr').find('.nilai').val();
            var step_ke = $(this).closest('tr').find('.step_ke').val();
            var temp_is_digit = $('input[name="upd_is_digit_'+index+'"]:checked').val();
            var temp_is_matching = $('input[name="upd_is_matching_'+index+'"]:checked').val();
            var digit = $(this).closest('tr').find('.digit').val();

            var is_digit;
            var is_matching;

            console.log("temp_is_matching : ", temp_is_matching);
            if(temp_is_digit == "YA"){
              is_digit = 1;
            }
            else{
              is_digit = 0;
            }

            if(temp_is_matching == "YA"){
              is_matching = 1;
            }
            else{
              is_matching = 0;
            }


            var material = {
                p_id_kolom: id_kolom,
                p_metode: metode,
                p_atribut: atribut,
                p_nilai: nilai,
                p_is_digit: is_digit,
                p_digit: digit,
                p_is_proses: is_matching,
                p_id_upload: id_upload,
                p_instansi_id: instansi,
                p_step_ke: step_ke

            };

            list_pemadanan.push(material);
            
            //console.log(list_pemadanan)

        });


        $.ajax({
            url: BASE_URL+'admin/matching/submit_metode_pemadanan_edit', // point to server-side controller method
            data: {data : JSON.stringify(list_pemadanan)},
            type: 'post',
            success: function (response) {
                //get_upload_temp_tandingan();

                data = JSON.parse(response);
                //console.log(data);

                if(data.out_rowcount == 1){
                    $('#pesan_notifikasi').html("Berhasil Disimpan.");
                }
                else{
                    $('#pesan_notifikasi').html(data.msgerror);
                }

                $('#modalNotif').modal('show');
                //$('#msg').html(response); // display success response from the server
                $('#loadingnya').loading('stop');
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

}

