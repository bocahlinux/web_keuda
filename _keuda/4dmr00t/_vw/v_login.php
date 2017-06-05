<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/blue.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
        <div class="login-logo">
          <img src="<?php echo base_url();?>assets/file/img-logo/logo-login.png" alt="logo" style="min-width:50%;max-width:100%"" >
        </div>
        <br>
        
        <form id="validation-form" method="post" action="<?php echo base_url();?>4dmr00t/Pg_login/do_login" >
          <div class="form-group has-feedback">
            <input type="email" name="email" id="email" class="form-control " required="" placeholder="Email" autofocus="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control " required="" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
          <?php
              $valid = validation_errors();
                                  if(!empty($valid)){
            ?>
                                    <div class="alert alert-error">
                                      <strong>Warning ..!!! </strong>
                                      <?php
                echo validation_errors();
              ?>
            </div>
            <?php } ?>
            <?php
              $info = $this->session->flashdata('result_login');
              if(!empty($info)){
              ?>
            <div class="alert alert-error">
                                        <strong>Warning ..!!! </strong>
                                        <?php
                echo validation_errors();
                echo $this->session->flashdata('result_login');
              ?>
            </div>
            <?php } ?>
        </form>
      <br>
      </div>
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url();?>assets/login/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url();?>assets/login/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/login/js/icheck.min.js"></script>
    
    <script>
      $(function () 
      {
        $('input').iCheck(
        {
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>
