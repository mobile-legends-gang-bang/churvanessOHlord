<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_profile extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Student Profile";
			$data['name'] = "STUDENT PROFILE";
			$data['content'] = "student_profile/index";
			$this->load->view('main/index', $data);
	}
}
