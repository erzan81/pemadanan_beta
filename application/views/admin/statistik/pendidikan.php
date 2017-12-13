
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
                                                <select class="form-control" id="p_pendidikan">
                                                    <option>-- Pilih Pendidikan --</option>
                                                    <?php 

                                                        foreach ($pendidikan as $row  ) {
                                                        //print_r ($row);
                                                            echo "<option value='".$row->ID_PENDIDIKAN."'>". $row->KETERANGAN."</option>";
                                                        }

                                                    ?>
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
                    List Data Pendidikan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="table_pendidikan">
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
        
        //get_stat_umur();

        $('#btn_cari').on('click', function () {

            get_stat_pendidikan();

        });

    });

    function get_stat_pendidikan() {

        //$('#loadingnya').loading();
        
        var header_kolom = [];
        var p_pendidikan = $('#p_pendidikan').val();

        $("#table_pendidikan").dataTable().fnDestroy();
        var tableTemplate = $('#table_pendidikan').DataTable({

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
                "url": BASE_URL+'admin/statistik/get_stat_pendidikan',
                "type": "POST",
                "data": {
                    header: header_kolom,
                    p_pendidikan: p_pendidikan
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
                {"data": "ID_REKAP", "defaultContent": ""},
                {"data": "ID_STAT", "defaultContent": ""},
                {"data": "ID_PERIODE", "defaultContent": ""},
                {"data": "PENDIDIKAN_AKHIR", "defaultContent": ""},
                {"data": "JML_PDDK", "defaultContent": ""},
                {"data": "BELUM_KAWIN_J", "defaultContent": ""},
                {"data": "BELUM_KAWIN_P", "defaultContent": ""},
                {"data": "KAWIN_J", "defaultContent": ""},
                {"data": "KAWIN_P", "defaultContent": ""},
                {"data": "CERAI_HIDUP_J", "defaultContent": ""},
                {"data": "CERAI_HIDUP_P", "defaultContent": ""},
                {"data": "CERAI_MATI_J", "defaultContent": ""},
                {"data": "CERAI_MATI_P", "defaultContent": ""}
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