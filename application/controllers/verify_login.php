<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_login extends CI_Controller {
	public function index() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|prep_for_form|encode_php_tags|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|prep_for_form|encode_php_tags');
			if ($this->form_validation->run() == FALSE) {
				print_r($_POST);
			} else 
				redirect('login', 'refresh');
		} else 
			redirect('login', 'refresh');
	}
}
