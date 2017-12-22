
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter Data Umur
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">


                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Range Umur</label>
                                                <select class="form-control select" data-live-search="true" id="p_umur">
                                                    <option>-- Pilih Umur --</option>
                                                    <?php 

                                                    foreach ($umur as $row  ) {
                                                        //print_r ($row);
                                                        echo "<option value='".$row->ID_UMUR."'>". $row->KETERANGAN."</option>";
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
                    List Data Umur
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="table_umur">
                        <thead>
                            <tr>
                                <th>ID STAT</th>
                                <th>ID REKAP</th>
                                <th>ID PERIODE</th>
                                <th>KELOMPOK UMUR</th>
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
        
        //get_stat_umur();

        $('#btn_cari').on('click', function () {

            get_stat_umur();

        });

    });

    function get_stat_umur() {

        //$('#loadingnya').loading();
        
        var header_kolom = [];
        var p_umur = $('#p_umur').val();

        $("#table_umur").dataTable().fnDestroy();
        var tableTemplate = $('#table_umur').DataTable({

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
                "url": BASE_URL+'admin/statistik/get_stat_umur',
                "type": "POST",
                "data": {
                    header: header_kolom,
                    p_umur: p_umur
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
                {"data": "ID_REKAP", "defaultContent": ""},
                {"data": "ID_PERIODE", "defaultContent": ""},
                {"data": "KELOMPOK_UMUR", "defaultContent": ""},
                {"data": "JML_LAKI_J", "defaultContent": ""},
                {"data": "JML_LAKI_P", "defaultContent": ""},
                {"data": "JML_PEREMPUAN_J", "defaultContent": ""},
                {"data": "JML_PEREMPUAN_P", "defaultContent": ""},
                {"data": "JML_TOTAL", "defaultContent": ""},
                {"data": "JML_TOTAL_PROSEN", "defaultContent": ""},
                {"data": "JML_IS_AKTA", "defaultContent": ""},
                {"data": "JML_IS_AKTA_PROSEN", "defaultContent": ""},
                {"data": "JML_NOT_AKTA", "defaultContent": ""},
                {"data": "JML_NOT_AKTA_PROSEN", "defaultContent": ""}

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