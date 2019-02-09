<head>
	<title><?php echo $title?></title>
<script type="text/javascript">
	$(document).ready(function(){
		$('#savelessonlog').click(function() {
	      	var subject_name = $('#form_lesson_log #subject_name').val();
	      	var week_no = $('#form_lesson_log #week_no').val();
	      	var day1_time1 = $('#form_lesson_log #day1_time1').val();
	      	var day1_time2 = $('#form_lesson_log #day1_time2').val();
	      	var day1_time3 = $('#form_lesson_log #day1_time3').val();
	      	var day1_time4 = $('#form_lesson_log #day1_time4').val();
	      	var day2_time1 = $('#form_lesson_log #day2_time1').val();
	      	var day2_time2 = $('#form_lesson_log #day2_time2').val();
	      	var day2_time3 = $('#form_lesson_log #day2_time3').val();
	      	var day2_time4 = $('#form_lesson_log #day2_time4').val();
	      	var day3_time1 = $('#form_lesson_log #day3_time1').val();
	      	var day3_time2 = $('#form_lesson_log #day3_time2').val();
	      	var day3_time3 = $('#form_lesson_log #day3_time3').val();
	      	var day3_time4 = $('#form_lesson_log #day3_time4').val();
	      	var day4_time1 = $('#form_lesson_log #day4_time1').val();
	      	var day4_time2 = $('#form_lesson_log #day4_time2').val();
	      	var day4_time3 = $('#form_lesson_log #day4_time3').val();
	      	var day4_time4 = $('#form_lesson_log #day4_time4').val();
	      	var day5_time1 = $('#form_lesson_log #day5_time1').val();
	      	var day5_time2 = $('#form_lesson_log #day5_time2').val();
	      	var day5_time3 = $('#form_lesson_log #day5_time3').val();
	      	var day5_time4 = $('#form_lesson_log #day5_time4').val();
	      	var day1_description1 = $('#form_lesson_log #day1_description1').val();
	      	var day1_description2 = $('#form_lesson_log #day1_description2').val();
	      	var day1_description3 = $('#form_lesson_log #day1_description3').val();
	      	var day1_description4 = $('#form_lesson_log #day1_description4').val();
	      	var day2_description1 = $('#form_lesson_log #day2_description1').val();
	      	var day2_description2 = $('#form_lesson_log #day2_description2').val();
	      	var day2_description3 = $('#form_lesson_log #day2_description3').val();
	      	var day2_description4 = $('#form_lesson_log #day2_description4').val();
	      	var day3_description1 = $('#form_lesson_log #day3_description1').val();
	      	var day3_description2 = $('#form_lesson_log #day3_description2').val();
	      	var day3_description3 = $('#form_lesson_log #day3_description3').val();
	      	var day3_description4 = $('#form_lesson_log #day3_description4').val();
	      	var day4_description1 = $('#form_lesson_log #day4_description1').val();
	      	var day4_description2 = $('#form_lesson_log #day4_description2').val();
	      	var day4_description3 = $('#form_lesson_log #day4_description3').val();
	      	var day4_description4 = $('#form_lesson_log #day4_description4').val();
	      	var day5_description1 = $('#form_lesson_log #day5_description1').val();
	      	var day5_description2 = $('#form_lesson_log #day5_description2').val();
	      	var day5_description3 = $('#form_lesson_log #day5_description3').val();
	      	var day5_description4 = $('#form_lesson_log #day5_description4').val();

	      	$.ajax({
	      		type: 'post',
	        	url: '<?php echo base_url('lesson_log/savelessonlog')?>',
	        	data: { subject_name : subject_name, week_no : week_no, 
	        		day1_time1 : day1_time1,
	        		day1_time2 : day1_time2,
	        		day1_time3 : day1_time3,
	        		day1_time4 : day1_time4,
	        		day2_time1 : day2_time1,
	        		day2_time2 : day2_time2,
	        		day2_time3 : day2_time3,
	        		day2_time4 : day2_time4,
	        		day3_time1 : day3_time1,
	        		day3_time2 : day3_time2,
	        		day3_time3 : day3_time3,
	        		day3_time4 : day3_time4,
	        		day4_time1 : day4_time1,
	        		day4_time2 : day4_time2,
	        		day4_time3 : day4_time3,
	        		day4_time4 : day4_time4,
	        		day5_time1 : day5_time1,
	        		day5_time2 : day5_time2,
	        		day5_time3 : day5_time3,
	        		day5_time4 : day5_time4,
	        		day1_description1 : day1_description1,
	        		day1_description2 : day1_description2,
	        		day1_description3 : day1_description3,
	        		day1_description4 : day1_description4,
	        		day2_description1 : day2_description1,
	        		day2_description2 : day2_description2,
	        		day2_description3 : day2_description3,
	        		day2_description4 : day2_description4,
	        		day3_description1 : day3_description1,
	        		day3_description2 : day3_description2,
	        		day3_description3 : day3_description3,
	        		day3_description4 : day3_description4,
	        		day4_description1 : day4_description1,
	        		day4_description2 : day4_description2,
	        		day4_description3 : day4_description3,
	        		day4_description4 : day4_description4,
	        		day5_description1 : day5_description1,
	        		day5_description2 : day5_description2,
	        		day5_description3 : day5_description3,
	        		day5_description4 : day5_description4 },
	       	 	dataType: 'json',
		        success: function(response){
		          if (response.status) {
		              swal("Lesson Log Added!", "", "success");
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
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<form method="post" id="form_lesson_log">
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Subject Select </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" id="subject_name" name="subject_name">
						<?php foreach($subjectlist as $s):?>
                   			<option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
                  		<?php endforeach?>				
	             	</select>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Week No :</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="text" name="week_no" id="week_no" class="form-control" onkeypress="return isNumber(event)" maxlength="2">
				</div>
			</div>
			
			<div id="add">
				<div class="row">
				<div class="col-md-3">Day 1</div>
				</div>
				<div class="row" style="padding: 10px;">	
					<input type="time" name="day1_time1" id="day1_time1" style="margin-left: 20px; width: 10%;">
					<input type="time" name="day1_time2" id="day1_time2" style="margin-left: 130px; width: 10%;">
					<input type="time" name="day1_time3" id="day1_time3" style="margin-left: 140px; width: 10%;">
					<input type="time" name="" ="day1_time4" id="day1_time4" style="margin-left: 130px; width: 10%;">
				</div>
				<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
					<input type="text" name="day1_description1" id="day1_description1" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></input>
					<input type="text" name="day1_description2" id="day1_description2" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day1_description3" id="day1_description3" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day1_description4" id="day1_description4" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
				</div>
			</div><br>
			<div id="add">
				<div class="row">
				<div class="col-md-3">Day 2</div>
				</div>
				<div class="row" style="padding: 10px;">
					<input type="time" name="day2_time1" id="day2_time1" style="margin-left: 20px; width: 10%;">
					<input type="time" name="day2_time2" id="day2_time2" style="margin-left: 130px; width: 10%;">
					<input type="time" name="day2_time3" id="day2_time3" style="margin-left: 140px; width: 10%;">
					<input type="time" name="day2_time4" id="day2_time4" style="margin-left: 130px; width: 10%;">
				</div>
				<div class="row" style="background: #9de26f; padding:10px; width: 100%;">
					<input type="text" name="day2_description1" id="day2_description1" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></input>
					<input type="text" name="day2_description2" id="day2_description2" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day2_description3" id="day2_description3" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day2_description4" id="day2_description4" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
				</div>
			</div><br>
			<div id="add">
				<div class="row">
				<div class="col-md-3">Day 3</div>
				</div>
				<div class="row" style="padding: 10px;">
					<input type="time" name="day3_time1" id="day3_time1" style="margin-left: 20px; width: 10%;">
					<input type="time" name="day3_time2" id="day3_time2" style="margin-left: 130px; width: 10%;">
					<input type="time" name="day3_time3" id="day3_time3" style="margin-left: 140px; width: 10%;">
					<input type="time" name="day3_time4" id="day3_time4" style="margin-left: 130px; width: 10%;">
				</div>
				<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
					<input type="text" name="day3_description1" id="day3_description1" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></input>
					<input type="text" name="day3_description2" id="day3_description2" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day3_description3" id="day3_description3" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day3_description4" id="day3_description4" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
				</div>
			</div><br>
			<div id="add">
				<div class="row">
				<div class="col-md-3">Day 4</div>
				</div>
				<div class="row" style="padding: 10px;">
					<input type="time" name="day4_time1" id="day4_time1" style="margin-left: 20px; width: 10%;">
					<input type="time" name="day4_time2" id="day4_time2" style="margin-left: 130px; width: 10%;">
					<input type="time" name="day4_time3" id="day4_time3" style="margin-left: 140px; width: 10%;">
					<input type="time" name="day4_time4" id="day4_time4" style="margin-left: 130px; width: 10%;">
				</div>
				<div class="row" style="background: #9de26f; padding:10px; width: 100%;">
					<input type="text" name="day4_description1" id="day4_description1" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></input>
					<input type="text" name="day4_description2" id="day4_description2" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day4_description3" id="day4_description3" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day4_description4" id="day4_description4" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
				</div>
			</div><br>
			<div id="add">
				<div class="row">
				<div class="col-md-3">Day 5</div>
				</div>
				<div class="row" style="padding: 10px;">
					<input type="time" name="day5_time1" id="day5_time1" style="margin-left: 20px; width: 10%;">
					<input type="time" name="day5_time2" id="day5_time2" style="margin-left: 130px; width: 10%;">
					<input type="time" name="day5_time3" id="day5_time3" style="margin-left: 140px; width: 10%;">
					<input type="time" name="day5_time4" id="day5_time4" style="margin-left: 130px; width: 10%;">
				</div>
				<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
					<input type="text" name="day5_description1" id="day5_description1" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></input>
					<input type="text" name="day5_description2" id="day5_description2" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day5_description3" id="day5_description3" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
					<input type="text" name="day5_description4" id="day5_description4" class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></input>
				</div>
			</div><br>
			<input type="button" class="btn bg-primary" id="savelessonlog" name="savelessonlog" value="Save Lesson Log"></input>	
		</form>	
	</div>
</body>