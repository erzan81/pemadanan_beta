<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Pemadanan</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="#" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url()?>new_asset/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->  

        <!-- <link href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css" rel="stylesheet"> -->
   
        <!-- <link href="<?php //echo base_url('assets/sb-admin-v2/css/select2.min.css') ?>" rel="stylesheet"> -->
        <link href="<?php echo base_url('assets/plugins/loading/loading.css') ?>" rel="stylesheet">


        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url()?>new_asset/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url()?>new_asset/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- <script src="<?php //echo base_url('assets/sb-admin-v2/js/select2.full.min.js') ?>"></script> -->

        <script src="https://cdn.jsdelivr.net/jquery.tablednd/0.8/jquery.tablednd.0.8.min.js"></script>
 
    
        <script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    
        <script src="<?php echo base_url('assets/plugins/loading/loading.js') ?>"></script>
        
        <script type="text/javascript">
            var BASE_URL = "<?php echo base_url()?>";
        </script>

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo base_url()?>new_asset/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
                  
        <script type='text/javascript' src='<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                                
        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/settings.js"></script>
         -->

        
        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/actions.js"></script>
        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->  

    <script type="text/javascript">
            $(document).ready(function () {
     
                var current_page_URL = location.href;
                $("a").each(function () {
                    var link = $(this);
                    if (link.attr("href") !== "#") {
                        var target_URL = link.prop("href");
                        if (target_URL === current_page_URL) {
                            $('nav a').parents('li, ul').removeClass('active');
                            link.parent('li').addClass('active');
                            link.parent('li').parent('li, ul').parent().addClass('active');
                            return false;
                        }
                    }
                });

                function setBreadcrumb(page) {
                    var breadcrumb = $('#breadcrumb ol');
                    breadcrumb.find('li:not(:first)').remove();
                    var childB = page.split("/");
                    var i = childB.length;
                    while (i--) {
                        breadcrumb.append('<li>' + childB[i] + '</li>');
                    }
                    breadcrumb.find('li:last').attr('class', 'active');
                }

                //console.log(location.href);

                var text = $('li:has(a[href="' + location.href + '"])').parents('li').map(function () {
                    console.log('$(this).children(a): ', $(this).children('a'));
                    var a = $.trim($(this).children('a').text());
                    console.log('a: ', a);
        
                    return $.trim($(this).children('a').text());
                }).get();

                //console.log('text ini : ', text);

                text.unshift($('li a[href="' + location.href + '"]').text());

                //console.log('text: itu : ', text);

                var outputString = text.join('/');
                //console.log('outputString: ', outputString);
                setBreadcrumb(outputString);
            });
        </script> 

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top-fixed">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide scroll page-sidebar-fixed">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Pemadanan</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?=base_url('gambar/no-pic.jpeg');?>" alt="Pemadanan"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?=base_url('uploads/'.$this->session->userdata('photo'));?>" alt="Pemadanan"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $this->session->userdata('nama_user');?></div>
                                <!-- <div class="profile-data-title">Web Developer/Designer</div> -->
                            </div>
                            <!-- <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div> -->
                        </div>                                                                        
                    </li>
                    
                    <li class="">
                        <a href="<?php echo base_url('admin/home');?>"><i class="fa fa-desktop fa-fw"></i> <span class="xn-text">Dashboard</span></a>                        
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/source');?>"><i class="fa fa-upload fa-fw"></i> <span class="xn-text">Upload Data Sumber</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/verifikasi');?>"><i class="fa fa-edit fa-fw"></i> <span class="xn-text">Verifikasi dan Cleansing</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/matching');?>"><i class="fa fa-bar-chart-o fa-fw"></i> <span class="xn-text">Macthing Data</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/export');?>"><i class="fa fa-file fa-fw"></i> <span class="xn-text">Export Data</span></a>
                    </li>


                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-gears"></span> <span class="xn-text">Master</span></a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url('admin/instansi');?>"><span class="fa fa-building-o"></span> Master Instansi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/kolom');?>"><span class="fa fa-columns"></span> Master Kolom</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/element');?>"><span class="fa fa-compass"></span> Master Element</a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-trophy"></span> Master Gelar</a>
                            </li>                           
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-unlock"></span> <span class="xn-text">Management User</span></a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url('admin/user');?>"><span class="fa fa-user"></span> Master User</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/kolom');?>"><span class="fa fa-users"></span> Master Group</a>
                            </li>
                                                      
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="text-danger mb-control" data-box="#mb-signout"><i class="fa fa-power-off fa-fw text-danger" ></i> <span class="xn-text ">Logout</span></a>
                    </li>
                                       
                    
                    
                                      
                   
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="">
                        <a href="#" class="">Aplikasi Pemadanan Ver. 1.0</a>
                    </li>

                    <!-- END TOGGLE NAVIGATION -->
                    >
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <!-- <ul class="breadcrumb" id="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul> -->


                <div id="breadcrumb">
                    <ol class="breadcrumb">
                        <li> <span class="fa fa-home" style="font-size: 18px;"></span> <a href="javascript:void(0);">Beranda</a></li>
                        <li class="active">-</li>
                    </ol>
                </div>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                   
                    
                






