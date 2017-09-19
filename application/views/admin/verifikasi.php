<link href="<?php echo base_url('assets/app/css/ui_upload_source.css') ?>" rel="stylesheet">
<style type="text/css">

    td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
        table-layout: fixed;
    }
    tr.shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
    }

</style>

    <div class="row" id="main_row">
        <div class="col-md-12">
            <div class="panel panel-default" id="loadingnya">
                <div class="panel-heading">
                    <span class='fa fa-check-circle-o'></span> Verifikasi dan Cleansing Data
                </div>
                <div class="panel-body tabs">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#gabung" role="tab" data-toggle="tab">Penggabungan Final Temp</a>
                        </li>
                         <!-- <li class=""><a href="#cleansing" data-toggle="tab">Cleansing</a>
                        </li> -->
                         <li class=""><a href="#final" role="tab" data-toggle="tab">Proses Final</a>
                        </li>
                    </ul>

                    

                    <div class="panel-body tab-content">
                        <div class="tab-pane fade in active" id="gabung">
                            <form role="form">
                                <br>
                                <div class="form-group">

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
                                
                                <div class="form-group">
                                    <label>Abaikan Data Bad ?</label>
                                    <input type="checkbox" name="ignore_bad" id="ignore_bad" value="YA"  />
                                </div>


                                <a href="#" class="btn btn-primary" id="btn_gabung"><i class="fa fa-archive"></i> Penggabungan</a>
                                
                            </form>


                        </div>

                        <!-- <div class="tab-pane fade in" id="cleansing">
                            <form role="form">
                                <br>
                                <div class="form-group">

                                    <label>Get Main</label>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="cleansing_main" >
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="20%">NAMA INSTANSI</th>
                                                <th class="text-center" width="12%">ID INSTANSI</th>
                                                <th class="text-center" width="20%">ID UPLOAD</th>
                                                <th class="text-center" width="40%">KEGIATAN</th>
                                                <th class="text-center" width="8%">PILIH</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                
                                <div class="form-group">

                                    <label>Referensi </label>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_referensi">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">NO</th>
                                                <th class="text-center" width="15%">KOLOM</th>
                                                <th class="text-center" width="15%">ID CLEANSING</th>
                                                <th class="text-center" width="50%">KEGIATAN</th>
                                                <th class="text-center" width="10%">PILIH</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="form-group">
                                    <a href="#" class="btn btn-primary" id="btn_tambah_conf"><i class="fa fa-plus"></i> Tambah</a>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <span class='fa fa-check-circle-o'></span> Referensi Conf
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">

                                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_conf">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="10%">NO URUT</th>
                                                        <th class="text-center" width="15%">KOLOM</th>
                                                        <th class="text-center" width="15%">ID CLEANSING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="form-group">
                                            <a href="#" class="btn btn-success" id="btn_submit_conf"><i class="fa fa-save"></i> Submit</a>
                                        </div>
                                    </div>
                                </div>


                                
                                
                            </form>
                        </div> -->

                        <div class="tab-pane fade in" id="final">
                            

                            <form role="form">
                                <br>
                                <div class="form-group">

                                    <label>Get Main</label>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_main_final" >
                                        <thead>
                                            <tr>
                                                <th width="20%">INSTANSI</th>
                                                <th width="20%">ID UPLOAD</th>
                                                <th width="20%">KEGIATAN</th>
                                                <th width="20%">NAMA TABEL</th>
                                                <th width="10%">CREATE DATE</th>
                                                <th class="text-center" width="10%">PILIH</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                
                                <div class="form-group">

                                    <label>Referensi Element</label>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_element">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="50%">NAMA KOLOM</th>
                                                <th class="text-center" width="20%">TYPE KOLOM</th>
                                                <th class="text-center" width="20%">SIZE KOLOM</th>
                                                <th class="text-center" width="10%">PILIH</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="form-group">
                                    <a href="#" class="btn btn-primary" id="btn_tambah_element"><i class="fa fa-plus"></i> Tambah</a>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <span class='fa fa-check-circle-o'></span> Referensi Final
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">

                                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_conf_element">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" width="30%">ID UPLOAD</th>
                                                        <th class="text-center" width="15%">NO URUT</th>
                                                        <th class="text-center" width="15%">ID ELEMENT</th>
                                                        <th class="text-center" width="10%">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="is_keluarga" id="is_keluarga" value="YA"  />
                                            <label>Data Keluarga</label>
                                            
                                        </div>

                                        <div class="form-group">
                                            <a href="#" class="btn btn-success" id="btn_init_final"><i class="fa fa-save"></i> Proses Final</a>
                                        </div>
                                    </div>
                                </div>


                                
                                
                            </form>


                        </div>
                        
                        
                    </div>


                    
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->


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


<script src="<?php echo base_url('assets/app/js/js_ui_verifikasi.js') ?>"></script>