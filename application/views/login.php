<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Pemadanan App</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-3.1.1/css/custom.css') ?>" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/sb-admin-v2/css/sb-admin.css') ?>" rel="stylesheet">


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                

                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Pemadanan App Login</h3>
                    </div>
                    <div class="panel-body">
                    <br>
                    <center>
                        <img src="<?=base_url('gambar/logo.png');?>" alt="User Image"/>
                    <center>

                    <br><br>
                        
                            <?php 
                                echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
                                echo form_open('login/do_login'); 
                            ?>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-success btn-block"><b>Login</b></button>
                            </fieldset>

                            <?php echo form_close();?>
                        

                    <div class="social-auth-links text-center">
                      <br>
                      <p>Kementerian Dalam Negeri &copy; 2017
                          <br>
                         Versi 1.0.0 
                      </p>
                    </div><!-- /.social-auth-links -->

                    </div>
                </div>
            </div>
        </div>
    </div>


   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="<?php echo base_url('assets/bootstrap-3.1.1/js/bootstrap.min.js') ?>"></script>
</body>

</html>