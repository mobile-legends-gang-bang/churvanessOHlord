<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('personal_account_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Personal Account";
			$data['name'] = "PERSONAL ACCOUNT";
			$data['content'] = "personal_account/index";
			$data['teacherinfo'] = $this->personal_account_model->getTeacherInfo();
			$this->load->view('main/index', $data);
	}
}
