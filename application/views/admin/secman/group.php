<script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/jstree/dist/jstree.min.js"></script>
<div id="page-wrapper">

    <div class="row" id="form_main">

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="color:black">
                    List Data Group Akses
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" id="loading">
                    <div class="form-group">
                        <a href="#" class="btn btn-info btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>

                    

                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_group">
                        <thead>
                            <tr>
                                <th width="10%">NO</th>
                                <th width="15%">ID GROUP</th>
                                <th width="30">NAMA GROUP</th>
                                <th width="20%">CREATED DATE</th>
                                <th width="15%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                

                            ?>
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

<div class="row" id="ins_upd" style="display: none">

    <div class="col-lg-12">

        <div class="panel panel-info">
            <div class="panel-heading">
                Data Group Akses
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <form role="form">

                    <div class="form-group">
                        <label>ID GROUP</label>
                        <input type="text" class="form-control" name="p_id_group" id="p_id_group" />
                    </div>
                    <div class="form-group">
                        <label>NAMA GROUP</label>
                        <input type="text" class="form-control" name="p_nama_group" id="p_nama_group" />
                    </div>
                    

                    <div class="form-group">
                        <label>MENU AKSES</label>
                        <div id="menu_tab"></div>
                    </div>

                </form>
                           
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


<script type="text/javascript">

$(document).ready(function() {

    get_ms_group();

    $('.btn_tambah').on('click', function () {

            //reset_form();
            $('#form_main').hide('slow');
            $('#ins_upd').show('slow');
            $('#mode').val("ins");

            getMenu();

        });

    $('.btn_kembali').on('click', function () {

            //reset_form();
            $('#ins_upd').hide('slow');
            $('#form_main').show('slow');
            
            $('#mode').val("");

        });

    $('.btn_submit').on('click', function () {

            var getRole =  getCheckRoleMenu();
            var id_group = $('#p_id_group').val();
            var nama_group = $('#p_nama_group').val();
            var mode = $('#mode').val();

            $.ajax({
                url: BASE_URL+'admin/group/submit', // point to server-side controller method
                data: {
                       menu : getRole,
                       id_group : id_group,
                       nama_group : nama_group,
                       mode : mode
                   },
                type: 'post',
                success: function (response) {
                    //console.log(response);
                    var data = JSON.parse(response);

                    if(data.out_rowcount == 1){
                        $('#pesan_notifikasi').html("Group Berhasil Ditambahkan.");
                    }
                    else{
                        $('#pesan_notifikasi').html(data.msgerror);
                    }

                    //$('#loadingnya').loading('stop');

                    $('#modalNotif').modal('show');
                    get_ms_group();
                    
                },
                error: function (response) {
                    console.log(response); // display error response from the server
                    //$('#loadingnya').loading('stop');
                }
            });

            console.log(getRole);

    });

    function getCheckRoleMenu(){
        var arr_selected = $('#menu_tab').jstree("get_selected");
        var arr_undetermined = [];
        $("#menu_tab").find(".jstree-undetermined").each(function (i, element) {
            arr_undetermined.push($(element).closest('.jstree-node').attr("id"));
            //arr_undetermined.push($(element).attr("id"));
        });       
        //tambah selected + undetermined
        arr_selected.push.apply(arr_selected, arr_undetermined);
        //console.log(arr_selected);
        return arr_selected;
    }

});
    
function getMenu(){
    $("#menu_tab").jstree("destroy");
    //waitingDialog.show('Loading.....');
    $.ajax({
        type: "POST",
        url: BASE_URL+'admin/group/get_menu_tab',
       
        success: function (response) {  
            //waitingDialog.hide();
            var obj = JSON.parse(response);
            
            //console.log(obj);
            $('#menu_tab').jstree({ 
            plugins : ["checkbox","sort","types","wholerow"], 
            "types" : { "file" : { "icon" : "jstree-file" } },
            'core' : {
                'data' : obj
            }});

        },
        fail: function () {
            //waitingDialog.hide();
        }
    });
    
}

function getMenuByIdGroup(id_group){
    $("#menu_tab").jstree("destroy");
    //waitingDialog.show('Loading.....');
    $.ajax({
        type: "POST",
        url: BASE_URL+'admin/group/coba',
        data: {id_group : id_group},
       
        success: function (response) {  
            //waitingDialog.hide();
            var obj = JSON.parse(response);
            
            console.log(obj);
            $('#menu_tab').jstree({ 
                plugins : ["checkbox","sort","types","wholerow"], 
                "types" : { "file" : { "icon" : "jstree-file" } },
                'core' : {
                    'data' : obj
                },
                'checkbox': {
                      three_state: true
                }
            });

        },
        fail: function () {
            //waitingDialog.hide();
        }
    });
    
}

function get_ms_group(){

    $("#tabel_group").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/group/get_mst_group', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            data = JSON.parse(response);

            $('#tabel_group tbody').empty();

            var number = 1;
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center" width="7%">' + number + '</td>' +
                          '<td align="left" width="15%">' + value.ID_GROUP + '</td>' +
                          '<td align="left" width="30%">' + value.NAMA_GROUP + '</td>' +
                          '<td align="center" width="20%">' + value.CREATE_DATE + '</td>' +
                          '<td align="center" width="8%"><a href="#" class="btn btn-info btn-xs btn_edit" data-group="'+value.ID_GROUP+'"><span class="fa fa-search"></span> Detail</a></td>'+
                          '</tr>';
                $('#tabel_group tbody').append(ret_valueT);

                number++;
            });
            $("#tabel_group").dataTable();

            $('.btn_edit').on('click', function () {

                //reset_form();
                $('#form_main').hide('slow');
                $('#ins_upd').show('slow');
                $('#mode').val("upd");
                $('.btn_submit').hide();

                var id_group = $(this).data("group");

                getMenuByIdGroup(id_group);

            });
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}

function get_ms_group_detil(){

    $("#tabel_group").dataTable().fnDestroy();
    $.ajax({
        url: BASE_URL+'admin/group/get_mst_group', // point to server-side controller method
        dataType: 'text', // what to expect back from the server
        type: 'post',
        success: function (response) {

            data = JSON.parse(response);

            $('#tabel_group tbody').empty();

            var number = 1;
            $.each(data, function (i, value) {
                var ret_valueT =
                          '<tr>' +
                          '<td align="center" width="7%">' + number + '</td>' +
                          '<td align="left" width="15%">' + value.ID_GROUP + '</td>' +
                          '<td align="left" width="30%">' + value.NAMA_GROUP + '</td>' +
                          '<td align="center" width="20%">' + value.CREATE_DATE + '</td>' +
                          '<td align="center" width="8%"><a href="#" class="btn btn-info btn-xs btn_edit"><span class="fa fa-search"></span> Detail</a></td>'+
                          '</tr>';
                $('#tabel_group tbody').append(ret_valueT);

                number++;
            });
            $("#tabel_group").dataTable();

            $('.btn_edit').on('click', function () {

                //reset_form();
                $('#form_main').hide('slow');
                $('#ins_upd').show('slow');
                $('#mode').val("upd");
                $('.btn_submit').hide();

            });
        },
        error: function (response) {
            alert(response); // display error response from the server
        }
    });

}


</script>
