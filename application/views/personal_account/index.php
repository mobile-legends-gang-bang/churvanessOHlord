
<head>
  <title><?php echo $title?></title>
<style type="text/css">
  h4{
    color :#494948;
    font-weight: strong;
  }
  .row_padding{
    padding: 5px;
  }
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }
  hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
  }
  .align_center{
    padding-left: 50px!important; 
    padding-right: 50px!important;
    text-align: center;
  }
</style>
<script type="text/javascript">
   $(document).ready(function(){

    $('#updateinfo').click(function(){
      var teacher_id = $('#personal_form #teacher_id').val();
      var personal_username = $('#personal_form #personal_username').val();
      var personal_fname = $('#personal_form #personal_fname').val();
      var personal_mname = $('#personal_form #personal_mname').val();
      var personal_lname = $('#personal_form #personal_lname').val();
      var personal_exname = $('#personal_form #personal_exname').val();
      var personal_bday = $('#personal_form #personal_bday').val();
      var personal_age = $('#personal_form #personal_age').val();
      var personal_hnum = $('#personal_form #personal_hnum').val();
      var personal_stnum = $('#personal_form #personal_stnum').val();
      var personal_brgy = $('#personal_form #personal_brgy').val();
      var personal_city = $('#personal_form #personal_city').val();
      var personal_prov = $('#personal_form #personal_prov').val();
      var personal_degree = $('#personal_form #personal_degree').val();
      var personal_instname = $('#personal_form #personal_instname').val();
      var personal_yrgrad = $('#personal_form #personal_yrgrad').val();
      var personal_num = $('#personal_form #personal_num').val();
      var personal_telnum = $('#personal_form #personal_telnum').val();
      var personal_email = $('#personal_form #personal_email').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('personal_account/updatePersonalInfo')?>',
        data: { teacher_id: teacher_id, personal_username: personal_username, personal_fname: personal_fname, personal_mname: personal_mname, personal_lname: personal_lname, personal_exname: personal_exname, personal_bday: personal_bday, personal_age: personal_age, personal_hnum: personal_hnum,
            personal_stnum: personal_stnum, personal_brgy: personal_brgy, personal_city: personal_city, personal_prov: personal_prov, personal_degree: personal_degree, personal_instname: personal_instname, personal_yrgrad: personal_yrgrad, personal_num: personal_num, personal_telnum: personal_telnum, personal_email: personal_email },
        dataType: 'json',
        success: function(response){
          if (response.status) {
              // get_class();
              $('#personal_form')[0].reset();
              swal("Successfully Updated!", "", "success");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert('ahhaha sayup yot');
        }
      });
    });
 });
</script>

</head>
<body>
<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 300px;">
  <div class="row row_padding">
    <div class="col-md-6">
      <form method="post" id="personal_form">
        <div class="row row_padding">
          <div class="col-md-5">TEACHER IDNO.</div>
          <div class="col-md-1">:</div>
          <?php foreach ($teacherinfo as $row): ?>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->teacher_id?>" name="teacher_id" id="teacher_id" disabled></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Username</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->username?>" name="personal_username" id="personal_username" maxlength="30"></div>
        </div>
        <h4 align="center">PERSONAL INFORMATION</h4>
        <div class="row row_padding">
          <div class="col-md-5">First Name</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->fname?>" name="personal_fname" id="personal_fname"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Middle Name</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->mname?>" name="personal_mname" id="personal_mname"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Last Name</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->lname?>" name="personal_lname" id="personal_lname"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Extension Name</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->extname?>" name="personal_exname" id="personal_exname"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-2">Birthday</div>
          <div class="col-md-1">:</div>
          <div class="col-md-5"><input type="date" class="form-control" value="<?php echo $row->birthday?>" name="personal_bday" id="personal_bday"></div>
          <div class="col-md-1">Age</div>
          <div class="col-md-1">:</div>
          <div class="col-md-2"><input type="text" class="form-control" value="<?php echo $row->age?>" name="personal_age" id="personal_age"
          onkeypress="return isNumber(event)" maxlength="2"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">House Number</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->housenumber?>" name="personal_hnum" value=0 id="personal_hnum"
          onkeypress="return isNumber(event)" maxlength="11"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Street</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->street?>" name="personal_stnum" id="personal_stnum"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Barangay</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->barangay?>" name="personal_brgy" id="personal_brgy" maxlength="30"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">City</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->city?>" name="personal_city" id="personal_city" maxlength="20"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Province</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->province?>" name="personal_prov" id="personal_prov" maxlength="30"></div>
        </div>
        <h4 align="center">EDUCATIONAL INFORMATION</h4>
        <div class="row row_padding">
          <div class="col-md-5">Degree Attained</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->degree_attained?>" name="personal_degree" id="personal_degree"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Institution Name</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->institution_name?>" name="personal_instname" id="personal_instname"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Year Graduated</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->year_grad?>" name="personal_yrgrad" id="personal_yrgrad"></div>
        </div>
        <h4 align="center">CONTACT INFORMATION</h4>
        <div class="row row_padding">
          <div class="col-md-5">Mobile No</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->mob_number?>" name="personal_num" id="personal_num"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Telephone Number</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->tel_number?>" name="personal_telnum" id="personal_telnum"></div>
        </div>
        <div class="row row_padding">
          <div class="col-md-5">Email Address</div>
          <div class="col-md-1">:</div>
          <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->email?>" name="personal_email" id="personal_email"></div>
        </div>
        <input type="button" class="btn bg-success" id="updateinfo" name="updateinfo" value="Edit Information"></input>
      </form> 
    </div>

    <div class="col-md-6">
      <div class="container">
        <img src="<?php echo base_url()?>images/avatar.png" class="center">
        <div class="row row_padding" style="margin-top: 30px; border-bottom: 1px black solid;">
          <h4 class="align_center"><?php echo $row->fname?>&nbsp;<?php echo $row->lname?></h4>
        </div>
      </div>
      <div class="row">
        <h5 class="align_center">A Graduate of Bachelor of Science in General Eucation</h5>
      </div>
      <div class="row row_padding" style="padding-top: 50px;">
        <div class="col-md-6" align="right">
        </div>
      </div>
    </div>   
  </div>
  <?php endforeach ?>
</div>
</div>
</body>
