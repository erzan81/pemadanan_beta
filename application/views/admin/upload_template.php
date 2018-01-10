<link href="<?php echo base_url('assets/app/css/ui_upload_source.css') ?>" rel="stylesheet">

<style type="text/css">
    .details-control {
        background: url('<?php echo base_url();?>/gambar/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    .shown td.details-control {
        background: url('<?php echo base_url();?>/gambar/details_close.png') no-repeat center center;
    }
</style>

    

        <div class="row" id="main_row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upload Data Template
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
  
                        <div class="panel-body" id="loadingnya">
                            

                                <form role="form">


                                    <div class="form-group" id="instansi_form">
                                        <label>Instansi</label>
                                        <select class="form-control select" data-live-search="true" id="cmb_instansi" name="cmb_instansi" width="100%">
                                            <?php 

                                            foreach ($instansi as $row  ) {
                                            //print_r ($row);
                                                echo "<option value='".$row->INSTANSI_ID."'>". $row->INSTANSI_NAMA."</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="keterangan_form">
                                        <label>Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control">
                                    </div>

                                    <div class="form-group" id="nama_tabel" >
                                        <label>Nama Tabel</label>
                                       <select class="form-control select" data-live-search="true" id="p_nama_file" name="p_nama_file" width="100%">
                                            <?php 

                                            if($dmp != null){
                                                foreach ($dmp as $row  ) {
                                                //print_r ($row);
                                                    echo "<option value='".$row->NAMA_TABEL."'>". $row->NAMA_TABEL." (".$row->JML_DATA." record) </option>";
                                                }
                                            }
                                            else{
                                                    echo "<option value='0000'> Tidak Ada Data </option>";

                                            }
                                            

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="init_kolom">
                                        <label>Inisialisasi Kolom</label>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="table_kolom">
                                            <thead>
                                                <tr>
                                                    <th style="display: none">NO KOLOM</th>
                                                    <th>NAMA KOLOM</th>
                                                    <th>TIPE KOLOM</th>
                                                    <th>SIZE KOLOM</th>
                                                    <th width="10%" class="text-center">PILIH</th>
                                                    <th width="10%" class="text-center">PRIMARY KEY</th>
                                                    <th width="10%" class="text-center">IS SCORE</th>
                                                    <th width="10%" class="text-center">IS SELECT</th>
                                                    <th width="10%" class="text-center">IS CLEANSING</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach ($kolom as $key) {

                                                    echo "<tr>
                                                    <td style='display: none'>".$i."</td>
                                                    <td>".$key->ID_KOLOM."</td>
                                                    <td>".$key->TIPE_KOLOM."</td>
                                                    <td>".$key->SIZE_KOLOM."</td>
                                                    <td align='center'><input type='checkbox' name='pilih".$i."' id='pilih".$i."' value='".$key->ID_KOLOM."'/></td>
                                                    <td align='center'><input type='checkbox' name='pk".$i."' id='pk".$i."' value='#'/></td>
                                                    <td align='center'><input type='checkbox' name='score".$i."' id='score".$i."' value='@'/></td>
                                                    <td align='center'><input type='checkbox' name='is_select".$i."' id='is_select".$i."' value='%'/></td>
                                                    <td align='center'><input type='checkbox' name='is_cleansing".$i."' id='is_cleansing".$i."' value='~'/></td>

                                                </tr>";
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                        <!-- <a class="btn btn-info" onclick="get_kolom_check()"><i class="fa fa-check" ></i> Cek</a> -->
                   

                    <a class="btn btn-info" id="upload"><i class="fa fa-upload" ></i> Upload Template</a>
                    

                </form>
            
            
            

        </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

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

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function get_kolom_check(){

        var selected = "";
        var coba = "";

        $("#table_kolom tbody").find("tr").each(function (index) {

            var tempKolom = $(this).find('td').toArray();
            var no_urut = tempKolom[0].innerHTML;
            var kolom = $('input[name="pilih'+no_urut+'"]:checked').val();
            var pk = $('input[name="pk'+no_urut+'"]:checked').val();
            var is_score = $('input[name="score'+no_urut+'"]:checked').val();
            var is_select = $('input[name="is_select'+no_urut+'"]:checked').val();
            var is_cleansing = $('input[name="is_cleansing'+no_urut+'"]:checked').val();
            //console.log(temp);
            if(kolom == NaN || kolom == undefined ){
                //do nothing
            } 
            else{

                if(pk == undefined){
                    pk = "";
                }

                if(is_score == undefined){
                    is_score = "";
                }

                if(is_select == undefined){
                    is_select = "";
                }

                if(is_cleansing == undefined){
                    is_cleansing = "";
                }

                selected += kolom + pk + is_score + is_select + is_cleansing + ';';
            }
        
            
        });

        
        str1 = selected.replace(/;$/, "") + "";
        console.log(str1);
        return str1;
    }
    
    $('#upload').on('click', function () {

            
            var p_nama_file = $('#p_nama_file').val();
            var kolom = get_kolom_check();
            var instansi = $('#cmb_instansi').val();
            var kegiatan = $('#keterangan').val();
            var form_data = new FormData();
            form_data.append('p_nama_file', p_nama_file);
            form_data.append('p_kolom', kolom);
            form_data.append('p_instansi_id', instansi);
            form_data.append('p_kegiatan', kegiatan);
            
            //console.log($('#file').val());

            if($('#p_nama_file').val() == "" || kegiatan == ""){
                $('#pesan_notifikasi').html("Anda belum melengkapi isian form. Cek kembali file yang akan diupload dan kegiatan");
                $('#modalNotif').modal('show');
            }
            else if(kolom == null || kolom == ""){
                $('#pesan_notifikasi').html("Anda belum melengkapi isian kolom. Checklist pilihan anda pada tabel dibawah");
                $('#modalNotif').modal('show');
            }
            else{


                $.ajax({

                    url: BASE_URL+'admin/template/submit', // point to server-side controller method
                    
                    processData: false,
                    contentType: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                        
                        //console.log(response);
                        data = JSON.parse(response);
                        //console.log(data);

                        if(data.out_rowcount == 1){
                            $('#pesan_notifikasi').html("File Berhasil Diupload dan Data Berhasil Disimpan.");
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

            }

            
        });

</script>
