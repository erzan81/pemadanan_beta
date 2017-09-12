
<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Data Instansi
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" id="loading">
                    <div class="form-group">
                        <a href="#" class="btn btn-info btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>
                   
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_instansi">
                        <thead>
                            <tr>
                                <th width="7%">ID</th>
                                <th width="10%">NAMA INSTANSI</th>
                                <th width="20">ALAMAT</th>
                                <th width="13%">TELP</th>
                                <th width="20%">KETERANGAN</th>
                                <th width="10%">STATUS</th>
                                <th style="display: none">STATUS</th>
                                <th width="10%" class="text-center">AKSI</th>
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
<input type="text" name="mode" id="mode" >
<div class="modal fade" id="modal_insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="judul_modal">Insert Data</h3>
            </div>

            <div class="modal-body" >
                    
                    <div class="row" id="ins_upd">

                        <div class="col-lg-12">
                            <form role="form">

                                <div class="form-group">
                                    <label>ID INSTANSI</label>
                                    <input type="text" class="form-control" name="p_id_instansi" id="p_id_instansi" readonly="readonly" placeholder="Generated By System" />
                                </div>
                                <div class="form-group">
                                    <label>NAMA INSTANSI</label>
                                    <input type="text" class="form-control" name="p_nama_instansi" id="p_nama_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>ALAMAT INSTANSI</label>
                                    <input type="text" class="form-control" name="p_alamat_instansi" id="p_alamat_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>TELP INSTANSI</label>
                                    <input type="text" class="form-control" name="p_telp_instansi" id="p_telp_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>KETERANGAN</label>
                                    <input type="text" class="form-control" name="p_ket_instansi" id="p_ket_instansi" />
                                </div>
                                <div class="form-group" id="statusnya" style="display:none">
                                    <label>STATUS : </label>
                                    
                                    <label class="radio-inline text-info">
                                        <input type="radio" name="p_status" id="p_status1" value="1" checked><i class="fa fa-check"></i> Aktif
                                    </label>
                                    <label class="radio-inline text-danger">
                                        <input type="radio" name="p_status" id="p_status0" value="0"><i class="fa fa-times"></i> Non Aktif
                                    </label>

                                </div>
                                
                                
                            </form>
                        </div>
                    
                    </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-check"></span> Submit</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Delete </h3></center>
        </div>
        
        <div class="modal-body" >
            <div id="del">  
                <center>
                    <p>Apakah Anda Yakin Akan Menghapus <b id="instansi_msg"></b> ?</p>
                </center>
            </div>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modalNotif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Informasi </h3></center>
        </div>
        
        <div class="modal-body" >
            <center><p id="pesan_notifikasi"></p></center>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#tabel_instansi').DataTable({
            responsive: true
        });

        get_main_instansi();

        $('.btn_tambah').on('click', function () {

            $('#judul_modal').html('Insert Data Instansi');

            $('#del').hide('slow');
            $('#ins_upd').show('slow');
            $('#mode').val("ins");

            $('#modal_insert').modal('show');
            $('#statusnya').hide('fast');



        });

        
    });


    function get_param(mode){

        var table = $('#tabel_instansi').DataTable();
        
        if(mode == "upd"){

            $('#tabel_instansi tbody').on( 'click', 'tr','.btn_update' , function () {
                console.log(this);
                var data = table.row( this ).data();
                $('#p_id_instansi').val(data[0]);
                $('#p_nama_instansi').val(data[1]);
                $('#p_alamat_instansi').val(data[2]);
                $('#p_telp_instansi').val(data[3]);
                $('#p_ket_instansi').val(data[4]);
                $('#p_status'+data[6]).prop('checked',true);

                $('#judul_modal').html('Update Data Instansi');
                $('#statusnya').show('slow');
            

                $('#mode').val("upd");

                $('#modal_insert').modal('show');

            } );

        }
        else{

            $('#tabel_instansi tbody').on( 'click', 'tr', '.btn_delete' , function () {
                var data = table.row( this ).data();
                $('#instansi_msg').html(data[1]);

                $('#p_id_instansi').val(data[0]);
                $('#p_nama_instansi').val(data[1]);
                $('#p_alamat_instansi').val(data[2]);
                $('#p_telp_instansi').val(data[3]);
                $('#p_ket_instansi').val(data[4]);
                $('#p_status'+data[6]).prop('checked',true);

                $('#judul_modal').html('Delete Data Instansi');
                

                $('#mode').val("del");
                
                $('#modal_delete').modal('show');

            });

        }

        

        

    }


    function get_param(mode){

        $(".btn_update").click(function (e) {
                e.preventDefault();
                var tds = $(this).closest('tr').children('td');

                console.log(tds[0].innerHTML);
                $('#p_id_instansi').val(tds[0].innerHTML);
                $('#p_nama_instansi').val(tds[1].innerHTML);
                $('#p_alamat_instansi').val(tds[2].innerHTML);
                $('#p_telp_instansi').val(tds[3].innerHTML);
                $('#p_ket_instansi').val(tds[4].innerHTML);
                $('#p_status'+tds[6].innerHTML).prop('checked',true);
                $('#mode').val("upd");

                $('#judul_modal').html('Update Data Instansi');
                $('#statusnya').show('slow');
        
        });

        //console.log(tds[0].innerHTML)

        if(mode == "upd"){
           $('#modal_insert').modal('show'); 
        }
        else{
           $('#modal_delete').modal('show');
        }
    }

    function initTableListener() {
            
            $(".btn_update").click(function (e) {
                e.preventDefault();
                var tds = $(this).closest('tr').children('td');

                $('#p_id_instansi').val(tds[0].innerHTML);
                $('#p_nama_instansi').val(tds[1].innerHTML);
                $('#p_alamat_instansi').val(tds[2].innerHTML);
                $('#p_telp_instansi').val(tds[3].innerHTML);
                $('#p_ket_instansi').val(tds[4].innerHTML);
                $('#p_status'+tds[6].innerHTML).prop('checked',true);
                $('#mode').val("upd");

                $('#judul_modal').html('Update Data Instansi');
                $('#statusnya').show('slow');
        
                $('#modal_insert').modal('show');
                
            });

            $(".btn_delete").click(function (e) {
                e.preventDefault();
                var tds = $(this).closest('tr').children('td');
                
                $('#p_id_instansi').val(tds[0].innerHTML);
                $('#p_nama_instansi').val(tds[1].innerHTML);
                $('#p_alamat_instansi').val(tds[2].innerHTML);
                $('#p_telp_instansi').val(tds[3].innerHTML);
                $('#p_ket_instansi').val(tds[4].innerHTML);
                $('#p_status'+tds[6].innerHTML).prop('checked',true);
                $('#mode').val("del");
        
                $('#modal_delete').modal('show');
                
            });
        }

    function get_main_instansi(){
        $('#loading').loading();
        $("#tabel_instansi").dataTable().fnDestroy();
        $.ajax({
            url: BASE_URL+'admin/instansi/get_main_instansi', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                //console.log(response);
                data = JSON.parse(response);
                
                $('#tabel_instansi tbody').empty();
                $.each(data, function (i, value) {
                    var status = "";
                    var temp_status;
                    if(value.STATUS == "AKTIF"){
                        status ='<span class="label label-info">' + value.STATUS + '</span>';
                        temp_status = 1;
                    }
                    else{

                        status ='<span class="label label-danger">' + value.STATUS + '</span>';
                        temp_status = 0;
                    }

                    var ret_valueT =
                              '<tr>' +
                              '<td align="center">' + value.INSTANSI_ID + '</td>' +
                              '<td align="left">' + value.INSTANSI_NAMA + '</td>' +
                              '<td align="left">' + value.INSTANSI_ALAMAT + '</td>' +
                              '<td align="center">' + value.INSTANSI_TELP + '</td>' +
                              '<td align="left">' + value.INSTANSI_KET + '</td>' +
                              '<td align="center">'+status+'</td>' +
                              '<td align="center" style="display:none">'+temp_status+'</td>' +
                              '<td align="center">'+
                                '<a href="#" class="btn btn-success btn-xs btn_update" onclick="get_param(\'upd\')"><span class="fa fa-pencil"></span></a>'+
                                ' <a href="#" class="btn btn-danger btn-xs btn_delete" onclick="get_param(\'del\')"><span class="fa fa-trash-o"></span></a>'+
                              '</tr>';
                    $('#tabel_instansi tbody').append(ret_valueT);
                });
                $("#tabel_instansi").dataTable();
                
                // $(".btn_update").click(function (e) {
                // e.preventDefault();
                    //var tds = $(".btn_update").closest('tr').children('td');
                    //console.log(tds[0].innerHTML)

                //     $('#p_id_instansi').val(tds[0].innerHTML);
                //     $('#p_nama_instansi').val(tds[1].innerHTML);
                //     $('#p_alamat_instansi').val(tds[2].innerHTML);
                //     $('#p_telp_instansi').val(tds[3].innerHTML);
                //     $('#p_ket_instansi').val(tds[4].innerHTML);
                //     $('#p_status'+tds[6].innerHTML).prop('checked',true);
                //     $('#mode').val("upd");

                //     $('#judul_modal').html('Update Data Instansi');
                //     $('#statusnya').show('slow');
            
                //     $('#modal_insert').modal('show');
                    
                // });
                //initTableListener();

                $('#loading').loading('stop');

            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loading').loading('stop');
            }
        });



    }
</script>