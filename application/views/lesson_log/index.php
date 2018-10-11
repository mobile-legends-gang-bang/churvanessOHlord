<head>
	<title><?php echo $title?></title>
	<?php $this->load->view('load/head')?>
	<!-- <script src="<?php //echo base_url()?>assets/jquery/appendjquery.js"></script>
	<script>
		$(document).ready(function(){
		    $("#btn2").click(function(){
		        $("#add").append("<?php //$this->load->view('load/append')?>");
		});
	});
</script> -->

</head>
<body>
	<?php $this->load->view('load/sidenavigation')?>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Subject Select </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<select class="form-control">
					<option>Subject 1</option>
					<option>Subject 2</option>
				</select>
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Date :</div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<input type="date" name="" class="form-control">
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2 offset-md-3">
				<button class="btn bg-primary">View Lesson Log Summary</button>
			</div>
		</div>
		
		<div id="add">
			<div class="row">
			<div class="col-md-3">Day 1</div>
			</div>
			<div class="row" style="padding: 10px;">
				<input type="time" name="" style="margin-left: 20px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
				<input type="time" name="" style="margin-left: 140px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
			</div>
			<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
			</div>
		</div><br>
		<div id="add">
			<div class="row">
			<div class="col-md-3">Day 2</div>
			</div>
			<div class="row" style="padding: 10px;">
				<input type="time" name="" style="margin-left: 20px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
				<input type="time" name="" style="margin-left: 140px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
			</div>
			<div class="row" style="background: #9de26f; padding:10px; width: 100%;">
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
			</div>
		</div><br>
		<div id="add">
			<div class="row">
			<div class="col-md-3">Day 3</div>
			</div>
			<div class="row" style="padding: 10px;">
				<input type="time" name="" style="margin-left: 20px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
				<input type="time" name="" style="margin-left: 140px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
			</div>
			<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
			</div>
		</div><br>
		<div id="add">
			<div class="row">
			<div class="col-md-3">Day 4</div>
			</div>
			<div class="row" style="padding: 10px;">
				<input type="time" name="" style="margin-left: 20px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
				<input type="time" name="" style="margin-left: 140px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
			</div>
			<div class="row" style="background: #9de26f; padding:10px; width: 100%;">
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
			</div>
		</div><br>
		<div id="add">
			<div class="row">
			<div class="col-md-3">Day 5</div>
			</div>
			<div class="row" style="padding: 10px;">
				<input type="time" name="" style="margin-left: 20px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
				<input type="time" name="" style="margin-left: 140px; width: 10%;">
				<input type="time" name="" style="margin-left: 130px; width: 10%;">
			</div>
			<div class="row" style="background: #cfeaa5; padding:10px; width: 100%;">
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 15px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
				<textarea class="form-control" style="width:20%; height: 10%; resize: none; margin-left: 40px;"></textarea>
			</div>
		</div><br>
		<button class="btn bg-primary">SAVE</button>
	</div>
</body>