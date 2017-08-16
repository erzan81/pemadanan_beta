<style type="text/css">

    pre.prettyprint {
        margin-bottom: 20px;
        padding-top: 15px;
    }
    .prettyprint {
        background-color: #F7F7F9;
    }
    code, pre {
        display: block;
        margin: 0 0 10px;
        line-height: 20px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    pre {
        word-break: break-all;
        word-wrap: break-word;
        white-space: pre;
        font-weight:normal;
    }
    pre, code {
        color:#264A94;
        font-family:Monaco, Lucida Console, monospace;
        font-size:90%;
    }
    div#page {
        background-color: white;
        padding: 1em;
    }

    .category td {
        background-color: #E4EBF3;
    }
    table {
        /*position: relative;*/
        border-collapse: separate;
        border-spacing: 0;
    }
    tr {
        /*position: relative;*/
        /*display: block;*/
    }
    .tDnD_whileDrag {
        /*z-index: 500;*/
        /*width: 90%;*/
        /*margin: -10px;*/
        /*display: table-cell;*/
        /*color: transparent;*/
        /*width: 0px*/
    }
    .tDnD_whileDrag td {
        background-color: #eee;
        /*-webkit-box-shadow: 11px 5px 12px 2px #333, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
        -webkit-box-shadow: 6px 3px 5px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;
        /*-moz-box-shadow: 6px 4px 5px 1px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
        /*-box-shadow: 6px 4px 5px 1px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
    }
    /*.tDnD_whileDrag td:first-child {*/

        /*-webkit-box-shadow: 5px 4px 5px 1px #111, 0 1px 0 #ccc inset, 1px -1px 0 #ccc inset;*/

        /*-moz-box-shadow: 6px 3px 5px 2px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset, 1px 0 0 #ccc inset;*/

        /*-box-shadow: 6px 3px 5px 2px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset, 1px 0 0 #ccc inset;*/

        /*}*/
        .tDnD_whileDrag td:last-child {
            /*-webkit-box-shadow: 8px 7px 12px 0 #333, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
            -webkit-box-shadow: 1px 8px 6px -4px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;
            /*-moz-box-shadow: 0 9px 4px -4px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset, -1px 0 0 #ccc inset;*/
            /*-box-shadow: 0 9px 4px -4px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset, -1px 0 0 #ccc inset;*/
        }

        tr.alt td {
            background-color: #ecf6fc;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        td {
            padding-top: 5px;
            padding-bottom: 5px;
            white-space: nowrap;
        }
        tr.myDragClass td {
            /*position: fixed;*/
            color: yellow;
            text-shadow: 0 0 10px black, 0 0 10px black, 0 0 8px black, 0 0 6px black, 0 0 6px black;
            background-color: #999;
            -webkit-box-shadow: 0 12px 14px -12px #111 inset, 0 -2px 2px -1px #333 inset;
        }
        tr.myDragClass td:first-child {
            -webkit-box-shadow: 0 12px 14px -12px #111 inset, 12px 0 14px -12px #111 inset, 0 -2px 2px -1px #333 inset;
        }
        tr.myDragClass td:last-child {
            -webkit-box-shadow: 0 12px 14px -12px #111 inset, -12px 0 14px -12px #111 inset, 0 -2px 2px -1px #333 inset;
        }

        tr.nodrop td {
            border-bottom: 1px solid #00bb00;
            color: #00bb00;
        }
        tr.nodrag td {
            border-bottom: 1px solid #FF6600;
            color: #FF6600;
        }
        div.result {
            background-color: #F7F7F9;
        }
        tr.alt tr:after, .group:after {
            visibility: hidden;
            display: block;
            content:"";
            clear: both;
            height: 0;
        }
        table input, tr td input, tr input, tr.myDragClass input, tbody tr td input {
            z-index: -10;
            text-align: center;
            float: center;
            height: 12px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        td.dragHandle {
        }
        td.showDragHandle {
            background-image: url(images/updown2.gif);
            background-repeat: no-repeat;
            background-position: center center;
            cursor: move;
        }
        .versionHistory td {
            vertical-align: top;
            padding: 0.3em;
            white-space: normal;
        }
        div.indent {
            width: 30px;
            float: left;
        }
        #sprintlist_table th {
            color: white;
            /*border-style: ;*/
            text-shadow: 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600, 0 0 18px #FF6600;
            border-bottom: 14px double #FF6600;
            padding: 10px;
        }
        .sprintlist-drag td.small_buttons div button {
            /*font-size: xx-small;*/
            /*height: 18px;*/
            /*color: #333;*/
            /*cursor: pointer;*/
            /*background-color: #f4a460;*/
            box-shadow:0px 2px 3px black inset;
            -moz-box-shadow:0px 2px 3px black inset;
            -webkit-box-shadow:0px 2px 3px black inset;
            /*border: 0px;*/
            /*background-color: #ccc;*/
        }
        .sprintlist-drag td.small_buttons div button:first-child {
            box-shadow:2px 2px 3px black inset;
            -moz-box-shadow:2px 2px 3px black inset;
            -webkit-box-shadow:2px 2px 3px black inset;
            /*border: 0px;*/
            /*background-color: #ccc;*/
        }
        .sprintlist-drag td {
            background-color: #f4a460;
            /*-webkit-box-shadow: 11px 5px 12px 2px #333, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
            -webkit-box-shadow: 6px 3px 5px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;
            /*-moz-box-shadow: 6px 4px 5px 1px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
            /*-box-shadow: 6px 4px 5px 1px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
        }
        .sprintlist-drag td:last-child {
            /*-webkit-box-shadow: 8px 7px 12px 0 #333, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;*/
            -webkit-box-shadow: 1px 8px 6px -4px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset;
            /*-moz-box-shadow: 0 9px 4px -4px #555, 0 1px 0 #ccc inset, 0 -1px 0 #ccc inset, -1px 0 0 #ccc inset;*/
        }
        tr.group_heading td eojq border-bottom: 8px double #FF6600;
        color: #FF6600;
        font-size: larger;
        font-weight: bolder;

    }




</style>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><span class="fa fa-upload"></span> Upload Data Sumber</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Upload Data Source / Sumber Data
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Upload From Excel / CSV</a>
                        </li>
                        <li><a href="#edit" data-toggle="tab">Upload From DMP</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <br>

                            <form role="form">

                                <!-- <div class="form-group">
                                    <label>No Matching</label>
                                    <input class="form-control" readonly="true" placeholder="Generated by System">

                                </div> -->

                                <div class="form-group">
                                    <label>Instansi</label>
                                    <select class="form-control" id="cmb_instansi" name="cmb_instansi">
                                        <?php 
                                        
                                        foreach ($instansi as $row  ) {
                                            //print_r ($row);
                                            echo "<option value='".$row->INSTANSI_ID."'>". $row->INSTANSI_NAMA."</option>";
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Inisialisasi Kolom</label>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="table_kolom">
                                        <thead>
                                            <tr>
                                                <th>NAMA KOLOM</th>
                                                <th>TIPE KOLOM</th>
                                                <th>SIZE KOLOM</th>
                                                <th width="10%">PILIH</th>
                                                <th width="12%">PRIMARY KEY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($kolom as $key) {

                                                echo "<tr>
                                                <td>".$key->ID_KOLOM."</td>
                                                <td>".$key->TIPE_KOLOM."</td>
                                                <td>".$key->SIZE_KOLOM."</td>
                                                <td align='center'><input type='checkbox' name='pilih' value='".$key->ID_KOLOM."'/></td>
                                                <td align='center'><input type='checkbox'/></td>

                                            </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>


                            <div class="form-group">
                                <label>*Note : Upload file excel dengan extensi (.xlsx) / (.csv)</label>
                                
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .csv">
                            </div>
                            <p id="msg"></p>
                            <a class="btn btn-info" id="upload"><i class="fa fa-upload" ></i> Upload</a>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="edit">
                        <br>


                    </div>

                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->

</div>


<div class="row">

    <div class="col-md-12">
        <div class="panel panel-success active">
            <div class="panel-heading">
                History Upload Data Source
            </div>
            <div class="panel-body">
                <div class="row">


                    <div class="col-lg-12">

                        <form role="form">
                            <h4>File.xls</h4>
                            <blockquote>
                                <p>File.xls Berhasil Upload. Total Keselurahan Data : <b>500025</b> <a class="btn btn-info btn-xs"><span class="fa fa-search"></span> See Detail</a></p>

                                <small class="text-success">Berhasil Upload 
                                    <cite title="Source Title">50000 Data</cite>
                                </small>
                                <small class="text-danger">Someone famous in
                                    <cite title="Source Title">25 Data</cite>
                                </small>
                            </blockquote>
                            <h4>File-2.xls</h4>
                            <blockquote>
                                <p>File-2.xls Berhasil Upload. Total Keselurahan Data : <b>500025</b> <a class="btn btn-info btn-xs"><span class="fa fa-search"></span> See Detail</a></p>

                                <small class="text-success">Berhasil Upload 
                                    <cite title="Source Title">50000 Data</cite>
                                </small>
                                <small class="text-danger">Someone famous in
                                    <cite title="Source Title">25 Data</cite>
                                </small>
                            </blockquote>

                            <button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> Proses Final</button>
                            <!-- /.col-lg-6 (nested) -->
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
<script type="text/javascript">

    $(document).ready(function() {
      $("#cmb_instansi").select2();

      


      $('#upload').on('click', function () {
        
                    var file_data = $('#file').prop('files')[0];
                    var kolom = get_kolom_check();
                    var instansi = $('#cmb_instansi').val();
                    var form_data = new FormData();
                    form_data.append('files', file_data);
                    form_data.append('p_kolom', kolom);
                    form_data.append('p_instansi_id', instansi);
                    //form_data.append()
                    $.ajax({
                        url: '<?php echo base_url()?>admin/source/upload_file', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });
                });



    // Make a nice striped effect on the table
    //$("#table_kolom tr:even').addClass('alt')");

    // Initialise the second table specifying a dragClass and an onDrop function that will display an alert
    $("#table_kolom").tableDnD({
        onDragClass: "myDragClass",
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var debugStr = "Row dropped was "+row.id+". New order: ";
            for (var i=0; i<rows.length; i++) {
                debugStr += rows[i].id+" ";
            }
            $(table).parent().find('.result').text(debugStr);
        },
        onDragStart: function(table, row) {
            $(table).parent().find('.result').text("Started dragging row "+row.id);
        }
    });
});

    function get_kolom_check(){

        var selected = "";
        $('#table_kolom input[name="pilih"]:checked').each(function() {
            selected += $(this).val() + ";";
        });

        var str1 = selected;
        var str2 = str1.slice(0, -1) + '';
        return str2;
    }





</script>