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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
 --> 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/froala/css/plugins/code_mirror.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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

<div class="content-wrapper" style="margin-top: 110px!important; margin-left:300px!important;">
  <div class="container-fluid">
    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="create-tab" data-toggle="pill" href="#tab-create" role="tab" aria-controls="tab-create" aria-selected="true">Create Your Lesson PLan Here</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="edit-tab" data-toggle="pill" href="#tab-edit" role="tab" aria-controls="tab-edit" aria-selected="true">Lesson Plan Records</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="tab-create" role="tabpanel" aria-labelledby = "create-tab">
        <div class="row" style="margin-left: 100px;">
          <div class="col-md-3">
            Select Subject for this lesson Plan : 
          </div>
          <div class="col-md-3">
            <select class="form-control" name="score_subject" id="score_subject" style="width: 130px;">
              <option></option>
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
          <div></div>
          <textarea id='edit' style="margin-top: 30px;" name="area2" hidden></textarea>
        </div>
        <input type="submit" name="submit" id="submit" value="Save Lesson Plan">
      </div>
      <div class="tab-pane fade" id="tab-edit" role="tabpanel" aria-labelledby = "edit-tab">
        <br>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Subject</th>
                <th style="text-align: center;">Date Created</th>
                <th style="width:400px;">Action</th>
              </tr>
            </thead>
            <tbody id="lessonplancontent">
            </tbody>
          </table>
        </div>
      </div>
        <h4>
          Your lesson plan on the go.
        </h4>
        <div id="editor">
          <div></div>
          <textarea id='update' style="margin-top: 30px;" name="area2" hidden
        </div>
        <input type="submit" name="update" id="update" value="Update Lesson Plan">
      </div>
    </div>
  </div> 
</div>
<script>
$(document).ready(function(){
  getlessonplan();
  function getlessonplan(){
    $.ajax({
      type:'post',
      url:'<?php echo site_url('lesson_plan/getlessonplan')?>',
      dataType: 'json',
      success: function(data){
        console.log(data);
        var html='';
        var i;
        for(i = 0; i < data.length; i++){
          html += '<tr>'+
                  '<td>'+data[i].subject_name+'</td>'+
                  '<td>'+data[i].date+'</td>'+
                  '<td><a class="lesson_edit" href="#" data-lesson_plan_id="'+data[i].lesson_plan_id+'" data-subject_id="'+data[i].subject_id+'">View and Edit this Lesson Plan</a>||<a class="lesson_delete" href="#" data-lesson_plan_id="'+data[i].lesson_plan_id+'">Delete this Lesson Plan</a></td>'+
                  '</tr>';
        }
        $('#lessonplancontent').html(html);
      }
    });
  }
  
  $('#score_subject').on('change', function(){
    var score_subject = $('#score_subject').val();
     $('#edit').froalaEditor({

      // Set the save param.
      saveParam: 'content',

      // Set the save URL.
      saveURL: '<?php echo base_url('lesson_plan/save')?>',

      // HTTP request type.
      saveMethod: 'POST',

      // Additional save params.
      saveParams: {id: 'my_editor',
                  subject_name:score_subject},
    })
    .on('froalaEditor.save.before', function (e, editor) {
      // alert('weee');
    })
    .on('froalaEditor.save.after', function (e, editor, response) {
      swal("Lesson Plan Created!", "", "success");
      getlessonplan();
    })
    .on('froalaEditor.save.error', function (e, editor, error) {
      // Do something here.
    });
  })
  $('#submit').click (function () {
    $('#edit').froalaEditor('save.save')
  });
  
  $('#lessonplancontent').on('click', '.lesson_edit', function(){
    var lesson_plan_id = $(this).data('lesson_plan_id');
    var subject_id = $(this).data('subject_id');
      $.ajax({
      type  : 'post',
      url   : '<?php echo site_url('lesson_plan/get')?>',
      dataType : 'html',
      data : {lesson_plan_id:lesson_plan_id},
      success : function(data){
        // alert("sahdas");return;
        // $('.fr-wrapper').html(data);
        $('#update').froalaEditor('html.set', data);
      }
    });
    $('#update').froalaEditor({
    // Set the save param.

    saveParam: 'content',

    // Set the save URL.
    saveURL: '<?php echo base_url('lesson_plan/update')?>',

    // HTTP request type.
    saveMethod: 'POST',

    // Additional save params.
    saveParams: {id: 'my_editor', lesson_plan_id:lesson_plan_id, subject_id:subject_id}
  })
  .on('froalaEditor.save.after', function (e, editor, response) {
    swal("Lesson Plan Updated!", "", "success");
  });
  });
  $('#update').click (function () {
    $('#update').froalaEditor('save.save')
  });
  $('.selector').froalaEditor({
        // Set the image upload parameter.
        imageUploadParam: 'image_param',
 
        // Set the image upload URL.
        imageUploadURL: '../churvanessohlord/images',
 
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
  
        // Response contains the original server response to the request if available.
      });
  $('#lessonplancontent').on('click', '.lesson_delete', function(){
    var lesson_plan_id = $(this).data('lesson_plan_id');
    $.alert({
      title: 'Delete!',
      content: 'Are you sure you want to delete?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('lesson_plan/delete')?>',
            data: {lesson_plan_id:lesson_plan_id},
            dataType: 'json',
            success: function(response){
              if (response.status) {
                $.alert('Successfully Deleted!');
                getlessonplan();
              } else {
                  getlessonplan();
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