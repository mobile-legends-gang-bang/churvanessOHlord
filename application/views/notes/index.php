<head>
	<title><?php echo $title?></title>
	<script type="text/javascript">
		$(document).ready(function(){
			getnote();
			function getnote(){
		      $.ajax({
		        type  : 'post',
		        url   : '<?php echo site_url('notes/getnote')?>',
		        dataType : 'json',
		        success : function(data){
		          var html = '';
		          var i;
		          for(i = 0 ; i<data.length; i++){
		            html += '<tr>'+
		                    '<td>'+data[i].class_name+'</td>'+
		                    '<td>'+data[i].subject_name+'</td>'+
		                    '<td>'+data[i].note_description+'</td>'+
		                    '<td>'+data[i].note_date+'</td>'+
		                    '<td><a href="javascript:void(0);" class="fa fa-pencil  note_edit" data-note_id="'+data[i].note_id+'" data-class_name="'+data[i].class_name+'" data-note_description="'+data[i].note_description+'" data-note_date="'+data[i].note_date+'" data-subject_id="'+data[i].subject_id+'"</a>'+' '+'<a href="javascript:void(0);" class="fa fa-trash note_delete" data-note_id="'+data[i].note_id+'" data-note_date="'+data[i].note_date+'"  data-class_name="'+data[i].class_name+'" data-note_description="'+data[i].note_description+'"></a> </td>'+
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

			$('#savenote').click(function(){
				var subject_id = $('#note_form #subject_id').val();
				var class_name = $('#note_form #class_name').val();
				var note_description = $('#note_form #note_description').val();
				var note_date = $('#note_form #note_date').val();
				$.ajax({
					type: 'post',
					url: '<?php echo base_url('notes/savenote')?>',
					data: { subject_id:subject_id, class_name:class_name, note_description:note_description, note_date:note_date},
					dataType: 'json',
					success: function(response){
			          if (response.status) {
			              swal("Note Added!", "", "success");
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

			$('#notecontent').on('click', '.note_edit', function(){
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
		      $('#savenote').prop('disabled', true);
		      $('#updatenote').prop('disabled', false);
		    });

		    $('#updatenote').click(function(){
				var subject_id = $('#subject_id').val();
				var class_name = $('#class_name').val();
				var note_description = $('#note_description').val();
				var note_date = $('#note_date').val();
				var note_id = $('#note_id').val();
				$.ajax({
					type: 'post',
					url: '<?php echo base_url('notes/updatenote')?>',
					data: { note_id:note_id, subject_id:subject_id, class_name:class_name, note_description:note_description, note_date:note_date},
					dataType: 'json',
					success: function(response){
			          if (response.status) {
				          swal("Updated Note!", "", "success");
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
		                  getnote();
		                } else {
		                    $('#savenote').prop('disabled', false);
		                    $('#updatenote').prop('disabled', true);
		                    getnote();
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
		<form method="post" id="note_form">
			<input type="hidden" name="note_id" id="note_id">
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Subject </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" name="subject_id" id="subject_id">
						<?php foreach ($subjectlist as $s): ?>
							<option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>	
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Classroom </div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<select class="form-control" name="class_name" id="class_name">
						<?php foreach ($uniqueclass as $c): ?>
							<option ><?php echo $c->class_name?></option>	
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Note</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<textarea class = "form-control" style="resize: none" rows="5" cols="37" name="note_description" id="note_description"></textarea>
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2">Note Date</div>
				<div class="col-md-1">:</div>
				<div class="col-md-4">
					<input class="form-control" type="date" name="note_date" id="note_date">
				</div>
			</div>
			<div class="row" style="padding: 10px;">
				<div class="col-md-2 offset-md-3" style="padding-left: 120px;">
					<input type="button" name="savenote" id="savenote" class="btn bg-success" value="Save Note">
				</div>
				<div>
					<input type="button" class="btn btn-primary" id="updatenote" name="updatenote" style="margin-left: 10px;"value="Update Note" disabled></input>
				</div>
			</div>
		</form>
		<div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Class Section</th>
	              <th>Subject</th>
	              <th style="text-align: center;">Note</th>
	              <th>Note Date</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody id="notecontent">
	          </tbody>
	        </table>
	      </div>
	    </div>
</body>