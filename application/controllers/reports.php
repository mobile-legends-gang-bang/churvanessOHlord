<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Reports";
			$data['name'] = "Generate Reports";
			$data['content'] = "reports/index";
			$this->load->view('main/index', $data);
	}
}
