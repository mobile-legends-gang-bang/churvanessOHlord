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
  <!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script> -->
  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/sb-admin-charts.min.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-ui.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar.js"></script>
  <!-- Sweet ALert-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>
  <title>Edukit - Register Account</title>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="fname">First name</label>
                <input class="form-control" id="fname" name="fname" type="text" aria-describedby="nameHelp" placeholder="First name" required>
              </div>
              <div class="col-md-6">
                <label for="lname">Last name</label>
                <input class="form-control" id="lname" name="lname" type="text" aria-describedby="nameHelp" placeholder="Last name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" aria-describedby="emailHelp" placeholder="Username" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="confirm_password">Confirm password</label>
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="Register">
        </form>
        <div class="text-center">
          <p class="d-block small mt-3">Already have and account?</p>
          <a class="d-block small mt-3" href="<?php echo base_url()?>login/index">Click here to login</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          type:'post',
          url: '<?php echo base_url()?>register/savedata',
          data: new FormData($(this)[0]),
          dataType: 'json',
          cache:false,
          contentType:false,
          processData:false,
          beforeSend: function(){
            // $('#process_indicator').show();
          },
          success: function (response){
            // $('#process_indicator').hide();
            if (response.status) {
              $('input[type=text], input[type=password]').val("");
              swal("You are successfully registered!", "", "success");
            } else 
              alert(response.message);
          },
          error:function(request,status,error){ 
            // $('#process_indicator').hide();
            alert('Lost connection from the server!!');
          }
        });
      });
    });
  </script>
</body>

</html>
