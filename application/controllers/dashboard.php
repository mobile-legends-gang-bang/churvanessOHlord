<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('behavior_model');
		$this->load->model('attendance_model');
		$this->load->model('section_model');
		$this->load->model('note_model');
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
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['countnotes'] = $this->note_model->countnotesToday();
			$this->load->view('main/index', $data);
	}

	public function getstudentsBySection(){
        $data = $this->dashboard_model->getstudentsBySection();
        echo json_encode($data);
    }

    public function getbehaviorPositive(){
    	$countpositive = $this->dashboard_model->getbehaviorPositive()->row()->behavior_type;
    	$countnegative = $this->dashboard_model->getbehaviorNegative()->row()->behavior_type;
    	$percent1 = ($countpositive/($countpositive+$countnegative))*100;
    	$percent2 = ($countnegative/($countpositive+$countnegative))*100;

        $data['point1'] = number_format($percent1, 2,'.','');
        $data['name1'] = 'Positive';
        $data['point2'] =number_format($percent2, 2,'.','');
        $data['name2'] = 'Negative';

        // $date = $this->dashboard_model->getattendancerecord()->row()->dates;
        // $data['dates'] = array($date);

        echo json_encode($data);
    }
    public function rankstudents(){
        $data['records'] = $this->dashboard_model->rankstudents();
        $this->load->view('dashboard/rank', $data);
    }

    public function rankabsences(){
        $data['records'] = $this->dashboard_model->rankabsent();
        $this->load->view('dashboard/absences', $data);
    }

    public function getattendancerecord(){

        $date = trim($this->dashboard_model->getattendancerecord()->row()->dates,"{}");
        $newdate = explode(',', $date);
        $count_present = trim($this->dashboard_model->getattendancerecord()->row()->present_count,"{}");
        $newcount = explode(',', $count_present);
        $data['dates'] = $newdate;
        $data['count'] = $newcount;

        echo json_encode($data);
    }
}
