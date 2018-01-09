<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Pemadanan</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->  
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url()?>new_asset/css/theme-default.css"/>   
        <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl()?>" />   
        <!-- EOF CSS INCLUDE -->                                  
    </head>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
            
           
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
               
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                   

                    <div class="row">
                        

                        <?php 
                            echo form_open('login/do_login'); 
                        ?>
                        <br><br>

                        <div class="col-md-4 col-md-offset-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    
                                    <center>
                                        <img src="<?=base_url('gambar/logo.png');?>" alt="User Image"/>
                                    <center>
                                    <center><h2>Login</h2></center>
                                    

                                    <fieldset>
                                        <div class="form-group">
                                            <?php 
                                                echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
                                            ?>
                                            <?php echo $pesan; ?>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="CaptchaCode">Please retype the characters from the image:</label>
                                            <?php echo $captchaHtml; ?>
                                            <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode" value="" size="50" />

                                        </div>
                                        
                                        
                                        <!-- Change this to a button or input when using this as a form -->
                                        <button type="submit" class="btn btn-success btn-block"><b>Login</b></button>
                                    </fieldset>

                                    <?php echo form_close();?> 
    
                                </div>
                                <div class="panel-footer text-center">
                                    
                                      Kementerian Dalam Negeri &copy; 2017<br>
                                      Versi 1.0.0

                                </div>
                            </div>
                        </div>
                    </div>

                                  
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/bootstrap/bootstrap.min.js"></script>   
          
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END PAGE PLUGINS -->         
        <script type='text/javascript' src='<?php echo base_url()?>new_asset/js/plugins/icheck/icheck.min.js'></script>   
        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/actions.js"></script>  

        <script type="text/javascript" src="<?php echo base_url()?>new_asset/js/demo_dashboard.js"></script>    
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






