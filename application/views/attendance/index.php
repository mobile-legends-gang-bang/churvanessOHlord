<head>
  <title><?php echo $title?></title>
  <style type="text/css">
    th{
      background: #323231; color:#fff;
      text-align: center;
    }
  </style>
</head>
<body id="page-top">
  <div class="content-wrapper" style="margin-top: 100px!important; padding: 15px!important;">
    <div class="container-fluid">
      <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="check-attendance-tab" data-toggle="pill" href="#checkattendance" role="tab" aria-controls="checkattendance" aria-selected="true">Check Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="seat-plan-tab" data-toggle="pill" href="#seatplan" role="tab" aria-controls="seatplan" aria-selected="false">Seat Plan</a>
        </li>
      </ul>
    </div>


    <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="checkattendance" role="tabpanel" aria-labelledby="check-attendance-tab">
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
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Attendance Checking</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Late</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Present</th>
                  <th>Late</th>
                  <th>Remarks</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" class="form-control" name="box1"kl></td>
                  <td><input type="checkbox" class="form-control" name="box1"></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td><input type="checkbox" class="form-control" name="" checked></td>
                  <td><input type="checkbox" class="form-control" name=""></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
                <tr>
                  <td>Bernard Joseph Gutierrez</td>
                  <td><input type="checkbox" class="form-control" name="" checked></td>
                  <td><input type="checkbox" class="form-control" name=""></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
                <tr>
                  <td>Althea Naga</td>
                  <td><input type="checkbox" class="form-control" name="" checked></td>
                  <td><input type="checkbox" class="form-control" name=""></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td><input type="checkbox" class="form-control" name="" checked></td>
                  <td><input type="checkbox" class="form-control" name=""></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
              
                <tr>
                  <td>Althea Naga</td>
                  <td><input type="checkbox" class="form-control" name="" checked></td>
                  <td><input type="checkbox" class="form-control" name=""></td>
                  <td><input type="text" class="form-control" name="" checked></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   
      <div class="tab-pane fade" id="seatplan" role="tabpanel" aria-labelledby="seat-plan-tab">
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
        <div style="padding-right: 10px;  padding-top: 5px; padding-left: 10px;">Class Section</div>
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
        <div class="container">
          <div class="row" style="margin-left: 437px;">
         <div class="cell">Teacher</div>
       </div>
    <div class="row">
        <div class="cell">1
          <select>
            <option>
              Jayzon Cabuenas
            </option>
            <option>
              Karystel Alicante
            </option>
          </select></div>
        <div class="cell">2</div>
        <div class="cell">3</div>
        <div class="cell">4</div>
        <div class="cell">5</div>
        <div class="cell">6</div>
        <div class="cell">7</div>
        <div class="cell">8</div>
    </div>
    <div class="row">
        <div class="cell">1</div>
        <div class="cell">2</div>
        <div class="cell">3</div>
        <div class="cell">4</div>
        <div class="cell">5</div>
        <div class="cell">6</div>
        <div class="cell">7</div>
        <div class="cell">8</div>
    </div>
    <div class="row">
        <div class="cell">1</div>
        <div class="cell">2</div>
        <div class="cell">3</div>
        <div class="cell">4</div>
        <div class="cell">5</div>
        <div class="cell">6</div>
        <div class="cell">7</div>
        <div class="cell">8</div>
    </div>
      <div class="row">
        <div class="cell">1</div>
        <div class="cell">2</div>
        <div class="cell">3</div>
        <div class="cell">4</div>
        <div class="cell">5</div>
        <div class="cell">6</div>
        <div class="cell">7</div>
        <div class="cell">8</div>
    </div>
      <div class="row">
        <div class="cell">1</div>
        <div class="cell">2</div>
        <div class="cell">3</div>
        <div class="cell">4</div>
        <div class="cell">5</div>
        <div class="cell">6</div>
        <div class="cell">7</div>
        <div class="cell">8</div>
    </div>
  </div>
</div>
</div>
<style type="text/css">
.container{
  margin-top: 40px; 
  align-self: center;
}
.row {
    display: flex;
}
.cell {
    background: #98FB98;
    color:  white;
    width: 130px;
    height: 80px;
    flex: 0 0 auto;
    text-align: center;
    padding: 12px;
    margin: 5px;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
}
</style>
      </div>
      </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
 </body>
 </html>