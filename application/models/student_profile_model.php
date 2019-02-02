<?php
class Student_profile_model extends CI_Model{

	public function select(){

		$this->db->order_by('lname', 'DESC');
		$query = $this->db->get('student_profile');
		return $query;
	}

	public function insert($data){
		$this->db->insert_batch('student_profile', $data);
	}

	public function getstudents(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									ORDER BY lname");
		return $result->result();
	}
}