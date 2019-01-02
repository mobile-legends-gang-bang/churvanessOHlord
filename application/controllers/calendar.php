<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Calendar";
			$data['name'] = "CALENDAR OF ACTIVITIES AND SCHEDULE";
			$data['content'] = "calendar/index";
			$this->load->view('main/index', $data);
	}
}
