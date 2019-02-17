
<head>
  <title>Edukit - Student Profile</title>
  <style type="text/css">
    h4{
      color :#494948;
      font-weight: strong;
    }
    .row_padding{
      padding: 5px;
    }
    .align_center{
      padding-left: 50px!important; 
      padding-right: 50px!important;
      text-align: center;
    }

    tr:hover { 
      background: #98FB98; 
      font-weight: bold;
      font-style: italic;
    }
    
    td a { 
      padding: 16px; 
      color:black;
    }
  </style>
</head>
<body>
<div class="content-wrapper" style="margin-top: 100px!important; margin-left: 300px;">
  <form method="post" id="attendance_form">
        <div class="row" style="padding: 20px;">
          <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
          <div>
            <select class="form-control" name="class_grade" id="class_grade">
            <option></option>
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>
  </form>


<!-- search -->
  <div class="container">
    <br />
      <div class="form-group">
        <div class="input-group">
          <input type="text" name="search_text" id="search_text" placeholder="Search Student" class="form-control"/>
            <span class="input-group-append">
              <div class="btn btn-primary">
                <i class="fa fa-search"></i>
              </div>
            </span>
        </div>
      </div>
    <div id="result"></div>

  </div>
  <div style="clear:both"></div>
  <br />
  <br />
  <!-- search -->

  <div class="col-md-4 offset-md-4">
      <div class="container" style="padding-bottom: 50px;">
        <img src="<?php echo base_url()?>images/avatar.png" class="center">
        <div class="row row_padding" style="margin-top: 30px; border-bottom: 1px black solid;">
          <h4 class="align_center">Velikkakathu Sankaran Achuthanandan</h4>
          <input id="myInput" type="text" placeholder="Search.." class="form-control">
        </div>
      </div>
    </div>
  <div class="row row_padding" id="myTable">
  </div>
  <div class="row row_padding">
    <div class="col-md-6">
      <h4 align="center">PERSONAL INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">House Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Street Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Barangay</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">City</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Province</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <h4 align="center">GUARDIAN'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">Full Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Contact Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Relationship</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row row_padding">
        <div class="col-md-5">Section</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6">
          <select class="form-control">
            <option>Einstein</option>
            <option>Pascal</option>
            <option>Newton</option>
          </select>
        </div>
      </div>
      <h4 align="center">FATHER'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Occupation</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <h4 align="center">MOTHER'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name=""></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Occupation</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name=""></div>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 offset-md-3">
        <button class="btn bg-primary">Save Information</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function(){


  load_data();

  function load_data(query)
  {
    $.ajax({
      url:"<?php echo base_url(); ?>student_profile/searchStudents",
      method:"POST",
      data:{query:query},
      success:function(data){
        $('#result').html(data);
      }
    })
  }

  $('#class_grade').change(function(){
    var class_grade = $('#class_grade').val();
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
          });
      });

  $('#result').on('click', '.student_edit', function(){
          alert("daw");
          return;
        });

});
</script>