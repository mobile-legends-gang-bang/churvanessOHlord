
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
        </div>
      </div>
    </div>
  <div class="row row_padding" id="myTable">
  </div>
  <div class="row row_padding">
    <input type="hidden" name="s_id" id="s_id">
    <div class="col-md-6">
      <h4 align="center">PERSONAL INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">First Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="fname" id="fname"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Middle Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="mname" id="mname" ></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Last Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="lname" id="lname"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Extension Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="extname" id="extname"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-2">Birthday</div>
        <div class="col-md-1">:</div>
        <div class="col-md-5"><input type="date" class="form-control" name="birthday" id="birthday"></div>
        <div class="col-md-1">Age</div>
        <div class="col-md-1">:</div>
        <div class="col-md-2"><input type="text" class="form-control" name="age" id="age" disabled></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">House Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="housenum" id="housenum"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Street Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="street" id="street"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Barangay</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="barangay" id="barangay"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">City</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="city" id="city"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Province</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="province" id="province"></div>
      </div>
      <h4 align="center">GUARDIAN'S INFORMATION</h4>
      <div class="row row_padding">
        <div class="col-md-5">Full Name</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="guardianname" id="guardianname"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Contact Number</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="contactnum" id="contactnum"></div>
      </div>
      <div class="row row_padding">
        <div class="col-md-5">Relationship</div>
        <div class="col-md-1">:</div>
        <div class="col-md-6"><input type="text" class="form-control" name="relation" id="relation"></div>
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-3 offset-md-3">
        <button class="btn bg-primary" name="btnUpdate" id="btnUpdate">Save Information</button>
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

  $('#class_grade').click(function(){
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
          var s_id = $(this).data('s_id');
          var fname = $(this).data('fname');
          var mname = $(this).data('mname');
          var lname = $(this).data('lname');
          var extname = $(this).data('extname');
          var address = $(this).data('address');
          var age = $(this).data('age');
          var housenum = $(this).data('housenum');
          var street = $(this).data('street');
          var barangay = $(this).data('barangay');
          var city = $(this).data('city');
          var province = $(this).data('province');
          var guardianname = $(this).data('guardianname');
          var relation = $(this).data('relation');
          var contactnum = $(this).data('contactnum');
          var birthday = $(this).data('birthday');

          $('#s_id').val(s_id);
          $('#fname').val(fname);
          $('#mname').val(mname);
          $('#lname').val(lname);
          $('#extname').val(extname);
          $('#address').val(address);
          $('#age').val(age);
          $('#housenum').val(housenum);
          $('#street').val(street);
          $('#barangay').val(barangay);
          $('#city').val(city);
          $('#province').val(province);
          $('#guardianname').val(guardianname);
          $('#relation').val(relation);
          $('#contactnum').val(contactnum);
          
          $('#birthday').val(birthday);
        });

  $('#btnUpdate').click(function(){
        var s_id = $('#s_id').val();
        var fname = $('#fname').val();
        var mname = $('#mname').val();
        var lname = $('#lname').val();
        var extname =  $('#extname').val();
        var address = $('#address').val();
        var age = $('#age').val();
        var housenum = $('#housenum').val();
        var street = $('#street').val();
        var barangay = $('#barangay').val();
        var city = $('#city').val();
        var province =  $('#province').val();
        var guardianname = $('#guardianname').val();
        var relation =  $('#relation').val();
        var contactnum =  $('#contactnum').val();
        var birthday = $('#birthday').val();

        $.ajax({
          type: 'post',
          url: '<?php echo base_url('student_profile/updatedata')?>',
          data: { s_id:s_id, fname:fname, mname:mname, lname:lname, extname:extname, address:address, age:age, housenum:housenum, street:street, barangay:barangay, city:city, province:province, guardianname:guardianname, relation:relation, contactnum:contactnum, birthday:birthday},
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



});
</script>