<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/froala_editor.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/froala_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/draggable.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/colors.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/image.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/table.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/video.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/file.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/help.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/special_characters.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

  <style>
      body {
          text-align: center;
      }

      div#editor {
          width: 81%;
          margin: auto;
          text-align: left;
      }

      .ss {
        background-color: red;
      }
  </style>
</head>

<body>
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
		<div id="editor">
      	<div id='edit' style="margin-top: 30px;" name="area2"></div>
  	</div>
 
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/fullscreen.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/word_paste.min.js"></script>
  <script>
    $(function(){
      $('#edit').froalaEditor()
    });
  </script>
</body>
