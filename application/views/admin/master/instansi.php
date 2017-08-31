
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><span class="fa fa-institution"></span> Master Instansi</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    List Data Instansi
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group">
                        <a href="#" class="btn btn-info btn_tambah"><span class="fa fa-plus"></span> Tambah</a>
                    </div>
                   
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_instansi">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">NAMA INSTANSI</th>
                                <th width="25">ALAMAT</th>
                                <th width="15%">TELP</th>
                                <th width="20%">KETERANGAN</th>
                                <th width="10%" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeA">
                                <td>1</td>
                                <td>NAMA</td>
                                <td>ALAMAT</td>
                                <td>1.7</td>
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
                                    <label>ID INSTANSI</label>
                                    <input type="text" class="form-control" name="p_id_instansi" id="p_id_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>NAMA INSTANSI</label>
                                    <input type="text" class="form-control" name="p_nama_instansi" id="p_nama_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>ALAMAT INSTANSI</label>
                                    <input type="text" class="form-control" name="p_alamat_instansi" id="p_alamat_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>TELP INSTANSI</label>
                                    <input type="text" class="form-control" name="p_telp_instansi" id="p_telp_instansi" />
                                </div>
                                <div class="form-group">
                                    <label>KETERANGAN</label>
                                    <input type="text" class="form-control" name="p_ket_instansi" id="p_ket_instansi" />
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
        $('#tabel_instansi').DataTable({
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