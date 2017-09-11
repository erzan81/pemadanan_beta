
<style type="text/css">
    td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    .shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
    }


</style>


<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Matching Data
                </div>
                <div class="panel-body tabs">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#inisialisasi" role="tab" data-toggle="tab">Inisialisasi Pemadanan</a>
                        </li>
                        <li><a href="#final" role="tab" data-toggle="tab" id="proses_pemadanan">Proses Pemadanan</a>
                        </li>
                        
                    </ul>


                    <div class="panel-body tab-content">
                        <div class="tab-pane fade in active" id="inisialisasi">
                            
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
                                <div class="panel panel-danger active">
                                    <div class="panel-heading">
                                        List Step Pemadanan
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">


                                            <div class="col-lg-12">

                                                <form role="form">
                                                    <div class="form-group" id="init_kolom">
                                                            
                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="table_acuan_step">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">#</th>
                                                                        <th width="5%">STEP</th>
                                                                        <th width="20%">INSTANSI</th>
                                                                        <th width="20%">ID UPLOAD</th>
                                                                        <th width="15%">ACUAN STEP</th>
                                                                        <th width="15%">KETERANGAN</th>
                                                                        <th width="10%">AKSI</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     
                                                                    
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
                                <!-- /.panel -->`   

                            
                        </div>

                        <div class="tab-pane fade" id="final">
                            
                            <div class="form-group" id="init_kolom">
                                
                                <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_proses">
                                    <thead>
                                        <tr>
                                            <th width="20%">INSTANSI</th>
                                            <th width="20%">ID UPLOAD</th>
                                            <th width="20%">UPLOAD KE</th>
                                            <th width="20%">NAMA FILE</th>
                                            <th width="10%">CREATE DATE</th>
                                            <th class="text-center" width="10%">PILIH</th>
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
                                                                        <th width="20%">COMBO STEP</th>
                                                                        <th width="15%">JENIS MATCHING</th>
                                                                        <th width="10%">AKSI</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     <tr>
                                                                        <td align="center">1</td>
                                                                        <td align="center">100%</td>
                                                                        <td align="center">85%</td>
                                                                        
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Step 1 </option>
                                                                                <option value=">="> Step 2</option>
                                                                                <option value=">"> Step 3 </option>
                                                                            </select>

                                                                        </td>
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Paralel </option>
                                                                                <option value=">="> Serial </option>
                                                                            </select>

                                                                        </td>
                                                                        <td align="center"><span class="btn btn-info">Proses</span> </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td align="center">1</td>
                                                                        <td align="center">100%</td>
                                                                        <td align="center">85%</td>
                                                                        
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Step 1 </option>
                                                                                <option value=">="> Step 2</option>
                                                                                <option value=">"> Step 3 </option>
                                                                            </select>

                                                                        </td>
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Paralel </option>
                                                                                <option value=">="> Serial </option>
                                                                            </select>

                                                                        </td>
                                                                        <td align="center"><span class="btn btn-info">Proses</span> </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td align="center">1</td>
                                                                        <td align="center">100%</td>
                                                                        <td align="center">85%</td>
                                                                        
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Step 1 </option>
                                                                                <option value=">="> Step 2</option>
                                                                                <option value=">"> Step 3 </option>
                                                                            </select>

                                                                        </td>
                                                                        <td align="center">

                                                                            <select class="form-control atribut" id="atribut">
                                                                                <option value="="> Paralel </option>
                                                                                <option value=">="> Serial </option>
                                                                            </select>

                                                                        </td>
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



<script src="<?php echo base_url('assets/app/js/js_ui_matching.js') ?>"></script>