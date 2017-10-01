
<div id="page-wrapper">

    <div class="row" id="form_main">

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color:black">
                    List Data User
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" id="loading">
                    <div class="form-group">
                        <a href="#" class="btn btn-info btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_user">
                        <thead>
                            <tr>
                                <th width="10%">NO</th>
                                <th width="15%">ID USER</th>
                                <th width="20">NAMA</th>
                                <th width="20%">TELP</th>
                                <th width="20%">EMAIL</th>
                                <th width="15%" class="text-center">AKSI</th>
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

<div class="row" id="ins_upd" style="display:none">

    <div class="col-lg-12">

        <div class="panel panel-info">
            <div class="panel-heading">
                Data User
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                

               <div class="row" >

                    <div class="col-lg-6">

                        <div class="panel panel-info">
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="loading">

                                <form role="form">

                                    <div class="form-group">
                                        <label>ID USER</label>
                                        <input type="text" class="form-control" name="p_user_id" id="p_user_id" />
                                    </div>
                                    <div class="form-group">
                                        <label>NAMA USER</label>
                                        <input type="text" class="form-control" name="p_nama_user" id="p_nama_user" />
                                    </div>
                                    <div class="form-group">
                                        <label>TELP</label>
                                        <input type="text" class="form-control" name="p_no_telp" id="p_no_telp" />
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="text" class="form-control" name="p_email" id="p_email" />
                                    </div>

                                    <div class="form-group">
                                        <label>GROUP AKSES</label>
                                        <select class="form-control select" data-live-search="true" id="p_id_group" name="p_id_group" width="100%">
                                            <?php 

                                            foreach ($group as $row  ) {
                                            //print_r ($row);
                                                echo "<option value='".$row->ID_GROUP."'>". $row->NAMA_GROUP."</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="statusnya">
                                        <label>STATUS : </label>

                                        <label class="radio-inline text-info">
                                            <input type="radio" name="p_disable_user" id="p_disable_user1" value="1" checked><i class="fa fa-check"></i> Aktif
                                        </label>
                                        <label class="radio-inline text-danger">
                                            <input type="radio" name="p_disable_user" id="p_disable_user0" value="0"><i class="fa fa-times"></i> Non Aktif
                                        </label>

                                    </div>



                                </form>
                            </div>

                        </div>

                    </div>


                    <div class="col-lg-6">

                        <div class="panel panel-info">
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body" id="loading">

                                <form role="form">

                                    <div class="form-group">
                                        <label>PASSWORD</label>
                                        <input type="password" class="form-control" name="p_passwd" id="p_passwd" />
                                    </div>
                                    <div class="form-group" id="div_conf">
                                        <label>CONFIRM PASSWORD</label>
                                        <input type="password" class="form-control" name="conf_p_passwd" id="conf_p_passwd" />
                                        <span id="span_conf"></span>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" class="form-control" name="p_file" id="p_file" />
                                        <input type="hidden" class="form-control" name="p_path_file" id="p_path_file" />

                                        

                                        
                                    </div>

                                    <div class="form-group">
                                        <center>
                                            <div style="height: 155px">
                                                 <img id="blah" src="#" alt="your image"  style="max-height: 100%" />
                                            </div>
                                        </center>

                                    </div>


                                </form>
                            </div>

                        </div>

                    </div>
                </div>    


            </div>

            <div class="panel-footer">
                
                <button type="button" class="btn btn-danger btn_kembali"><span class="fa fa-times"></span> Kembali</button>
                <a href="#" class="btn btn-success btn_submit pull-right"><span class="fa fa-check"></span> Submit</a>

            </div>
        </div>
    </div>    
</div>


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

        <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    var isValidPass = 0;
    $(document).ready(function() {

        function readURL(input) {
            if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }

            else{

                    
                     $('#blah').attr('src', "");
                    
                    
                    //reader.readAsDataURL(input.files[0]);

                }
        }
    
        $("#p_file").change(function(){
            readURL(this);
        });


        $(function () {
            $("#conf_p_passwd").change(function () {
                var password = $("#p_passwd").val();
                var confirmPassword = $("#conf_p_passwd").val();
                if (password != confirmPassword) {
                    $('#div_conf').removeClass('has-success has-feedback');
                    $('#div_conf').addClass('has-error has-feedback');
                    //span_conf

                    $('#span_conf').removeClass('glyphicon glyphicon-ok form-control-feedback');
                    $('#span_conf').addClass('glyphicon glyphicon-remove form-control-feedback');
                    isValidPass = 0;

                }
                else{
                    $('#div_conf').removeClass('has-error has-feedback');
                    $('#div_conf').addClass('has-success has-feedback');

                    $('#span_conf').removeClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#span_conf').addClass('glyphicon glyphicon-ok form-control-feedback');
                    isValidPass = 1;
                }

                console.log("isValidPass : ", isValidPass);
                return true;
            });
        });


        $('#tabel_user').DataTable({
            responsive: true
        });

        get_mst_user();

        $('.btn_tambah').on('click', function () {

            reset_form();

            $('#judul_modal').html('Insert Data Instansi');

            $('#form_main').hide('slow');
            $('#ins_upd').show('slow');
            $('#mode').val("ins");

            $('#statusnya').hide('fast');




        });

        $('.btn_submit').on('click', function () {
            submit_upload();
        });

        $('.btn_kembali').on('click', function () {
            $('#ins_upd').hide('slow');
            $('#form_main').show('slow');
            $('#mode').val("");
        });

        
        
        
    });


    var parseQueryString = function (querystring) {
        var qsObj = new Object();
        if (querystring) {
            var parts = querystring.replace(/\?/, "").split("&");
            var up = function (k, v) {
                var a = qsObj[k];
                if (typeof a == "undefined") {
                    qsObj[k] = [v];
                }
                else if (a instanceof Array) {
                    a.push(v);
                }
            };
            for (var i in parts) {
                var part = parts[i];
                var kv = part.split('=');
                if (kv.length == 1) {
                    var v = decodeURIComponent(kv[0] || "");
                    up(null, v);
                }
                else if (kv.length > 1) {
                    var k = decodeURIComponent(kv[0] || "");
                    var v = decodeURIComponent(kv[1] || "");
                    up(k, v);
                }
            }
        }
        return qsObj;
    };



    function get_param(mode, data){

        var qsObj = parseQueryString(data);
        
        

        var id_user = qsObj.ID_USER[0].replace(/\+/g, " ");
        var nama_user = qsObj.NAMA_USER[0].replace(/\+/g, " ");
        var telp = qsObj.NO_TELP[0].replace(/\+/g, " ");
        var email = qsObj.EMAIL[0].replace(/\+/g, " ");
        var path = qsObj.PATH_FILE[0].replace(/\+/g, " ");

        //console.log(res);
        if(mode == "upd"){

            $('#p_user_id').val(id_user);
            $('#p_nama_user').val(nama_user);
            $('#p_no_telp').val(telp);
            $('#p_email').val(email);
            $('#p_id_group').val(ket);
            $('#p_disable_user').prop('checked',true);
            $('#mode').val("upd");
            $('#p_path_file').val(path);

            $('#judul_modal').html('Update Data User');
            $('#statusnya').show('slow');

            $('#modal_insert').modal('show'); 
        }
        
    }

    

    function get_mst_user(){
        $('#loading').loading();
        $("#tabel_user").dataTable().fnDestroy();
        $.ajax({
            url: BASE_URL+'admin/user/get_mst_user', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                //console.log(response);
                data = JSON.parse(response);
                
                var number = 1;

                $('#tabel_user tbody').empty();
                $.each(data, function (i, value) {
                    
                    var ret_valueT =
                    '<tr>' +
                    '<td align="center">' + number + '</td>' +
                    '<td align="center">' + value.USER_ID + '</td>' +
                    '<td align="left">' + value.NAMA_USER + '</td>' +
                    '<td align="left">' + value.NO_TELP + '</td>' +
                    '<td align="center">' + value.EMAIL + '</td>' +
                    '<td align="center">'+
                        '<a href="#" class="btn btn-success btn-xs btn_update" onclick="get_by_user_id(\''+value.USER_ID+'\')"><span class="fa fa-pencil"></span> Edit</a>'+
                    '</td>'+
                    '</tr>';
                    $('#tabel_user tbody').append(ret_valueT);

                    number++;
                });
                $("#tabel_user").dataTable();
                

                $('#loading').loading('stop');


            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loading').loading('stop');
            }
        });



    }


    function get_by_user_id(id){


        $.ajax({
            url: BASE_URL+'admin/user/get_user_by_id', // point to server-side controller method
            data: {p_user_id : id},
            type: 'post',
            success: function (response) {

                
                data = JSON.parse(response);
                //console.log(data);

                $('#p_user_id').val(data[0].USER_ID);

                $('#p_user_id').prop('readonly',true);

                $('#p_nama_user').val(data[0].NAMA_USER);
                $('#p_no_telp').val(data[0].NO_TELP);
                $('#p_email').val(data[0].EMAIL);
                $('#p_id_group').val(data[0].ID_GROUP);
                $('#p_disable_user'+data[0].DISABLE_USER).prop('checked',true);
                $('#mode').val("upd");
                $('#p_path_file').val(data[0].PATH_FILE);

                //$('#judul_modal').html('Update Data User');
                $('#statusnya').show('slow');

                $('#form_main').hide('slow');
                $('#ins_upd').show('slow');
                $('#mode').val("upd");
                

            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loading').loading('stop');
            }
        });



    }

    function submit_upload(){

        var id_user = $('#p_user_id').val();
        var nama_user = $('#p_nama_user').val();
        var no_telp = $('#p_no_telp').val();
        var email = $('#p_email').val();
        var id_group = $('#p_id_group').val();
        var status = $('input[name="p_disable_user"]:checked').val();
        var mode = $('#mode').val();
        var pass = $('#conf_p_passwd').val();
        var path_file = $('#p_path_file').val();
        var file_data = $('#p_file').prop('files')[0];

        if(id_group == null){
            id_group = $("#p_id_group option:first").prop("selected", "selected").val();
        }


        var form_data = new FormData();
        form_data.append('files', file_data);
        form_data.append('p_user_id', id_user);
        form_data.append('p_nama_user', nama_user);
        form_data.append('p_no_telp', no_telp);
        form_data.append('p_email', email);
        form_data.append('p_passwd', pass);
        form_data.append('p_id_group', id_group);
        form_data.append('p_disable_user', status);
        form_data.append('p_path_file', path_file);
        form_data.append('mode', mode);

        //console.log(id_group);

        if(isValidPass == 0){

            $('#pesan_notifikasi').html("Confirm Password Tidak Valid. Pastikan Anda Mengisi Dengan Benar.");
            $('#modalNotif').modal('show');

        }
        else{

            $.ajax({
                url: BASE_URL+'admin/user/upload_user', // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                    data = JSON.parse(response);
                    //console.log(data);

                    if(data.out_rowcount == 1){
                        $('#pesan_notifikasi').html("Berhasil Disubmit.");
                    }
                    else{
                        $('#pesan_notifikasi').html(data.msgerror);
                    }

                    $('#modalNotif').modal('show');
                    //$('#msg').html(response); // display success response from the server
                    $('#loadingnya').loading('stop');

                    get_mst_user();

                    $('#ins_upd').hide('slow');
                    $('#form_main').show('slow');
                    $('#mode').val("");
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the server
                }
            });


        }


        

    }



    function reset_form(){

        $('#p_user_id').prop('readonly',false);

        $('#p_passwd').val("");
        $('#conf_p_passwd').val("");

        $('#p_user_id').val("");
        $('#p_nama_user').val("");
        $('#p_no_telp').val("");
        $('#p_email').val("");
        $('#p_id_group').val("");
        $('#input[name="p_disable_user"]').val("");
        $('#p_path_file').val("");
        $('#p_file').val("");
        $('#blah').attr('src', "");

    }

</script>