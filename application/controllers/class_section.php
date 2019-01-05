<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Class_section extends CI_Controller {

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

	public function saveclass(){
		$this->form_validation->set_rules('section_name', 'Section Name', 'trim');
		$this->form_validation->set_rules('grade_level', 'Grade Level', 'trim');
		$this->form_validation->set_rules('subject', 'Subject', 'trim');
		if($this->form_validation->run()==TRUE){
			$data = array(
				'section_name' => $this->input->post('section_name'),
				'grade_level' => $this->input->post('grade_level'),
				'subject' => $this->input->post('subject')
			);
			$this->db->insert('public.class_section', $data);
			$response['status'] = TRUE;
			$response['message'] = "Successfully added class section.";
			// $response['data'] = $data;
			echo json_encode($response);
		}else 
			redirect('register','refresh');
	}
}
