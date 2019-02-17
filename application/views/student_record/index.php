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
  })
</script>
</head>
<body id="page-top">
<div class="content-wrapper" style="margin-top: 100px!important;">
    <div class="container-fluid">
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
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Record</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th class="center_th">Name</th>
                  <th class="center_th" style="width: 120px!important;">Number of Absences Incurred</th>
                  <th class="center_th">Average Grade</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th style="width: 100px!important;">Number of Absences Incurred</th>
                  <th>Average Grade</th>
                </tr>
              </tfoot>
              <tbody id="records">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
</body>
