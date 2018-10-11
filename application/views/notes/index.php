<head>
	<title><?php echo $title?></title>
	<?php $this->load->view('load/head')?>
</head>
<body>
	<?php $this->load->view('load/sidenavigation')?>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Subject </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<select class="form-control">
					<option>Subject 1</option>
					<option>Subject 2</option>
				</select>
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Classroom </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<select class="form-control">
					<option>Classroom 1</option>
					<option>Classroom 2</option>
				</select>
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Note</div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<textarea class = "form-control" style="resize: none" rows="5" cols="37"></textarea>
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Remind me on </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<input class="form-control" type="datetime-local" name="">
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2 offset-md-3">
				<button class="btn bg-success">Save Reminder</button>
			</div>
		</div>

</body>