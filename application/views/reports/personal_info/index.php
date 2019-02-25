<head>
	<title><?php echo $title?></title>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#class_grade').change(function(){
				var class_grade = $('#class_grade').val();
				var quarter = $('#quarter').val();
				var score_type = $('#score_type').val();
				$.ajax({
					url: '<?php echo base_url('personal_info_report/getstudentsBySection')?>',
					method: 'post',
					dataType: 'json',
					data: {class_grade:class_grade, quarter:quarter, score_type:score_type},
					success: function(data){
						var html = '';
			          	var i;
			          	for(i = 0 ; i<data.length; i++){
			           		html += '<tr>'+
		                    '<td>'+data[i].s_id+'</td>'+
		                    '<td>'+data[i].lname+','+data[i].fname+','+data[i].mname+','+data[i].extname+'</td>'+
		                    '<td>'+data[i].birthday+'</td>'+
		                    '<td>'+data[i].guardianname+'</td>'+
		                    '<td>'+data[i].housenum+', '+data[i].street+', '+data[i].barangay+', '+data[i].city+', '+data[i].province+'</td>'+
		                    '<td>'+data[i].contactnum+'</td>'+
		                    '</tr>';
            			}
          				$('#scorerecord').html(html);
          			}
				});
			});
		});
	</script>
</head>
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<form method="post" id="scoreform" action="<?php echo base_url();?>personal_info_report/action">
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
			<div class="card-body">
	              <div class="table-responsive">
	                <table class="table table-bordered" id="score" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Student ID</th>
	                      <th>Name</th>
	                      <th>Birthday</th>
	                      <th>Guardian Name</th>
	                      <th>Address</th>
	                      <th>Contact Number</th>
	                    </tr>
	                  </thead>
	                  <tbody id="scorerecord">
	                  </tbody>
	                </table>
	              </div>
	        </div>
	        <input type="submit" name="export" class="btn btn-success" value="Export">
		</form>
	</div>
</body>