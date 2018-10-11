<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else 
			$data['title'] = "Edukit - Notes";
			$data['name'] = "NOTES AND REMINDERS";
			$this->load->view('notes/index', $data);
	}
}
