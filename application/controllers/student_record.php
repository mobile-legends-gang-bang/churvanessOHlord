<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_record extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else 
			$data['title'] = "Edukit - Student Record";
			$data['name'] = "STUDENT RECORDS";
			$this->load->view('student_record/index', $data);
	}
}
