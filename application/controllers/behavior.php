<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Behavior extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else 
			$data['title'] = "Edukit - Behavior Setup";
			$data['name'] = "SETUP STUDENT BEHAVIOR";
			$this->load->view('behavior/index',$data);
	}
}
