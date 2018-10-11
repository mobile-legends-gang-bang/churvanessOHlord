<head>
	<title><?php echo $title?></title>
	<?php $this->load->view('load/head')?>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/tinymce.js"></script>
	<script type="application/x-javascript">
		tinymce.init({selector:'#TypeHere'});
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/nicedit.js"></script>
	  <script type="text/javascript">
	        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	  </script>
</head>
<body>
	<?php $this->load->view('load/sidenavigation')?>
	<div class="content-wrapper" style="margin-top: 110px!important; margin-left:300px!important;">
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
			<div class="col-md-2 offset-md-3">
				<button class="btn bg-primary">View Lesson Plan Record</button>
			</div>
		</div>
	  <h4>
	    You may now start creating and editing your lesson plan.
	  </h4>
	  	<textarea name="area2" style="width: 100%;" rows="15">
	       Start creating lesson plan.
	 	</textarea><br/>
	</div>
</body>
