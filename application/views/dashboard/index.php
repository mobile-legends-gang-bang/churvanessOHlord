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
	    </ol>
	<!-- End of Breadcrumbs-->

	<!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 New Notes!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    <!-- End of Icon Cards-->

<form method="post" id="attendance_form">
        <div class="row" style="padding: 20px;">
          <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
          <div>
            <select class="form-control" name="subject_name" id="subject_name">
              <option></option>
              <?php foreach($subjectlist as $c):?>
                <option value="<?php echo $c->subject_id?>"><?php echo $c->subject_name?></option>
              <?php endforeach?>
            </select>
          </div>
          <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
          <div>
            <select class="form-control" name="class_grade" id="class_grade">
              <?php foreach($uniqueclass as $c):?>
                <option><?php echo $c->class_name?></option>
              <?php endforeach?>
            </select>
          </div>
        </div>
</form>

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

$pieData = array( 
  array("label"=>"Positive", "y"=>126),
  array("label"=>"Negative", "y"=>232)
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
var chart = new CanvasJS.Chart("myAreaChart", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Student Attendance"
  },
  axisX: {
    valueFormatString: "DD MMM"
  },
  axisY: {
    title: "Total Number of Visits",
    maximum: 1200
  },
  data: [{
    type: "splineArea",
    color: "#6599FF",
    xValueType: "dateTime",
    xValueFormatString: "DD MMM",
    yValueFormatString: "#,##0 Visits",
    dataPoints: <?php echo json_encode($areaData); ?>
  }]
});
chart.render();
 
var chart = new CanvasJS.Chart("myBarChart", {
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

// chart.render();

}
</script>
<!--Charts-->

<script type="text/javascript">
    $(document).ready(function(){
      var dataPoints = [];
      // var pieChart = new CanvasJS.Chart("myPieChart", {
      //     theme: "light2",
      //     animationEnabled: true,
      //     title: {
      //       text: "Students Positive vs Negative behaviour"
      //     },
      //     data: [{
      //       type: "pie",
      //       // indexLabel: "{y}",
      //       // yValueFormatString: "###",
      //       // indexLabelPlacement: "inside",
      //       // indexLabelFontColor: "#36454F",
      //       // indexLabelFontSize: 18,
      //       // indexLabelFontWeight: "bolder",
      //       // showInLegend: true,
      //       // legendText: "{label}",
      //       showInLegend: true,
      //       toolTipContent: "{name}: <strong>{y}%</strong>",
      //       indexLabel: "{name} - {y}%",
      //       dataPoints: dataPoints
      //     }]
      //   });
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
          dataPoints: dataPoints
        }]
      });
      // chart.render();
      // }
      $('#class_grade, #subject_name').change(function(){
        if ($('#subject_name').val() != "") {
          var class_grade = $('#class_grade').val();
          var subject_id = $('#subject_name').val();
          // alert(subject_id);
          // return;
          $.ajax({
            url: '<?php echo base_url('dashboard/getbehaviorPositive')?>',
            method:'post',
            dataType:'json',
            data: {class_grade:class_grade, subject_name: subject_id},
            success : function(data){
                console.log(data.point1);
                console.log(data.name1);
                dataPoints.push({y: data.point1, name: data.name1});
                dataPoints.push({y: data.point2, name: data.name2});
                pieChart.render();
            }
            });
          } 
        else{}

      }); 
    });

  </script>


      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
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
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <div id="myBarChart" style="height: 370px; width: 100%;"></div>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          	  </div>
          </div>

          <!-- Example Pie Chart Card-->
          <div class="col-lg-4">
          	<div class="card mb-3">
            	<div class="card-header">
            		  <i class="fa fa-pie-chart"></i> Pie Chart Example
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