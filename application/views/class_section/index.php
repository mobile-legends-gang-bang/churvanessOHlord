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
  .small{
    width:500px;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    get_class();
    // $('#classTable').dataTable();
    function get_class(){
      $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('class_section/getclass')?>',
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i = 0 ; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].class_name+'</td>'+
                    '<td>'+data[i].subject_name+'</td>'+
                    '<td align="center">'+data[i].sched_from+' - '+data[i].sched_to+'</td>'+
                    '<td class="small"><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button> <button class="btn" style="background: transparent;" data-toggle="modal" data-target="#sectionModal">View Subject Details</button> <a href="javascript:void(0);" class="fa fa-pencil  item_edit" data-subject_description="'+data[i].subject_description+'" data-subject_name="'+data[i].subject_name+'" data-sched_to="'+data[i].sched_to+'" data-sched_from="'+data[i].sched_from+'" data-class_id="'+data[i].class_id+'"></a> <a href="javascript:void(0);" class="fa fa-trash item_delete" data-class_id="'+data[i].class_id+'"></a> </td>'+
                    '</tr>';
          }
          $('#classtablecontent').html(html);
        }
      });
    }
    function getsubject(){
      $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('class_section/getsubject')?>',
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i = 0 ; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].class_name+'</td>'+
                    '<td>'+data[i].grade_level+'</td>'+
                    '<td class="small"><button class="btn" style="background: transparent;" data-toggle="modal" data-target="#studentModal"> View Students </button> <button class="btn" style="background: transparent;" data-toggle="modal" data-target="#sectionModal">View Subject Details</button> <a href="javascript:void(0);" class="fa fa-pencil  item_edit" data-class_id="'+data[i].class_id+'"  data-class_name="'+data[i].class_name+'" data-subject_id="'+data[i].subject_id+'"></a> <a href="javascript:void(0);" class="fa fa-trash item_delete" data-class_id="'+data[i].class_id+'"></a> </td>'+
                    '</tr>';
          }
          $('#classtablecontent').html(html);
        }
      });
    }

    $('#saveclass').click(function() {
      var classname = $('#form_class #classname').val();
      var subject_name = $('#form_class #subject_name').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/saveclass')?>',
        // data: new FormData($(this)[0]),
        data: { classname: classname, subject_name: subject_name },
        dataType: 'json',
        // cache:false,
        // contentType:false,
        // processData:false,
        success: function(response){
          if (response.status) {
              get_class();
              $('#form_class')[0].reset();
              swal("Class Section Added!", "", "success");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert('ahhaha sayup yot');
        }
      });
    });
    //get data for update record
    $('#classtablecontent').on('click','.item_edit',function(){
      var class_id = $(this).data('class_id');
      var sched_from = $(this).data('sched_from');
      var sched_to = $(this).data('sched_to');
      var subject_name = $(this).data('subject_name');
      var subject_description = $(this).data('subject_description');
      $('#editclassmodal').modal('show');
      $('#id_class').val(class_id);
      $('#sched_from_edit').val(sched_from);
      $('#sched_to_edit').val(sched_to);
      $('#subject_name_edit').val(subject_name);
      $('#subject_description_edit').val(subject_description);
    });

    $('#updateclass').on('click',function(){
      var class_id = $('#id_class').val();
      var sched_from = $('#sched_from_edit').val();
      var sched_to = $('#sched_to_edit').val();
      var subject_name = $('#subject_name_edit').val();
      var subject_description = $('#subject_description_edit').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo site_url('class_section/updateclass')?>",
          dataType : "JSON",
          data : {class_id:class_id , sched_from:sched_from, sched_to:sched_to, subject_name_edit:subject_name, subject_description:subject_description},
          success: function(data){
              
              swal("Successfully Updated Class Section!", "", "success");
              get_class();
          }
      });
      return false;
    });

    //get data for delete record
    $('#classtablecontent').on('click','.item_delete',function(){
      var class_id = $(this).data('class_id');
      
      $('#Modal_Delete').modal('show');
      $('#class_id_del').val(class_id);
    });
    //delete record to database
    $('#btn_delete').on('click',function(){
      var class_id = $('#class_id_del').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo site_url('class_section/deleteclass')?>",
          dataType : "JSON",
          data : {class_id:class_id},
          success: function(data){
              $('#class_id_del').val("");
              $('#Modal_Delete').modal('hide');
              swal("Class Section Deleted!", "", "success");
              get_class();
          }
      });
      return false;
    });

    $('#savesubject').click(function() {
      // var teacher_id = $('#form_subject #teacher_id').val();
      var sched_from = $('#form_subject #sched_from').val();
      var sched_to = $('#form_subject #sched_to').val();
      var subject_name = $('#form_subject #subject_name').val();
      var subject_description = $('#form_subject #subject_description').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/savesubject')?>',
        // data: new FormData($(this)[0]),
        data: {sched_from: sched_from, sched_to: sched_to, subject_name:subject_name, subject_description:subject_description },
        dataType: 'json',
        success: function(response){
          if (response.status) {
              $('#form_subject')[0].reset();
              swal("Subject Added!", "", "success");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert(response.message);
        }
      });
    });
    $('#classname').change(function() {
      // var teacher_id = $('#form_subject #teacher_id').val();
      var sched_from = $('#form_subject #sched_from').val();
      var sched_to = $('#form_subject #sched_to').val();
      var subject_name = $('#form_subject #subject_name').val();
      var subject_description = $('#form_subject #subject_description').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/savesubject')?>',
        // data: new FormData($(this)[0]),
        data: {sched_from: sched_from, sched_to: sched_to, subject_name:subject_name, subject_description:subject_description },
        dataType: 'json',
        success: function(response){
          if (response.status) {
              $('#form_subject')[0].reset();
              swal("Subject Added!", "", "success");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert(response.message);
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
          <?php echo $teacher_id; ?>
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
              <button class="btn btn-success btn_right" data-toggle="modal" data-target="#addSubjectsModal"> Add Subjects Handled </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="classTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Class Name</th>
                      <th>Subject</th>
                      <th>Schedule</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="classtablecontent">
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
                <?php foreach($class as $c):?>
                  <option><?php echo $c->section_name?></option>
                <?php endforeach?>
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
                <?php foreach($class as $c):?>
                  <option><?php echo $c->section_name?></option>
                <?php endforeach?>
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
              <input type="hidden" name="class_id" id="class_id">
              <div> Class Name : </div>
              <div>
                <select class="form-control" name="classname" id="classname">
                  <?php foreach ($classlist as $row): ?>
                    <option><?php echo $row->classname?></option>  
                  <?php endforeach ?>
                </select>
              </div>
              <div> Subject you are handling for this Class : </div>
              <div>
                <select class="form-control" name="subject_name" id="subject_name">
                  <?php foreach ($subjectlist as $row): ?>
                    <option value="<?php echo $row->subject_id?>"><?php echo $row->subject_name?></option>  
                  <?php endforeach ?>
                </select>
              </div>
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="saveclass"> Save </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Subjects Modal-->
    <div class="modal fade" id="addSubjectsModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Add Subjects Handled</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_subject" method="post" accept-charset = "utf-8">
              <div> Schedule : </div>
              <div class="row" style="padding-left: 20px; padding-top: 15px;">
                From <div><input class="form-control" type="time" name="sched_from" id="sched_from" style="width: 130px; padding-left: 10px;"></div>
                To <div><input class="form-control" type="time" name="sched_to" id="sched_to" style="width: 130px;"></div>
              </div>
              <div> Subject Name : </div>
              <div><input class="form-control" type="text" name="subject_name" id="subject_name" placeholder="Enter Subject Name..." required></div>
              <div> Subject Description : </div>
              <div><input class="form-control" type="text" name="subject_description" id="subject_description" placeholder="Enter Subject Name..." required></div>
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="savesubject"> Save </button>
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="" disabled> Update </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Studentnts Modal-->
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
    <!-- VIEW SUBJECTS Modal-->
    <div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Your Subjects</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_subject" method="post" accept-charset = "utf-8">
              <div> Schedule : </div>
              <div class="row" style="padding-left: 20px; padding-top: 15px;">
                From <div><input class="form-control" type="time" name="sched_from" id="sched_from" style="width: 130px; padding-left: 10px;"></div>
                To <div><input class="form-control" type="time" name="sched_to" id="sched_to" style="width: 130px;"></div>
              </div>
              <div> Subject Name : </div>
              <div><input class="form-control" type="text" name="subject_name" id="subject_name" placeholder="Enter Subject Name..." required></div>
              <div> Subject Description : </div>
              <div><input class="form-control" type="text" name="subject_description" id="subject_description" placeholder="Enter Subject Name..." required></div>
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="" disabled> Save </button>
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="updatesubject"> Update </button>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="classTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Subject Description</th>
                      <th>Schedule</th>
                    </tr>
                  </thead>
                  <tbody id="viewsubjects">
                  </tbody>
                </table>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--MODAL DELETE-->
    <form>
      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Class Section</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                 <strong>Are you sure to delete this record?</strong>
            </div>
            <div class="modal-footer">
              <input type="aria-hidden" name="class_id_del" id="class_id_del" class="form-control">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--END MODAL DELETE-->
    <!-- EDIT CLASS ID MODAL-->
    <div class="modal fade" id="editclassmodal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Edit Class Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_subject" method="post" accept-charset = "utf-8">
              <input type="" name="id_class" id="id_class">
              <div> Schedule : </div>
              <div class="row" style="padding-left: 20px; padding-top: 15px;">
                From <div><input class="form-control" type="time" name="sched_from_edit" id="sched_from_edit" style="width: 130px; padding-left: 10px;"></div>
                To <div><input class="form-control" type="time" name="sched_to_edit" id="sched_to_edit" style="width: 130px;"></div>
              </div>
              <div> Subject Name : </div>
              <div><input class="form-control" type="text" name="subject_name_edit" id="subject_name_edit" placeholder="Enter Subject Name..." required></div>
              <div> Subject Description : </div>
              <div><input class="form-control" type="text" name="subject_description_edit" id="subject_description_edit" placeholder="Enter Subject Name..." required></div>
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="updateclass"> Update </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL EDIT -->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
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
              Class ID<input type="text" name="">
              <div> Section Name : </div>
              <div><input class="form-control" type="text" name="section_name" id="section_name" placeholder="Enter Class Name..." required></div>
              <div> Grade Level : </div>
              <div><input class="form-control" type="text" name="grade_level" id="grade_level" onkeypress="return isNumber(event)" maxlength="2" placeholder="Enter Grade Level..." required></div>
              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="saveclass"> Save </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL EDIT-->
  </div>
</body>