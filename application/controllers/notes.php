<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Notes";
			$data['name'] = "NOTES AND REMINDERS";
			$data['content'] = "notes/index";
			$this->load->view('main/index', $data);
	}
}
