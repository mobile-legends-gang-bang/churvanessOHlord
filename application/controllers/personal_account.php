<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Personal Account";
			$data['name'] = "PERSONAL ACCOUNT";
			$data['content'] = "personal_account/index";
			$this->load->view('main/index', $data);
	}
}
