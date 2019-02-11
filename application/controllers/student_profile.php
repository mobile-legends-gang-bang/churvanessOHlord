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
    public function fetch(){
        $data = $this->student_profile_model->select();
        $output = '
          <h3 align="center">Total Data - '.$data->num_rows().'</h3>
          <table class="table table-striped table-bordered">
           <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Extension Name Code</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>House Number</th>
            <th>Barangay</th>
            <th>Street</th>
            <th>City</th>
            <th>Province</th>
            <th>Guardian Name</th>
            <th>Relation</th>
            <th>Contact Number</th>
            <th>Section</th>
            <th>Teacher</th>
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
                <td>'.$row->birthday.'</td>
                <td>'.$row->age.'</td>
                <td>'.$row->housenum.'</td>
                <td>'.$row->barangay.'</td>
                <td>'.$row->street.'</td>
                <td>'.$row->city.'</td>
                <td>'.$row->province.'</td>
                <td>'.$row->guardianname.'</td>
                <td>'.$row->relation.'</td>
                <td>'.$row->contactnum.'</td>
                <td>'.$row->class_name.'</td>
                <td>'.$row->teacher_id.'</td>
               </tr>
               ';
        }
        $output .= '</table>';
        echo $output;
    }

	public function import(){
		if(isset($_FILES["file"]["name"])){
			$classname  = $this->input->post('classname');
			$teacher_id	= $this->session->userdata['logged_in']['teacher_id']; 
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++){
					$fname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$mname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$lname = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$extname = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$birthday= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$age = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$housenum = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$street = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$barangay = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$city = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$province = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$guardianname = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$relation = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$contactnum = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$data[] = array(
						'fname'  		 => $fname,
						'mname'  		 => $mname,
						'lname'  		 => $lname,
						'extname' 		 => $extname,
						'address'	 	 => $address,
						'birthday'		 => $birthday,
						'age'   		 => $age,
						'housenum'    	 => $housenum,
						'street'  	 	 => $street,
						'barangay'   	 => $barangay,
						'city'  		 => $city,
						'province'  	 => $province,
						'guardianname' 	 => $guardianname,
						'relation'  	 => $relation,
						'contactnum'   	 => $contactnum,
						'class_name'	 => $classname,
						'teacher_id'	 => $teacher_id
					);
			    }
			}
            $this->student_profile_model->insert($data);
		} 
	}

	public function getstudents(){
		$data = $this->student_profile_model->getstudents();
		echo json_encode($data);
	}

    public function getstudentsBySection(){
        $data = $this->student_profile_model->getstudentsBySection();
        echo json_encode($data);
    }
}