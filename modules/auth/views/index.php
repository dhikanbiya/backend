<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo assets_url('bootstrap/css')?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url('css')?>login.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Silahkan Login</h1>
            <?php echo $this->session->flashdata('msg');?>
            <h3><?php echo validation_errors();?></h3>
            <div class="account-wall">
                <img class="profile-img" src="<?php echo assets_url('images');?>tangsel-logo.png"
                    alt="">
                <form class="form-signin" method="post" action="<?php echo base_url()?>auth/login">
                <input type="text" class="form-control" name="email" placeholder="Email"  autofocus required>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>               
                <a href="#" class="pull-right need-help">Forgot Password</a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo assets_url('js')?>jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo assets_url('bootstrap/js')?>bootstrap.min.js"></script>
  </body>
</html>