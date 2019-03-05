<style type="text/css">
  img {
    vertical-align: middle;
    border-style: none;
    height: auto;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url()?>dashboard/index"><img  src="<?php echo base_url()?>images/edukit_logo.png" width="210" height="43"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive"> <h4 style="color: #fff;">: <?php echo $name?></h3>
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url()?>dashboard/index">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Class Section">
          <a class="nav-link" href="<?php echo base_url()?>class_section/index">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Class</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendance">
          <a class="nav-link" href="<?php echo base_url()?>attendance/index">
            <i class="fa fa-fw fa-calendar-check-o"></i>
            <span class="nav-link-text">Attendance</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#reports">
            <i class="fa fa-fw fa-files-o"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="reports">
            <li>
              <a href="<?php echo base_url()?>scores_report/index">Scores</a>
            </li>
            <li>
              <a href="<?php echo base_url()?>grades_report/index">Grades</a>
            </li>
            <li>
              <a href="<?php echo base_url()?>final_average_report/index">Subject Final Average</a>
            </li>
            <li>
              <a href="<?php echo base_url()?>personal_info_report/index">Personal Information</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Lesson Log">
          <a class="nav-link" href="<?php echo base_url()?>lesson_log/index">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span class="nav-link-text">Lesson Log</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Lesson Plan">
          <a class="nav-link" href="<?php echo base_url()?>lesson_plan/index">
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
              <a href="<?php echo base_url()?>notes/index">Notes</a>
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
              <a href="<?php echo base_url()?>behavior/index">Behavior</a>
            </li>
           <!--  <li>
              <a href="<?php //echo base_url()?>class_list/index">Class List</a>
            </li> -->
            <li>
              <a href="<?php echo base_url()?>personal_account/index">Personal Account</a>
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
        
        <!-- notif -->
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
            <?php foreach ($notesview as $n): ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url()?>class_section/index">
              <span class="text-success">
                <strong>
                  <i class="fa fa-fw"></i>Reminder</strong>
              </span>
              <div class="dropdown-message small"><?php echo $n->note_description?></div>
              <span class="small float-right text-muted"><?php echo $n->note_date?></span>
            </a>
            <div class="dropdown-divider"></div>
            <?php endforeach ?>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <!-- notif -->

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">


              </span>
            </div>
          </form>
        </li>
        <li class="nav-item" style="margin-right: 170px;">
          <a class="nav-link" data-toggle="modal" data-target="#logoutmodal" data-dismiss="modal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul> 
  </div>
</nav>
  <div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url()?>verify_login/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>