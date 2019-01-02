<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Behavior extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Behavior Setup";
			$data['name'] = "SETUP STUDENT BEHAVIOR";
			$data['content'] = "behavior/index";
			$this->load->view('main/index', $data);
	}
}
