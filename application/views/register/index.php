<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('load/head')?>   
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
                <input class="form-control" id="fname" name="fname" type="text" aria-describedby="nameHelp" placeholder="First name">
              </div>
              <div class="col-md-6">
                <label for="lname">Last name</label>
                <input class="form-control" id="lname" name="lname" type="text" aria-describedby="nameHelp" placeholder="Last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" aria-describedby="emailHelp" placeholder="Username">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="confirm_password">Confirm password</label>
                <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password">
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
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

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
              alert("Successfully registered!");
            } else 
              alert(response.message);
          },
          error:function(request,status,error){ 
            // $('#process_indicator').hide();
            winAlert('Lost connection from the server!!');
          }
        });
      });
    });
  </script>
</body>

</html>
