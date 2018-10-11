<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else 
			$this->load->view('calendar/index');
	}
}
