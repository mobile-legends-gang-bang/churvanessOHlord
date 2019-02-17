<?php
class Attendance_model extends CI_Model{

	public function getstudentsBySection(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_seat');
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'
									ORDER BY lname");
		return $result->result();
	}
	public function getseat(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_seatcheck');
		$result = $this->db->query("SELECT * FROM public.seatplan
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'");
		return $result->result();		
 
	}
	public function getabsent(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT s.s_id, fname, mname, extname,  
									ARRAY_TO_STRING(array_agg(a.present ORDER BY attendance_id), ' - ') as present,
									count(present) as count_absent
									from public.attendance a
									JOIN public.student_profile s on a.s_id = s.s_id
									WHERE present= false
									AND a.teacher_id = ".$teacher_id."
									GROUP BY s.s_id
									");
		return $result->result();
	}
}