<head>
	<title><?php echo $title?></title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#score_subject, #class_grade').change(function(){
				var class_grade = $('#class_grade').val();
				var score_subject = $('#score_subject').val();
				var quarter = $('#quarter').val();
				var score_type = $('#score_type').val();
				$.ajax({
					url: '<?php echo base_url('scores_report/getscores')?>',
					method: 'post',
					// dataType: 'json',
					data: {class_grade:class_grade, score_subject:score_subject, quarter:quarter, score_type:score_type},
					success: function(data){
						console.log(data);
						$('#scorerecord').html(data);
					}
				});
			});
			$('#create_report').click(function(){
				var class_grade = $('#scoreform #class_grade').val();
				var score_subject = $('#scoreform #score_subject').val();
				var quarter = $('#scoreform #quarter').val();
				var score_type = $('#scoreform #score_type').val();
				$.ajax({
					url: '<?php echo base_url('scores_report/action')?>',
					method: 'post',
					dataType: 'json',
					data: {class_grade:class_grade, score_subject:score_subject, quarter:quarter, score_type:score_type},
					success: function(data){
						console.log(data);
					}
				})
			})
		});
	</script>
	<style>
		th { text-align: center !important; }
	</style>
</head>
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<form method="post" id="scoreform">
			<div class="row" style="padding: 10px;">
				<div class="col-md-2"> Subject</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" name="score_subject" id="score_subject">
	                  <option value=""></option>
	                  <?php foreach($subjectlist as $s):?>
	                    <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
	                  <?php endforeach?>
	                </select>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
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
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Quarter</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" id="quarter" name="quarter">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>Whole Quarter</option>
					</select>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Score Type</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" name="score_type" id="score_type">
	                  <option>Assignment</option>
	                  <option>Project</option>
	                  <option>Quarter Exam</option>
	                  <option>Quiz</option>
	                  <option>Seatwork</option>
	                  <option>All</option>
	                </select>
				</div>
			</div>
			<div class="card-body">
	              <div class="table-responsive">
	                <table class="table table-bordered" id="score" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Student ID</th>
	                      <th>Name</th>
	                      <th>Score Type</th>
	                      <th colspan="10">Score</th>
	                      <th>Total Score</th>
	                    </tr>
	                  </thead>
	                  <tbody id="scorerecord">
	                  </tbody>
	                </table>
	              </div>
	        </div>
		</form>
		<div class="row" style="padding: 10px;">
				<div class="col-md-2 offset-md-3">
					<button class="btn btn-primary" id="create_report" name="create_report" style="float: right!important;">Download Report</button>
				</div>
			</div>
	</div>
</body>