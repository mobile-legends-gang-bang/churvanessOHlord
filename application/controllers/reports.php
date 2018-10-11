<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else
			$data['title'] = "Edukit - Reports";
			$data['name'] = "Generate Reports";
			$this->load->view('reports/index',$data);
	}
}
