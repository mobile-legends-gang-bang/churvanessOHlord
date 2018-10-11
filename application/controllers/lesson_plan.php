<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_plan extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else
			$data['title'] = "Edukit - Lesson Plan";
			$data['name'] = "Create Lesson Plan";
			$this->load->view('lesson_plan/index',$data);
	}
}
