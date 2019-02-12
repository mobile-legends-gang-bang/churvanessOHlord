<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('behavior_model');
		$this->load->model('attendance_model');
		$this->load->model('section_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Dashboard";
			$data['name'] = "DASHBOARD";
			$data['classlist'] = $this->section_model->getclasslist();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['class_id'] = $this->section_model->getclassid();
			$data['class'] = $this->section_model->getclass();
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['content'] = "dashboard/index";
			$this->load->view('main/index', $data);
	}

	public function getstudentsBySection(){
        $data = $this->dashboard_model->getstudentsBySection();
        echo json_encode($data);
    }

    public function getbehaviorPositive(){
        $data = $this->dashboard_model->getbehaviorPositive();
        echo json_encode($data);
    }

    public function getbehaviorNegative(){
        $data = $this->dashboard_model->getbehaviorNegative();
        echo json_encode($data);
    }
}
