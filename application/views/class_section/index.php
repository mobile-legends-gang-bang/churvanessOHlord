<head>
  <title>Edukit - Class Section</title>
  <?php $this->load->view('load/head')?>
  <style type="text/css">
    th{
      background: #323231; color:#fff;
      text-align: center;
    }
  </style>
</head>
<body id="page-top">
  <?php $this->load->view('load/sidenavigation')?>
  <div class="content-wrapper" style="margin-top: 100px!important;">
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
    <div class="card mb-3" style="padding-top: 10px;">
        <div class="card-header">
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Class Record</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Class Name</th>
                  <th>Level</th>
                  <th>Subject</th>
                  <th>Schedule</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Einstein</td>
                  <td>3</td>
                  <td>Mathematics</td>
                  <td>1:00 PM - 2:00 PM</td>
                  <td><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button></td>
                </tr>
                <tr>
                  <td>Darwin</td>
                  <td>3</td>
                  <td>Science</td>
                  <td>8:00 AM - 9:00 AM</td>
                  <td>View Students</td>
                </tr>
                <tr>
                  <td>Wallace</td>
                  <td>3</td>
                  <td>Mathematics</td>
                  <td>2:00 PM - 3:00 PM</td>
                  <td>View Students</td>
                </tr>
                <tr>
                  <td>Pasteur</td>
                  <td>3</td>
                  <td>Science</td>
                  <td>9:00 AM - 10:00 AM</td>
                  <td>View Students</td>
                </tr>
              </tbody>
            </table>
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


    <!-- Students Modal-->
    <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Students Enrolled</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <th>Surname</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Extension Name</th>
              <tbody>
                <tr>
                  <td>Alicante</td>
                  <td>Karystel</td>
                  <td>Zapanta</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alicante</td>
                  <td>Karystel</td>
                  <td>Zapanta</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alicante</td>
                  <td>Karystel</td>
                  <td>Zapanta</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alicante</td>
                  <td>Karystel</td>
                  <td>Zapanta</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alicante</td>
                  <td>Karystel</td>
                  <td>Zapanta</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="#" data-dismiss="modal">Okay</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>