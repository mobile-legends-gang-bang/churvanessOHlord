<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Behavior extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('behavior_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Behavior Setup";
			$data['name'] = "SETUP STUDENT BEHAVIOR";
			$data['content'] = "behavior/index";
			$this->load->view('main/index', $data);
	}

	public function savebehavior() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('behavior_type', '', 'required');
			$this->form_validation->set_rules('behavior_name', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$behavior_type = $this->input->post('behavior_type');
				$behavior_name = $this->input->post('behavior_name');
				$data = array(
					'teacher_id' => $teacher_id,
					'behavior_type' => $behavior_type,
					'behavior_name' => $behavior_name	
				);
				$query = $this->db->get_where('public.behavior', array('teacher_id' => $teacher_id, 'behavior_type' => $behavior_type, 'behavior_name' => $behavior_name));
				if($query->num_rows() > 0){
					$response['status'] = FALSE;
					$response['message'] = "Behavior already exists.";
				}
				else{
					$this->db->insert('public.behavior', $data);
					$response['status'] = TRUE;
					$response['message'] = "Successfully saved behavior.";
				}				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}

	public function getbehavior(){
		if($this->session->userdata('logged_in')){
			$data = $this->behavior_model->getbehavior();
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}

	public function updatebehavior() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('behavior_id', '', 'required');
			$this->form_validation->set_rules('behavior_type', '', 'required');
			$this->form_validation->set_rules('behavior_name', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$behavior_id = $this->input->post('behavior_id');
				$behavior_type = $this->input->post('behavior_type');
				$behavior_name = $this->input->post('behavior_name');
				$data = array(
					'teacher_id' => $teacher_id,
					'behavior_type' => $behavior_type,
					'behavior_name' => $behavior_name	
				);
				$query = $this->db->get_where('public.behavior', array('teacher_id' => $teacher_id, 'behavior_type' => $behavior_type, 'behavior_name' => $behavior_name, 'behavior_id' => $behavior_id));
				if($query->num_rows() > 0){
					$response['status'] = FALSE;
					$response['message'] = "Nothing's been updated";
				}
			else{
					$data = $this->behavior_model->updatebehavior();
					$response['status'] = TRUE;
					$response['message'] = "Successfully updated behavior details.";
				}				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}

	public function deletebehavior(){
		if($this->session->userdata('logged_in')){
			$data = $this->behavior_model->deletebehavior();
			$response['status'] = TRUE;
			$response['message'] = "Successfully saved behavior.";
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}
}
