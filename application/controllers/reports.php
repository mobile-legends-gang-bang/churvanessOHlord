<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('note_model');
	}


	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Reports";
			$data['name'] = "Generate Reports";
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['content'] = "reports/index";
			$this->load->view('main/index', $data);
	}
}
