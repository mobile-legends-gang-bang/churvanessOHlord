
<head>
  <title><?php echo $title?></title>
<?php $this->load->view('load/head')?>
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
WW
</style>
</head>
<body>
<?php $this->load->view('load/sidenavigation')?>  
<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 300px;">
  <div class="row row_padding">
    <div class="col-md-6">
      <div class="row row_padding">
        <div class="col-md-2">IDNO.</div>
        <div class="col-md-1">:</div>
        <div class="col-md-3"><input type="text" class="form-control" name="" disabled=""></div>
      </div>
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
          <h4 style="text-align: center;">Velikkakathu Sankaran Achuthanandan</h4>
        </div>
      </div>
      <div class="row">
        <h4 style="text-align: center;">Velikkakathu Sankaran Achuthanandan</h4>
      </div>
      <div class="row">
        <h6 style="text-align: center;">OTHER INFORMATION GOES HERE</h6>
      </div>
    </div>
    <div class="row row_padding">
      <div class="col-md-3 offset-md-3">
        <button class="btn bg-primary" disabled>Save Information</button>
      </div>
      <div class="col-md-3 offset-md-3">
        <label class="btn btn-default bg-success">
          Edit Existing Information
        </label>
      </div>
    </div>
    
  </div>
</div>
</div>
</body>