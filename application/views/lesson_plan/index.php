<head>
  <title>Create Lesson Plan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 -->  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/froala_editor.css">
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
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
 -->  <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/code_mirror.min.css">

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
      #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
    color: #868e96;
    text-align: left;
}
  </style>
</head>

<body>
	<div class="content-wrapper" style="margin-top: 110px!important; margin-left:300px!important;">
    <div class="row" style="margin-left: 100px;">
      <div class="col-md-3">
        Select Subject for this lesson Plan : 
      </div>
      <div class="col-md-3">
        <select class="form-control" name="score_subject" id="score_subject" style="width: 100px;">
        <?php foreach($subjectlist as $s):?>
          <option value="<?php echo $s->subject_id?>"><?php echo $s->subject_name?></option>
        <?php endforeach?>
      </select>
      </div>
    </div> 
    <br>    
		<h4>
      Your lesson plan on the go.
	  </h4>	
		<div id="editor">
      	<div ></div>
        <textarea id='edit' style="margin-top: 30px;" name="area2"></textarea>
  	</div>
    <input type="submit" name="submit" id="submit" value="Save Lesson Plan">
 
  

 <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/xml.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/froala/js/plugins/codemirror.min.js"></script>
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
      var subject_id = $('#score_subject').val();
      // alert(subject_id);
      $('#edit').froalaEditor({
        // Set the save param.

        saveParam: 'content',
 
        // Set the save URL.
        saveURL: '<?php echo base_url('lesson_plan/save')?>',
 
        // HTTP request type.
        saveMethod: 'POST',
 
        // Additional save params.
        saveParams: {id: 'my_editor', subject_name:subject_id}
      })
      .on('froalaEditor.save.before', function (e, editor) {
        // alert('weee');
      })
      .on('froalaEditor.save.after', function (e, editor, response) {
        swal("Lesson Plan Created!", "", "success");
        $('#edit').val("Start now...");
      })
      .on('froalaEditor.save.error', function (e, editor, error) {
        // Do something here.
      });
    });

    $(function(){
      $('.selector').froalaEditor({
        // Set the image upload parameter.
        imageUploadParam: 'image_param',

        // Set the image upload URL.
        imageUploadURL: 'http//localhost/churvanessohlord/images',

        // Additional upload params.
        imageUploadParams: {id: 'my_editor'},

        // Set request type.
        imageUploadMethod: 'POST',

        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,

        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png']
      })
      .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
        // Return false if you want to stop the image upload.
      })
      .on('froalaEditor.image.uploaded', function (e, editor, response) {
        // Image was uploaded to the server.
      })
      .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
        // Image was inserted in the editor.
      })
      .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
        // Image was replaced in the editor.
      })
      .on('froalaEditor.image.error', function (e, editor, error, response) {
        // Bad link.
        if (error.code == 1) {  }

        // No link in upload response.
        else if (error.code == 2) {  }

        // Error during image upload.
        else if (error.code == 3) {  }

        // Parsing response failed.
        else if (error.code == 4) {  }

        // Image too text-large.
        else if (error.code == 5) {  }

        // Invalid image type.
        else if (error.code == 6) {  }

        // Image can be uploaded only to same domain in IE 8 and IE 9.
        else if (error.code == 7) {  }

        // Response contains the original server response to the request if available.
      });
    });

    $('#submit').click (function () {
      $('#edit').froalaEditor('save.save')
    });

    $(document).ready(function(){
      load();
      function load(){
        var score_subject = $('#score_subject').val()
        $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('lesson_plan/get')?>',
        dataType : 'html',
        data : {subject_id:score_subject},
        success : function(data){
          // alert("sahdas");return;
          // $('.fr-wrapper').html(data);
          $('#edit').froalaEditor('html.set', data);
        }
      });
      }

      $('#score_subject').on('change', function(){
        var subject_id = $('#score_subject').val();
        function load(){
          $.ajax({

          });
        }
      });
    });

  </script>
<!--   <script type="text/javascript">
    $(document).ready(function(){
      $('#submit').froalaEditor({toolbarInline:false})
    });
  </script> -->
</body>
