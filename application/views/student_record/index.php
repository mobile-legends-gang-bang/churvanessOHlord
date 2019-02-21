<head>
  <title>Edukit - Student Record</title>
<style type="text/css">
  th{
      background: #323231; color:#fff;
      text-align: center;
    }
  .center_th{
    vertical-align: middle!important;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('#subject_id, #class_grade').change(function(){
      var subject_id = $('#subject_id').val();
      var class_grade = $('#class_grade').val();
      $.ajax({
          url: '<?php echo base_url('student_record/getabsent')?>',
          method: 'post',
          data: {class_grade:class_grade, subject_id:subject_id},
          success: function(data){
            $('#records').html(data);
          }
        });
    });
    $('#subject_id2, #class_grade2, #quarter').change(function(){
      var subject_id = $('#subject_id2').val();
      var class_grade = $('#class_grade2').val();
      var quarter = $('#quarter').val();
      $.ajax({
          url: '<?php echo base_url('student_record/getscores')?>',
          method: 'post',
          data: {class_grade2:class_grade, subject_id2:subject_id, quarter:quarter},
          success: function(data){
            $('#grade_tbody').html(data);
          }
        });
    });
  })
</script>
</head>
<body id="page-top">
<div class="content-wrapper" style="margin-top: 100px!important;">
    <div class="container-fluid">
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="attendance-record" data-toggle="pill" href="#attendance-tab" role="tab" aria-controls="tab-class-list" aria-selected="true"> Attendance Record </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="grades-record" data-toggle="pill" href="#grades-tab" role="tab" aria-controls="grades-record" aria-selected="true"> Grade Record </a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="attendance-tab" role="tabpanel" aria-labelledby="attendance-record">
          <div class="row" style="padding: 20px;">
            <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
            <div>
              <select class="form-control" name="subject_id" id="subject_id">
                <option value=""></option>
                <?php foreach($subjectlist as $s):?>
                  <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                <?php endforeach?>
              </select>
            </div>
            <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
            <div>
              <select class="form-control" name = "class_grade" id="class_grade">
                <?php foreach($uniqueclass as $c):?>
                  <option><?php echo $c->class_name?></option>
                <?php endforeach?>
              </select>
            </div>
            <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Quarter</div>
            <div>
              <select class="form-control">
                <option>
                  1
                </option>
                <option>
                  2
                </option>
                <option>
                  3
                </option>
                <option>
                  4
                </option>
                <option>
                  Whole Quarter
                </option>
              </select>
            </div>
          </div>  
          <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
            <div class="card-header">
              <i class="fa fa-table">&nbsp;&nbsp;</i><span>Student Record</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 120px; text-align: right;">Student ID</th>
                      <th class="center_th">Name</th>
                      <th class="center_th" style="width: 120px!important;">Number of Absences Incurred</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style="width: 120px; text-align: right;">Student ID</th>
                      <th>Name</th>
                      <th style="width: 100px!important;">Number of Absences Incurred</th>
                    </tr>
                  </tfoot>
                  <tbody id="records">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="grades-tab" role="tabpanel" aria-labelledby="grades-record">
          <div class="row" style="padding: 20px;">
            <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
            <div>
              <select class="form-control" name="subject_id" id="subject_id2">
                <option value=""></option>
                <?php foreach($subjectlist as $s):?>
                  <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                <?php endforeach?>
              </select>
            </div>
            <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
            <div>
              <select class="form-control" name = "class_grade" id="class_grade2">
                <?php foreach($uniqueclass as $c):?>
                  <option><?php echo $c->class_name?></option>
                <?php endforeach?>
              </select>
            </div>
            <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Quarter</div>
            <div>
              <select class="form-control" name="quarter" id="quarter">
                <option>
                  1
                </option>
                <option>
                  2
                </option>
                <option>
                  3
                </option>
                <option>
                  4
                </option>
                <option>
                  Whole Quarter
                </option>
              </select>
            </div>
          </div>  
          <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
            <div class="card-header">
              <i class="fa fa-table">&nbsp;&nbsp;</i><span>Student Record</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="1000px" cellspacing="0">
                  <tbody id="grade_tbody">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
</body>
