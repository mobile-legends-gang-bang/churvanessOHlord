<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<head>
<title>Edukit - Class Section</title>
<style type="text/css">
  th{
    background: #323231; color:#fff;
    text-align: center;
  }
  .btn_right{
    float:right!important;
  }
  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
  color: #007bff;
  border-bottom: 1px solid #531ebc;
  border-bottom-width: 5px;
  background: none!important;
  }
  .row_padding{
  padding: 5px;
  }
  .input_width{
    width: 120px!important;
  }
  .bg1{
    background-color: #cfeaa5;
    padding: 20px;
  }
  .bg2{
    background-color: #9de26f;
    padding: 20px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('#saveclass').click(function() {
    // $('#form_class').submit(function(e) {
      // e.preventDefault();
      
      var section_name = $('#form_class #section_name').val();
      var grade_level = $('#form_class #grade_level').val();
      var subject = $('#form_class #subject').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/saveclass')?>',
        // data: new FormData($(this)[0]),
        data: { section_name: section_name, grade_level: grade_level, subject: subject },
        dataType: 'json',
        cache:false,
        contentType:false,
        processData:false,
        success: function(response){
          if (response.status) {
              $('#form_class')[0].reset();
              swal("Class Section Added!", "", "success");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          // $('#process_indicator').hide();
          alert('ahhaha sayup yot');
        }
      });
    });
  });
</script>
</head>
<body id="page-top">
  <div class="content-wrapper" style="margin-top: 100px!important; padding: 15px!important;">
    <div class="container-fluid">
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="class-list-tab" data-toggle="pill" href="#tab-class-list" role="tab" aria-controls="tab-class-list" aria-selected="true">Class List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="record-grades-tab" data-toggle="pill" href="#record_grades" role="tab" aria-controls="record_grades" aria-selected="false">Record Grades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="behavior-tab" data-toggle="pill" href="#student_behavior_tab" role="tab" aria-controls="student_behavior_tab" aria-selected="false">Note Students Behavior</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="notes-tab" data-toggle="pill" href="#notesTab" role="tab" aria-controls="notesTab" aria-selected="false">Notes for Today</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="tab-class-list" role="tabpanel" aria-labelledby="class-list-tab">
          <div class="card mb-3" style="padding-top:10px;">
            <div class="card-header">
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Class Record</span><button class="btn btn-success btn_right" data-toggle="modal" data-target="#addClassModal"> Add Class </button>
            </div>
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
                      <td><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button></td>

                    </tr>
                    <tr>
                      <td>Wallace</td>
                      <td>3</td>
                      <td>Mathematics</td>
                      <td>2:00 PM - 3:00 PM</td>
                      <td><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button></td>

                    </tr>
                    <tr>
                      <td>Pasteur</td>
                      <td>3</td>
                      <td>Science</td>
                      <td>9:00 AM - 10:00 AM</td>
                      <td><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="record_grades" role="tabpanel" aria-labelledby="record-grades-tab">
          <div class="row row_padding">
            <div class="col-md-2">Subject</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>Subject 1</option>
                <option>Subject 2</option>
                <option>Subject 3</option>
              </select>
            </div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Class Section</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>Section 1</option>
                <option>Section 2</option>
                <option>Section 3</option>
              </select>
            </div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Level</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><input class="form-control" type="text" name="" style="width: 50px!important"></div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Quarter</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>Whole Quarter</option>
              </select>
            </div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Score Type</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>Assignment</option>
                <option>Project</option>
                <option>Quarter Exam</option>
                <option>Quiz</option>
                <option>Seatwork</option>
              </select>
            </div>
          </div>
          <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
          <div class="card-header">
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Roster</span><button class="btn btn-primary" style="float: right!important;">Save Scores</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="center_th">Name</th>
                    <th class="center_th">Score</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Score</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallate</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallate</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallate</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallate</td>
                    <td><input class="form-control input_width" type="text" name="" placeholder="Enter score..."></td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" style="float: right!important;">Save Scores</button>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="tab-pane fade" id="student_behavior_tab" role="tabpanel" aria-labelledby="behavior-tab">
          <div class="row row_padding">
            <div class="col-md-2">Date</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><input class="form-control" type="date" name=""></div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Subject</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>Subject 1</option>
                <option>Subject 2</option>
                <option>Subject 3</option>
              </select>
            </div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Class Section</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>Section 1</option>
                <option>Section 2</option>
                <option>Section 3</option>
              </select>
            </div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Level</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4"><input class="form-control" type="text" name="" style="width: 50px!important"></div>
          </div>
          <div class="row row_padding">
            <div class="col-md-2">Quarter</div>
            <div class="col-md-1">:</div>
            <div class="col-md-4">
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>Whole Quarter</option>
              </select>
            </div>
          </div>
          <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
          <div class="card-header">
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Roster</span><button class="btn btn-primary" style="float: right!important;">Save Behavior</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="center_th">Name</th>
                    <th class="center_th">Behavior</th>
                    <th class="center_th">Remarks</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Behavior</th>
                    <th class="center_th">Remarks</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallatte Oyao</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallatte Oyao</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Alicante, Karystel Zapanta</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Cabuenas, Jayzon Generale</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Gutierrez, Bernard Joseph</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Naga, Althea Marshallatte Oyao</td>
                    <td>
                      <select class="form-control">
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                        <option>Behavior 1</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" name="" class="form-control">
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" style="float: right!important;">Save Behavior</button>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="tab-pane fade" id="notesTab" role="tabpanel" aria-labelledby="notes-tab">
          <div class="row"> 
            <div class="col-md-8 bg1">RANDOM NOTE</div>
            <div class="col-md-4 bg2">DATE AND TIME</div>
        </div>
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
    <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Add Class</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_class" method="post" accept-charset = "utf-8">
              <div> Section Name : </div>
              <div><input class="form-control" type="text" name="section_name" id="section_name" placeholder="Enter Class Name..." required></div>
              <div> Grade Level : </div>
              <div><input class="form-control" type="text" name="grade_level" id="grade_level" onkeypress="return isNumber(event)" maxlength="2" placeholder="Enter Grade Level..." required></div>
              <div> Subject : </div>
              <div><input class="form-control" type="text" name="subject" id="subject" placeholder="Enter Subject..." required></div>
             <!--  <div> Schedule : </div>
              <div class="row" style="padding-left: 20px; padding-top: 15px;">
                From <div><input class="form-control" type="time" name="sched_from" id="sched_from" style="width: 130px; padding-left: 10px;"></div>
                To <div><input class="form-control" type="time" name="sched_to" id="sched_to" style="width: 130px;"></div>
              </div> -->
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="saveclass"> Save </button>
                <!-- <input type="submit" class="btn btn-primary" name="saveclass" id="saveclass" value="Save"> -->
              </div>
            </form>
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
                  <td>Cabuenas</td>
                  <td>Jayzon</td>
                  <td>Generale</td>
                  <td>III</td>
                </tr>
                <tr>
                  <td>Gutierrez</td>
                  <td>Bernard</td>
                  <td>Joseph</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Naga</td>
                  <td>Althea Marshallatte</td>
                  <td>Oyao</td>
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