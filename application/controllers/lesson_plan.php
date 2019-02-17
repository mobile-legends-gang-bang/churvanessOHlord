<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_plan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('note_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Lesson Plan";
			$data['name'] = "Create Lesson Plan";
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['content'] = "lesson_plan/index";
			$this->load->view('main/index', $data);
	}
}
