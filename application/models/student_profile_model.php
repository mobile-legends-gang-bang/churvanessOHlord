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
		$class_name = $this->input->post('student_class');
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'
									ORDER BY lname");
		return $result->result();
	}
	public function getstudentsBySection(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'
									ORDER BY lname");
		return $result->result();
	}

	/*public function searchStudents(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$qry = $this->input->post('search_text');

		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE fname LIKE '%".$qry."%'
									OR street LIKE '%".$qry."%'
									OR city LIKE '%".$qry."%'
									AND teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'
									ORDER BY fname");

		return $result->result();
	}*/

	function searchStudents($query)
	{
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');

		$this->db->select("*");
		$this->db->from("public.student_profile");
		{
			$this->db->like('fname', $query);
			$this->db->or_like('street', $query);
			$this->db->or_like('city', $query);
		}
		// $this->db->where('teacher_id', $teacher_id);
		$this->db->where('class_name', $class_name);
		$this->db->order_by('fname', 'ASC');
		return $this->db->get();
	}
}