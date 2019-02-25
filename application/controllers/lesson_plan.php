<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_plan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('note_model');
		$this->load->model('section_model');
		$this->load->model('lesson_plan_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else {
			$data['title'] = "Edukit - Lesson Plan";
			$data['name'] = "Create Lesson Plan";
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['content'] = "lesson_plan/index";
			$this->load->view('main/index', $data);
		}
	}

	public function save(){	
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else {
			$date = date('Y-m-d');
			$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
			$data = array(
				'teacher_id' => $teacher_id,
	    		'content' => $this->input->post('content'),
	    		'subject_id' => $this->input->post('subject_name'),
	    		'date' => $date
			);
			$this->db->insert('lesson_plan', $data);
		}
	}
	public function update(){	
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else {
			$date = date('Y-m-d');
			$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
			$lesson_plan_id = $this->input->post('lesson_plan_id');
			$data = array(
				'teacher_id' => $teacher_id,
	    		'content' => $this->input->post('content'),
	    		'subject_id' => $this->input->post('subject_id'),
	    		'date' => $date
			);
			// print_r($data); return;
			$this->db->where('lesson_plan_id', $lesson_plan_id);
			$this->db->update('lesson_plan', $data);
		}
	}
	public function get(){
		if($this->session->userdata('logged_in')){
			$data['content'] = $this->lesson_plan_model->get();
			$this->load->view('lesson_plan/content', $data);
		}
		else
			redirect('login', 'refresh');
	}

	public function getlessonplan(){
		if($this->session->userdata('logged_in')){
			$data = $this->lesson_plan_model->getlessonplan();
			echo json_encode($data);
		}
		else
			redirect('login', 'refresh');
	}

	public function delete(){
		if($this->session->userdata('logged_in')){
			$data = $this->lesson_plan_model->delete();
			$response['status'] = TRUE;
			$response['message'] = "Lesson plan deleted.";
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}
}
