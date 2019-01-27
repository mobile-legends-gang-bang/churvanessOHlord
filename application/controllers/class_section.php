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
			$data['title'] = "Edukit - Class Section";
			$data['name'] = "CLASS SECTION";
			$data['content'] = "class_section/index";
			$data['class'] = $this->section_model->getclass();
			$this->load->view('main/index', $data);
		}
	}

	public function saveclass(){
		$section_name = $this->input->post('section_name');
		$grade_level = $this->input->post('grade_level');
		$subject = $this->input->post('subject');
		if (!empty($section_name) && !empty($grade_level) && !empty($subject)) {
			$data = array(
				'section_name'	=> $section_name,
				'grade_level'	=> $grade_level,
				'subject'		=> $subject
			);
			// print_r($data[2]); return;
			$data = $this->section_model->saveclass();
			// $this->db->insert('public.class_section', $data);
			$response['status'] = TRUE;
			$response['message'] = "Successfully added class section.";
			$response['data'] = $data;
		} else {
			$response['status'] = FALSE;
			$response['message'] = "Please fill up all required fields!";
		}
		echo json_encode($response);
	}

	public function getclass(){
		$data = $this->section_model->getclass();
		echo json_encode($data);
	}
}
