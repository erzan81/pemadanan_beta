
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter Data Pendidikan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">


                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pedidikan</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
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
                    List Data Pendidikan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead>
                            <tr>
                                
                                <th>ID REKAP</th>
                                <th>ID STAT</th>
                                <th>ID PERIODE</th>

                                <th>PEDIDIKAN AKHIR</th>
                                <th>JML PDDK</th>
                                <th>BELUM KAWIN J</th>
                                <th>BELUM KAWIN P</th>
                                <th>KAWIN J</th>
                                <th>KAWIN P</th>
                                <th>CERAI HIDUP J</th>
                                <th>CERAI HIDUP P</th>
                                <th>CERAI MATI J</th>
                                <th>CERAI MATI P</th>
                                

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