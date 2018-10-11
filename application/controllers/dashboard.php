<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Dashboard";
			$data['name'] = "DASHBOARD";
			$this->load->view('dashboard/index',$data);
	}
}
