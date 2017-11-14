
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

<div class="page-content-wrap" id="loadingnya">
    <div class="col-md-12" id="main_monitoring">              
        <div class="panel panel-default tabs">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab1" id="btn_now" data-toggle="tab">MONITORING NOW</a></li>
                <li><a href="#tab2" id="btn_finish" data-toggle="tab">MONITORING FINISH</a></li>
               
            </ul>
            <div class="panel-body tab-content" >
                <div class="tab-pane active" id="tab1">
                    <div class="row" id="monitoring_now"></div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="row" id="monitoring_finish">
                        



                    </div>
                </div>                     
            </div>
        </div> 
    </div>  

    <div class="col-md-12" id="detail_monitoring" style="display: none">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Monitoring
            </div>
            
            <div class="panel-body">
                <form role="form">

                <div class="form-group" id="keterangan_form">
                    <label>ID UPLOAD</label>
                    <input type="text" id="id_upload" name="id_upload" class="form-control" readonly="readonly">
                </div>

                <div class="form-group" id="keterangan_form">
                    <label>NAMA INSTANSI </label>
                    <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" readonly="readonly">
                </div>
                <div class="form-group" id="keterangan_form">
                    <label>KEGIATAN </label>
                    <input type="text" id="kegiatan" name="kegiatan" class="form-control" readonly="readonly">
                </div>
                    <div class="form-group">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_detail" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%">STEP KE</th>
                                    <th class="text-center" width="15%">NAMA_TABEL</th>
                                    <th class="text-center" width="20%">WAKTU PROSES AWAL</th>
                                    <th class="text-center" width="20%">WAKTU PROSES AKHIR</th>
                                    <th class="text-center" width="15%">LAMA PROSES</th>
                                    <th class="text-center" width="15%">JUMLAH DATA</th>
                                    <th class="text-center" width="15%">STATUS</th>
                                    <th class="text-center" width="7%">AKSI</th>   
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="panel-footer">
                
                <a href="#" class="btn btn-danger" id="btn_kembali"><span class="fa fa-times" ></span> Kembali</a>

            </div>

        </div>
    </div>          
    
</div>    


<div class="modal fade" id="modal_lihat_kode">
  <div class="modal-dialog" >
    <div class="modal-content" style="width: 700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Detail Script </h3></center>
        </div>
        
        <div class="modal-body" >
            <pre>
                
                    <code><span id="isi_kode"></span></code>
                
            </pre>
        </div>
        
        <div class="modal-footer">

            <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times" ></span> Close</a>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    
    $(document).ready(function() {

        get_monitoring_now();

        $('#btn_now').on('click', function () {

            get_monitoring_now();  

        });
        $('#btn_finish').on('click', function () {

            get_monitoring_finish();

        });

        $('#btn_kembali').on('click', function () {

            $('#detail_monitoring').hide('slow');
            $('#main_monitoring').show('slow');

        });

    });

    function get_monitoring_finish(){

        $('#loadingnya').loading();
        $.ajax({
            url: BASE_URL+'admin/monitoring/get_monitoring_finish', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                data = JSON.parse(response);

                $('#monitoring_finish').empty();
                if(data.length == 0){
                    var ret_valueT = 
                   '<div class="messages messages-img">'+
                        '<div class="item item-visible">'+
                            '<div class="image">'+
                                '<img src="<?php echo base_url();?>/gambar/no-pic.jpeg" alt="Dmitry Ivaniuk">'+
                            '</div>'+                                
                            '<div class="text">'+
                                '<div class="heading">'+
                                    '<a href="#">ADMINISTRATOR</a>'+
                                    '<span class="date"></span>'+
                                '</div>'+                                    
                                'Tidak Ada Proses Pemadanan. Silakan Cek Kembali Setelah Proses Matching Data Sudah Dilakukan<br><br>'+
                                'Terima Kasih'+
                            '</div>'+
                        '</div>'+                      
                    '</div>';

                    $('#monitoring_finish').append(ret_valueT);
                }
                else{

                    

                    var string_img = "";
                    $.each(data, function (i, value) {

                        if(value.PATH_FILE == null || value.PATH_FILE == ""){
                           string_img =  '<span class="fa fa-university"></span>';
                        }
                        else{
                            string_img = '<img src="<?php echo base_url();?>/uploads/thumbs/50x50/'+ value.PATH_FILE +'" alt="Pemadanan" width="50" height="50"/>';
                        }

                        var ret_valueT = 
                        '<div class="col-md-4">'+
                            
                                '<div class="widget widget-info widget-item-icon" >'+
                                    '<div class="widget-item-left">'+ string_img +'</div>'+                             
                                    '<div class="widget-data" style="word-wrap: break-word;">'+
                                        '<div class="widget-title">'+value.NAMA_INSTANSI+'</div>'+
                                        '<div class="widget-title">Jumlah Step : #'+value.JUMLAH_STEP+'</div>'+
                                        '<div class="widget-subtitle" >'+value.KEGIATAN+'</div>'+
                                    '</div>'+  
                                    '<div class="widget-buttons">'+  
                                        '<a href="#" onclick="get_monitoring_finish_detail(\''+value.ID_UPLOAD+'\',\'1\')" ><span class="fa fa-search"></span></a>'+       
                                    '</div>'+

                                '</div>'+ 
                            
                        '</div>';
                        
     
                        $('#monitoring_finish').append(ret_valueT);

                        
                    });


                }

                
                $('#loadingnya').loading('stop');
                
            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loadingnya').loading('stop');
            }
        });

    }

    function get_monitoring_now(){

        $('#loadingnya').loading();
        $.ajax({
            url: BASE_URL+'admin/monitoring/get_monitoring_now', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            type: 'post',
            success: function (response) {

                data = JSON.parse(response);

                $('#monitoring_now').empty();

                if(data.length == 0){
                    var ret_valueT = 
                    '<div class="messages messages-img">'+
                        '<div class="item item-visible">'+
                            '<div class="image">'+
                                '<img src="<?php echo base_url();?>/gambar/no-pic.jpeg" alt="Dmitry Ivaniuk">'+
                            '</div>'+                                
                            '<div class="text">'+
                                '<div class="heading">'+
                                    '<a href="#">ADMINISTRATOR</a>'+
                                    '<span class="date"></span>'+
                                '</div>'+                                    
                                'Tidak Ada Proses Pemadanan. Silakan Cek Kembali Setelah Proses Matching Data Sudah Dilakukan<br><br>'+
                                'Terima Kasih'+
                            '</div>'+
                        '</div>'+                      
                    '</div>';

                    $('#monitoring_now').append(ret_valueT);
                }
                else{

                    var string_img = "";
                    $.each(data, function (i, value) {

                        if(value.PATH_FILE == null || value.PATH_FILE == ""){
                           string_img =  '<span class="fa fa-university"></span>';
                        }
                        else{
                            string_img = '<img src="<?php echo base_url();?>/uploads/thumbs/50x50/'+ value.PATH_FILE +'" alt="Pemadanan" width="50" height="50"/>';
                        }

                        var ret_valueT = 
                        '<div class="col-md-4">'+
                            
                                '<div class="widget widget-warning widget-item-icon" >'+
                                    '<div class="widget-item-left">'+ string_img +'</div>'+                             
                                    '<div class="widget-data" style="word-wrap: break-word;">'+
                                        '<div class="widget-title">'+value.NAMA_INSTANSI+'</div>'+
                                        '<div class="widget-title">Jumlah Step : #'+value.JUMLAH_STEP+'</div>'+
                                        '<div class="widget-subtitle" >'+value.KEGIATAN+'</div>'+
                                    '</div>'+  
                                    '<div class="widget-buttons">'+  
                                        '<a href="#" onclick="get_monitoring_finish_detail(\''+value.ID_UPLOAD+'\',\'2\')" ><span class="fa fa-search"></span></a>'+   
                                    '</div>'+

                                '</div>'+ 
                            
                        '</div>';
                        
     
                        $('#monitoring_now').append(ret_valueT);

                        
                    });  

                }

                $('#loadingnya').loading('stop');
                
            },
            error: function (response) {
                alert(response); // display error response from the server
                $('#loadingnya').loading('stop');
            }
        });

    }

    function get_monitoring_finish_detail(id_upload, kat){

        var url = "";

        if(kat == 1){
            url = "get_monitoring_finish_detil";
        }
        else{
            url = "get_pemadanan_now_detil";
        }

        $.ajax({
            url: BASE_URL+'admin/monitoring/'+url, // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            data: {p_id_upload: id_upload},
            type: 'post',
            success: function (response) {

                data = JSON.parse(response);
                
                $('#id_upload').val(data[0].ID_UPLOAD);
                $('#nama_instansi').val(data[0].NAMA_INSTANSI);
                $('#kegiatan').val(data[0].KEGIATAN);

                var number = 1;
                
                $('#tabel_detail tbody').empty();
                $.each(data, function (i, value) {

                    var ret_valueT =
                              '<tr>' +
                              '<td align="center">' + value.STEP_KE + '</td>' +
                              '<td align="left">' + value.NAMA_TABEL + '</td>' +
                              '<td align="center">' + value.WAKTU_PROSES_AWAL + '</td>' +
                              '<td align="center">' + value.WAKTU_PROSES_AKHIR + '</td>' +
                              '<td align="center">' + value.LAMA_PROSES + '</td>' +
                              '<td align="center">' + value.JML_DATA + '</td>' +
                              '<td align="center">' + value.STATUS + '</td>' +
                              '<td align="center">' +
                                '<a href="#" onclick="get_kodenya(\''+i+'\')"><span class="btn btn-info btn-xs">Lihat Script</span></a><span id="kode'+i+'" style="display:none">' +value.SCRIPT+'</span>'+
                              '</td>' +
                              
                              '</tr>';
                    $('#tabel_detail tbody').append(ret_valueT);

                    
                });

                $('#main_monitoring').hide('slow');
                $('#detail_monitoring').show('slow');


            },
            error: function (response) {
                alert(response); // display error response from the server
            }
        });

    }

    function get_kodenya(i){
    
        var kodenya = $('#kode'+i+'').html();
        $("#modal_lihat_kode").modal('show');
        $("#isi_kode").html(kodenya);


        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
        
    }

</script>      