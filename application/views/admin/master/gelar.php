
<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    List Data Gelar
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>
                   
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_element">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="70%">GELAR</th>
                                <th width="20%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<input type="hidden" name="mode" id="mode" >
<div class="modal fade" id="modal_insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="judul_modal">Insert Data</h3>
            </div>

            <div class="modal-body" >
                
                    <div class="row">

                        <div class="col-lg-12">
                            <form role="form">

                                <div class="form-group">
                                    <label>GELAR</label>
                                    <input type="text" class="form-control" name="p_gelar" id="p_gelar" />
                                </div>
                                
                                
                            </form>
                        </div>
                    
                    </div>
                
            </div>

            <div class="modal-footer">
                <a href="#"  class="btn btn-success btn_submit_instansi" data-dismiss="modal" ><span class="fa fa-check"></span> Submit</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Delete Data</h3>
            </div>

            <div class="modal-body" >
                
                <center>
                    <p>Apakah Anda Yakin Akan Menghapus <strong id="instansi_msg"></strong> ?</p>
                </center>
                
            </div>

            <div class="modal-footer">
                <a href="#"  class="btn btn-success btn_submit_instansi" data-dismiss="modal" ><span class="fa fa-check"></span> Submit</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabel_element').DataTable({
            responsive: true
        });

        get_main_element();

        $('.btn_tambah').on('click', function () {

            reset_form();

            $('#modal_insert').modal('show');

        });

        $('.btn_submit_instansi').on('click', function () {
            submit();
        });

        
    });

    function get_main_element(){
        $('#loading').loading();
        $("#tabel_element").dataTable().fnDestroy();
        $.ajax({
            url: BASE_URL+'admin/gelar/get_main_gelar', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                //console.log(response);
                data = JSON.parse(response);
                
                $('#tabel_element tbody').empty();
                var number = 1;
                $.each(data, function (i, value) {
                    

                    var ret_valueT =
                              '<tr>' +
                              '<td align="center">' + number + '</td>' +
                              '<td align="left">' + value.GELAR + '</td>' +
                              '<td align="center">'+
                                '<a href="#" class="btn btn-success btn-xs btn_update" onclick="get_param(\'upd\', \''+value.GELAR+'\')"><span class="fa fa-pencil"></span></a>'+
                                ' <a href="#" class="btn btn-danger btn-xs btn_delete" onclick="get_param(\'del\', \''+value.GELAR+'\')"><span class="fa fa-trash-o"></span></a>'+
                              '</tr>';
                    $('#tabel_element tbody').append(ret_valueT);

                    number++;
                });
                $("#tabel_element").dataTable();
                

                $('#loading').loading('stop');

            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loading').loading('stop');
            }
        });



    }

    function get_param(mode,param){

        var table = $('#tabel_element').DataTable();
        
        if(mode == "upd"){
            
                $('#p_gelar').val(param);
                $('#judul_modal').html('Update Data Gelar');
                $('#mode').val("upd");
                $('#modal_insert').modal('show'); 
        }
        else{

                $('#instansi_msg').html(param);   
                $('#p_gelar').val(param);                
                $('#mode').val("del");
                $('#modal_delete').modal('show');

        }
  

    }


    function submit(){

        var p_gelar = $('#p_gelar').val();    
        var mode = $('#mode').val();

        $.ajax({
            url: BASE_URL+'admin/gelar/submit', // point to server-side controller method
            data: {
                    p_gelar : p_gelar,
                    mode : mode

                  },
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

                get_main_element();
            },
            error: function (response) {
                $('#msg').html(response); // display error response from the server
            }
        });

    }

    function reset_form(){

        $('#p_gelar').val("");

    }
</script>