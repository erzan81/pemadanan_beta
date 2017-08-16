
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><span class="fa fa-check-square-o"></span> Verifikasi dan Cleansing Data</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Verifikasi dan Cleansing Data
                </div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Verifikasi Data</a>
                        </li>
                        <li><a href="#edit" data-toggle="tab">Perubahan Data</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <form role="form">

                                <div class="form-group">
                                    <label>No Matching</label>
                                    <input class="form-control" >

                                </div>

                                <div class="form-group">
                                    <label>Instansi</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="text-danger">Note : File yang akan diupload harus bertype excel (.xls)</label>
                                    

                                </div>
                                
                                
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file">
                                </div> -->

                                <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Proses </button>
                                
                            </form>


                        </div>
                        <div class="tab-pane fade in" id="edit">
                            <form role="form">

                                <div class="form-group">
                                    <label>No Matching</label>
                                    <input class="form-control" >

                                </div>

                                <div class="form-group">
                                    <label>Instansi</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Perubahan : </label>
                                    <label class="radio-inline text-info">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked><i class="fa fa-pencil"></i> Edit
                                    </label>
                                    <label class="radio-inline text-success">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2"><i class="fa fa-plus"></i> Tambah
                                    </label>
                                    <label class="radio-inline text-danger">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3"><i class="fa fa-trash-o"></i> Hapus
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                    <i class="text-danger">*Note : File yang akan diupload harus bertype excel (.xls)</i>
                                </div>

                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file">
                                </div>

                                <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload Perubahan</button>
                                
                            </form>


                        </div>
                    </div>


                    
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Data
                            <div class="pull-right">
                                <a href="" class="btn btn-success btn-xs"><i class="fa fa-file"></i> Export to Excel</a>
                            </div>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">4</td>
                                        <td class="center">X</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <td class="center">5.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Win 98+</td>
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td class="center">7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>Trident</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td class="center">1.9</td>
                                        <td class="center">A</td>
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

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>