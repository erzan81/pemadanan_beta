
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>


<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Matching Data
                </div>
                <div class="panel-body tabs">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#inisialisasi" role="tab" data-toggle="tab">Proses Pemadanan</a>
                        </li>
                        <li><a href="#final" role="tab" data-toggle="tab" id="proses_pemadanan">Monitoring Pemadanan</a>
                        </li>
                        
                    </ul>


                    <div class="panel-body tab-content">
                        <div class="tab-pane fade in active" id="inisialisasi">
                            
                            <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_main_final">
                                    <thead>
                                        <tr>
                                            <th width="15%">INSTANSI</th>
                                            <th width="15%">ID UPLOAD</th>
                                            <th>KEGIATAN</th>
                                            <th>NAMA TABEL</th>
                                            <th>CREATE DATE</th>
                                            <th class="text-center" width="10%">PILIH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                    </tbody>
                                </table>
                            </div>

                            
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
                                                                     
                                                                </tbody>
                                                        </table>
                                                    </div>


                                                    <a href="#" class="btn btn-success pull-right" id="btn_proses_kolom"><i class="fa fa-refresh"></i> Proses</a>
                                                </form>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->

                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                                <div class="panel panel-danger active" id="list_step_pemadanan">
                                    <div class="panel-heading">
                                        List Step Pemadanan
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">


                                            <div class="col-lg-12">

                                                <form role="form">
                                                    <div class="form-group" id="init_kolom">
                                                            
                                                            <table width="100%" class="table table-striped table-bordered" id="table_acuan_step">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">#</th>
                                                                        <th width="5%">STEP</th>
                                                                        <th width="15%">INSTANSI</th>
                                                                        <th width="15%">ID UPLOAD</th>
                                                                        <th width="15%">KETERANGAN</th>
                                                                        <th width="20%">AKSI</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     
                                                                    
                                                                </tbody>
                                                        </table>
                                                    </div>


                                                </form>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->

                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->`   

                            
                        </div>

                        <div class="tab-pane fade" id="final">
                            
                            <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_proses">
                                    <thead>
                                        <tr>
                                            <th width="20%">INSTANSI</th>
                                            <th width="20%">ID UPLOAD</th>
                                            <th>KEGIATAN</th>
                                            <th>NAMA TABEL</th>
                                            <th width="10%">CREATE DATE</th>
                                            <th class="text-center" width="10%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                    </tbody>
                                </table>
                            </div>

                            <div class="panel panel-danger active">
                                    <div class="panel-heading">
                                        Acuan Step
                                    </div>
                                    <div class="panel-body" id="main_final">
                                        <div class="row">


                                            <div class="col-lg-12">

                                                <form role="form">
                                                    <div class="form-group">
                                                            
                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="table_final_pemadanan">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="7%">#</th>
                                                                        <th width="20%">ID UPLOAD</th>
                                                                        <th width="10%">STEP KE</th>
                                                                        <th width="20%">NAMA TABEL</th>
                                                                        <th width="25%">STATUS</th>
                                                                        <th width="15%">AKSI</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     
                                                                    
                                                                </tbody>
                                                        </table>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->

                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>



                                    
                                     


                                </div>

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
</div>

<div class="modal fade" id="modalEdit" >
  <div class="modal-dialog">
    <div class="modal-content" style="width: 700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Edit Metode Pemadanan </h3></center>
        </div>
        
        <div class="modal-body" >
                
        <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_kolom_pemadanan_edit">
                    <thead>
                        <tr>
                            <th>NAMA KOLOM</th>
                            <th width="11%">IS MATCHING</th>
                            <th width="20%">METODE</th>
                            <th width="10%">ATRIBUT</th>
                            <th width="10%">NILAI</th>
                            <th width="10%">IS DIGIT</th>
                            <th width="10%">DIGIT</th>
                        </tr>
                    </thead>
                    <tbody>
                         
                    </tbody>
            </table>

        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Kembali</button>
            <a href="#" class="btn btn-info" id="btn_proses_kolom_edit" data-dismiss="modal"><span class="fa fa-check"></span> Update</a>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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

<div class="modal fade" id="modal_init">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Informasi </h3></center>
        </div>
        
        <div class="modal-body" >
            <center><p id="pesan_inisialisasi"></p></center>
        </div>
        
        <div class="modal-footer">

            <a href="#" class="btn btn-success" id="btn_inisialisasi" data-dismiss="modal"><span class="fa fa-save" ></span> Proses</a>

        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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



<script src="<?php echo base_url('assets/app/js/js_ui_matching.js') ?>"></script>