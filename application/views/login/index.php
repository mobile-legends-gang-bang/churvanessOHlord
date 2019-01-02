<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
    <link rel="icon" sizes="32*32" href="<?php echo base_url()?>/images/favicon(1).ico" type="image/x-icon">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
     <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script> -->
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/sb-admin-charts.min.js"></script> -->

    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar.js"></script>
  <title>Edukit - Login</title>
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
   <script type="text/javascript">
    $(function(){
      txtInvalid = $(".container .alert").contents().eq(5).text().slice(0, 7);
      if(txtInvalid != ""){
        $(".container .alert").show();
      }
      setInterval(function(){
        $(".container .alert").fadeOut();
       }, 2500);
    });
  </script>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="alert alert-danger alert-dismissable" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <?php echo validation_errors()?>
    </div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url()?>verify_login/index">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" placeholder="Username" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" value="<?php echo set_value('password'); ?>" placeholder="Password" maxlength="30" required>
          </div>
          <!-- <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
        </form>
        <div class="text-center">
          <p class="d-block small mt-3" style="padding-bottom: 0px;">No account yet?</p>
          <a class="d-block small mt-3" href="<?php echo base_url()?>register/index">Register an Account</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
 
</body>
</html>
