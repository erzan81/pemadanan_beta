
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter Data Jenis Kelamin
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">


                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Propinsi</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kab / Kota</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            
                                           <div class="form-group">
                                                <label>Kelurahan</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div> 

                                        </div>
                                        <div class="col-md-6">
                                            
                                           <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control">
                                                    <option>Laki - Laki</option>
                                                    <option>Perempuan</option>
                                                   
                                                </select>
                                            </div> 

                                        </div>
                                        
                                    </div>
                                </form>
                                
                                
                                
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>

                <div class="panel-footer">
                    
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                    
                    

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Data Jenis Kelamin
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID REKAP</th>
                                <th>ID PERIODE</th>
                                <th>ID STAT</th>
                                <th>NO PROP</th>
                                <th>NO KAB</th>

                                <th>NO KEC</th>
                                <th>NO KEL</th>
                                <th>NAMA PROP</th>
                                <th>NAMA KAB</th>
                                <th>NAMA KEC</th>

                                <th>NAMA KEL</th>
                                <th>JML LAKI J</th>
                                <th>JML LAKI P</th>
                                <th>JML PEREMPUAN J</th>
                                <th>JML PEREMPUAN P</th>
                                <th>JML TOTAL</th>

                                <th>JML TOTAL PROSEN</th>
                                <th>JML IS AKTA</th>
                                <th>JML IS AKTA PROSEN</th>
                                <th>JML NOT AKTA</th>
                                <th>JML JML NOT AKTA PROSEN</th>
                                

                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>