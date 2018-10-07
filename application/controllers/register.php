<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('register/index');
		} else 
			$this->load->view('dashboard/index');
	}
	public function savedata() {
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if ($this->form_validation->run()) {
			print_r($_POST);
		} else 
			redirect('register','refresh');
	}
}
