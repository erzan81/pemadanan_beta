$(document).ready(function() {

	

});

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
                          
                          '<td align="center">' + value.ID_KOLOM + '</td>' +
                          '<td align="center"><input type="checkbox" class="radio" name="pilih_lanjutan" value=""/></td>' +

                          '<td align="center">'+
                            '<select class="form-control">'+
                                '<option>Metode 1</option>'+
                                '<option>Metode 2</option>'+
                                '<option>Metode 3</option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<select class="form-control">'+
                                '<option> > </option>'+
                                '<option> < </option>'+
                                '<option> = </option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<input type="text" class="form-control" />'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="checkbox" class="form-control" />'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="text" class="form-control" />'+
                          '</td>'+

                          '</tr>';
                $('#tabel_kolom_pemadanan tbody').append(ret_valueT);

                
            });
            
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}