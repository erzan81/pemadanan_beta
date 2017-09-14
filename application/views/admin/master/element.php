
<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    List Data Element
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
                                <th width="25%">TYPE</th>
                                <th width="25%">SIZE</th>
                                <th width="30%">KETERANGAN</th>
                                <th width="10%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeA">
                                <td>1</td>
                                <td>VARCHAR</td>
                                <td>255</td>
                                <td>A</td>
                                <td align="center">
                                    <a href="#" class="btn btn-success btn-xs btn_update"><span class="fa fa-pencil"></span></a>
                                    <a href="#" class="btn btn-danger btn-xs btn_delete"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>

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
                                    <label>ID ELEMENT</label>
                                    <input type="text" class="form-control" name="p_id_element" id="p_id_element" />
                                </div>
                                <div class="form-group">
                                    <label>TYPE ELEMENT</label>
                                    <input type="text" class="form-control" name="p_type_element" id="p_type_element" />
                                </div>
                                <div class="form-group">
                                    <label>SIZE ELEMENT</label>
                                    <input type="text" class="form-control" name="p_size_element" id="p_size_element" />
                                </div>
                                <div class="form-group">
                                    <label>KETERANGAN</label>
                                    <input type="text" class="form-control" name="p_keterangan" id="p_keterangan" />
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
            url: BASE_URL+'admin/element/get_main_element', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                //console.log(response);
                data = JSON.parse(response);
                
                $('#tabel_element tbody').empty();
                $.each(data, function (i, value) {
                    

                    var ret_valueT =
                              '<tr>' +
                              '<td align="left">' + value.ID_ELEMENT+ '</td>' +
                              '<td align="center">' + value.TIPE_KOLOM + '</td>' +
                              '<td align="center">' + value.SIZE_KOLOM + '</td>' +
                              '<td align="center">-</td>' +
                              '<td align="center">'+
                                '<a href="#" class="btn btn-success btn-xs btn_update" onclick="get_param(\'upd\')"><span class="fa fa-pencil"></span></a>'+
                                ' <a href="#" class="btn btn-danger btn-xs btn_delete" onclick="get_param(\'del\')"><span class="fa fa-trash-o"></span></a>'+
                              '</tr>';
                    $('#tabel_element tbody').append(ret_valueT);
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

    function get_param(mode){

        var table = $('#tabel_element').DataTable();
        
        if(mode == "upd"){

            $('#tabel_element tbody').on( 'click', 'tr','.btn_update' , function () {
                console.log(this);
                var data = table.row( this ).data();
                $('#p_id_element').val(data[0]);
                $('#p_type_element').val(data[1]);
                $('#p_size_element').val(data[2]);
                $('#p_keterangan').val(data[3]);
                

                $('#judul_modal').html('Update Data Instansi');
            

                $('#mode').val("upd");

                $('#modal_insert').modal('show');

            } );

        }
        else{

            $('#tabel_element tbody').on( 'click', 'tr', '.btn_delete' , function () {
                var data = table.row( this ).data();
                $('#instansi_msg').html(data[0]);

                $('#p_id_element').val(data[0]);
                $('#p_type_element').val(data[1]);
                $('#p_size_element').val(data[2]);
                $('#p_keterangan').val(data[3]);

                //$('#judul_modal').html('Delete Data Instansi');
                

                $('#mode').val("del");
                
                $('#modal_delete').modal('show');

            });

        }
  

    }


    function submit(){

        var p_id_element = $('#p_id_element').val();
        var p_type_element = $('#p_type_element').val();
        var p_size_element = $('#p_size_element').val();
        var p_keterangan = $('#p_keterangan').val();

        
        var mode = $('#mode').val();

        $.ajax({
            url: BASE_URL+'admin/element/submit', // point to server-side controller method
            data: {
                    p_id_element : p_id_element,
                    p_type_kolom : p_type_kolom,
                    p_size_kolom : p_size_kolom,
                    p_keterangan : p_keterangan,
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

        $('#p_id_element').val("");
        $('#p_type_element').val("");
        $('#p_size_element').val("");
        $('#p_keterangan').val("");

    }
</script>