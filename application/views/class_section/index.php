<head>
  <?php $this->load->view('load/head')?>
</head>
<body id="page-top">
  <?php $this->load->view('load/sidenavigation')?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row" style="padding: 30px;">
        <div><button class="btn btn-primary" data-toggle="modal" data-target="#classModal"> Add Class </button></div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Class Modal-->
    <div class="modal fade" id="classModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Add Class</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div> Section Name : </div>
            <div><input class="form-control" type="text" name="" placeholder="Enter Class Name..."></div>
            <div> Grade Level : </div>
            <div><input class="form-control" type="text" name="" placeholder="Enter Grade Level..."></div>
            <div> Subject : </div>
            <div><input class="form-control" type="text" name="" placeholder="Enter Subject..."></div>
            <div> Schedule : </div>
            <div class="row" style="padding-left: 20px; padding-top: 15px;">
              From <div><input class="form-control" type="time" name="" style="width: 130px; padding-left: 10px;"></div>
            To <div><input class="form-control" type="time" name="" style="width: 130px;"></div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="#" data-dismiss="modal">Save</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>