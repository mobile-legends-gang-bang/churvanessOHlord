<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Formula extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('formula_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$data['title'] = "Edukit - Set Formula";
			$data['name'] = "SET GRADE PERCENTAGE";
			$data['content'] = "formula/index";
			$this->load->view('main/index', $data);
	}
	public function saveformula(){
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$this->form_validation->set_rules('assignment_percentage', '', 'required');
			$this->form_validation->set_rules('project_percentage', '', 'required');
			$this->form_validation->set_rules('quarter_exam_percentage', '', 'required');
			$this->form_validation->set_rules('quiz_percentage', '', 'required');
			$this->form_validation->set_rules('seatwork_percentage', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$assignment_percentage = $this->input->post('assignment_percentage');
				$project_percentage = $this->input->post('project_percentage');
				$quarter_exam_percentage = $this->input->post('quarter_exam_percentage');
				$quiz_percentage = $this->input->post('quiz_percentage');
				$seatwork_percentage = $this->input->post('seatwork_percentage');

				$sum = $assignment_percentage+$project_percentage+$quarter_exam_percentage+$quiz_percentage+$seatwork_percentage;
				$query = $this->db->query("SELECT * FROM public.formula where teacher_id = ".$teacher_id."");
				if($sum!=100){
					$response['status'] = FALSE;
					$response['message'] = "Should sum up to 100%. Please double check";
				}
				else{
					if($query->num_rows() == 1){
						$response['status'] = FALSE;
						$response['message'] = "Formula has been set. Please consider editing.";
					}
					else{
						$data = array(
						'teacher_id' => $teacher_id,
						'assignment_percentage' => '.'.$assignment_percentage,
						'project_percentage' => '.'.$project_percentage,
						'quarter_exam_percentage' => '.'.$quarter_exam_percentage,
						'quiz_percentage' => '.'.$quiz_percentage,
						'seatwork_percentage' => '.'.$seatwork_percentage
						);
						$this->db->insert('public.formula', $data);
						$response['status'] = TRUE;
						$response['message'] = "Successfully saved formula.";
					}	
				}		
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
	}

	public function updateformula(){
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else 
			$this->form_validation->set_rules('assignment_percentage', '', 'required');
			$this->form_validation->set_rules('project_percentage', '', 'required');
			$this->form_validation->set_rules('quarter_exam_percentage', '', 'required');
			$this->form_validation->set_rules('quiz_percentage', '', 'required');
			$this->form_validation->set_rules('seatwork_percentage', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$assignment_percentage = $this->input->post('assignment_percentage');
				$project_percentage = $this->input->post('project_percentage');
				$quarter_exam_percentage = $this->input->post('quarter_exam_percentage');
				$quiz_percentage = $this->input->post('quiz_percentage');
				$seatwork_percentage = $this->input->post('seatwork_percentage');
				$formula_id = $this->input->post('formula_id');

				$sum = $assignment_percentage+$project_percentage+$quarter_exam_percentage+$quiz_percentage+$seatwork_percentage;
				if($sum!=100){
					$response['status'] = FALSE;
					$response['message'] = "Should sum up to 100%. Please double check";
				}
				else{
					$data = array(
					'teacher_id' => $teacher_id,
					'assignment_percentage' => '.'.$assignment_percentage,
					'project_percentage' => '.'.$project_percentage,
					'quarter_exam_percentage' => '.'.$quarter_exam_percentage,
					'quiz_percentage' => '.'.$quiz_percentage,
					'seatwork_percentage' => '.'.$seatwork_percentage
					);
					$this->db->where('formula_id', $formula_id);
					$this->db->update('public.formula', $data);
					$response['status'] = TRUE;
					$response['message'] = "Successfully updated formula.";
				}		
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
	}

	public function getformula(){
		if($this->session->userdata('logged_in')){
			$data = $this->formula_model->getformula();
			echo json_encode($data);
		} else
			redirect('login', 'refresh');		
	}
}
