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
    // getnotesToday();
    // getstudents();

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
                    '<td><input type="hidden" id="student_class" name="student_class">'+data[i].class_name+'</td>'+
                    '<td>'+data[i].subject_name+'</td>'+
                    '<td align="center">'+tConvert(data[i].sched_from)+' - '+tConvert(data[i].sched_to)+'</td>'+
                    '<td class="small"><a class="btn"  style="background: transparent;" id="btnstudents"  data-class_name="'+data[i].class_name+'"> View Students </a> <a href="javascript:void(0);" class="fa fa-pencil  item_edit" data-subject_description="'+data[i].subject_description+'" data-subject_name="'+data[i].subject_name+'" data-sched_to="'+(data[i].sched_to)+'" data-sched_from="'+data[i].sched_from+'" data-class_id="'+data[i].class_id+'"></a> <a href="javascript:void(0);" class="fa fa-trash item_delete" data-class_id="'+data[i].class_id+'"></a> </td>'+
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

    $('#classtablecontent').on('click','#btnstudents',function(){
      var class_name = $(this).data('class_name');
      $('#studentModal').modal('show');
      $('#student_class').val(class_name);
      var class_id = $('#student_class').val()
      $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('student_profile/getstudents')?>',
        dataType : 'json',
        data : {student_class:class_id},
        success : function(data){
          var html = '';
          var i;
          for(i = 0 ; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].lname+'</td>'+
                    '<td>'+data[i].fname+'</td>'+
                    '<td>'+data[i].mname+'</td>'+
                    '<td>'+data[i].extname+'</td>'+
                    '</tr>';
            }
          $('#students_enrolled').html(html);
        }
      });
    });

    $('#saveclass').click(function() {
      var classname = $('#form_class #classname').val();
      var subject_name = $('#form_class #subject_name').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/saveclass')?>',
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
          data : {class_id:class_id_del , sched_from_edit:sched_from, sched_to_edit:sched_to, subject_name_edit:subject_name, subject_description_edit:subject_description},
          success: function(data){
              $('#id_class').val("");
              $('#sched_from_edit').val("");
              $('#sched_to_edit').val("");
              $('#subject_name_edit').val("");
              $('#subject_description_edit').val("");
              swal("Successfully Updated Class Section!", "", "success");
              $('#editclassmodal').modal('hide');
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
          $('#classname').val('');
          $('#enrollstudentsmodal').modal('hide');
          swal("Successfully Enrolled Students", "", "success");
        }
      })
    });

    $('#class_grade, #score_subject').change(function(){
      if ($('#score_subject').val() != "") {
        var class_grade = $('#class_grade').val();
        $.ajax({
          url: '<?php echo site_url('student_profile/getstudentsBySection')?>',
          method:'post',
          dataType:'json',
          data: {class_grade:class_grade},
          success : function(data){
            var html = '';
            var i;
            var record_student_grade = "";
            for(i = 0 ; i<data.length; i++){
              // This is ES6 format (new one in jquery) no need for concat 
              record_student_grade += `<tr>
                      <td>${data[i].s_id}</td>
                      <td>${data[i].lname}, ${data[i].fname} ${data[i].mname}</td>
                      <td><input type="hidden" name="student_id[]" id="student_id" value="${data[i].s_id}"><input type="text" onkeyup="var x = $('#over').val(); var input = (this.value); if(input > x){ alert('This score exceeds the perfect score.'); value='';}" onkeypress="return isNumber(event)" name="score[]" id="score" class="form-control" data-s_id="${data[i].s_id}" data-class_id="${data[i].s_id}"></td>
                  </tr>`;
            }
            $('#record_student_grade').html(record_student_grade);
          }
        });
      } else 
        $('#record_student_grade').html("");
    });

    $('#savescore').click(function() {
      var subject_name = $('#score_form #score_subject').val();
      var score_quarter = $('#score_form #score_quarter').val();
      var scoretype = $('#score_form #score_type').val();
      var class_name = $('#score_form #class_grade').val();
      var over = $('#score_form #over').val();
      student_id = $('input[name^="student_id"]').map(function(){
                return this.value;
            }).get();
      score = $('input[name^="score"]').map(function(){
                return this.value;
            }).get();
      // alert(student_id); return;
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/savescore')?>',
        data: {score_subject: subject_name, score_quarter:score_quarter, class_grade:class_name, over:over, score_type:scoretype, student_id:JSON.stringify(student_id), score:JSON.stringify(score)},
        dataType: 'json',
        success: function(response){
          if (response.status) {
              $('#score_form')[0].reset();
              swal("Successfully saved Scores!", "", "success");
              $('#score').val("");
              $('#score_subject').val("");
              $('#score_quarter').val("");
              $('#score_type').val("");
              $('#class_grade').val("");
              $('#over').val("");
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert('ahhaha sayup yot');
        }
      });
    });

    $('#savestudent').click(function(){
        var s_id = $('#s_id1').val();
        var fname = $('#fname').val();
        var mname = $('#mname').val();
        var lname = $('#lname').val();
        var extname =  $('#extname').val();
        var address = $('#address').val();
        var age = $('#age').val();
        var housenum = $('#housenum').val();
        var street = $('#street').val();
        var barangay = $('#barangay').val();
        var city = $('#city').val();
        var province =  $('#province').val();
        var guardianname = $('#guardianname').val();
        var relation =  $('#relation').val();
        var contactnum =  $('#contactnum').val();
        var birthday = $('#birthday').val();
        var class_name = $('#classname1').val();

        $.ajax({
          type: 'post',
          url: '<?php echo base_url('class_section/savestudent')?>',
          data: { s_id:s_id, fname:fname, mname:mname, lname:lname, extname:extname, address:address, age:age, housenum:housenum, street:street, barangay:barangay, city:city, province:province, guardianname:guardianname, relation:relation, contactnum:contactnum, birthday:birthday, classname1:class_name},
          dataType: 'json',
          success: function(response){
                if (response.status) {
                  swal("Saved Student Profile!", "", "success");
                    getnote();
                } else {
                    alert(response.message);
                }
              },
              error:function(request,status,error){ 
                alert('ahhaha sayup yot');
              }
        });
      });


    $('#record_student_grade #score').keyup(function(){
      var score = 12;
      alert(score);
    });

    $('#behavior_class, #behavior_subject').change(function(){
      if ($('#behavior_subject').val() != "") {
        var class_grade = $('#behavior_class').val();
        $.ajax({
          url: '<?php echo site_url('student_profile/getstudentsBySection')?>',
          method:'post',
          dataType:'json',
          data: {class_grade:class_grade},
          success : function(data){
            var html = '';
            var i;
            var note_behavior = "";
            for(i = 0 ; i<data.length; i++){
              // This is ES6 format (new one in jquery) no need for concat 
              note_behavior += `<tr>
                      <td>${data[i].s_id}</td>
                      <td>${data[i].lname}, ${data[i].fname} ${data[i].mname}</td>
                      <td><input type="hidden" name="s_id[]" id="s_id" value="${data[i].s_id}">
                          <select name="behavior_name[]" id="behavior_name" class="form-control" data-s_id="${data[i].s_id}" data-class_id="${data[i].s_id}">
                            <option></option>
                            <?php foreach ($behavior as $b): ?>
                              <option value="<?php echo $b->behavior_id?>"><?php echo $b->behavior_name?></option>
                            <?php endforeach ?>
                          </select>
                      </td>
                      <td><input type="text" class="form-control" name="remarks[]" id="remarks"></td>
                  </tr>`;
            }
            $('#note_behavior_tab').html(note_behavior);
          }
        });
      } else 
        $('#note_behavior_tab').html("");
    });

    $('#savebehavior').click(function() {
      var date = $('#behavior_form #behavior_date').val();
      var subject_name = $('#behavior_form #behavior_subject').val();
      var class_name = $('#behavior_form #behavior_class').val();
      var quarter = $('#behavior_form #behavior_quarter').val();
      s_id = $('input[name^="s_id"]').map(function(){
                return this.value;
            }).get();
      behavior_name = $('select[name^="behavior_name"]').map(function(){
                return this.value;
            }).get();
      remarks = $('input[name^="remarks"]').map(function(){
                return this.value;
            }).get();
      // alert(remarks); return;
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('class_section/savebehavior')?>',
        data: {behavior_date: date, behavior_quarter:quarter, behavior_class:class_name, behavior_subject:subject_name, behavior_quarter:quarter, s_id:JSON.stringify(s_id), remarks:JSON.stringify(remarks), behavior_name:JSON.stringify(behavior_name)},
        dataType: 'json',
        success: function(response){
          if (response.status) {
              $('#behavior_form')[0].reset();
              swal("Successfully saved behaviors!", "", "success");
              // $('#score').val("");
              // $('#score_subject').val("");
              // $('#score_quarter').val("");
              // $('#score_type').val("");
              // $('#class_grade').val("");
              // $('#over').val("");
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
<body id="page-top">
  
  <div class="content-wrapper" style="margin-top: 100px!important; padding: 15px!important;">
    <div class="container-fluid">
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="class-list-tab" data-toggle="pill" href="#tab-class-list" role="tab" aria-controls="tab-class-list" aria-selected="true">Class List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="record-grades-tab" data-toggle="pill" href="#record_grades" role="tab" aria-controls="record_grades" aria-selected="false">Record Scores</a>
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
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Class Record</span>
              <button class="btn btn-success btn_right" data-toggle="modal" data-target="#enrollstudentsmodal">Enroll Students in a Class</button>
              <button class="btn btn-success btn_right" data-toggle="modal" data-target="#addClassModal"> Add Class </button>
              <button class="btn btn-success btn_right" data-toggle="modal" data-target="#addSubjectsModal"> Add Subjects Handled </button>
              <button class="btn btn-success btn_right" data-toggle="modal" data-target="#addStudentModal"> Add Transferee</button>
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
          <form method="post" id="score_form">
            <div class="row row_padding">
              <div class="col-md-2">Subject</div>
              <div class="col-md-1">
                :
              </div>
              <div class="col-md-4">
                <select class="form-control" name="score_subject" id="score_subject">
                  <option value=""></option>
                  <?php foreach($subjectlist as $s):?>
                    <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Class Section</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name = "class_grade" id="class_grade">
                  <?php foreach($uniqueclass as $c):?>
                    <option><?php echo $c->class_name?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Quarter</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name="score_quarter" id="score_quarter">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Score Type</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name="score_type" id="score_type">
                  <option>Assignment</option>
                  <option>Project</option>
                  <option>Quarter Exam</option>
                  <option>Quiz</option>
                  <option>Seatwork</option>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Perfect Score</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <input type="number" name="over" id="over" class="form-control">
              </div>
            </div>
            <div class="card-header">
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Roster</span>
            </div>
          </form>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="center_th">Student ID</th>
                    <th class="center_th">Name</th>
                    <th class="center_th">Score</th>
                  </tr>
                </thead>
                  <tbody id="record_student_grade">
                  </tbody>
              </table>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" style="float: right!important;" name="savescore" id="savescore">Save Scores</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="student_behavior_tab" role="tabpanel" aria-labelledby="behavior-tab">
          <form method="post" id="behavior_form">
            <div class="row row_padding">
              <div class="col-md-2">Date</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4"><input class="form-control" type="date" name="behavior_date" id="behavior_date"></div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Subject</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name="behavior_subject" id="behavior_subject">
                  <option></option>
                  <?php foreach($subjectlist as $c):?>
                    <option value="<?php echo $c->subject_id?>"><?php echo $c->subject_name?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Class Section</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name="behavior_class" id="behavior_class">
                  <?php foreach($uniqueclass as $c):?>
                      <option><?php echo $c->class_name?></option>
                    <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="row row_padding">
              <div class="col-md-2">Quarter</div>
              <div class="col-md-1">:</div>
              <div class="col-md-4">
                <select class="form-control" name="behavior_quarter" id="behavior_quarter">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>Whole Quarter</option>
                </select>
              </div>
            </div>
          </form>
          <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
          <div class="card-header">
              <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Roster</span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="center_th">Student ID</th>
                    <th class="center_th">Name</th>
                    <th class="center_th">Behavior</th>
                    <th class="center_th">Remarks</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="center_th">Student ID</th>
                    <th class="center_th">Name</th>
                    <th class="center_th">Behavior</th>
                    <th class="center_th">Remarks</th>
                  </tr>
                </tfoot>
                <tbody id="note_behavior_tab">
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" id="savebehavior" name="savebehavior" style="float: right!important;">Save Behavior</button>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>

        <div class="tab-pane fade" id="notesTab" role="tabpanel" aria-labelledby="notes-tab">
          <div class="row" id="notesview"> 
            <?php foreach ($notesview as $n): ?>
                <div class='col-md-8 bg1'><?php echo $n->note_description?></div>
                <div class='col-md-4 bg2'><?php echo $n->note_date?></div><br>
            <?php endforeach ?>
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

    <!-- Transferee Modal-->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addStudentModal">Add Transferee</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form_class1" method="post" accept-charset = "utf-8">
              <input type="hidden" name="class_id1" id="class_id1">
              <div> Class Name : </div>
              <div>
                <select class="form-control" name="classname1" id="classname1">
                  <?php foreach ($classlist as $row1): ?>
                    <option><?php echo $row1->classname?></option>  
                  <?php endforeach ?>
                </select>
              </div>
  
              <div class="row row_padding">
                <input type="hidden" name="s_id1" id="s_id1">
                  <div>
                    <h4 align="center">PERSONAL INFORMATION</h4>
                    <div class="row row_padding">
                      <div class="col-md-5">First Name</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="fname" id="fname"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Middle Name</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="mname" id="mname" ></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Last Name</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="lname" id="lname"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Extension Name</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="extname" id="extname"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-2">Birthday</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-5"><input type="date" class="form-control" name="birthday" id="birthday"></div>
                      <div class="col-md-1">Age</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-2"><input type="text" class="form-control" name="age" id="age"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">House Number</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="housenum" id="housenum"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Street Number</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="street" id="street"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Barangay</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="barangay" id="barangay"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">City</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="city" id="city"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Province</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="province" id="province"></div>
                    </div>
                    <h4 align="center">GUARDIAN'S INFORMATION</h4>
                    <div class="row row_padding">
                      <div class="col-md-5">Full Name</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="guardianname" id="guardianname"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Contact Number</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="contactnum" id="contactnum"></div>
                    </div>
                    <div class="row row_padding">
                      <div class="col-md-5">Relationship</div>
                      <div class="col-md-1">:</div>
                      <div class="col-md-6"><input type="text" class="form-control" name="relation" id="relation"></div>
                    </div>
                  </div>
                </div>

              <div class="modal-footer">
                <button type = "submit" class="btn btn-primary" data-dismiss="modal" id="savestudent"> Save </button>
              </div>
            </form>
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
    <!-- ENROLL STUDENTS MODAL-->
    <div class="modal fade" id="enrollstudentsmodal" tabindex="-1" role="dialog" aria-labelledby="classModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="classModalLabel">Enroll Your Students</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="import_form" method="post" accept-charset = "utf-8">
              <div> Select Section: </div>
              <div>
                <select class="form-control" name="classname" id="classname">
                  <?php foreach ($classlist as $row): ?>
                    <option><?php echo $row->classname?></option>  
                  <?php endforeach ?>
                </select>
              </div>
                <div> Select File : </div>
                <input type="file" accept=".xls, .xlsx" name="file" id="file" >
                <br>  
                <br>
                <input type="submit" name="import" value="Batch Enroll Student" class="btn bg-success">
            </form>
          </div>
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
              <tbody id="students_enrolled">
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
              <input type="hidden" name="id_class" id="id_class">
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