<div class="row" id="main_row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Import DMP
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->

                <form role="form">

                    <div class="form-group">
                        <label>File DMP</label>
                        <input type="file" id="file" name="file" accept="application/octet-stream, .dmp">

                        <br>
                        <div class="progress" id="bar_upload" style="display: none">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active myprogress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <a class="btn btn-info" id="upload"><i class="fa fa-upload" ></i> Upload DMP</a>
                    </div>
 
                    <div class="form-group">
                        <label><u>Log Import DMP</u></label>

                        <div class="pull-right">
                            <div class="form-group">
                                <a class="btn btn-primary" id="upload"><i class="fa fa-refresh" ></i> Refresh</a>
                            </div>

                        </div>


                        <div class="tasks" id="tasks_completed">

                            <div class="task-item task-danger task-complete" style="height: 300px; overflow: scroll;">    
                                                            
                                <div class="task-text ui-sortable-handle">
                                    <pre>
                                        <p id="text_log"></p>
                                    </pre>

                                </div>                                 
                            </div>

                        </div>
                    </div>

                    

                    <div class="form-group">

                        <label>List Tabel DMP</label>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_dmp" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%">#</th>
                                    <th class="text-center" width="20%">NAMA FILE</th>
                                    <th class="text-center" width="20%">CREATED DATE</th>
                                    <th class="text-center" width="10%">UPLOAD ULANG</th>
                                    <th class="text-center" width="10%">LOG</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                foreach ($dmp as $key) {

                                    $log = basename($key->NAMA_FILE, ".DMP").PHP_EOL;
                                    $string = preg_replace('/\s+/', '', $log);
                                    echo "<tr>
                                    <td align='center'>".$i."</td>
                                    <td align='center'>".$key->NAMA_FILE."</td>
                                    <td align='center'>".$key->CREATE_DATE."</td>
                                    <td align='center'><a href='#' onclick='upload_ulang()'><span class='btn btn-danger btn-xs'>Upload Ulang</span></a></td>
                                    <td align='center'><a href='#' onclick='lihat_log(\"$string\")'><span class='btn btn-info btn-xs'>Lihat Log</span></a></td>
                                   
                                </tr>";
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>


                    </div>

                    

                </form>
            </div>
            

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-6 -->


<div class="modal fade" id="modalNotif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Informasi </h3></center>
        </div>
        
        <div class="modal-body" >
            <center>

                <p id="pesan_notifikasi"></p>
                
            </center>

            <pre>
                <code>
                <p id="log_imp"></p>
                <p id="log_imp_v"></p>
                </code>
            </pre>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="modalUlang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Upload Ulang </h3></center>
        </div>
        
        <div class="modal-body" >
                <div class="form-group">
                    <label>File DMP</label>
                    <input type="file" id="file_ulang" name="file_ulang" accept="application/octet-stream, .dmp">
                </div>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>
            <a class="btn btn-info" id="upload_ulang" data-dismiss="modal"><i class="fa fa-upload" ></i> Upload DMP</a>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
    
$(document).ready(function() {

    $('#tabel_dmp').dataTable();


    $('#upload').on('click', function () {

            $('#loadingnya').loading();
            var file_data = $('#file').prop('files')[0];
            
            $('.myprogress').css('width', '0');
            $('#upload').prop('disabled', true);
            $('#bar_upload').show('fast');

            if($('#file').val() == "" || $('#file').val() == null){

                $('#pesan_notifikasi').html("Anda belum memilih file DMP untuk diupload");
                $('#modalNotif').modal('show');

            }
            else{

                var form_data = new FormData();
                form_data.append('files', file_data);
                
                    $.ajax({
                        url: BASE_URL+'admin/import/upload_file', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',

                        xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = evt.loaded / evt.total;
                                        percentComplete = parseInt(percentComplete * 100);
                                        $('.myprogress').text(percentComplete + '%');
                                        $('.myprogress').css('width', percentComplete + '%');

                                    }
                                }, false);
                                return xhr;
                            },
                        success: function (response) {
                            
                            
                            data = JSON.parse(response);
                            console.log(data);

                            if(data.out_rowcount == 1){
                                $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                                $('#log_imp').html($.trim(data.perintah_o));
                                $('#log_imp_v').html($.trim(data.perintah_v));
                                $('#text_log').html($.trim(data.perintah_v));


                            }
                            else{
                                $('#pesan_notifikasi').html(data.msgerror);
                            }

                            $('#loadingnya').loading('stop');
                            $('#modalNotif').modal('show');

                            $('#upload').prop('disabled', false);

                            setTimeout(function(){ $('#bar_upload').hide('fast'); }, 3000);
                            
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });

            }
            
            
            });


    $('#upload_ulang').on('click', function () {

            $('#loadingnya').loading();
            var file_data = $('#file_ulang').prop('files')[0];
            //console.log();
            
            var form_data = new FormData();
            form_data.append('files', file_data);
            form_data.append('p_nama_file',file_data.name );
            
                $.ajax({
                    url: BASE_URL+'admin/import/upload_ulang_dmp', // point to server-side controller method
                    dataType: 'text', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                        
                        
                        data = JSON.parse(response);
                        console.log(data);

                        if(data.out_rowcount == 1){
                            $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                            $('#log_imp').html($.trim(data.perintah_o));
                            $('#log_imp_v').html($.trim(data.perintah_v));
                            $('#text_log').html($.trim(data.perintah_v));


                        }
                        else{
                            $('#pesan_notifikasi').html(data.msgerror);
                        }

                        $('#loadingnya').loading('stop');
                        $('#modalNotif').modal('show');
                        
                    },
                    error: function (response) {
                        $('#msg').html(response); // display error response from the server
                    }
                });
            });

});

function upload_ulang(){
    $('#modalUlang').modal('show');
}

function lihat_log(log){

    $.get( BASE_URL+'uploads/'+log+'.log', function(data) {
       $('#text_log').html(data);  
    }, 'text');

}


</script>
