<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url();?>assets/css/fullcalendar.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>assets/css/fullcalendar.print.css" rel="stylesheet" media="print" />
<?php $this->load->view('load/head')?>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-charts.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar.js"></script>
<script>
	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					className: 'success'
				}
			],			
		});
		
		
	});

</script>
<script type="text/javascript">
	$(document).ready(function() {
		var height = $(window).height();
		$('#calendar').css('height', height);
	});
</script>
<style>

	body {
		margin-top: 40px;
		/*text-align: center;*/
		/*font-size: 14px;*/
		font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
		background-color: #DDDDDD;
		}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 700px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}

</style>

<style type="text/css">
	@media (min-width: 992px) {
		#mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
		    margin-top: 69px;
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
	    background-color: #212529!important;
	}
	body.fixed-nav {
	     padding-top: 0 !important;
	}
</style>
</head>
	<body class="fixed-nav sticky-footer bg-dark">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		    <a class="navbar-brand" href="<?php echo base_url()?>dashboard/index"><img  src="<?php echo base_url()?>images/edukit_logo.png" width="210" height="43"></a>
		    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarResponsive">
		      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
		          <a class="nav-link" href="<?php echo base_url()?>dashboard/index">
		            <i class="fa fa-fw fa-dashboard"></i>
		            <span class="nav-link-text">Dashboard</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#students" data-parent="#exampleAccordion">
		            <i class="fa fa-fw fa-graduation-cap"></i>
		            <span class="nav-link-text">Students</span>
		          </a>
		          <ul class="sidenav-second-level collapse" id="students">
		            <li>
		              <a href="<?php echo base_url()?>student_profile/index">Student Profile</a>
		            </li>
		            <li>
		              <a href="<?php echo base_url()?>student_record/index">Student Record</a>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
		          <a class="nav-link" href="<?php echo base_url()?>class_section/index">
		            <i class="fa fa-fw fa-table"></i>
		            <span class="nav-link-text">Class</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		          <a class="nav-link" href="<?php echo base_url()?>attendance/index">
		            <i class="fa fa-fw fa-calendar-check-o"></i>
		            <span class="nav-link-text">Attendance</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		          <a class="nav-link" href="charts.html">
		            <i class="fa fa-fw fa-files-o"></i>
		            <span class="nav-link-text">Reports</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		          <a class="nav-link" href="charts.html">
		            <i class="fa fa-fw fa-pencil-square-o"></i>
		            <span class="nav-link-text">Lesson Log</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		          <a class="nav-link" href="charts.html">
		            <i class="fa fa-fw fa-file-text-o"></i>
		            <span class="nav-link-text">Lesson Plan</span>
		          </a>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Schedule">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#schedule" data-parent="#exampleAccordion">
		            <i class="fa fa-fw fa-clock-o"></i>
		            <span class="nav-link-text">Schedule</span>
		          </a>
		          <ul class="sidenav-second-level collapse" id="schedule">
		            <li>
		              <a href="navbar.html">Notes</a>
		            </li>
		            <li>
		              <a href="<?php echo base_url()?>calendar/index">Calendar</a>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse_settings" data-parent="#exampleAccordion">
		            <i class="fa fa-fw fa-cogs"></i>
		            <span class="nav-link-text">Settings</span>
		          </a>
		          <ul class="sidenav-second-level collapse" id="collapse_settings">
		            <li>
		              <a href="navbar.html">Behavior</a>
		            </li>
		            <li>
		              <a href="cards.html">Personal Account</a>
		            </li>
		          </ul>
		        </li>        
		      </ul>
		      <ul class="navbar-nav sidenav-toggler">
		        <li class="nav-item">
		          <a class="nav-link text-center" id="sidenavToggler">
		            <i class="fa fa-fw fa-angle-left"></i>
		          </a>
		        </li>
		      </ul>
		      <ul class="navbar-nav ml-auto">
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		            <i class="fa fa-fw fa-envelope"></i>
		            <span class="d-lg-none">Messages
		              <span class="badge badge-pill badge-primary">12 New</span>
		            </span>
		            <span class="indicator text-primary d-none d-lg-block">
		              <i class="fa fa-fw fa-circle"></i>
		            </span>
		          </a>
		          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
		            <h6 class="dropdown-header">New Messages:</h6>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <strong>David Miller</strong>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <strong>Jane Smith</strong>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <strong>John Doe</strong>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item small" href="#">View all messages</a>
		          </div>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		            <i class="fa fa-fw fa-bell"></i>
		            <span class="d-lg-none">Alerts
		              <span class="badge badge-pill badge-warning">6 New</span>
		            </span>
		            <span class="indicator text-warning d-none d-lg-block">
		              <i class="fa fa-fw fa-circle"></i>
		            </span>
		          </a>
		          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
		            <h6 class="dropdown-header">New Alerts:</h6>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <span class="text-success">
		                <strong>
		                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
		              </span>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <span class="text-danger">
		                <strong>
		                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
		              </span>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">
		              <span class="text-success">
		                <strong>
		                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
		              </span>
		              <span class="small float-right text-muted">11:21 AM</span>
		              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
		            </a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item small" href="#">View all alerts</a>
		          </div>
		        </li>
		        <li class="nav-item">
		          <form class="form-inline my-2 my-lg-0 mr-lg-2">
		            <div class="input-group">
		              <input class="form-control" type="text" placeholder="Search for...">
		              <span class="input-group-append">
		                <button class="btn btn-primary" type="button">
		                  <i class="fa fa-search"></i>
		                </button>
		              </span>
		            </div>
		          </form>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" data-toggle="modal" data-target="#logoutmodal" data-dismiss="modal">
		            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
		        </li>
		      </ul> 
		  </div>
		</nav>
		<div class="content-wrapper">
			<div id="container">

				<div id="calendar"></div>

				<!-- <div style="clear:both"></div> -->
			</div>
	  	</div>
	</body>
</html>
