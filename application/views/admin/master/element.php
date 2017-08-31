
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><span class="fa fa-wrench"></span> Master Element</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    List Data Element
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>
                   
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_element">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="25%">TYPE</th>
                                <th width="25%">SIZE</th>
                                <th width="30%">KETERANGAN</th>
                                <th width="10%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeA">
                                <td>1</td>
                                <td>VARCHAR</td>
                                <td>255</td>
                                <td>A</td>
                                <td align="center">
                                    <a href="#" class="btn btn-success btn-xs btn_update"><span class="fa fa-pencil"></span></a>
                                    <a href="#" class="btn btn-danger btn-xs btn_delete"><span class="fa fa-trash-o"></span></a>
                                </td>
                            </tr>

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

<div class="modal fade" id="modal_insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Insert Data</h3>
            </div>

            <div class="modal-body" >
                
                    <div class="row">

                        <div class="col-lg-12">
                            <form role="form">

                                <div class="form-group">
                                    <label>ID ELEMENT</label>
                                    <input type="text" class="form-control" name="p_id_element" id="p_id_element" />
                                </div>
                                <div class="form-group">
                                    <label>TYPE ELEMENT</label>
                                    <input type="text" class="form-control" name="p_type_element" id="p_type_element" />
                                </div>
                                <div class="form-group">
                                    <label>SIZE ELEMENT</label>
                                    <input type="text" class="form-control" name="p_size_element" id="p_size_element" />
                                </div>
                                <div class="form-group">
                                    <label>KETERANGAN</label>
                                    <input type="text" class="form-control" name="p_keterangan" id="p_keterangan" />
                                </div>
                                
                                
                            </form>
                        </div>
                    
                    </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-check"></span> Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Delete Data</h3>
            </div>

            <div class="modal-body" >
                
                <div class="col-lg-12">
                    <center>
                        <p>Apakah Anda Yakin Akan Menhapus Data Tersebut ?</p>
                    </center>
                </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-trash-o"></span> Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabel_element').DataTable({
            responsive: true
        });

        $('.btn_tambah').on('click', function () {

            $('#modal_insert').modal('show');

        });

        $('.btn_update').on('click', function () {

            $('#modal_insert').modal('show');

        });

        $('.btn_delete').on('click', function () {

            $('#modal_delete').modal('show');

        });

        
    });
</script>