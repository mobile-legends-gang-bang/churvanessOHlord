<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			$this->load->view('login/index');
		} else
			$data['title'] = "Edukit - Personal Account";
			$data['name'] = "PERSONAL ACCOUNT";
			$this->load->view('personal_account/index',$data);
	}
}
