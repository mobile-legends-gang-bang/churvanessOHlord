<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Class_section extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('section_model', 'm');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else{
			$data['title'] = "Edukit - Class Section";
			$data['name'] = "CLASS SECTION";
			$data['content'] = "class_section/index";
			$this->load->view('main/index', $data);
		}
	}

	public function addClass(){
		$result = $this->m->addClass();
		print_r($result);
		return;
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}
}
