<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_login extends CI_Controller {
	public function __construct() {
		parent:: __construct();
	}
	public function index() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'required|prep_for_form|encode_php_tags|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|prep_for_form|encode_php_tags|callback__check_database');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login/index');
			} else {
				redirect('dashboard', 'refresh');
			}
		} else 
			redirect('login', 'refresh');
	}

	public function _check_database($password) {
		$username = $this->input->post('username');
		$user = $this->db->query("SELECT * FROM public.register WHERE username = ?", $username);
		if ($user->num_rows() > 0) {
			$user = $user->row();
			$user_password = $user->password;
			if ($password != $user_password) {
				$this->form_validation->set_message('_check_database', 'Invalid Username or Password');
				return false;
			}
			$session_data = array(
				'username'	=> $user->username
			);
			$this->session->set_userdata('logged_in', $session_data);
			return true;
		} else {
			$this->form_validation->set_message('_check_database', 'Invalid Username or Password');
			return false;
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
