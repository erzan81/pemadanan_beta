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
                                        <span id="text_log"></span>
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
                                    <th class="text-center" width="20%">NAMA TABEL</th>
                                    <th class="text-center" width="20%">CREATED DATE</th>
                                    <th class="text-center" width="10%">UPLOAD ULANG</th>
                                    <th class="text-center" width="10%">LOG</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                foreach ($dmp as $key) {

                                    echo "<tr>
                                    <td align='center'>".$i."</td>
                                    <td align='center'>".$key->NAMA_FILE."</td>
                                    <td align='center'>".$key->CREATE_DATE."</td>
                                    <td align='center'><a href='#' ><span class='btn btn-danger btn-xs'>Upload Ulang</span></a></td>
                                    <td align='center'><a href='#' ><span class='btn btn-info btn-xs'>Lihat Log</span></a></td>
                                   
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
                <span id="log_imp"></span>
                <span id="log_imp_v"></span>
            </pre>
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

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
                    success: function (response) {
                        
                        
                        data = JSON.parse(response);
                        console.log(data);

                        if(data.out_rowcount == 1){
                            $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
                            $('#log_imp').html(data.perintah_o);
                            $('#log_imp_v').html(data.perintah_v);

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





</script>
