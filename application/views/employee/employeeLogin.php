<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Employee Login</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url();?>niceAssets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url();?>niceAssets/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo base_url();?>niceAssets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>niceAssets/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo base_url();?>niceAssets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>niceAssets/css/style-responsive.css" rel="stylesheet" />
</head>
<body class="login-img3-body">
    <div class="container">
        <form class="login-form" method="post" action="">
            <div class="login-wrap"><p class="login-img"><i class="icon_lock_alt"></i></p>
                <center><h3><?php echo $this->session->flashdata('message_name'); ?></h3></center>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Email" autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" autofocus>
                    </div>
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                    </label>
                    <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
                    <!--button class="btn btn-info btn-lg btn-block"  type="submit">Signup</button-->
            </div>
        </form>
        <div class="text-right">
            <div class="credits">
                Designed by <a href="http://www.fortecsolution.com">Fortec</a>
            </div>
        </div>
    </div>
</body>
</html>