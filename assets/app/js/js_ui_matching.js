$(document).ready(function() {

    get_data_final();

    $('#btn_proses_kolom').on('click', function () {

         get_all_kolom_value();

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
                          '<td align="center"><input type="radio" class="radio" name="pilih_main" value="'+value.ID_UPLOAD+','+value.INSTANSI_ID+'" onclick="get_kolom_pemadanan(\''+value.ID_UPLOAD+'\')" style="width:25px; height:25px;" /></td>'+
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
                          '<td align="center"><input type="checkbox" class="radio" name="is_matching_'+i+'" value="YA"/></td>' +

                          '<td align="center">'+
                            '<select class="form-control metode" id="metode_'+i+'" onchange="aksi_metode(\''+i+'\')">'+
                                '<option value="EM">Exact Match</option>'+
                                '<option value="JW">Jaro Winkler</option>'+
                                '<option value="ED">Edit Distance Similarity</option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<select class="form-control atribut" id="atribut_'+i+'">'+
                                '<option value="="> = </option>'+
                                '<option value=">=" > >= </option>'+
                                '<option value=">"> > </option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<input type="text" class="form-control nilai" id="nilai_'+i+'"/>'+
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

            $save['p_instansi_id'] = $key['p_instansi_id'];
            $save['p_id_upload'] = $key['p_id_upload'];
            

            
            $save['p_create_by'] = $key['p_create_by'];;

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


                        //dilengkapi
            };
            // if (typeof (noItem) !== "undefined" && noItem !== null) {
            //     listItem.push(material);
            // }
            console.log("list : ", material);

        });

}




