<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('lesson_log_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Lesson Log";
			$data['name'] = "Manage Lesson Log";
			$data['content'] = "lesson_log/index";
			$data['subjectlist'] = $this->section_model->getsubject();
			$this->load->view('main/index', $data);
	}
	public function savelessonlog(){
		echo "hello world";
	}
}
