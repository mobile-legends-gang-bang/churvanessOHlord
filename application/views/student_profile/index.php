
<head>
  <title>Edukit - Student Profile</title>
  <style type="text/css">
    h4{
      color :#494948;
      font-weight: strong;
    }
    .row_padding{
      padding: 5px;
    }
    .align_center{
      padding-left: 50px!important; 
      padding-right: 50px!important;
      text-align: center;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</head>
<body>
<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 300px;">
  <div class="col-md-4 offset-md-4">
      <div class="container" style="padding-bottom: 50px;">
        <img src="<?php echo base_url()?>images/avatar.png" class="center">
        <div class="row row_padding" style="margin-top: 30px; border-bottom: 1px black solid;">
          <h4 class="align_center">Velikkakathu Sankaran Achuthanandan</h4>
          <input id="myInput" type="text" placeholder="Search.." class="form-control">
        </div>
      </div>
    </div>
  <div class="row row_padding" id="myTable">
    <div class="col-md-6">
      <h4 align="center">PERSONAL INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">House Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Street Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Barangay</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">City</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Province</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <h4 align="center">GUARDIAN'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">Full Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Contact Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Relationship</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row row_padding">
        <div class="col-md-5">Section</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6">
          <select class="form-control">
            <option>Einstein</option>
            <option>Pascal</option>
            <option>Newton</option>
          </select>
        </div>
      </div>
      <h4 align="center">FATHER'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Occupation</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <h4 align="center">MOTHER'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Occupation</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 offset-md-3">
        <button class="btn bg-primary">Save Information</button>
      </div>
      <form method="post" id="import_form" enctype="multipart/form-data">
        <div class="col-md-3">
          <input type="file" accept=".xls, .xlsx" name="file" id="file" >
          <br>  
          <br>
          <input type="submit" name="import" value="Batch Enroll Student" class="btn bg-success">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
<script>
$(document).ready(function(){
  load_data();

  function load_data(){
    $.ajax({
      url:"<?php echo base_url(); ?>student_profile/fetch",
      method:"POST",
      success:function(data){
        $('#student_data').html(data);
      }
    })
  }
 $('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url(); ?>student_profile/import",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){

        $('#file').val('');
        load_data();
        alert(data);
      }
    })
  });
});
</script>