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
			$data['class'] = $this->section_model->getclass();
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

	public function updateclass(){
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

	public function savescore() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('student_id', '', 'required');
			$this->form_validation->set_rules('score_subject', '', 'required');
			$this->form_validation->set_rules('score_quarter', '', 'required');
			$this->form_validation->set_rules('score_type', '', 'required');
			$this->form_validation->set_rules('score', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()) {
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$student_id = json_decode($this->input->post('student_id'));
				$subject_name = $this->input->post('score_subject');
				$score_quarter = $this->input->post('score_quarter');
				$score_type = $this->input->post('score_type');
				$score = json_decode($this->input->post('score'));
				$data = array();
				for ($i=0; $i < count($student_id); $i++) { 
					$data['s_id'] = $student_id[$i];
					$data['subject_id'] = $subject_name;
					$data['teacher_id'] = $teacher_id;
					$data['quarter'] = $score_quarter;
					$data['score'] = $score[$i];
					$data['score_type'] = $score_type;
					$this->db->insert('public.student_scores', $data);
				}
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved scores.";
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}
}
