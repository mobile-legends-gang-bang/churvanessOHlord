<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_record extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Student Record";
			$data['name'] = "STUDENT RECORDS";
			$data['content'] = "student_record/index";
			$this->load->view('main/index', $data);
	}
}
