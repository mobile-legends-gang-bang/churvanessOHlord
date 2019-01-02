<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Lesson Log";
			$data['name'] = "Manage Lesson Log";
			$data['content'] = "lesson_log/index";
			$this->load->view('main/index', $data);
	}
}
