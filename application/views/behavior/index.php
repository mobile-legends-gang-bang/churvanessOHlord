<head>
  <title>Edukit - Student Record</title>
<?php $this->load->view('load/head')?>
<style type="text/css">
  th{
      background: #323231; color:#fff;
      text-align: center;
    }
  .center_th{
    vertical-align: middle!important;
  }
  .row_padding{
    padding: 5px;
    }
</style>
</head>
<body id="page-top">
<?php $this->load->view('load/sidenavigation')?>
<div class="content-wrapper" style="margin-top: 100px!important;">
    <div class="container-fluid">
      <div class="row row_padding">
        <div class="col-md-2">
          Behavior Type
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-3">
          <select class="form-control">
            <option>Positive</option>
            <option>Negative</option>
          </select>
        </div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">
          Behavior Name
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-3">
          <input type="text" class="form-control" name="">
        </div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2"></div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <button class="btn btn-primary">Add Behavior</button><button class="btn btn-success" disabled>Edit Behavior</button>
        </div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
</body>
