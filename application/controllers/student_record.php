<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_record extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('note_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Student Record";
			$data['name'] = "STUDENT RECORDS";
			$data['content'] = "student_record/index";
			$data['notesview'] = $this->note_model->getnotesToday();
			$this->load->view('main/index', $data);
	}
}
