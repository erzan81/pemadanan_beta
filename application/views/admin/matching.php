
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


<script src="<?php echo base_url('assets/app/js/js_ui_matching.js') ?>"></script>