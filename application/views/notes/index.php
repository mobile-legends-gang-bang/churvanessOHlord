<head>
	<title><?php echo $title?></title>
</head>
<body>
	<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 270px!important;">
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Subject </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<select class="form-control">
					<?php foreach ($subjectlist as $s): ?>
						<option><?php echo $s->subject_name?></option>	
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2">Classroom </div>
			<div class="col-md-1">:</div>
			<div class="col-md-4">
				<select class="form-control">
					<?php foreach ($uniqueclass as $u): ?>
						<option value="<?php echo $u->class_id?>"><?php echo $u->class_name?></option>	
					<?php endforeach ?>
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