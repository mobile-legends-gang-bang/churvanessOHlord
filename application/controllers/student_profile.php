<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_profile extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	  $this->load->model('student_profile_model');
	  $this->load->library('excel');
	}

	public function index() {

		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Student Profile";
			$data['name'] = "STUDENT PROFILE";
			$data['content'] = "student_profile/index";
			$this->load->view('main/index', $data);
	}

	function fetch(){

	  	$data = $this->student_profile_model->select();
	  	$output = '
		  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
		  <table class="table table-striped table-bordered">
		   <tr>
		    <th>Customer Name</th>
		    <th>Address</th>
		    <th>City</th>
		    <th>Postal Code</th>
		    <th>Country</th>
		   </tr>
		  ';
	  	foreach($data->result() as $row){
		   	$output .= '
			   <tr>
			    <td>'.$row->fname.'</td>
			    <td>'.$row->mname.'</td>
			    <td>'.$row->lname.'</td>
			    <td>'.$row->extname.'</td>
			    <td>'.$row->address.'</td>
			   </tr>
			   ';
		}

	  	$output .= '</table>';
	  	echo $output;
	}

 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $fname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $mname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $lname = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $extname = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $data[] = array(
      'fname'  => $fname,
      'mname'   => $mname,
      'lname'    => $lname,
      'extname'  => $extname,
      'address'   => $address
     );
    }
   }
   $this->student_profile_model->insert($data);
   echo 'Data Imported successfully';
  } 
 }
}