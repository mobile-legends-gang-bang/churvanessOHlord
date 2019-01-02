<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Attendance";
			$data['name'] = "ATTENDANCE MONITORING";
			$data['content'] = "attendance/index";
			$this->load->view('main/index', $data);
	}
}
