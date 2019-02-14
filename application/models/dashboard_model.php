<?php
class Dashboard_model extends CI_Model{

	public function getstudentsBySection(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_name');
		$result = $this->db->query("SELECT * FROM public.behavior_record
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'");
		return $result->result();
	}

	public function getbehaviorPositive(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_name');
		$class_name = $this->input->post('class_grade');
		$result = $this->db->query("SELECT count(behavior_type) as behavior_type FROM public.behavior b
									JOIN public.behavior_record r on b.behavior_id = r.behavior_id
									WHERE b.teacher_id = ".$teacher_id."
									AND behavior_type = 'Positive'
									AND subject_id = ".$subject_id."
									AND class_name = '".$class_name."'");
		return $result;
	}

	public function getbehaviorNegative(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_name');
		$class_name = $this->input->post('class_grade');
		$result = $this->db->query("SELECT count(behavior_type) as behavior_type FROM public.behavior b
									JOIN public.behavior_record r on b.behavior_id = r.behavior_id
									WHERE b.teacher_id = ".$teacher_id."
									AND behavior_type = 'Negative'
									AND subject_id = ".$subject_id."
									AND class_name = '".$class_name."'");
		return $result;
	}
}