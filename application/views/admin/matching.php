
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Final
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    <form role="form">

                        <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_main_final">
                                    <thead>
                                        <tr>
                                            <th width="20%">INSTANSI</th>
                                            <th width="20%">ID UPLOAD</th>
                                            <th>UPLOAD KE</th>
                                            <th>NAMA FILE</th>
                                            <th>CREATE DATE</th>
                                            <th class="text-center" width="10%">PILIH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                    </tbody>
                            </table>
                        </div>

                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->

                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->

<div class="col-md-12">
    <div class="panel panel-success active">
        <div class="panel-heading">
            Entry Metode Pemadanan
        </div>
        <div class="panel-body">
            <div class="row">


                <div class="col-lg-12">

                    <form role="form">
                        <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_kolom_pemadanan">
                                    <thead>
                                        <tr>
                                            <th>NAMA KOLOM</th>
                                            <th width="11%">IS MATCHING</th>
                                            <th>METODE</th>
                                            <th>ATRIBUT</th>
                                            <th width="10%">NILAI</th>
                                            <th width="10%">IS DIGIT</th>
                                            <th width="10%">DIGIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>NIK</td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td>
                                                <select class="form-control">
                                                    <option>Metode 1</option>
                                                    <option>Metode 2</option>
                                                    <option>Metode 3</option>
                                                </select> 
                                            </td>
                                            <td align="center">
                                                <select class="form-control">
                                                    <option> < </option>
                                                    <option> > </option>
                                                    <option> = </option>
                                                    <option> => </option>
                                                    <option> <= </option>
                                                </select> 
                                            </td>
                                            <td><input type='text' class='form-control' /></td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td><input type='text' class='form-control' /></td>
                                        </tr> 

                                        <tr>
                                            <td>ALAMAT</td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td>
                                                <select class="form-control">
                                                    <option>Metode 1</option>
                                                    <option>Metode 2</option>
                                                    <option>Metode 3</option>
                                                </select> 
                                            </td>
                                            <td align="center">
                                                <select class="form-control">
                                                    <option> < </option>
                                                    <option> > </option>
                                                    <option> = </option>
                                                    <option> => </option>
                                                    <option> <= </option>
                                                </select> 
                                            </td>
                                            <td><input type='text' class='form-control' /></td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td><input type='text' class='form-control' /></td>
                                        </tr> 

                                        <tr>
                                            <td>NM_LGKP</td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td>
                                                <select class="form-control">
                                                    <option>Metode 1</option>
                                                    <option>Metode 2</option>
                                                    <option>Metode 3</option>
                                                </select> 
                                            </td>
                                            <td align="center">
                                                <select class="form-control">
                                                    <option> < </option>
                                                    <option> > </option>
                                                    <option> = </option>
                                                    <option> => </option>
                                                    <option> <= </option>
                                                </select> 
                                            </td>
                                            <td><input type='text' class='form-control' /></td>
                                            <td align="center"><input type='checkbox' class='radio' name='pilih_lanjutan' value=''/></td>
                                            <td><input type='text' class='form-control' /></td>
                                        </tr> 
                                    </tbody>
                            </table>
                        </div>


                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-refresh"></i> Proses</button>
                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->

            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>


<div class="col-md-12">
    <div class="panel panel-danger active">
        <div class="panel-heading">
            List Step Pemadanan
        </div>
        <div class="panel-body">
            <div class="row">


                <div class="col-lg-12">

                    <form role="form">
                        <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="table_kolom">
                                    <thead>
                                        <tr>
                                            <th width="10%">STEP</th>
                                            <th width="20%">NIK</th>
                                            <th width="20%">ALAMAT</th>
                                            <th width="20%">NM_LGKP</th>
                                            <th width="15%">SUDAH PROSES</th>
                                            <th width="10%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td align="center">1</td>
                                            <td align="center">100%</td>
                                            <td align="center">85%</td>
                                            <td align="center">99%</td>
                                            <td align="center"><input type='checkbox'   /></td>
                                            <td align="center"><span class="btn btn-info">Proses</span> </td>
                                        </tr> 
                                        <tr>
                                            <td align="center">2</td>
                                            <td align="center">100%</td>
                                            <td align="center">>85%</td>
                                            <td align="center">>60%</td>
                                            <td align="center"><input type='checkbox'  /></td>
                                            <td align="center"><span class="btn btn-info">Proses</span> </td>
                                        </tr> 
                                        <tr>
                                            <td align="center">3</td>
                                            <td align="center">100%</td>
                                            <td align="center">>85%</td>
                                            <td align="center">=>90%</td>
                                            <td align="center"><input type='checkbox' /></td>
                                            <td align="center"><span class="btn btn-info">Proses</span> </td>
                                        </tr> 
                                        
                                    </tbody>
                            </table>
                        </div>


                        <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-list"></i> Proses Semua</button>
                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->

            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>


</div>
<!-- /.row -->
</div>


<script type="text/javascript">


$(document).ready(function() {

    get_data_final();

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
                          '<td align="center"><input type="radio" class="radio" name="pilih_main" onclick="get_kolom_pemadanan(\''+value.ID_UPLOAD+'\')" style="width:25px; height:25px;" /></td>'+
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
                          '<td align="center"><input type="checkbox" class="radio" name="pilih_lanjutan" value=""/></td>' +

                          '<td align="center">'+
                            '<select class="form-control">'+
                                '<option value="EM">Exact Match</option>'+
                                '<option value="JW">Jaro Winkler</option>'+
                                '<option value="ED">Edit Distance Similarity</option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<select class="form-control">'+
                                '<option> = </option>'+
                                '<option> >= </option>'+
                                '<option> > </option>'+
                            '</select>'+ 
                          '</td>' +

                          '<td align="center">'+
                            '<input type="text" class="form-control" />'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="checkbox"  />'+
                          '</td>'+

                          '<td align="center">'+
                            '<input type="text" class="form-control" />'+
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
</script>