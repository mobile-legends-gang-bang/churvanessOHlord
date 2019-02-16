<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('behavior_model');
		$this->load->model('attendance_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Attendance";
			$data['name'] = "ATTENDANCE MONITORING";
			$data['classlist'] = $this->section_model->getclasslist();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['class_id'] = $this->section_model->getclassid();
			$data['class'] = $this->section_model->getclass();
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['content'] = "attendance/index";
			$this->load->view('main/index', $data);
	}
	public function saveattendance() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('student_id', '', 'required');
			$this->form_validation->set_rules('subject_name', '', 'required');
			$this->form_validation->set_rules('class_grade', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()) {
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$student_id = json_decode($this->input->post('student_id'));
				$class_name = $this->input->post('class_grade');
				$subject_name = $this->input->post('subject_name');
				$attendance_date = $this->input->post('attendance_date');
				$remarks = json_decode($this->input->post('remarks'));
				$attend = json_decode($this->input->post('attend'));
	
				$data = array();
				for ($i=0; $i < count($student_id); $i++) { 
					$data['s_id'] = $student_id[$i];
					$data['subject_id'] = $subject_name;
					$data['class_name'] = $class_name;
					$data['attendance_date'] = $attendance_date;
					$data['teacher_id'] = $teacher_id;
					$data['remarks'] = $remarks[$i];
					$data['present'] = $attend[$i];
					if($data['present']==NULL)
						$data['present']= "false";
					$this->db->insert('public.attendance', $data);
				}
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved scores.";
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}
	public function getstudentsBySection(){
        $data = $this->attendance_model->getstudentsBySection();
        echo json_encode($data);
    }
    public function saveseatplan(){
    	if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('class_seat', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()) {
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$class_seat = $this->input->post('class_seat');
				$seat1 = $this->input->post('seat1');
				$seat2 = $this->input->post('seat2');
				$seat3 = $this->input->post('seat3');
				$seat4 = $this->input->post('seat4');
				$seat5 = $this->input->post('seat5');
				$seat6 = $this->input->post('seat6');
				$seat7 = $this->input->post('seat7');
				$seat8 = $this->input->post('seat8');
				$seat9 = $this->input->post('seat9');
				$seat10 = $this->input->post('seat10');
				$seat11 = $this->input->post('seat11');
				$seat12 = $this->input->post('seat12');
				$seat13 = $this->input->post('seat13');
				$seat14 = $this->input->post('seat14');
				$seat15 = $this->input->post('seat15');
				$seat16 = $this->input->post('seat16');
				$seat17 = $this->input->post('seat17');
				$seat18 = $this->input->post('seat18');
				$seat19 = $this->input->post('seat19');
				$seat20 = $this->input->post('seat20');
				$seat21 = $this->input->post('seat21');
				$seat22 = $this->input->post('seat22');
				$seat23 = $this->input->post('seat23');
				$seat24 = $this->input->post('seat24');
				$seat25 = $this->input->post('seat25');
				$seat26 = $this->input->post('seat26');
				$seat27 = $this->input->post('seat27');
				$seat28 = $this->input->post('seat28');
				$seat29 = $this->input->post('seat29');
				$seat30 = $this->input->post('seat30');
				$seat31 = $this->input->post('seat31');
				$seat32 = $this->input->post('seat32');
				$seat33 = $this->input->post('seat33');
				$seat34 = $this->input->post('seat34');
				$seat35 = $this->input->post('seat35');
				$seat36 = $this->input->post('seat36');
				$seat37 = $this->input->post('seat37');
				$seat38 = $this->input->post('seat38');
				$seat39 = $this->input->post('seat39');
				$seat40 = $this->input->post('seat40');

					$data = array(
					'class_name' => $class_seat,
				    'teacher_id' => $teacher_id,
					'seat1' => $seat1,
					'seat2' => $seat2,
					'seat3' => $seat3,
					'seat4' => $seat4,
					'seat5' => $seat5,
					'seat6' => $seat6,
					'seat7' => $seat7,
					'seat8' => $seat8,
					'seat9' => $seat9,
					'seat10' => $seat10,
					'seat11' => $seat11,
					'seat12' => $seat12,
					'seat13' => $seat13,
					'seat14' => $seat14,
					'seat15' => $seat15,
					'seat16' => $seat16,
					'seat17' => $seat17,
					'seat18' => $seat18,
					'seat19' => $seat19,
					'seat20' => $seat20,
					'seat21' => $seat21,
					'seat22' => $seat22,
					'seat23' => $seat23,
					'seat24' => $seat24,
					'seat25' => $seat25,
					'seat26' => $seat26,
					'seat27' => $seat27,
					'seat28' => $seat28,
				    'seat29' => $seat29,
					'seat30' => $seat30,
					'seat31' => $seat31,
					'seat32' => $seat32,
					'seat33' => $seat33,
					'seat34' => $seat34,
					'seat35' => $seat35,
					'seat36' => $seat36,
					'seat37' => $seat37,
					'seat38' => $seat38,
					'seat39' => $seat39,
					'seat40' => $seat40
				);

					$query = $this->db->get_where('public.seatplan', array('class_name' => $class_seat, 
						'teacher_id' => $teacher_id));
				if($query->num_rows()>0){
					$response['status'] = FALSE;
					$response['message'] = "Log already exists. Please consider viewing and editing the log. Thank you";
				}
				else{
					$this->db->insert('public.seatplan', $data);
					$response['status'] = TRUE;
					$response['message'] = "Successfully saved behavior.";		
				}		
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
    }
    public function getseat(){
        $data = $this->attendance_model->getseat();
        echo json_encode($data);
    }
    public function checkbyseatplan(){
    if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('student_id', '', 'required');
			$this->form_validation->set_rules('subject_name', '', 'required');
			$this->form_validation->set_rules('class_grade', '', 'required');	
			if ($this->form_validation->run()) {
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$student_id = json_decode($this->input->post('student_id'));
				$class_seat = $this->input->post('class_seatcheck');
				$subject_name = $this->input->post('subject_name');
				$attendance_date = $this->input->post('attendance_datebyseat');
				
				$attend1 =json_decode($this->input->post('attend1'));
	
				$data = array();
				for ($i=0; $i < count($student_id); $i++) { 
					$data['s_id'] = $student_id[$i];
					$data['subject_id'] = $subject_name;
					$data['class_name'] = $class_seat;
					$data['attendance_date'] = $attendance_datebyseat;
					$data['teacher_id'] = $teacher_id;
					$data['present'] = $attend1[$i];
					if($data['present']==NULL)
						$data['present']= "false";
					$this->db->insert('public.attendance', $data);
				}
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved scores.";
		} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
    }
    else 
			redirect('login', 'refresh');
  }

}
