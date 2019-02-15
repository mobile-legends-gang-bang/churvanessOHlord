<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Side_navigation extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('behavior_model');
		$this->load->model('note_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Notes";
			$data['name'] = "NOTES AND REMINDERS";
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['class'] = $this->section_model->getclass();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['notesview'] = $this->note_model->getnotesToday();
			$this->load->view('main/index', $data);
	}

	public function getnotesToday(){
		$data = $this->note_model->getnotesToday();
		echo json_encode($data);
	}
}
