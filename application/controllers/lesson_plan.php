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
			$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
			$data = array(
				'teacher_id' => $teacher_id,
	    		'content' => $this->input->post('content'),
	    		'subject_id' => $this->input->post('subject_name')
			);
			// print_r($data); return;
			$this->db->insert('lesson_plan', $data);
		}
	}
	public function get(){
		$data['content'] = $this->lesson_plan_model->get();
		$this->load->view('lesson_plan/content', $data);
	}
}
