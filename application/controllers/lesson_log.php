<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else
			$data['title'] = "Edukit - Lesson Log";
			$data['name'] = "Manage Lesson Log";
			$this->load->view('lesson_log/index',$data);
	}
}
