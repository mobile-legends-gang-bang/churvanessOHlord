<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('personal_account_model');
		$this->load->model('note_model');
	}

	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Personal Account";
			$data['name'] = "PERSONAL ACCOUNT";
			$data['content'] = "personal_account/index";
			$data['notesview'] = $this->note_model->getnotesToday();
			$data['teacherinfo'] = $this->personal_account_model->getTeacherInfo();
			$this->load->view('main/index', $data);
	}

	public function updatePersonalInfo() {
		if($this->session->userdata('logged_in')) {
			$this->form_validation->set_rules('teacher_id', '', 'required');
			$response['status'] = FALSE;
			if ($this->form_validation->run()){
				$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
				$personal_username = $this->input->post('personal_username');
				$personal_fname = $this->input->post('personal_fname');
				$personal_mname = $this->input->post('personal_mname');
				$personal_lname = $this->input->post('personal_lname');
				$personal_exname = $this->input->post('personal_exname');
				$personal_bday = $this->input->post('personal_bday');
				$personal_age = $this->input->post('personal_age');
				$personal_hnum = $this->input->post('personal_hnum');
				$personal_stnum = $this->input->post('personal_stnum');
				$personal_brgy = $this->input->post('personal_brgy');
				$personal_city = $this->input->post('personal_city');
				$personal_prov = $this->input->post('personal_prov');
				$personal_degree = $this->input->post('personal_degree');
				$personal_instname = $this->input->post('personal_instname');
				$personal_yrgrad = $this->input->post('personal_yrgrad');
				$personal_num = $this->input->post('personal_num');
				$personal_telnum = $this->input->post('personal_telnum');
				$personal_email = $this->input->post('personal_email');

				$data = array(
					'username' => $personal_username,
					'fname' => $personal_fname,
					'mname' => $personal_mname, 
					'lname' => $personal_lname, 
					'extname' => $personal_exname, 
					'birthday' => $personal_bday, 
					'age' => $personal_age, 
					'housenumber' => $personal_hnum, 
					'street' => $personal_stnum, 
					'barangay' => $personal_brgy, 
					'city' => $personal_city, 
					'province' => $personal_prov, 
					'degree_attained' => $personal_degree, 
					'institution_name' => $personal_instname, 
					'year_grad'	=> $personal_yrgrad, 
					'mob_number' => $personal_num, 
					'tel_number' => $personal_telnum, 
					'email' => $personal_email
				);

				// $query = $this->db->get_where('public.register', array('teacher_id' => $teacher_id, 'username' => $personal_username, 'fname' => $personal_fname, 'mname' => $personal_mname,'lname' => $personal_lname, 'extname' => $personal_exname, 'birthday' => $personal_bday, 'age' => $personal_age, 'housenumber' => $personal_hnum, 'street' => $personal_stnum, 'barangay' => $personal_brgy, 'city' => $personal_city, 'province' => $personal_prov, 'degree_attained' => $personal_degree, 'institution_name' => $personal_instname, 'year_grad'	=> $personal_yrgrad, 'mob_number' => $personal_num, 'tel_number' => $personal_telnum, 
				// 	'email' => $personal_email));

				// if($query->num_rows() > 0){
				// 	$response['status'] = FALSE;
				// 	$response['message'] = "Nothing's been updated";
				// }
				// else{
					$data = $this->personal_account_model->updatePersonalInfo();
					$response['status'] = TRUE;
					$response['message'] = "Successfully updated personal account details.";
				// }				
			} else 
				$response['message'] = 'Please fill up all required fields';
			echo json_encode($response);
		} else 
			redirect('login', 'refresh');
	}
}
