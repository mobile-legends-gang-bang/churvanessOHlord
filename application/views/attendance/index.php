<head>
  <?php $this->load->view('load/head')?>
</head>
<body id="page-top">
  <?php $this->load->view('load/sidenavigation')?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="row" style="padding: 20px;">
      	<div style="padding-right: 20px; padding-top: 5px;">Date</div>
        <div>
        	<input name="" class="form-control" value="<?php echo date('m/d/Y')?>" disabled>
        </div>
        <div style="padding-right: 20px; padding-top: 5px;">Subject Select</div>
        <div>
          <select class="form-control">
          <optgroup>
            <option>
              Social Science
            </option>
            <option>
              Mathematics
            </option>
            <option>
              English
            </option>
          </optgroup>
        </select>
        </div>
        <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Class Section</div>
        <div>
          <select class="form-control">
          <optgroup>
            <option>
              Einstein
            </option>
            <option>
              Newton
            </option>
            <option>
              Pascal
            </option>
          </optgroup>
        </select>
        </div>
      </div>
      <div class="card mb-3" style="padding-top: 10px;">
        <div class="card-header">
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Check Students Attendance Under Section Einstein, Subject : Social Science</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Remarks</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
               <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" name=""></td>
                  <td>Einstein</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
 </body>