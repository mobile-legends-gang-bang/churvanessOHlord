<head>
	<title><?php echo $title?></title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#create_report').click(function(){
				var subject_id = $('#scoreform #subject_id2').val();
		      	var class_grade = $('#scoreform #class_grade2').val();
				$.ajax({
					url: '<?php echo base_url('final_average_report/action')?>',
					method: 'post',
					dataType: 'json',
					data: {class_grade:class_grade, subject_id:subject_id},
					success: function(data){
						console.log(data);
					}
				})
			});
			$('#subject_id2, #class_grade2').change(function(){
		      var subject_id = $('#subject_id2').val();
		      var class_grade = $('#class_grade2').val();
		      $.ajax({
		          url: '<?php echo base_url('final_average_report/getfinalaverage')?>',
		          method: 'post',
		          data: {class_grade:class_grade, subject_id:subject_id},
		          success: function(data){
		            $('#grade_tbody').html(data);
		          }
		        });
		    });
		});
	</script>
	<style>
		th { text-align: center !important; }
	</style>
</head>
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<form method="post" id="scoreform" action="<?php echo base_url();?>final_average_report/action">
			<div class="row" style="padding: 10px;">
				<div class="col-md-2"> Subject</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" name="subject_id" id="subject_id2">
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
					<select class="form-control" name = "class_grade" id="class_grade2">
		                <?php foreach($uniqueclass as $c):?>
		                  <option><?php echo $c->class_name?></option>
		                <?php endforeach?>
		             </select>
				</div>
			</div>
			<div class="card-body">
	              <div class="table-responsive">
	                <table class="table table-bordered" id="score" width="100%" cellspacing="0">
	                  <tbody id="grade_tbody">
	                  </tbody>
	                </table>
	              </div>
	        </div>
	        <input type="submit" name="export" class="btn btn-success"  value="Export">
		</form>
	</div>
</body>