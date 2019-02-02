<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Class_section extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else{
			$data['teacher_id'] = $this->session->userdata['logged_in']['teacher_id'];
			$data['title'] = "Edukit - Class Section";
			$data['name'] = "CLASS SECTION";
			$data['content'] = "class_section/index";
			$data['classlist'] = $this->section_model->getclasslist();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['class_id'] = $this->section_model->getclassid();
			$this->load->view('main/index', $data);
		}
	}

	public function saveclass(){
		$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
		$classname = $this->input->post('classname');
		$subject_name = $this->input->post('subject_name');
		$query = $this->db->get_where('public.class', array('teacher_id' => $teacher_id, 'subject_id' => $subject_name, 'class_name' => $classname));
		if($query->num_rows()>0){
			$response['status'] = FALSE;
			$response['message'] = "This subject name already exists.";
		}
		elseif(!empty($classname) && !empty($subject_name)) {
			$data = array(
				'teacher_id'	=> $teacher_id,
				'classname'	=> $classname,
				'subject_name'	=> $subject_name
			);
			$data = $this->section_model->saveclass();
			$response['status'] = TRUE;
			$response['message'] = "Successfully added class section.";
			$response['data'] = $data;
		} else {
			$response['status'] = FALSE;
			$response['message'] = "Please fill up all required fields!";
		}
		echo json_encode($response);
	}
	function updateclass(){
		$data=$this->section_model->updateclass();
		echo json_encode($data);
	}
	public function deleteclass(){
		$data=$this->section_model->deleteclass();
		echo json_encode($data);
	}

	public function getclass(){
		$data = $this->section_model->getclass();
		echo json_encode($data);
	}
	public function getsubject(){
		$data = $this->section_model->getsubject();
		echo json_encode($data);
	}
	public function savesubject(){
		$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
		$subject_name = $this->input->post('subject_name');
		$subject_description = $this->input->post('subject_description');
		$sched_from = $this->input->post('sched_from');
		$sched_to = $this->input->post('sched_to');
		// $exist = $this->db->query("SELECT subject_name from public.subject where teacher_id = ?", $teacher_id);
		$query = $this->db->get_where('public.subject', array('teacher_id' => $teacher_id, 'subject_name' => $subject_name));
		if($query->num_rows()>0){
			$response['status'] = FALSE;
			$response['message'] = "This subject name already exists.";
		}
		elseif(!empty($subject_name) && !empty($sched_from) && !empty($sched_to)) {
			$data = array(
				'teacher_id'	=> $teacher_id,
				'subject_name'	=> $subject_name,
				'subject_description'	=> $subject_description,
				'sched_from' => $sched_from,
				'sched_to' => $sched_to
			);
			$data = $this->section_model->savesubject();
			$response['status'] = TRUE;
			$response['message'] = "Successfully added class section.";
			$response['data'] = $data;
		} else {
			$response['status'] = FALSE;
			$response['message'] = "Please fill up all required fields!";
		}
		echo json_encode($response);
	}
}
