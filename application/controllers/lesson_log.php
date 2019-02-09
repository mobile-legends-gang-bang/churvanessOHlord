<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('lesson_log_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Lesson Log";
			$data['name'] = "Manage Lesson Log";
			$data['content'] = "lesson_log/index";
			$data['subjectlist'] = $this->section_model->getsubject();
			$this->load->view('main/index', $data);
	}
	public function savelessonlog() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('subject_name', '', 'required');
			$this->form_validation->set_rules('week_no', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$subject_id = $this->input->post('subject_name');
				$week_no = $this->input->post('week_no');
				$day1_time1 = $this->input->post('day1_time1');
				$day1_time2 = $this->input->post('day1_time2');
				$day1_time3 = $this->input->post('day1_time3');
				$day1_time4 = $this->input->post('day1_time4');
				$day2_time1 = $this->input->post('day2_time1');
				$day2_time2 = $this->input->post('day2_time2');
				$day2_time3 = $this->input->post('day2_time3');
				$day2_time4 = $this->input->post('day2_time4');
				$day3_time1 = $this->input->post('day3_time1');
				$day3_time2 = $this->input->post('day3_time2');
				$day3_time3 = $this->input->post('day3_time3');
				$day3_time4 = $this->input->post('day3_time4');
				$day4_time1 = $this->input->post('day4_time1');
				$day4_time2 = $this->input->post('day4_time2');
				$day4_time3 = $this->input->post('day4_time3');
				$day4_time4 = $this->input->post('day4_time4');
				$day5_time1 = $this->input->post('day5_time1');
				$day5_time2 = $this->input->post('day5_time2');
				$day5_time3 = $this->input->post('day5_time3');
				$day5_time4 = $this->input->post('day5_time4');
				$day1_description1 = $this->input->post('day1_description1');
				$day1_description2 = $this->input->post('day1_description2');
				$day1_description3 = $this->input->post('day1_description3');
				$day1_description4 = $this->input->post('day1_description4');
				$day2_description1 = $this->input->post('day2_description1');
				$day2_description2 = $this->input->post('day2_description2');
				$day2_description3 = $this->input->post('day2_description3');
				$day2_description4 = $this->input->post('day2_description4');
				$day3_description1 = $this->input->post('day3_description1');
				$day3_description2 = $this->input->post('day3_description2');
				$day3_description3 = $this->input->post('day3_description3');
				$day3_description4 = $this->input->post('day3_description4');
				$day4_description1 = $this->input->post('day4_description1');
				$day4_description2 = $this->input->post('day4_description2');
				$day4_description3 = $this->input->post('day4_description3');
				$day4_description4 = $this->input->post('day4_description4');
				$day5_description1 = $this->input->post('day5_description1');
				$day5_description2 = $this->input->post('day5_description2');
				$day5_description3 = $this->input->post('day5_description3');
				$day5_description4 = $this->input->post('day5_description4');
				$data = array(
					'teacher_id' => $teacher_id,
					'subject_id' => $subject_id,
					'week_no' => $week_no,
					'day1_time1' => $day1_time1,
					'day1_time2' => $day1_time2,
					'day1_time3' => $day1_time3,
					'day1_time4' => $day1_time4,
					'day2_time1' => $day2_time1,
					'day2_time2' => $day2_time2,
					'day2_time3' => $day2_time3,
					'day2_time4' => $day2_time4,
					'day3_time1' => $day3_time1,
					'day3_time2' => $day3_time2,
					'day3_time3' => $day3_time3,
					'day3_time4' => $day3_time4,
					'day4_time1' => $day4_time1,
					'day4_time2' => $day4_time2,
					'day4_time3' => $day4_time3,
					'day4_time4' => $day4_time4,
					'day5_time1' => $day5_time1,
					'day5_time2' => $day5_time2,
					'day5_time3' => $day5_time3,
					'day5_time4' => $day5_time4,
					'day1_description1' => $day1_description1,
					'day1_description2' => $day1_description2,
					'day1_description3' => $day1_description3,
					'day1_description4' => $day1_description4,
					'day2_description1' => $day2_description1,
					'day2_description2' => $day2_description2,
					'day2_description3' => $day2_description3,
					'day2_description4' => $day2_description4,
					'day3_description1' => $day3_description1,
					'day3_description2' => $day3_description2,
					'day3_description3' => $day3_description3,
					'day3_description4' => $day3_description4,
					'day4_description1' => $day4_description1,
					'day4_description2' => $day4_description2,
					'day4_description3' => $day4_description3,
					'day4_description4' => $day4_description4,
					'day5_description1' => $day5_description1,
					'day5_description2' => $day5_description2,
					'day5_description3' => $day5_description3,
					'day5_description4' => $day5_description4
				);
				$this->db->insert('public.lesson_log', $data);
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved behavior.";				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}
}
