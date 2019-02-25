<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('attendance_model');
		$this->load->model('section_model');
		$this->load->model('behavior_model');

		$this->load->model('attendance_model');
		$this->load->model('note_model');
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
			$data['notesview'] = $this->note_model->getnotesToday();
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
		if($this->session->userdata('logged_in')){
	        $data = $this->attendance_model->getstudentsBySection();
	        echo json_encode($data);
    	}
    	else
    		redirect('login', 'refresh');
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
					// $student_id = $query()
				if($query->num_rows()>0){
					$response['status'] = FALSE;
					$response['message'] = "Student ID exists";
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
    	if($this->session->userdata('logged_in')){
	        $data = $this->attendance_model->getseat();
	        echo json_encode($data);
	    }
	    else
	    	redirect('login', 'refresh');
    }
    public function checkbyseatplan(){
    if($this->session->has_userdata('logged_in')) {
			$this->form_validation->set_rules('class_seatcheck', '', 'required');
			$this->form_validation->set_rules('subject_name', '', 'required');			
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
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
				$subject_name = $this->input->post('subject_name');
				$class_seatcheck = $this->input->post('class_seatcheck');
				$attendance_datebyseat = $this->input->post('attendance_datebyseat');
				$attend1 =$this->input->post('attend1');
				$attend2 =$this->input->post('attend2');
				$attend3 =$this->input->post('attend3');
				$attend4 =$this->input->post('attend4');
				$attend5 =$this->input->post('attend5');
				$attend6 =$this->input->post('attend6');
				$attend7 =$this->input->post('attend7');
				$attend8 =$this->input->post('attend8');
				$attend9 =$this->input->post('attend9');
				$attend10 =$this->input->post('attend10');
				$attend11 =$this->input->post('attend11');
				$attend12 =$this->input->post('attend12');
				$attend13 =$this->input->post('attend13');
				$attend14 =$this->input->post('attend14');
				$attend15 =$this->input->post('attend15');
				$attend16 =$this->input->post('attend16');
				$attend17 =$this->input->post('attend17');
				$attend18 =$this->input->post('attend18');
				$attend19 =$this->input->post('attend19');
				$attend20 =$this->input->post('attend20');
				$attend21 =$this->input->post('attend21');
				$attend22 =$this->input->post('attend22');
				$attend23 =$this->input->post('attend23');
				$attend24 =$this->input->post('attend24');
				$attend25 =$this->input->post('attend25');
				$attend26 =$this->input->post('attend26');
				$attend27 =$this->input->post('attend27');
				$attend28 =$this->input->post('attend28');
				$attend29 =$this->input->post('attend29');
				$attend30 =$this->input->post('attend30');
				$attend31 =$this->input->post('attend31');
				$attend32 =$this->input->post('attend32');
				$attend33 =$this->input->post('attend33');
				$attend34 =$this->input->post('attend34');
				$attend35 =$this->input->post('attend35');
				$attend36 =$this->input->post('attend36');
				$attend37 =$this->input->post('attend37');
				$attend38 =$this->input->post('attend38');
				$attend39 =$this->input->post('attend39');
				$attend40 =$this->input->post('attend40');
				$data1 = array(
					's_id' => $seat1,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend1
				     );
				$data2 = array(
					's_id' => $seat2,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend2
				);
				$data3 = array(
					's_id' => $seat3,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend3
				);
				$data4 = array(
					's_id' => $seat4,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend4
				);
				$data5 = array(
					's_id' => $seat2,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend5
				);
				$data6 = array(
					's_id' => $seat6,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend6
				);
				$data7 = array(
					's_id' => $seat7,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend7
				);
				$data8 = array(
					's_id' => $seat8,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend8
				);
				$data9 = array(
					's_id' => $seat9,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend9
				);
				$data10 = array(
					's_id' => $seat10,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend10
				);
				$data11 = array(
					's_id' => $seat11,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend11
				);
				$data12 = array(
					's_id' => $seat12,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend12
				);
				$data13 = array(
					's_id' => $seat13,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend13
				);
				$data14 = array(
					's_id' => $seat14,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend14
				);
				$data15 = array(
					's_id' => $seat15,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend15
				);
				$data16 = array(
					's_id' => $seat16,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend16
				);
				$data17 = array(
					's_id' => $seat17,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend17
				);
				$data18 = array(
					's_id' => $seat18,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend18
				);
				$data19 = array(
					's_id' => $seat19,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend19
				);
				$data20 = array(
					's_id' => $seat20,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend20
				);
				$data21 = array(
					's_id' => $seat21,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend21
				);
				$data22 = array(
					's_id' => $seat22,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend22
				);
				$data22 = array(
					's_id' => $seat22,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend22
				);
				$data23 = array(
					's_id' => $seat23,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend23
				);
				$data24 = array(
					's_id' => $seat24,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend24
				);
				$data25 = array(
					's_id' => $seat25,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend25
				);
				$data26 = array(
					's_id' => $seat26,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend26
				);
				$data27 = array(
					's_id' => $seat27,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend27
				);
				$data28 = array(
					's_id' => $seat28,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend29
				);
				$data29 = array(
					's_id' => $seat29,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend29
				);
				$data30 = array(
					's_id' => $seat30,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend30
				);
				$data31 = array(
					's_id' => $seat31,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend31
				);
				$data32 = array(
					's_id' => $seat32,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend32
				);
				$data33 = array(
					's_id' => $seat33,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend33
				);
				$data34 = array(
					's_id' => $seat34,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend34
				);
				$data35 = array(
					's_id' => $seat35,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend35
				);
				$data36 = array(
					's_id' => $seat36,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend37
				);
				$data37 = array(
					's_id' => $seat37,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend37
				);
				$data38 = array(
					's_id' => $seat38,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend38
				);
				$data39 = array(
					's_id' => $seat39,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend39
				);
				$data40 = array(
					's_id' => $seat40,
					'subject_id' => $subject_name,
					'class_name' => $class_seatcheck,
					'attendance_date'=> $attendance_datebyseat,
					'teacher_id'=> $teacher_id,
					'present' => $attend40
				);

					if($data1['present']==NULL)
						$data1['present']= "false";
					if($data2['present']==NULL)
						$data2['present']= "false";
					if($data3['present']==NULL)
						$data3['present']= "false";
					if($data4['present']==NULL)
						$data4['present']= "false";
					if($data5['present']==NULL)
						$data5['present']= "false";
					if($data6['present']==NULL)
						$data6['present']= "false";
					if($data7['present']==NULL)
						$data7['present']= "false";
					if($data8['present']==NULL)
						$data8['present']= "false";
					if($data9['present']==NULL)
						$data9['present']= "false";
					if($data10['present']==NULL)
						$data10['present']= "false";
					if($data11['present']==NULL)
						$data11['present']= "false";
					if($data12['present']==NULL)
						$data12['present']= "false";
					if($data13['present']==NULL)
						$data13['present']= "false";
					if($data14['present']==NULL)
						$data14['present']= "false";
					if($data15['present']==NULL)
						$data15['present']= "false";
					if($data16['present']==NULL)
						$data16['present']= "false";
					if($data17['present']==NULL)
						$data17['present']= "false";
					if($data18['present']==NULL)
						$data18['present']= "false";
					if($data19['present']==NULL)
						$data19['present']= "false";
					if($data20['present']==NULL)
						$data20['present']= "false";
					if($data21['present']==NULL)
						$data21['present']= "false";
					if($data22['present']==NULL)
						$data22['present']= "false";
					if($data23['present']==NULL)
						$data23['present']= "false";
					if($data24['present']==NULL)
						$data24['present']= "false";
					if($data25['present']==NULL)
						$data25['present']= "false";
					if($data26['present']==NULL)
						$data26['present']= "false";
					if($data27['present']==NULL)
						$data27['present']= "false";
					if($data28['present']==NULL)
						$data28['present']= "false";
					if($data29['present']==NULL)
						$data29['present']= "false";
					if($data30['present']==NULL)
						$data30['present']= "false";
					if($data31['present']==NULL)
						$data31['present']= "false";
					if($data32['present']==NULL)
						$data32['present']= "false";
					if($data33['present']==NULL)
						$data33['present']= "false";
					if($data34['present']==NULL)
						$data34['present']= "false";
					if($data35['present']==NULL)
						$data35['present']= "false";
					if($data36['present']==NULL)
						$data36['present']= "false";
					if($data37['present']==NULL)
						$data37['present']= "false";
					if($data38['present']==NULL)
						$data38['present']= "false";
					if($data39['present']==NULL)
						$data39['present']= "false";
					if($data40['present']==NULL)
						$data40['present']= "false";

				    $this->db->insert('public.attendance', $data1);
				    $this->db->insert('public.attendance', $data2);
				    $this->db->insert('public.attendance', $data3);
				    $this->db->insert('public.attendance', $data4);
				    $this->db->insert('public.attendance', $data5);
				    $this->db->insert('public.attendance', $data6);
				    $this->db->insert('public.attendance', $data7);
				    $this->db->insert('public.attendance', $data8);
				    $this->db->insert('public.attendance', $data9);
				    $this->db->insert('public.attendance', $data10);
				    $this->db->insert('public.attendance', $data11);
				    $this->db->insert('public.attendance', $data12);
				    $this->db->insert('public.attendance', $data13);
				    $this->db->insert('public.attendance', $data14);
				    $this->db->insert('public.attendance', $data15);
				    $this->db->insert('public.attendance', $data16);
				    $this->db->insert('public.attendance', $data17);
				    $this->db->insert('public.attendance', $data18);
				    $this->db->insert('public.attendance', $data19);
				    $this->db->insert('public.attendance', $data20);
				    $this->db->insert('public.attendance', $data21);
				    $this->db->insert('public.attendance', $data22);
				    $this->db->insert('public.attendance', $data23);
				    $this->db->insert('public.attendance', $data24);
				    $this->db->insert('public.attendance', $data25);
				    $this->db->insert('public.attendance', $data26);
				    $this->db->insert('public.attendance', $data27);
				    $this->db->insert('public.attendance', $data28);
				    $this->db->insert('public.attendance', $data29);
				    $this->db->insert('public.attendance', $data30);
				    $this->db->insert('public.attendance', $data31);
				    $this->db->insert('public.attendance', $data32);
				    $this->db->insert('public.attendance', $data33);
				    $this->db->insert('public.attendance', $data34);
				    $this->db->insert('public.attendance', $data35);
				    $this->db->insert('public.attendance', $data36);
				    $this->db->insert('public.attendance', $data37);
				    $this->db->insert('public.attendance', $data38);
				    $this->db->insert('public.attendance', $data39);
				    $this->db->insert('public.attendance', $data40);


				$response['status'] = TRUE;
				$response['message'] = "Successfully saved scores.";
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
    	} else 
			redirect('login', 'refresh');
    } 

}
