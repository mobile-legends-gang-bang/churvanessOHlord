  <head>
  <title><?php echo $title?></title>
  <style type="text/css">
    th{
      background: #323231; color:#fff;
      text-align: center;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#class_grade, #subject_name').change(function(){
        if ($('#subject_name').val() != "") {
          var class_grade = $('#class_grade').val();
          $.ajax({
            url: '<?php echo base_url('student_profile/getstudentsBySection')?>',
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
                        <td><input type="checkbox" class="form-control" name="attend[]" id="attend" checked data-s_id="${data[i].s_id}" data-class_id="${data[i].class_id}"></td>
                        <td><input type="text" name="remarks[]" id="remarks class="form-control" data-s_id="${data[i].s_id}" data-class_id="${data[i].class_id} "></td>
                        <td><input type="hidden" name="student_id[]" id="student_id" value="${data[i].s_id}"></td>
                    </tr>`;
              }
              $('#student_roster').html(record_student_grade);
            }
          });
        } else 
          $('#student_roster').html("");
      });
      $('#saveattendance').click(function() {
        var subject_name = $('#attendance_form #subject_name').val();
        var class_grade = $('#attendance_form #class_grade').val();
        var attendance_date = $('#attendance_form #attendance_date').val();
        student_id = $('input[name^="student_id"]').map(function(){
                  return this.value;
              }).get();
        attend = $('input:checkbox:checked').map(function(){
                  return this.value;
              }).get();
        remarks = $('input[name^="remarks"]').map(function(){
                  return this.value;
              }).get();
        // alert(attend); return;
        $.ajax({
          type: 'post',
          url: '<?php echo base_url('attendance/saveattendance')?>',
          data: {subject_name: subject_name, class_grade:class_grade ,attendance_date:attendance_date , student_id:JSON.stringify(student_id), attend:JSON.stringify(attend),remarks:JSON.stringify(remarks)},
          dataType: 'json',
          success: function(response){
            if (response.status) {
                // $('#score_form')[0].reset();
                swal("Successfully saved Scores!", "", "success");
                $('#subject_name').val("");
                $('#class_grade').val("");
                $('#attendance_date').val("");
                $('#remarks').val("");
            } else {
                swal("Successfully saved Scores!", "", "success");
            }
          },
          error:function(request,status,error){ 
            swal("Successfully saved Scores!", "", "success");
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
          <a class="nav-link active" id="check-attendance-tab" data-toggle="pill" href="#checkattendance" role="tab" aria-controls="checkattendance" aria-selected="true">Check Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="seat-plan-tab" data-toggle="pill" href="#seatplan" role="tab" aria-controls="seatplan" aria-selected="false">Seat Plan</a>
        </li>
      </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="checkattendance" role="tabpanel" aria-labelledby="check-attendance-tab">
    <div class="container-fluid">
      <form method="post" id="attendance_form">
        <div class="row" style="padding: 20px;">
        	<div style="padding-right: 20px; padding-top: 5px;">Date</div>
          <div>
          	<input name="attendance_date" id="attendance_date" class="form-control" value="<?php echo date('m/d/Y')?>" disabled>
          </div>
          <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
          <div>
            <select class="form-control" name="subject_name" id="subject_name">
              <option></option>
              <?php foreach($subjectlist as $c):?>
                <option value="<?php echo $c->subject_id?>"><?php echo $c->subject_name?></option>
              <?php endforeach?>
            </select>
          </div>
          <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
          <div>
            <select class="form-control" name="class_grade" id="class_grade">
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>
      </form>
      <div class="card mb-3" style="padding-top: 10px;">
        <div class="card-header">
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Attendance Checking</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Remarks</th>
                </tr>
              </tfoot>
              <tbody id="student_roster">
              </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" style="float: right!important;" name="saveattendance" id="saveattendance">Record Attendance</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="seatplan" role="tabpanel" aria-labelledby="seat-plan-tab">
      <div style="padding-right: 20px; width: 50px; padding-top: 5px; padding-left: 10px;">Class Section</div>
      <div>
        <select class="form-control">
        <optgroup>
          <option>
            Einstein
          </option>
          <option>
            Newton
          </option>
          <option>
            Pascal
          </option>
        </optgroup>
      </select>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
 </body>