
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter Data Keluarga
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Propinsi</label>
                                            <select class="form-control" id="p_kode_prop">
                                                <?php 

                                                    foreach ($propinsi as $row  ) {
                                                    //print_r ($row);
                                                        echo "<option value='".$row->NO_PROP."'>". $row->NAMA_PROP."</option>";
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kab / Kota</label>
                                            <select class="form-control" id="p_kode_kab">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        
                                        <div class="form-group" id="p_kode_kec">
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
                                            <select class="form-control" id="p_kode_kel">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div> 

                                    </div>
                                    <div class="col-md-6">
                                        
                                       <div class="form-group" id="p_jenis_kelamin">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                               
                                            </select>
                                        </div> 

                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>

                <div class="panel-footer">
                    <a id="btn_cari" class="btn btn-info"><i class="fa fa-search"></i> Cari</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Data Keluarga
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="table_keluarga">
                        <thead>
                            <tr>
                                <th>ID STAT</th>
                                <th>ID PERIODE</th>
                                <th>ID REKAP</th>
                                <th>NO PROP</th>
                                <th>NO KAB</th>
                                <th>NO KEC</th>
                                <th>NO KEL</th>
                                <th>NAMA PROP</th>
                                <th>NAMA KAB</th>
                                <th>NAMA KEC</th>
                                <th>NAMA KEL</th>
                                <th>JML K KLRG</th>
                                <th>JML K PROSEN</th>
                                <th>JML P JIWA</th>
                                <th>JML P PROSEN</th>
                                <th>RATA JML KELUARGA</th>
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
        
        //get_stat_umur();

        $('#btn_cari').on('click', function () {

            get_stat_data_keluarga();

        });

    });

    function get_stat_data_keluarga() {

        //$('#loadingnya').loading();
        
        var header_kolom = [];
        var p_kode_prop = $('#p_kode_prop').val();
        var p_kode_kab = $('#p_kode_kab').val();
        var p_kode_kec = $('#p_kode_kec').val();
        var p_kode_kel = $('#p_kode_kel').val();
        

        $("#table_keluarga").dataTable().fnDestroy();
        var tableTemplate = $('#table_keluarga').DataTable({

            "processing": true,
            "language": {
                "loadingRecords": "&nbsp;",
                "processing": "Loading..."
            },
            "serverSide": true,
            "aoColumnDefs": [
            {
                "aTargets": [0],
                "bSortable": false
            }
            ],
            "ajax": {
                "url": BASE_URL+'admin/statistik/get_stat_data_keluarga',
                "type": "POST",
                "data": {
                    header: header_kolom,
                    p_kode_prop: p_kode_prop,
                    p_kode_kab: p_kode_kab,
                    p_kode_kec: p_kode_kec,
                    p_kode_kel: p_kode_kel
                },
                "dataSrc": function (json) {
                    //console.log(json);
                    return json.data;
                }, error: function (request, status, error) {
                    //showMessage(request.responseText);
                    //closeLoader();
                }
            },
            "columns": [
                {"data": "ID_STAT", "defaultContent": ""},
                {"data": "ID_PERIODE", "defaultContent": ""},
                {"data": "ID_REKAP", "defaultContent": ""},
                {"data": "NO_PROP", "defaultContent": ""},
                {"data": "NO_KAB", "defaultContent": ""},
                {"data": "NO_KEC", "defaultContent": ""},
                {"data": "NO_KEL", "defaultContent": ""},
                {"data": "NAMA_PROP", "defaultContent": ""},
                {"data": "NAMA_KAB", "defaultContent": ""},
                {"data": "NAMA_KEC", "defaultContent": ""},
                {"data": "NAMA_KEL", "defaultContent": ""},
                {"data": "JML_K_KLRG", "defaultContent": ""},
                {"data": "JML_K_PROSEN", "defaultContent": ""},
                {"data": "JML_P_JIWA", "defaultContent": ""},
                {"data": "JML_P_PROSEN", "defaultContent": ""},
                {"data": "RATA_JML_KELUARGA", "defaultContent": ""}
                ],
            
            "drawCallback": function (settings) {
                $('th').removeClass('sorting_asc');

            }
        });

        tableTemplate.on('error', function () {
            alert('error');
        });
    

    }
</script>