$(document).ready(function() {

	

});

function get_main_temp(){

    $("#tabel_instansi").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/verifikasi/get_temp_main', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            //console.log(response);
            data = JSON.parse(response);
            
            $('#tabel_instansi tbody').empty();
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center">' + value.NAMA_INSTANSI + '</td>' +
                          '<td align="center">' + value.INSTANSI_ID + '</td>' +
                          '<td align="center">' + value.ID_UPLOAD + '</td>' +
                          '<td align="left">' + value.KEGIATAN + '</td>' +
                          '<td align="center">'+
                            '<a href="#" class="btn btn-success btn-xs btn_update"><span class="fa fa-pencil"></span></a>'+
                            '<a href="#" class="btn btn-danger btn-xs btn_delete"><span class="fa fa-trash-o"></span></a>'+
                          '</td>'+
                          '</tr>';
                $('#tabel_instansi tbody').append(ret_valueT);

                
            });
            $("#tabel_instansi").dataTable();
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}