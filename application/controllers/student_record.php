<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_record extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('note_model');
		$this->load->model('section_model');
		$this->load->model('student_record_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Student Record";
			$data['name'] = "STUDENT RECORDS";
			$data['content'] = "student_record/index";
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['notesview'] = $this->note_model->getnotesToday();
			$this->load->view('main/index', $data);
	}
	public function getabsent(){
		$data['records'] = $this->student_record_model->getabsent();
		$this->load->view('student_record/records', $data);
	}

	public function getscores(){
		$data['records'] = $this->student_record_model->getscores();
		$this->load->view('student_record/scores', $data);
	}

}
