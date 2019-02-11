<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('behavior_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Notes";
			$data['name'] = "NOTES AND REMINDERS";
			$data['uniqueclass'] = $this->section_model->getUniqueclasswithID();
			$data['class'] = $this->section_model->getclass();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['content'] = "notes/index";
			$this->load->view('main/index', $data);
	}
}
