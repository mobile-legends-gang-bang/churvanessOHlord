<!DOCTYPE html>
<html>
<head>
	<title>Edukit - Dashboard</title>
<style type="text/css">
	@media (min-width: 992px) {
		#mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
		    margin-top: 100px;
		}
	}
	@media (min-width: 992px) {
		#mainNav.fixed-top .sidenav-toggler > .nav-item {
		    width: 250px;
		    padding: 0;
		    margin-top: 7px;
		}
	}
	.bg-dark {
	    background-color: #000000!important;
	}
</style>
</head>
<body>
<div class="content-wrapper" style="margin-top: 100px!important;">
	<div class="container">
	<!-- Breadcrumbs-->
		<ol class="breadcrumb">
		    <li class="breadcrumb-item">
		        <a href="#">Dashboard</a>
		    </li>
		    <li class="breadcrumb-item active">My Dashboard</li>
        <div style="margin-left: 30px;">
          <select class="form-control" name="class_grade" id="class_name">
            <option></option>
            <?php foreach($uniqueclass as $c):?>
              <option value="<?php echo $c->class_name?>"><?php echo $c->class_name?></option>
            <?php endforeach?>
          </select>
        </div>
	    </ol>
	<!-- End of Breadcrumbs-->


	<!-- Icon Cards-->
    <div class="row">
	    <div class="col-xl-6 col-sm-6 mb-3">
	      <div class="card text-white bg-warning o-hidden h-100">
	        <div class="card-body">
	          <div class="card-body-icon">
	            <i class="fa fa-fw fa-list"></i>
	          </div>
	          <?php foreach ($countnotes as $no): ?>
	          <div class="mr-5"><?php echo $no->note_date?> <strong>Note/s for today!</strong></div>
	          <?php endforeach ?>
	        </div>
	        <?php foreach ($notesview as $n): ?>
	        <a class="card-footer text-white" href="#" style="height:10vh;">
	          <span class="float-left"><strong><?php echo $n->note_description?></strong></span>
	          <span class="float-right"><bold><?php echo $n->note_date?></bold></span>
	        </a>
	        <?php endforeach ?>
	      </div>
	    </div>
	    <div class="col-xl-6 col-sm-6 mb-3">
	      <div class="card text-white bg-primary o-hidden h-100">
	        <div class="card-body">
	          <div class="card-body-icon">
	            <i class="fa fa-fw fa-arrow-circle-up"></i>
	          </div>
	          <div class="mr-5"><strong>Outstanding Students</strong><br>
	            <table width="100%">
	              <thead>
	                <th>Name</th>
	                <th style="padding-left: 50px;">Current Average</th>
	              </thead>
	              <tbody id="rank"></tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
    </div>
    <div class="row">
	    <div class="col-xl-6 col-sm-6 mb-3">
	      <div class="card text-white bg-success o-hidden h-100">
	        <div class="card-body">
	          <div class="card-body-icon">
	            <i class="fa fa-fw fa-calendar-times-o"></i>
	          </div>
	          <div class="mr-5"><strong>Top Absentees</strong></div>
	          <table width="100%">
	              <thead>
	                <th>Name</th>
	                <th style="padding-left: 50px;">No. of Absences</th>
	              </thead>
	              <tbody id="absent"></tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	    <div class="col-xl-6 col-sm-6 mb-3">
	      <div class="card text-white bg-danger o-hidden h-100">
	        <div class="card-body">
	          <div class="card-body-icon">
	            <i class="fa fa-fw fa-support"></i>
	          </div>
	          <div class="mr-5"><strong>Less Performing Students</strong><br>
	            <table width="100%">
	              <thead>
	                <th>Name</th>
	                <th style="padding-left: 50px;">Current Average</th>
	              </thead>
	              <tbody id="lessperforming"></tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div> 
    </div>
    <!-- End of Icon Cards-->

        <div class="row" style="padding: 20px; background: #2bb94b; width: 1110px; margin-left: 3px; margin-bottom: 5px;  " >
          <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
          <div>
            <select class="form-control" name="subject_name" id="subject_id">
              <option></option>
              <?php foreach($subjectlist as $c):?>
                <option value="<?php echo $c->subject_id?>"><?php echo $c->subject_name?></option>
              <?php endforeach?>
            </select>
          </div>
          <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
          <div>
            <select class="form-control" name="class_grade" id="section">
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>

<!--Charts-->
<?php

$barData = array( 
  array("y" => 3373.64, "label" => "Germany" ),
  array("y" => 2435.94, "label" => "France" ),
  array("y" => 1842.55, "label" => "China" ),
  array("y" => 1828.55, "label" => "Russia" ),
  array("y" => 1039.99, "label" => "Switzerland" ),
  array("y" => 765.215, "label" => "Japan" ),
  array("y" => 612.453, "label" => "Netherlands" )
);

$areaData = array(
  array("x" => 1483381800000 , "y" => 650),
  array("x" => 1483468200000 , "y" => 700),
  array("x" => 1483554600000 , "y" => 710),
  array("x" => 1483641000000 , "y" => 658),
  array("x" => 1483727400000 , "y" => 734),
  array("x" => 1483813800000 , "y" => 963),
  array("x" => 1483900200000 , "y" => 847),
  array("x" => 1483986600000 , "y" => 853),
  array("x" => 1484073000000 , "y" => 869),
  array("x" => 1484159400000 , "y" => 943),
  array("x" => 1484245800000 , "y" => 970),
  array("x" => 1484332200000 , "y" => 869),
  array("x" => 1484418600000 , "y" => 890),
  array("x" => 1484505000000 , "y" => 930)
 );


?>
<script>
window.onload = function() {
var dataPoints = [];
// var chart = new CanvasJS.Chart("myAreaChart", {
//   animationEnabled: true,
//   theme: "light2",
//   title:{
//     text: "Student Attendance"
//   },
//   axisX: {
//     title: "Attendance Date",
//     valueFormatString: "DD MMM"
//   },
//   axisY: {
//     title: "Number of Presents",
//     maximum: 1200
//   },
//   data: [{
//     type: "splineArea",
//     color: "#6599FF",
//     xValueType: "dateTime",
//     xValueFormatString: "DD MMM",
//     yValueFormatString: "#,##0 Visits",
//     dataPoints: <?php //echo json_encode($areaData); ?>
//   }]
// });
// chart.render();
 
var chart = new CanvasJS.Chart("myBarChart", {
  exportEnabled: true,
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Student Record"
  },
  axisY: {
    title: "Gold Reserves (in tonnes)"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.## tonnes",
    dataPoints: <?php echo json_encode($barData, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

}
</script>
<!--Charts-->

<script type="text/javascript">
    $(document).ready(function(){
      var dataPointspie = [];
      var dataPointsareachart = [];
      var pieChart = new CanvasJS.Chart("myPieChart", {
        exportEnabled: true,
        animationEnabled: true,
        title:{
          text: "Students Positive vs Negative behaviour"
        },
        legend:{
          cursor: "pointer"
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y}%",
          dataPoints: dataPointspie
        }]
      });
      var areachart = new CanvasJS.Chart("myAreaChart", {
        animationEnabled: true,
        theme: "light2",
        title:{
          text: "Student Attendance"
        },
        axisX: {
          title: "Attendance Date",
          valueFormatString: "DD MMM"
        },
        axisY: {
          title: "Number of Presents",
          maximum: 50
        },
        data: [{
          type: "splineArea",
          color: "#6599FF",
          xValueType: "dateTime",
          xValueFormatString: "DD MMM",
          yValueFormatString: "#,##0 Present",
          dataPoints: dataPointsareachart
        }]
      });
      $('#section, #subject_id').change(function(){
          var class_grade = $('#section').val();
          var subject_name = $('#subject_id').val();
          $.ajax({
            url: '<?php echo base_url('dashboard/getbehaviorPositive')?>',
            method:'post',
            dataType:'json',
            data: {class_name:class_grade, subject_id: subject_name},
            success : function(data){
                console.log(data.point1);
                console.log(data.name1);
                dataPointspie.push({y: data.point1, name: data.name1});
                dataPointspie.push({y: data.point2, name: data.name2});
                pieChart.render();
            }
            });
      }); 
      $('#class_grade, #subject_name').change(function(){
          var class_grade = $('#class_grade').val();
          var subject_name = $('#subject_name').val();
          $.ajax({
            url: '<?php echo base_url('dashboard/getattendancerecord')?>',
            method:'post',
            dataType:'json',
            data: {class_grade:class_grade, subject_name: subject_name},
            success : function(data){
              for (var i = 0; i < data.length; i++) {
                dataPointsareachart.push({x: new Date(data[i].dates), y: parseInt(data[i].count)});
              }
              areachart.render();
            }
          });
      }); 
      $('#class_name').change(function(){
        // alert('hurrah');return;
        var class_name = $('#class_name').val();
        $.ajax({
          url: '<?php echo base_url('dashboard/rankstudents')?>',
          method:'post',
          data: {class_name:class_name},
          success : function(data){
            $('#rank').html(data);
            // alert('yea');return;
          }
        });
      });
      $('#class_name').change(function(){
        // alert('hurrah');return;
        var class_name = $('#class_name').val();
        $.ajax({
          url: '<?php echo base_url('dashboard/lessperforming')?>',
          method:'post',
          data: {class_name:class_name},
          success : function(data){
            $('#lessperforming').html(data);
            // alert('yea');return;
          }
        });
      });
      $('#class_name').change(function(){
        // alert('hurrah');return;
        var class_name = $('#class_name').val();
        $.ajax({
          url: '<?php echo base_url('dashboard/rankabsences')?>',
          method:'post',
          data: {class_name:class_name},
          success : function(data){
            $('#absent').html(data);
            // alert('yea');return;
          }
        });
      });
    });

  </script>


      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i>Student Attendance Trend</div>
        <div class="card-body">
          <div id="myAreaChart" style="height: 370px; width: 100%;"></div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <!-- End of Area Chart Example-->

       <!-- Example Bar Chart Card-->
		<div class="row">
       	 <div class="col-lg-8">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i>Bar Chart Example
            </div>
            <div class="card-body">
              <div class="row">
                <div id="myBarChart" style="height: 370px; width: 100%;"></div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>

          <!-- Example Pie Chart Card-->
          <div class="col-lg-4">
          	<div class="card mb-3">
            	<div class="card-header">
            		  <i class="fa fa-pie-chart"></i> Negative and Positive Behavior
            	</div>
	            <div class="card-body">
	              <div id="myPieChart" style="height: 370px; width: 100%;"></div>
	            </div>
	            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM
	            </div>
          	</div>
     	  </div>	

     	</div>

	</div>
</div>
<script src='<?php echo base_url('assets/canvasjs/canvas.min.js')?>'></script>
</body>
</html>