<head>
	<title><?php echo $title?></title>
	<script type="text/javascript">
		$(document).ready(function(){
			getformula();
			function getformula(){
		      $.ajax({
		        type  : 'post',
		        url   : '<?php echo site_url('formula/getformula')?>',
		        dataType : 'json',
		        success : function(data){
		          var html = '';
		          var i;
		          for(i = 0 ; i<data.length; i++){
		            html += '<tr>'+
		                    '<td>'+'Assignment Percentage -> '+data[i].assignment_percentage+'<br>'+'Project Percentage -> '+data[i].project_percentage+'<br>'+'Quarter Exam Percentage -> '+data[i].quarter_exam_percentage+'<br>'+'Quiz Percentage -> '+data[i].quiz_percentage+'<br>'+'Seatwork Percentage -> '+data[i].seatwork_percentage+'<br>'+'</td>'+
		                    '<td><a href="javascript:void(0);" class="fa fa-pencil  formula_edit" data-formula_id="'+data[i].formula_id+'" data-assignment_percentage="'+data[i].assignment_percentage+'" data-project_percentage="'+data[i].project_percentage+'"data-quarter_exam_percentage="'+data[i].quarter_exam_percentage+'"data-quiz_percentage="'+data[i].quiz_percentage+'"data-seatwork_percentage="'+data[i].seatwork_percentage+'"</a>'+'</td>'+
		                    '</tr>';
		          }
		          $('#notecontent').html(html);
		          $('#subject_id').val("");
	              $('#note_id').val("");
	              $('#class_name').val("");
	              $('#note_description').val("");
	              $('#note_description').val("");
	              $('#note_date').val("");
		        }
		      });
		    }

			$('#saveformula').click(function(){
				var assignment_percentage = $('#formula_form #assignment_percentage').val();
				var project_percentage = $('#formula_form #project_percentage').val();
				var quarter_exam_percentage = $('#formula_form #quarter_exam_percentage').val();
				var quiz_percentage = $('#formula_form #quiz_percentage').val();
				var seatwork_percentage = $('#formula_form #seatwork_percentage').val();
				$.ajax({
					type: 'post',
					url: '<?php echo base_url('formula/saveformula')?>',
					data: { assignment_percentage:assignment_percentage, 
							project_percentage:project_percentage, 
							quarter_exam_percentage:quarter_exam_percentage, 
							quiz_percentage:quiz_percentage,
							seatwork_percentage:seatwork_percentage},
					dataType: 'json',
					success: function(response){
			          if (response.status) {
			              swal("Formula Saved!", "", "success");
			              getformula();
			          } else {
			              alert(response.message);
			          }
			        },
			        error:function(request,status,error){ 
			          alert('ahhaha sayup yot');
			        }
				});
			});

			$('#notecontent').on('click', '.formula_edit', function(){
		      var assignment_percentage = Math.floor($(this).data('assignment_percentage')*100);
		      var project_percentage = Math.floor($(this).data('project_percentage')*100);
		      var quarter_exam_percentage = Math.floor($(this).data('quarter_exam_percentage')*100);
		      var quiz_percentage = Math.floor($(this).data('quiz_percentage')*100);
		      var seatwork_percentage = Math.floor($(this).data('seatwork_percentage')*100);
		      var formula_id = $(this).data('formula_id');

		      $('#formula_id').val(formula_id);
		      $('#assignment_percentage').val(assignment_percentage);
		      $('#project_percentage').val(project_percentage);
		      $('#quarter_exam_percentage').val(quarter_exam_percentage);
		      $('#quiz_percentage').val(quiz_percentage);
		      $('#seatwork_percentage').val(seatwork_percentage);
		      $('#saveformula').prop('disabled', true);
		      $('#updatenote').prop('disabled', false);
		    });

		    $('#updatenote').click(function(){
		    	var formula_id = $('#formula_form #formula_id').val();
				var assignment_percentage = $('#formula_form #assignment_percentage').val();
				var project_percentage = $('#formula_form #project_percentage').val();
				var quarter_exam_percentage = $('#formula_form #quarter_exam_percentage').val();
				var quiz_percentage = $('#formula_form #quiz_percentage').val();
				var seatwork_percentage = $('#formula_form #seatwork_percentage').val();
				$.ajax({
					type: 'post',
					url: '<?php echo base_url('formula/updateformula')?>',
					data: { assignment_percentage:assignment_percentage, 
							project_percentage:project_percentage, 
							quarter_exam_percentage:quarter_exam_percentage, 
							quiz_percentage:quiz_percentage,
							seatwork_percentage:seatwork_percentage,
							formula_id:formula_id},
					dataType: 'json',
					success: function(response){
			          if (response.status) {
			              swal("Successfully updated formula!", "", "success");
			              getformula();
			          } else {
			              alert(response.message);
			          }
			        },
			        error:function(request,status,error){ 
			          alert('ahhaha sayup yot');
			        }
				});
			});

			$('#notecontent').on('click', '.note_delete', function(){
		      var note_id = $(this).data('note_id');
		      var subject_id = $(this).data('subject_id');
		      var class_name = $(this).data('class_name');
		      var note_description = $(this).data('note_description');
		      var note_date = $(this).data('note_date');

		      $('#note_id').val(note_id);
		      $('#subject_id').val(subject_id);
		      $('#class_name').val(class_name);
		      $('#note_description').val(note_description);
		      $('#note_date').val(note_date);
		      
		      var note_id_del = $('#note_id').val();
		      var subject_id_del = $('#subject_id').val();
		      var class_name_del = $('#class_name').val();
		      var note_description_del = $('#note_description').val();
		      var note_date_del = $('#note_date').val();
		      $.alert({
		        title: 'Delete!',
		        content: 'Are you sure you want to delete?',
		        buttons: {
		          confirm: function () {
		            $.ajax({
		              type: 'post',
		              url: '<?php echo base_url('notes/deletenote')?>',
		              data: { note_id: note_id_del, subject_id: subject_id_del, class_name:class_name_del, note_description:note_description_del, note_date:note_date_del},
		              dataType: 'json',
		              success: function(response){
		                if (response.status) {
		                  $.alert('Successfully Deleted!');
		                  getformula();
		                } else {
		                    $('#saveformula').prop('disabled', false);
		                    $('#updatenote').prop('disabled', true);
		                    getformula();
		                  }
		              },
		              error:function(request,status,error){ 
		                alert('ahhaha sayup yot');
		              }
		            });
		          },
		          cancel: function () {
		            $.alert('Canceled!');
		          }
		        }
		      });
		    });
		});
	</script>
</head>
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<form method="post" id="formula_form">
			<input type="hidden" name="note_id" id="note_id">
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Assignment Percentage </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="number" name="assignment_percentage" id="assignment_percentage">%
					<input type="hidden" name="formula_id" id="formula_id">
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Project Percentage </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="number" name="project_percentage" id="project_percentage">%
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Quarter Exam Percentage </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="number" name="quarter_exam_percentage" id="quarter_exam_percentage">%
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Quiz Percentage </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="number" name="quiz_percentage" id="quiz_percentage">%
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Seatwork Percentage </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input type="number" name="seatwork_percentage" id="seatwork_percentage">%
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2 offset-md-3" style="padding-left: 120px;">
					<input type="button" name="saveformula" id="saveformula" class="btn bg-success" value="Save Percentage">
				</div>
				<div>
					<input type="button" class="btn btn-primary" id="updatenote" name="updatenote" style="margin-left: 10px;"value="Update Percentage" disabled></input>
				</div>
			</div>
		</form>
		<div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Current Percentage</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody id="notecontent">
	          </tbody>
	        </table>
	      </div>
	    </div>
</body>