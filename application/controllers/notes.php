<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('section_model');
		$this->load->model('behavior_model');
		$this->load->model('note_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Notes";
			$data['name'] = "NOTES AND REMINDERS";
			$data['uniqueclass'] = $this->section_model->getUniqueclass();
			$data['class'] = $this->section_model->getclass();
			$data['subjectlist'] = $this->section_model->getsubject();
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['content'] = "notes/index";
			$this->load->view('main/index', $data);
	}

	public function savenote(){
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('subject_id', '', 'required');
			$this->form_validation->set_rules('class_name', '', 'required');
			$this->form_validation->set_rules('note_description', '', 'required');
			$this->form_validation->set_rules('note_date', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$subject_id = $this->input->post('subject_id');
				$class_name = $this->input->post('class_name');
				$note_description = $this->input->post('note_description');
				$note_date = $this->input->post('note_date');
				$data = array(
					'teacher_id' => $teacher_id,
					'subject_id' => $subject_id,
					'class_name' => $class_name,
					'note_description' => $note_description,
					'note_date' => $note_date,
				);
				$this->db->insert('public.notes', $data);
				$response['status'] = TRUE;
				$response['message'] = "Successfully saved behavior.";				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}

	public function getnote(){
		if($this->session->userdata('logged_in')){
			$data = $this->note_model->getnote();
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}

	public function updatenote(){
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('subject_id', '', 'required');
			$this->form_validation->set_rules('note_id', '', 'required');
			$this->form_validation->set_rules('class_name', '', 'required');
			$this->form_validation->set_rules('note_description', '', 'required');
			$this->form_validation->set_rules('note_date', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$subject_id = $this->input->post('subject_id');
				$note_id = $this->input->post('note_id');
				$class_name = $this->input->post('class_name');
				$note_description = $this->input->post('note_description');
				$note_date = $this->input->post('note_date');
				$data = array(
					'teacher_id' => $teacher_id,
					'subject_id' => $subject_id,
					'class_name' => $class_name,
					'note_description' => $note_description,
					'note_date' => $note_date,
				);
				$this->db->where('note_id', $note_id);
				$this->db->update('public.notes', $data);
				$response['status'] = TRUE;
				$response['message'] = "Successfully updated note.";				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}

	public function deletenote(){
		if($this->session->userdata('logged_in')){
			$data = $this->note_model->deletenote();
			$response['status'] = TRUE;
			$response['message'] = "Successfully saved behavior.";
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}

	public function getnotesToday(){
		if($this->session->userdata('logged_in')){
			$data = $this->note_model->getnotesToday();
			echo json_encode($data);
		}
		else
			redirect('login', 'refresh');		
	}
}
