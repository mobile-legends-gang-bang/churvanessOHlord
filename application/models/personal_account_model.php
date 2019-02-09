<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account_model extends CI_Model{

	public function saveclass(){
		$data = array(
			'teacher_id' => $this->session->userdata['logged_in']['teacher_id'],
			'class_name'=>$this->input->post('classname'),
			'subject_id'=>$this->input->post('subject_name')
			);
		$query = $this->db->insert('class', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}

	public function getTeacherInfo(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.register WHERE teacher_id = ".$teacher_id." ");
		return $result->result();
	}

	public function updatePersonalInfo(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
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

		$sql = "UPDATE public.register
				SET fname='".$personal_fname."', mname ='".$personal_mname."', lname ='".$personal_lname."', extname ='".$personal_exname."', birthday ='".$personal_bday."', age =".$personal_age.", housenumber =".$personal_hnum.", street ='".$personal_stnum."', barangay ='".$personal_brgy."', city ='".$personal_city."', province ='".$personal_prov."', degree_attained ='".$personal_degree."', institution_name ='".$personal_instname."', year_grad ='".$personal_yrgrad."', mob_number ='".$personal_num."', tel_number ='".$personal_telnum."', email ='".$personal_email."'
				WHERE teacher_id=".$teacher_id."";
		return $this->db->query($sql);
	}
}