<head>
  <title>Edukit - Student Record</title>
<style type="text/css">
  th{
      background: #323231; color:#fff;
      text-align: center;
    }
  .center_th{
    vertical-align: middle!important;
  }
  .row_padding{
    padding: 5px;
    }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    get_behavior();
    function get_behavior(){
      $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('class_list/getclasslist')?>',
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i = 0 ; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].behavior_name+'</td>'+
                    '<td>'+data[i].behavior_type+'</td>'+
                    '<td><a href="javascript:void(0);" class="fa fa-pencil  behavior_edit" data-behavior_type="'+data[i].behavior_type+'" data-behavior_id="'+data[i].behavior_id+'"data-behavior_name="'+data[i].behavior_name+'"</a>'+' '+'<a href="javascript:void(0);" class="fa fa-trash behavior_delete" data-behavior_type="'+data[i].behavior_type+'" data-behavior_name="'+data[i].behavior_name+'" data-behavior_id="'+data[i].behavior_id+'"></a> </td>'+
                    '</tr>';
          }
          $('#behaviorcontent').html(html);
        }
      });
    }
    $('#behaviorcontent').on('click', '.behavior_edit',function(){
      var behavior_name = $(this).data('behavior_name');
      var behavior_type = $(this).data('behavior_type');
      var behavior_id = $(this).data('behavior_id');

      $('#behavior_id').val(behavior_id);
      $('#behavior_type').val(behavior_type);
      $('#behavior_name').val(behavior_name);
      $('#submitbehavior').prop('disabled', true);
      $('#updatebehavior').prop('disabled', false);
    });

    $('#behaviorcontent').on('click', '.behavior_delete',function(){
      var behavior_name = $(this).data('behavior_name');
      var behavior_type = $(this).data('behavior_type');
      var behavior_id = $(this).data('behavior_id');
      $('#behavior_id').val(behavior_id);
      $('#behavior_type').val(behavior_type);
      $('#behavior_name').val(behavior_name);
      var behavior_name_del = $('#behavior_name').val();
      var behavior_type_del = $('#behavior_type').val();
      var behavior_id_del = $('#behavior_id').val();
      $.alert({
        title: 'Delete!',
        content: 'Are you sure you want to delete?',
        buttons: {
          confirm: function () {
            $.ajax({
              type: 'post',
              url: '<?php echo base_url('behavior/deletebehavior')?>',
              data: { behavior_type: behavior_type_del, behavior_name: behavior_name_del, behavior_id:behavior_id_del},
              dataType: 'json',
              success: function(response){
                if (response.status) {
                  $('#behavior_id').val("");
                  $('#behavior_type').val("");
                  $('#behavior_name').val("");
                  $.alert('Successfully Deleted!');
                  $('#behavior_id').val("");
                  $('#behavior_type').val("");
                  $('#behavior_name').val("");
                  get_behavior();
                } else {
                    $('#submitbehavior').prop('disabled', false);
                    $('#updatebehavior').prop('disabled', true);
                    get_behavior();
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

    $('#updatebehavior').click(function(){
      var behavior_name = $('#behavior_name').val();
      var behavior_type = $('#behavior_type').val();
      var behavior_id = $('#behavior_id').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('behavior/updatebehavior')?>',
        data: { behavior_type: behavior_type, behavior_name: behavior_name, behavior_id:behavior_id },
        dataType: 'json',
        success: function(response){
          if (response.status) {
              // get_class();
              $('#behavior_form')[0].reset();
              swal("Successfully Updated!", "", "success");
              get_behavior();
          } else {
              alert(response.message);
              $('#behavior_name').val("");
              $('#behavior_type').val("");
              $('#behavior_id').val("");
              $('#submitbehavior').prop('disabled', false);
              $('#updatebehavior').prop('disabled', true);
              get_behavior();
          }
        },
        error:function(request,status,error){ 
          alert('ahhaha sayup yot');
        }
      });
    });
    
    $('#submitbehavior').click(function(){
      var behavior_type = $('#behavior_form #behavior_type').val();
      var behavior_name = $('#behavior_form #behavior_name').val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url('behavior/savebehavior')?>',
        data: { behavior_type: behavior_type, behavior_name: behavior_name },
        dataType: 'json',
        success: function(response){
          if (response.status) {
              // get_class();
              $('#behavior_type').val("");
              $('#behavior_name').val("");
              swal("Behavior Added!", "", "success");
              get_behavior();
          } else {
              alert(response.message);
          }
        },
        error:function(request,status,error){ 
          alert('ahhaha sayup yot');
        }
      });
    });
  });
</script>
</head>
<body id="page-top">
<div class="content-wrapper" style="margin-top: 100px!important;">
  <div class="container-fluid">
    <form method="post" id="behavior_form">
      <div class="row row_padding">
        <div class="col-md-2">
          <input type="hidden" name="behavior_id" id="behavior_id">
          Behavior Type
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-3">
          <select class="form-control" id="behavior_type" name="behavior_type">
            <option>Positive</option>
            <option>Negative</option>
          </select>
        </div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">
          Behavior Name
        </div>
        <div class="col-md-1">:</div>
        <div class="col-md-3">
          <input type="text" class="form-control" name="behavior_name" id="behavior_name">
        </div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2"></div>
        <div class="col-md-1"></div>
        <div class="col-md-6">
          <input type="button" class="btn btn-primary" id="submitbehavior" name="submitbehavior" value="Add Behavior"></input><input type="button" class="btn btn-primary" id="updatebehavior" name="updatebehavior" style="margin-left: 10px;"value="Update Behavior" disabled></input>
        </div>
      </div> 
    </form>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="behaviorTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Behavior Name</th>
              <th>Behavior Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="behaviorcontent">
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div> 
</body>
