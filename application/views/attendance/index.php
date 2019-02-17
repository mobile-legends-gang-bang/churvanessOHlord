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

      $('#class_seat').change(function(){
          var class_grade = $('#class_seat').val();
          $.ajax({
            url: '<?php echo base_url('attendance/getstudentsBySection')?>',
            method:'post',
            dataType:'json',
            data: {class_seat:class_grade},
            success : function(data){
              var html = '';
              var i;
              var record_student_grade = "";
              for(i = 0 ; i<data.length; i++){
                // This is ES6 format (new one in jquery) no need for concat 
                record_student_grade += `<option value=" ${data[i].s_id}"> 
                        ${data[i].lname}, ${data[i].fname}
                    </option>`;
              }
              $('#seat1').html(record_student_grade);
              $('#seat2').html(record_student_grade);
              $('#seat3').html(record_student_grade);
              $('#seat4').html(record_student_grade);
              $('#seat5').html(record_student_grade);
              $('#seat6').html(record_student_grade);
              $('#seat7').html(record_student_grade);
              $('#seat8').html(record_student_grade);
              $('#seat9').html(record_student_grade);
              $('#seat10').html(record_student_grade);
              $('#seat11').html(record_student_grade);
              $('#seat12').html(record_student_grade);
              $('#seat13').html(record_student_grade);
              $('#seat14').html(record_student_grade);
              $('#seat15').html(record_student_grade);
              $('#seat16').html(record_student_grade);
              $('#seat17').html(record_student_grade);
              $('#seat18').html(record_student_grade);
              $('#seat19').html(record_student_grade);
              $('#seat20').html(record_student_grade);
              $('#seat21').html(record_student_grade);
              $('#seat22').html(record_student_grade);
              $('#seat23').html(record_student_grade);
              $('#seat24').html(record_student_grade);
              $('#seat25').html(record_student_grade);
              $('#seat26').html(record_student_grade);
              $('#seat27').html(record_student_grade);
              $('#seat28').html(record_student_grade);
              $('#seat29').html(record_student_grade);
              $('#seat30').html(record_student_grade);
              $('#seat31').html(record_student_grade);
              $('#seat32').html(record_student_grade);
              $('#seat33').html(record_student_grade);
              $('#seat34').html(record_student_grade);
              $('#seat35').html(record_student_grade);
              $('#seat35').html(record_student_grade);
              $('#seat36').html(record_student_grade);
              $('#seat37').html(record_student_grade);
              $('#seat38').html(record_student_grade);
              $('#seat39').html(record_student_grade);
              $('#seat40').html(record_student_grade);
            }
          });
      });

      $('#saveseatplan').click(function(){
        var class_grade = $('#seatplan_form #class_seat').val();
        var seat1 = $('#seat1').val();
        var seat2 = $('#seat2').val();
        var seat3 = $('#seat3').val();
        var seat4 = $('#seat4').val();
        var seat5 = $('#seat5').val();
        var seat6 = $('#seat6').val();
        var seat7 = $('#seat7').val();
        var seat8 = $('#seat8').val();
        var seat9 = $('#seat9').val();
        var seat10 = $('#seat10').val();
        var seat11 = $('#seat11').val();
        var seat12 = $('#seat12').val();
        var seat13 = $('#seat13').val();
        var seat14 = $('#seat14').val();
        var seat15 = $('#seat15').val();
        var seat16 = $('#seat16').val();
        var seat17 = $('#seat17').val();
        var seat18 = $('#seat18').val();
        var seat19 = $('#seat19').val();
        var seat20 = $('#seat20').val();
        var seat21 = $('#seat21').val();
        var seat22 = $('#seat22').val();
        var seat23 = $('#seat23').val();
        var seat24 = $('#seat24').val();
        var seat25 = $('#seat25').val();
        var seat26 = $('#seat26').val();
        var seat27 = $('#seat27').val();
        var seat28 = $('#seat28').val();
        var seat29 = $('#seat29').val();
        var seat30 = $('#seat30').val();
        var seat31 = $('#seat31').val();
        var seat32 = $('#seat32').val();
        var seat33 = $('#seat33').val();
        var seat34 = $('#seat34').val();
        var seat35 = $('#seat35').val();
        var seat36 = $('#seat36').val();
        var seat37 = $('#seat37').val();
        var seat38 = $('#seat38').val();
        var seat39 = $('#seat39').val();
        var seat40 = $('#seat40').val();
       
        $.ajax({
          type: 'post',
            url: '<?php echo base_url('attendance/saveseatplan')?>',
            data: {class_seat:class_grade,
              seat1 : seat1,
              seat2 : seat2,
              seat3 : seat3,
              seat4 : seat4,
              seat5 : seat5,
              seat6 : seat6,
              seat7 : seat7,
              seat8 : seat8,
              seat9 : seat9,
              seat10 : seat10,
              seat11 : seat11,
              seat12 : seat12,
              seat13 : seat13,
              seat14 : seat14,
              seat15 : seat15,
              seat16 : seat16,
              seat17 : seat17,
              seat18 : seat18,
              seat19 : seat19,
              seat20 : seat20,
              seat21 : seat21,
              seat22 : seat22,
              seat23 : seat23,
              seat24 : seat24,
              seat25 : seat25,
              seat26 : seat26,
              seat27 : seat27,
              seat28 : seat28,
              seat29 : seat29,
              seat30 : seat30,
              seat31 : seat31,
              seat32 : seat32,
              seat33 : seat33,
              seat34 : seat34,
              seat35 : seat35,
              seat36 : seat36, 
              seat37 : seat37,
              seat39 : seat39,
              seat40 : seat40 },
            dataType: 'json',
            success: function(response){
              if (response.status) {
                  swal("Seat Plan Added!", "", "success");
              } else {
                  alert(response.message);
              }
            },
            error:function(request,status,error){ 
              alert('ahhaha sayup yot');
            }
        });
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
                swal("Attendance Recorded!", "", "success");
            }
          },
          error:function(request,status,error){ 
            swal("Successfully saved Scores!", "", "success");
          }
        });
      });
      $('#subject_name, #class_seatcheck').change(function(){
          var class_grade = $('#class_seatcheck').val();

          $.ajax({
            url: '<?php echo base_url('attendance/getseat')?>',
            method:'post',
            dataType:'json',
            data: {class_seatcheck:class_grade},
            success : function(data){
           
            $('#checkseat_form #seat1').val(data[0].seat1);
            $('#checkseat_form #seat2').val(data[0].seat2);
            $('#checkseat_form #seat3').val(data[0].seat3);
            $('#checkseat_form #seat4').val(data[0].seat4);
            $('#checkseat_form #seat5').val(data[0].seat5);
            $('#checkseat_form #seat6').val(data[0].seat6);
            $('#checkseat_form #seat7').val(data[0].seat7);
            $('#checkseat_form #seat8').val(data[0].seat8);
            $('#checkseat_form #seat9').val(data[0].seat9);
            $('#checkseat_form #seat10').val(data[0].seat10);
            $('#checkseat_form #seat11').val(data[0].seat11);
            $('#checkseat_form #seat12').val(data[0].seat12);
            $('#checkseat_form #seat13').val(data[0].seat13);
            $('#checkseat_form #seat14').val(data[0].seat14);
            $('#checkseat_form #seat15').val(data[0].seat15);
            $('#checkseat_form #seat16').val(data[0].seat16);
            $('#checkseat_form #seat17').val(data[0].seat17);
            $('#checkseat_form #seat18').val(data[0].seat18);
            $('#checkseat_form #seat19').val(data[0].seat19);
            $('#checkseat_form #seat20').val(data[0].seat20);
            $('#checkseat_form #seat21').val(data[0].seat21);
            $('#checkseat_form #seat22').val(data[0].seat22);
            $('#checkseat_form #seat23').val(data[0].seat23);
            $('#checkseat_form #seat24').val(data[0].seat24);
            $('#checkseat_form #seat25').val(data[0].seat25);
            $('#checkseat_form #seat26').val(data[0].seat26);
            $('#checkseat_form #seat27').val(data[0].seat27);
            $('#checkseat_form #seat28').val(data[0].seat28);
            $('#checkseat_form #seat29').val(data[0].seat29);
            $('#checkseat_form #seat30').val(data[0].seat30);
            $('#checkseat_form #seat31').val(data[0].seat31);
            $('#checkseat_form #seat32').val(data[0].seat32);
            $('#checkseat_form #seat33').val(data[0].seat33);
            $('#checkseat_form #seat34').val(data[0].seat34);
            $('#checkseat_form #seat35').val(data[0].seat35);
            $('#checkseat_form #seat36').val(data[0].seat36);
            $('#checkseat_form #seat37').val(data[0].seat37);
            $('#checkseat_form #seat38').val(data[0].seat38);
            $('#checkseat_form #seat39').val(data[0].seat39);
            $('#checkseat_form #seat40').val(data[0].seat40);
            }
          });
      });
        $('#checkbyseatplan').click(function() {
        var subject_name = $('#checkseat_form #subject_name').val();
        var class_seatcheck = $('#checkseat_form #class_seatcheck').val();
        var attendance_datebyseat = $('#checkseat_form #attendance_datebyseat').val();
        var seat1 = $('#checkseat_form #seat1').val();
        var attend1 = $('#checkseat_form #attend1').val();
        
        $.ajax({
          url:'<?php echo base_url('attendance/checkbyseatplan')?>',
          data:{
            seat1 : seat1,
            subject_name : subject_name,
            class_seatcheck : class_seatcheck,
            attendance_datebyseat :attendance_datebyseat,
            attend1 : attend1
          },
          dataType:'json',
          success: function(response){
              if (response.status) {
                swal("Successfully saved Scores!", "", "success");
                $('#subject_name').val("");
                $('#class_seatcheck').val("");
                $('#attendance_datebyseat').val("");
            } else {
                swal("FAILED");
              }
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
        <li class="nav-item">
          <a class="nav-link" id="check-seat-plan-tab" data-toggle="pill" href="#checkseatplan" role="tab" aria-controls="checkseatplan" aria-selected="false">Check Attendance by Seat Plan</a>
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
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Attendance Checking</span>
        </div>
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
  </div>

  <div class="tab-pane fade" id="seatplan" role="tabpanel" aria-labelledby="seat-plan-tab">
    <div>
        <form method="post" id="seatplan_form">
        <div class="row" style="padding: 20px;">
          <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
          <div>
            <select class="form-control" name="class_seat" id="class_seat">
              <option></option>
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="container">
          <div class="row" style="margin-left: 437px;">
         <div class="cell">Teacher</div>
         </div>
    <div class="row">
        <div class="cell">
          <select id="seat1" name="seat1"></select>
        </div>
        <div class="cell">    
          <select id="seat2" name="seat2"></select>
        </div>
        <div class="cell">
          <select id="seat3" name="seat3"></select>
        </div>
        <div class="cell">
          <select id="seat4" name="seat4"></select>
        </div>
        <div class="cell">
          <select id="seat5" name="seat5"></select>
        </div>
        <div class="cell">
          <select id="seat6" name="seat6"></select>
        </div>
        <div class="cell">
          <select id="seat7" name="seat7"></select>
        </div>
        <div class="cell">
          <select id="seat8" name="seat8"></select>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <select id="seat9" name="seat9"></select>
        </div>
        <div class="cell">
          <select id="seat10" name="seat10"></select>
        </div>
        <div class="cell">
          <select id="seat11" name="seat11"></select>
        </div>
        <div class="cell">
          <select id="seat12" name="seat12"></select>
        </div>
        <div class="cell">
          <select id="seat13" name="seat13"></select>
        </div>
        <div class="cell">
          <select id="seat14" name="seat14"></select>
        </div>
        <div class="cell">
          <select id="seat15" name="seat15"></select>
        </div>
        <div class="cell">
          <select id="seat16" name="seat16"></select>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <select id="seat17" name="seat17"></select>
        </div>
        <div class="cell">
          <select id="seat18" name="seat18"></select>
        </div>
        <div class="cell">
          <select id="seat19" name="seat19"></select>
        </div>
        <div class="cell">
          <select id="seat20" name="seat20"></select>
        </div>
        <div class="cell">
          <select id="seat21" name="seat21"></select>
        </div>
        <div class="cell">
          <select id="seat22" name="seat22"></select>
        </div>
        <div class="cell">
          <select id="seat23" name="seat23"></select>
        </div>
        <div class="cell">
          <select id="seat24" name="seat24"></select>
        </div>
    </div>
      <div class="row">
        <div class="cell">
          <select id="seat25" name="seat25"></select>
        </div>
        <div class="cell">
          <select id="seat26" name="seat26"></select>
        </div>
        <div class="cell">
          <select id="seat27" name="seat27"></select>
        </div>
        <div class="cell"> 
         <select id="seat28" name="seat28"></select>
        </div>
        <div class="cell">
         <select id="seat29" name="seat29"></select>
        </div>
        <div class="cell">
          <select id="seat30" name="seat30"></select>
        </div>
        <div class="cell">
          <select id="seat31" name="seat31"></select>
        </div>
        <div class="cell">
          <select id="seat32" name="seat32"></select>
        </div>
    </div>
      <div class="row">
        <div class="cell">
          <select id="seat33" name="seat33"></select>
        </div>
        <div class="cell">
          <select id="seat34" name="seat34"></select>
        </div>
        <div class="cell">
          <select id="seat35" name="seat35"></select>
        </div>
        <div class="cell">
          <select id="seat36" name="seat36"></select>
        </div>
        <div class="cell">
          <select id="seat37" name="seat37"></select>
        </div>
        <div class="cell">
          <select id="seat38" name="seat38"></select>
        </div>
        <div class="cell">
          <select id="seat39" name="seat39"></select>
        </div>
        <div class="cell">
          <select id="seat40" name="seat40"></select>
        </div>
    </div>
   </div>
   <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary" style="float: right!important;" name="saveseatplan" id="saveseatplan">Save Seat Plan</button>
                </div>
  </div>
  </div>
 <div class="tab-pane fade" id="checkseatplan" role="tabpanel" aria-labelledby="check-seat-plan-tab">
   <div class="container-fluid">
     <form method="post" id="checkseat_form">
        <div class="row" style="padding: 20px;">
          <div style="padding-right: 20px; padding-top: 5px;">Date</div>
          <div>
            <input name="attendance_datebyseat" id="attendance_datebyseat" class="form-control" value="<?php echo date('m/d/Y')?>" disabled>
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
            <select class="form-control" name="class_seatcheck" id="class_seatcheck">
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>
    <div class="container">
        <div class="row" style="margin-left: 437px;">
        <div class="cell">Teacher</div>
        </div>
    <div class="row">
        <div class="cell">
          <input type="text" disabled id="seat1" name="seat1"></input>
          <input type="checkbox" id="attend1" name="attend1" checked="" onclick="$(this).val(this.checked ? true : false)"/>
        </div>
        <div class="cell">    
          <input type="text" disabled id="seat2" name="seat2">
          <input type="checkbox" id="attend2" name="attend2" checked="" onclick="$(this).val(this.checked ? true : false)"/> 
        </div>
        <div class="cell">
          <input type="text" disabled id="seat3" name="seat3">
          <input type="checkbox" id="attend3" name="attend3" checked="" onclick="$(this).val(this.checked ? true : false)"/>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat4" name="seat4">
          <input type="checkbox" id="attend4" name="attend4" checked="" onclick="$(this).val(this.checked ? true : false)"/>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat5" name="seat5">
          <input type="checkbox" id="attend5" name="attend5" checked="" onclick="$(this).val(this.checked ? true : false)"/>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat6" name="seat6">
          <input type="checkbox"  name="attend6" id="attend6" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat7" name="seat7">
          <input type="checkbox" name="attend7" id="attend7" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat8" name="seat8">
          <input type="checkbox"  name="attend8" id="attend8" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <input type="text" disabled id="seat9" name="seat9">
          <input type="checkbox"  name="attend9" id="attend9" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat10" name="seat10">
          <input type="checkbox"  name="attend10" id="attend10" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat11" name="seat11">
          <input type="checkbox"  name="attend11" id="attend11" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat12" name="seat12">
          <input type="checkbox"  name="attend12" id="attend12" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat13" name="seat13">
          <input type="checkbox"  name="attend13" id="attend13" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat14" name="seat14">
          <input type="checkbox"  name="attend14" id="attend14" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat15" name="seat15">
          <input type="checkbox"  name="attend15" id="attend15" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat16" name="seat16">
          <input type="checkbox"  name="attend16" id="attend16" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <input type="text" disabled id="seat17" name="seat17">
          <input type="checkbox"  name="attend17" id="attend17" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat18" name="seat18">
          <input type="checkbox"  name="attend18" id="attend18" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat19" name="seat19">
          <input type="checkbox"  name="attend19" id="attend19" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat20" name="seat20">
          <input type="checkbox"  name="attend21" id="attend21" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat21" name="seat21">
          <input type="checkbox"  name="attend21" id="attend21" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat22" name="seat22">
          <input type="checkbox"  name="attend22" id="attend22" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat23" name="seat23">
          <input type="checkbox"  name="attend23" id="attend23" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat24" name="seat24">
          <input type="checkbox"  name="attend24" id="attend24" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <input type="text" disabled id="seat25" name="seat25">
          <input type="checkbox"  name="attend25" id="attend25" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat26" name="seat26">
          <input type="checkbox"  name="attend26" id="attend26" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat27" name="seat27">
          <input type="checkbox"  name="attend27" id="attend27" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell"> 
         <input type="text" disabled id="seat28" name="seat28">
         <input type="checkbox"  name="attend28" id="attend28" checked="" onclick="$(this).val(this.checked ? true : false)"/>
         </input>
        </div>
        <div class="cell">
         <input type="text" disabled id="seat29" name="seat29">
         <input type="checkbox"  name="attend29" id="attend29" checked="" onclick="$(this).val(this.checked ? true : false)"/>
         </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat30" name="seat30">
          <input type="checkbox"  name="attend30" id="attend30" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat31" name="seat31">
          <input type="checkbox"  name="attend31" id="attend31" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat32" name="seat32">
          <input type="checkbox"  name="attend32" id="attend32" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
    </div>
    <div class="row">
        <div class="cell">
          <input type="text" disabled id="seat33" name="seat33">
          <input type="checkbox"  name="attend33" id="attend33" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat34" name="seat34">
          <input type="checkbox"  name="attend34" id="attend34" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat35" name="seat35">
          <input type="checkbox"  name="attend35" id="attend35" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat36" name="seat36">
          <input type="checkbox"  name="attend36" id="attend36" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat37" name="seat37">
          <input type="checkbox"  name="attend37" id="attend37" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat38" name="seat38">
          <input type="checkbox"  name="attend38" id="attend38" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat39" name="seat39">
          <input type="checkbox"  name="attend39" id="attend39" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
        <div class="cell">
          <input type="text" disabled id="seat40" name="seat40">
          <input type="checkbox"  name="attend40" id="attend40" checked="" onclick="$(this).val(this.checked ? true : false)"/>
          </input>
        </div>
    </div>
    <div class="row">
                <div class="col-md-12">
                  <input type="button" class="btn btn-primary" style="float: right!important;" name="checkbyseatplan" id="checkbyseatplan" value="Record Attendance"></input>
                </div>
  </div>
   </div>
     </form>
   </div>
 </div>
</div>
<style type="text/css">
input{
  width: 50px;
}
.container{
  margin-top: 40px; 
}
.cell {
    background: #98FB98;
    color:  white;
    width: 130px;
    height: 80px;
    flex: 0 0 auto;
    margin: 5px;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
}
</style>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
 </body>
