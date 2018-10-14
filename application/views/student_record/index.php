<head>
  <title>Edukit - Student Record</title>
<?php $this->load->view('load/head')?>
<style type="text/css">
  th{
      background: #323231; color:#fff;
      text-align: center;
    }
  .center_th{
    vertical-align: middle!important;
  }
</style>
</head>
<body id="page-top">
<?php $this->load->view('load/sidenavigation')?>
<div class="content-wrapper" style="margin-top: 100px!important;">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="row" style="padding: 20px;">
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
        <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Level</div>
        <div>
          <input type="text" name="" class="form-control" style="width: 50px!important;">
        </div>
        <div style="padding-right: 20px; padding-top: 5px; padding-left: 10px;">Quarter</div>
        <div>
          <select class="form-control">
            <option>
              1
            </option>
            <option>
              2
            </option>
            <option>
              3
            </option>
            <option>
              4
            </option>
            <option>
              Whole Quarter
            </option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <button class="btn btn-primary"> View Student Record</button>
        </div>
      </div>
      <div class="card mb-3" style="padding-top: 10px; margin-top: 10px;">
        <div class="card-header">
          <i class="fa fa-table"> &nbsp;&nbsp;<span></i>Student Record</span></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="center_th">Name</th>
                  <th class="center_th">Level</th>
                  <th class="center_th">Section</th>
                  <th class="center_th">Subject</th>
                  <th class="center_th">Quarter</th>
                  <th class="center_th" style="width: 120px!important;">Number of Absences Incurred</th>
                  <th class="center_th">Average Grade</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Level</th>
                  <th>Section</th>
                  <th>Subject</th>
                  <th>Quarter</th>
                  <th style="width: 100px!important;">Number of Absences Incurred</th>
                  <th>Average Grade</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>4</td>
                  <td>83.23</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>6</td>
                  <td>87.03</td>
                </tr>
                <tr>
                  <td>Bernard Joseph Gutierrez</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>81.43</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>94.26</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>4</td>
                  <td>83.23</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>6</td>
                  <td>87.03</td>
                </tr>
                <tr>
                  <td>Bernard Joseph Gutierrez</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>81.43</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>94.26</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>4</td>
                  <td>83.23</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>6</td>
                  <td>87.03</td>
                </tr>
                <tr>
                  <td>Bernard Joseph Gutierrez</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>81.43</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>94.26</td>
                </tr>
                <tr>
                  <td>Jayzon Cabuenas</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>4</td>
                  <td>83.23</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>6</td>
                  <td>87.03</td>
                </tr>
                <tr>
                  <td>Bernard Joseph Gutierrez</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>81.43</td>
                </tr>
                <tr>
                  <td>Karystel Alicante</td>
                  <td>4</td>
                  <td>Einstein</td>
                  <td>Social Science</td>
                  <td>1</td>
                  <td>3</td>
                  <td>94.26</td>
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
</body>
