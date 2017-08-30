<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

	<title>Codeigniter</title>

   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/custom.css') ?>" rel="stylesheet">
   
   <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url('assets/sb-admin-v2/css/plugins/morris/morris-0.4.3.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sb-admin-v2/css/plugins/timeline/timeline.css') ;?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <!-- <link href="<?php //echo base_url('assets/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') ;?>" rel="stylesheet"> -->
    <link href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css" rel="stylesheet">
   
   <!-- SB Admin CSS - Include with every page -->
   <link href="<?php echo base_url('assets/sb-admin-v2/css/sb-admin.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/sb-admin-v2/css/select2.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/plugins/loading/loading.css') ?>" rel="stylesheet">


   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
   <script src="<?php echo base_url('assets/bootstrap-3.1.1/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/bootstrap-3.1.1/js/custom.js') ?>"></script>
   
   
   
   <!-- Core Scripts - Include with every page -->    
    <script src="<?php echo base_url('assets/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo base_url('assets/sb-admin-v2/js/select2.full.min.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/jquery.tablednd/0.8/jquery.tablednd.0.8.min.js"></script>
 
    <!-- DataTables JavaScript -->
    <!-- <script src="<?php //echo base_url('assets/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') ?>"></script> -->
    <script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    
    <!-- <script src="<?php //echo base_url('assets/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script> -->
    <!-- <script src="http://cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.min.js"></script> -->
    
    <script src="<?php echo base_url('assets/plugins/loading/loading.js') ?>"></script>
    <script type="text/javascript">
        
        var BASE_URL = "<?php echo base_url()?>";
    </script>
</head>
<body style="padding-top: 0px;">

<div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url('admin/home');?>"></a>
                
            </div>
            <div class="pull-right">
                <a class="navbar-brand">Selamat Datang, <?php echo $this->session->userdata('nama');?></a>
            </div>
            <!-- /.navbar-header -->

            

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        
                            <span class="fa fa-list"></span> Navigation
                        
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/home');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('admin/source');?>"><i class="fa fa-upload fa-fw"></i> Upload Data Sumber</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/verifikasi');?>"><i class="fa fa-edit fa-fw"></i> Verifikasi dan Cleansing Data</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/matching');?>"><i class="fa fa-bar-chart-o fa-fw"></i> Macthing Data</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/monitoring');?>"><i class="fa fa-laptop fa-fw"></i> Monitoring</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/export');?>"><i class="fa fa-file fa-fw"></i> Export Data</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-databases"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Master Instansi</a>
                            </li>
                            <li>
                                <a href="morris.html">Master Kolom</a>
                            </li>
                            <li>
                                <a href="morris.html">Master Gelar</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout');?>" class="text-danger"><i class="fa fa-power-off fa-fw"></i> Logout</a>
                    </li>
                    
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        

    </div>
    <!-- /#wrapper -->