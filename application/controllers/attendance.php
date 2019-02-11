<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('behavior_model');
		$this->load->model('attendance_model');

	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Attendance";
			$data['name'] = "ATTENDANCE MONITORING";
			$data['classlist'] = $this->section_model->getclasslist();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['class_id'] = $this->section_model->getclassid();
			$data['class'] = $this->section_model->getclass();
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['content'] = "attendance/index";
			$this->load->view('main/index', $data);
	}
	public function saveattendance() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('student_id', '', 'required');
			$this->form_validation->set_rules('subject_name', '', 'required');
			$this->form_validation->set_rules('class_grade', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()) {
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$student_id = json_decode($this->input->post('student_id'));
				$class_name = $this->input->post('class_grade');
				$subject_name = $this->input->post('subject_name');
				$attendance_date = $this->input->post('attendance_date');
				$remarks = json_decode($this->input->post('remarks'));
				$attend = json_decode($this->input->post('attend'));
	
				$data = array();
				for ($i=0; $i < count($student_id); $i++) { 
					$data['s_id'] = $student_id[$i];
					$data['subject_id'] = $subject_name;
					$data['class_name'] = $class_name;
					$data['attendance_date'] = $attendance_date;
					$data['teacher_id'] = $teacher_id;
					$data['remarks'] = $remarks[$i];
					$data['present'] = $attend[$i];
					if($data['present']==NULL)
						$data['present']= "false";
					$this->db->insert('public.attendance', $data);
				}
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved scores.";
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}
	public function getstudentsBySection(){
        $data = $this->attendance_model->getstudentsBySection();
        echo json_encode($data);
    }
	
}
