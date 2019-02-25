
<?php
class Personal_info_report_model extends CI_Model{

	public function getstudentsBySectionreport(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$sql = "SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getstudentsBySection(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'");
		return $result->result();
	}

}