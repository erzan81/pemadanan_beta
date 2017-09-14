
var table_jancuk;

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
                          '<td align="center">' + value.UPLOAD_KE + '</td>' +
                          '<td align="center">' + value.NAMA_FILE + '</td>' +
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
                          '<td align="center">' + value.NAMA_INSTANSI + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="center">' + value.UPLOAD_KE + '</td>' +
                          '<td align="center">' + value.NAMA_FILE + '</td>' +
                          '<td align="center">' + value.CREATE_DATE + '</td>' +
                          '<td class="text-center"><input type="radio" name="pilih_proses" value="'+value.ID_UPLOAD+','+value.INSTANSI_ID+'" onclick="get_kolom_pemadanan(\''+value.ID_UPLOAD+'\')" style="width:25px; height:25px;" /></td>'+
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
    $('#table_acuan_step tbody').empty();
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

                    var get_acuan = get_acuan_step(full.ID_UPLOAD, null, full.STEP_KE);
                    
                    return get_acuan;
                }
            },

            {
                "aTargets": [5],
                "sClass": "text-center",
                "mRender": function (data, type, full) {
                    //console.log("full : ",full);

                    var status = full.STATUS;
                    
                    return status;
                }
            },

            {
                "aTargets": [6],
                "sClass": "text-center",
                "mRender": function (data, type, full) {
                    //console.log("full : ",full);
                    if(full.FLAG_TOMBOL == 0){
                      var vProses = '<a href="#" class="btn btn-info">Proses</a>';
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
            {"data": "STEP_KE", "defaultContent": ""},
            {"data": "NAMA_INSTANSI", "defaultContent": ""},
            {"data": "ID_UPLOAD", "defaultContent": ""}
        ],
        "drawCallback": function () {
            $('th').removeClass('sorting_asc');
            //initDataTableInformasiPengadaan();
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
                  combo_acuan = "<select class='form-control'>";
                  
                  $.each(data, function (i, value) {
                      combo_acuan += '<option value= "'+value.ACUAN_STEP+'"> '+ value.ACUAN_STEP +' </option>';

                  });
                  combo_acuan += '</select>';


                }
            });
            // Return the response text
            return combo_acuan;
        }
    });

    var xData = $.xResponse();


    return xData;
}
