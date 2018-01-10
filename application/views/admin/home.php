
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

                <form class="form-horizontal">


                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-2 control-label">ID UPLOAD</label>
                                <div class="col-md-9">                                            
                                    <input type="text" id="id_upload" name="id_upload" class="form-control" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">NAMA INSTANSI</label>
                                <div class="col-md-9">                                            
                                    <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" readonly="readonly">
                                </div>
                            </div>



                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-md-2 control-label">KEGIATAN</label>
                                <div class="col-md-9">                                            
                                    <input type="text" id="kegiatan" name="kegiatan" class="form-control" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">JUMLAH DATA AWAL</label>
                                <div class="col-md-9">                                            
                                    <input type="text" id="jumlah_data_awal" name="jumlah_data_awal" class="form-control" readonly="readonly">
                                </div>
                            </div>



                        </div>

                    </div>


                </form>

                <form role="form">
                <br>
                    <div class="form-group">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_detail" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%">STEP KE</th>
                                    <th class="text-center" width="15%">NAMA_TABEL</th>
                                    <th class="text-center" width="15%">WAKTU PROSES AWAL</th>
                                    <th class="text-center" width="15%">WAKTU PROSES AKHIR</th>
                                    <th class="text-center" width="10%">LAMA PROSES</th>
                                    <th class="text-center" width="15%">JUMLAH DATA</th>
                                    <th class="text-center" width="10%">STATUS</th>
                                    <th class="text-center" width="15%">AKSI</th>   
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

 <div class="row" style="display:none" id="detail_row">

        <div class="col-md-12">
            <div class="panel panel-success active">
                <div class="panel-heading">
                    Detail Tabel : #<label id="label_nama_tabel">nama tabel</label>
                    
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_detail_data">
                                <thead>
                                    <tr></tr> 
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    
                </div>
                <div class="panel-footer">

                    <a class="btn btn-danger" id="kembali_detail"><i class="fa fa-rotate-left" ></i> Kembali</a>

                </div>

            </div>
            
        </div>
    </div>

    <div class="row" style="display:none" id="detail_metode">

        <div class="col-md-12">
            <div class="panel panel-info active">
                <div class="panel-heading">
                    Detail Metode Step Ke : #<label id="label_step"></label>
                    
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_metode">

                                <thead>
                                    <tr>
                                        <th class="text-center" width="7%">#</th>
                                        <th class="text-center" width="15%">ID KOLOM</th>
                                        <th class="text-center" width="15%">IS PROSES</th>
                                        <th class="text-center" width="15%">IS DIGIT</th>
                                        <th class="text-center" width="15%">DIGIT</th>
                                        <th class="text-center" width="15%">METODE</th>
                                        <th class="text-center" width="15%">NILAI</th>
                                        <th class="text-center" width="15%">ATRIBUT</th>
                                          
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    
                </div>
                <div class="panel-footer">

                    <a class="btn btn-danger" id="kembali_metode"><i class="fa fa-rotate-left" ></i> Kembali</a>

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
    
    var table_metode;

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
            $('#detail_row').hide('slow');
            $('#detail_metode').hide('slow');
            $('#main_monitoring').show('slow');

        });

        $('#kembali_metode').on('click', function () {

            
            $('#detail_row').hide('slow');
            $('#detail_metode').hide('slow');
            $('#detail_monitoring').show('slow');

        });

        $(function() {
            $('#kembali_detail').on('click', function() {
                $('#detail_row').hide('slow');
                $('#detail_metode').hide('slow');
                $('#detail_monitoring').show('slow');
            });
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
                                '<img src="<?php echo base_url();?>/gambar/no-pic.jpeg" alt="Administrator">'+
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
                           string_img = '<img src="<?php echo base_url();?>/gambar/fasilitas.png" alt="Pemadanan" width="50" height="50"/>';
                        }
                        else{
                            var img_error = "<?php echo base_url();?>/gambar/fasilitas.png";
                            var s = value.PATH_FILE;
                            var new_string = s.substring(0, s.lastIndexOf(".")) + "_50x50" + s.substring(s.lastIndexOf("."));

                            string_img = '<img src="<?php echo base_url();?>uploads/thumbs/50x50/'+ decodeURIComponent(new_string) +'" alt="Pemadanan" width="50" height="50" onerror="this.src=\''+img_error+'\'" />';
                        }

                        var ret_valueT = 
                        '<div class="col-md-4" >'+
                            
                                '<div class="widget widget-warning widget-item-icon" >'+
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
                                '<img src="<?php echo base_url();?>/gambar/no-pic.jpeg" alt="Administrator">'+
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
                           string_img = '<img src="<?php echo base_url();?>/gambar/fasilitas.png" alt="Pemadanan" />';
                        }
                        else{

                            var img_error = "<?php echo base_url();?>/gambar/fasilitas.png";
                            var s = value.PATH_FILE;
                            var new_string = s.substring(0, s.lastIndexOf(".")) + "_50x50" + s.substring(s.lastIndexOf("."));

                            string_img = '<img src="<?php echo base_url();?>uploads/thumbs/50x50/'+ decodeURIComponent(new_string) +'" alt="Pemadanan" width="50" height="50" onerror="this.src=\''+img_error+'\'" />';
                        }

                        //console.log(decodeURIComponent(new_string));

                        var ret_valueT = 
                        '<div class="col-md-4">'+
                            
                                '<div class="widget widget-warning widget-item-icon">'+
                                    '<div class="widget-item-left">'+ string_img +'</div>'+                             
                                    '<div class="widget-data" style="word-wrap: break-word;">'+
                                        '<div class="widget-title">'+value.NAMA_INSTANSI+'</div>'+
                                        '<div class="widget-title">Jumlah Step : #'+value.JUMLAH_STEP+'</div>'+
                                        '<div class="widget-subtitle" >'+value.KEGIATAN+'</div>'+
                                    '</div>'+  
                                    '<div class="widget-buttons">'+  
                                        '<a href="#" onclick="get_monitoring_finish_detail(\''+value.ID_UPLOAD+'\',\'2\',\''+value.JML_DATA_AWAL+'\')" ><span class="fa fa-search"></span></a>'+   
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

    function get_monitoring_finish_detail(id_upload, kat, jml_data){

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

                console.log(data);
                
                $('#id_upload').val(data[0].ID_UPLOAD);
                $('#nama_instansi').val(data[0].NAMA_INSTANSI);
                $('#kegiatan').val(data[0].KEGIATAN);
                $('#jumlah_data_awal').val(jml_data);

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
                                '<a href="#" onclick="get_kodenya(\''+i+'\')"><span class="btn btn-info btn-xs">Script</span></a><span id="kode'+i+'" style="display:none">' +value.SCRIPT+'</span> '+
                                '<a href="javascript:get_detail(\''+value.HEADER_KOLOM+'\',\''+value.NAMA_TABEL+'\')"><span class="btn btn-warning btn-xs">Detail</span></a> '+
                                '<a href="#" onclick="coba(\''+value.ID_UPLOAD+'\',\''+value.STEP_KE+'\')"><span class="btn btn-success btn-xs">Metode</span></a>'+
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


    function get_detail(header, nama_table) {

        $('#loadingnya').loading();
        var valData= header;
        var valNew = valData.split(',');
        var header_kolom = [];
        var kolom_data =[];

        //console.log(header);
        $('#label_nama_tabel').html(nama_table);

        $("#tabel_detail_data > thead > tr").empty();
        //$("#tabel_detail > thead").append("<tr><tr>");


        for(var i=0;i<valNew.length;i++){

            var strRow =

            '<th class="text-center">' + valNew[i] + '</th>';

            $("#tabel_detail_data > thead > tr:first").append(strRow);
            //console.log(valNew[i]);

            header_kolom.push(valNew[i]);
            var temp="";

            temp = {"mData": valNew[i], "defaultContent": ""};
                
            kolom_data.push(temp)

            temp = ""    


        }

        //console.log(kolom_data);
        setTimeout(function(){ 

            var p_nama_table = nama_table;
            

            $("#tabel_detail_data").dataTable().fnDestroy();
            $("#tabel_detail_data > tbody").empty();
            tableTemplate = $('#tabel_detail_data').DataTable({

                "processing": true,
                "language": {
                    "loadingRecords": "&nbsp;",
                    "processing": "Loading..."
                },
                "serverSide": true,
                "scrollX": true,
                "aoColumnDefs": [
                {
                    "aTargets": [0],
                    "bSortable": false
                }
                ],
                "ajax": {
                    "url": BASE_URL+'admin/monitoring/get_pemadanan_now_detil_pss',
                    "type": "POST",
                    "data": {
                        header: header_kolom,
                        p_nama_table: p_nama_table
                    },
                    "dataSrc": function (json) {
                        //console.log(json);
                        return json.data;
                    }, error: function (request, status, error) {
                        //showMessage(request.responseText);
                        //closeLoader();
                    }
                },
                "columns": kolom_data,
                
                "drawCallback": function (settings) {
                    $('th').removeClass('sorting_asc');

                }
            });

            tableTemplate.on('error', function () {
                alert('error');
            });

        }, 100);

        //$("#tabel_detail").append("<tbody> </tbody>");
        $('#detail_monitoring').hide('slow');
        $('#detail_row').show('slow');
        $('#loadingnya').loading('stop');
        

    }

    function coba(a,b){

        $.ajax({
            url: BASE_URL+'admin/monitoring/get_metode_pemadanan_dashboard', // point to server-side controller method
            data: {p_id_upload: a, step_ke: b},
            type: 'post',
            success: function (response) {

                var data = JSON.parse(response);
                //console.log(data);
                var number = 1;
                
                $('#label_step').html(b);

                $('#tabel_metode tbody').empty();
                $.each(data, function (i, value) {

                    var ret_valueT =
                          '<tr>' +
                          '<td align="center">'+number+'</td>' +
                          '<td align="center">' + value.ID_KOLOM + '</td>' +
                          '<td align="center">' + value.IS_PROSES + '</td>' +
                          '<td align="center">' + value.IS_DIGIT + '</td>' +
                          '<td align="center">' + value.DIGIT + '</td>' +
                          '<td align="center">'+ value.METODE +'</td>'+
                          '<td align="center">' + value.NILAI + '</td>' +
                          '<td align="center">' + value.ATRIBUT + '</td>' +
                          '</tr>';


                    $('#tabel_metode tbody').append(ret_valueT);
                    number++;
                    
                });

                $('#main_monitoring').hide('slow');
                $('#detail_monitoring').hide('slow');
                $('#detail_row').hide('slow');
                $('#detail_metode').show('slow');


            },
            error: function (response) {
                alert(response); // display error response from the server
            }
        });
    }

</script>      