<link href="<?php echo base_url('assets/app/css/ui_upload_source.css') ?>" rel="stylesheet">

<style type="text/css">
    .details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    .shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
    }

    .progress {
        display: block;
        text-align: center;
        width: 0;
        height: 3px;
        background: red;
        transition: width .3s;
    }
    .progress.hide {
        opacity: 0;
        transition: opacity 1.3s;
    }


</style>

    

        <div class="row" id="main_row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upload Data Source / Sumber Data
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body tabs">
                        <!-- Nav tabs -->

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#home" role="tab" data-toggle="tab">Upload From Excel / CSV</a>
                            </li>
                            <li><a href="#dmp" role="tab" data-toggle="tab">Upload From DMP</a>
                            </li>
                            <li><a href="#dbf" role="tab" data-toggle="tab">Upload From DBF</a>
                            </li>
                            <li><a href="#edit" role="tab" data-toggle="tab" id="tab_perubahan_data">Perubahan Data</a>
                            </li>
                        </ul>
                        

                        <!-- Tab panes -->
                        <div class="panel-body tab-content" id="loadingnya">
                            <div class="tab-pane fade in active" id="home">
                                <br>

                                <form role="form">

                                    <div class="form-group">
                                        <label>Jenis Upload Data :  </label>
                                        <label class="radio-inline text-info">
                                            <input type="radio" name="jenis_upload" id="jenis_upload1" value="1" checked><i class="fa fa-pencil"></i> Upload Data Baru
                                        </label>
                                        <label class="radio-inline text-success">
                                            <input type="radio" name="jenis_upload" id="jenis_upload2" value="2"><i class="fa fa-plus"></i> Upload Lanjutan
                                        </label>

                                    </div>

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

                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="file" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv">
                                    </div>

                                    <div class="pull-right">
                                        <label style="color:red">*Note : Upload file excel dengan extensi (.xlsx) / (.csv)</label>
                                    </div>


                                    <div class="form-group" style="display:none" id="upload_id_combo">

                                        <label>Get Kolom</label>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="table_temp_upload" >
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">#</th>
                                                    <th class="text-center" width="20%">NAMA INSTANSI</th>
                                                    <th class="text-center" width="12%">ID INSTANSI</th>
                                                    <th class="text-center" width="20%">ID UPLOAD</th>
                                                    <th class="text-center" width="35%">KEGIATAN</th>
                                                    <th class="text-center" width="8%">PILIH</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>



                                    <div class="form-group" id="init_kolom">
                                        <label>Inisialisasi Kolom</label>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="table_kolom">
                                            <thead>
                                                <tr>
                                                    <th>NAMA KOLOM</th>
                                                    <th>TIPE KOLOM</th>
                                                    <th>SIZE KOLOM</th>
                                                    <th width="10%" class="text-center">PILIH</th>
                                                    <th width="10%" class="text-center">PRIMARY KEY</th>
                                                    <th width="10%" class="text-center">IS SCORE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach ($kolom as $key) {

                                                    echo "<tr>
                                                    <td>".$key->ID_KOLOM."</td>
                                                    <td>".$key->TIPE_KOLOM."</td>
                                                    <td>".$key->SIZE_KOLOM."</td>
                                                    <td align='center'><input type='checkbox' name='pilih".$i."' id='pilih".$i."' value='".$key->ID_KOLOM."'/></td>
                                                    <td align='center'><input type='checkbox' name='pk".$i."' id='pk".$i."' value='#'/></td>
                                                    <td align='center'><input type='checkbox' name='score".$i."' id='score".$i."' value='@'/></td>

                                                </tr>";
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                        <!-- <a class="btn btn-info" onclick="get_kolom_check()"><i class="fa fa-check" ></i> Cek</a>
                    -->

                    <a class="btn btn-info" id="upload"><i class="fa fa-upload" ></i> Upload</a>
                    <a class="btn btn-success" id="upload_lanjutan" style="display:none"><i class="fa fa-upload" ></i> Upload</a>

                    <div id="prog"></div>

                </form>
            </div>
            <div class="tab-pane fade" id="dmp">
                <br>


            </div>
            <div class="tab-pane fade" id="dbf">
                <br>


            </div>
            <div class="tab-pane fade" id="edit">
                <br>
                <form role="form">

                    <div class="form-group">
                        <label>Jenis Perubahan : </label>
                        <label class="radio-inline text-info">
                            <input type="radio" name="pilihan_update" id="pilihan_update1" value="1" checked><i class="fa fa-pencil"></i> Upload Ulang
                        </label>
                        <label class="radio-inline text-danger">
                            <input type="radio" name="pilihan_update" id="pilihan_update2" value="2"><i class="fa fa-times"></i> Upload Data Bad
                        </label>
                    </div>

                    <div class="form-group">
                        <label>File input</label>
                        <input type="file" id="file_perubahan" name="file_perubahan" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv">
                    </div>

                    <div class="pull-right">
                        <label style="color:red">*Note : Upload file excel dengan extensi (.xlsx) / (.csv)</label>
                    </div>


                    <div class="form-group" id="upload_perubahan">

                        <label>List Data Upload</label>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_perubahan" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th class="text-center" width="27%">NAMA INSTANSI</th>
                                    <th class="text-center" width="20%">ID UPLOAD</th>
                                    <th class="text-center" width="20%">UPLOAD KE</th>
                                    <th class="text-center" width="8%">PILIH</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_bad" style="display: none">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th class="text-center" width="27%">NAMA INSTANSI</th>
                                    <th class="text-center" width="20%">ID UPLOAD</th>
                                    <th class="text-center" width="20%">UPLOAD KE</th>
                                    <th class="text-center" width="20%">NAMA TABEL</th>
                                    <th class="text-center" width="20%">DETAIL</th>
                                    <th class="text-center" width="8%">PILIH</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>


                    
                    
                    <a class="btn btn-success" id="upload_ulang"><i class="fa fa-upload" ></i> Upload Perubahan</a>

                </form>


            </div>

        </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->

</div>


<div class="row" style="display:none" id="detail_row">

    <div class="col-md-12">
        <div class="panel panel-success active">
            <div class="panel-heading">
                Detail #<label id="label_id_upload">id upload</label> 
                <div class='pull-right'>
                    #<label id="label_nama_tabel">nama tabel</label>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_detail">
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


<script src="<?php echo base_url('assets/app/js/js_ui_upload.js') ?>"></script>