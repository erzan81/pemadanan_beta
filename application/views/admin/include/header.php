<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

	<title>Pemadanan App Ver 0.1</title>

   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/custom.css') ?>" rel="stylesheet">
   
   <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url('assets/sb-admin-v2/css/plugins/morris/morris-0.4.3.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sb-admin-v2/css/plugins/timeline/timeline.css') ;?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('assets/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') ;?>" rel="stylesheet">
   
   <!-- SB Admin CSS - Include with every page -->
   <link href="<?php echo base_url('assets/sb-admin-v2/css/sb-admin.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/sb-admin-v2/css/select2.min.css') ?>" rel="stylesheet">
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
    <script src="<?php echo base_url('assets/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
      
</head>
<body>

<div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/home');?>">Pemadanan v0.1</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

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
                    
                    <!-- <li class="">
                        <div class="input-group custom-search-form">
                            
                        </div>
                        
                    </li> -->
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        

    </div>
    <!-- /#wrapper -->