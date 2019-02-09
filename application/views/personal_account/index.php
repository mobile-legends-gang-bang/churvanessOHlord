
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
</head>
<body>
<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 300px;">
  <div class="row row_padding">
    <div class="col-md-6">
      <div class="row row_padding">
        <div class="col-md-5">TEACHER IDNO.</div>
        <div class="col-md-1">:</div>
        <?php foreach ($teacherinfo as $row): ?>
        <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->teacher_id?>" name="" disabled></div>
      </div>
      <h4 align="center">PERSONAL INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->fname?>" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $row->lname?>" name=""></div>
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
      <h4 align="center">EDUCATIONAL INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">Degree Attained</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Institution Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Year Graduated</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <h4 align="center">CONTACT INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">Mobile No</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Telephone Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Email Address</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div> 
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
          <button class="btn bg-primary">Save Information</button>
        </div>
        <div class="col-md-6" align="left">
          <button class="btn bg-success">Edit Information</button>
        </div>
      </div>
    </div>   
  </div>
  <?php endforeach ?>
</div>
</div>
</body>
