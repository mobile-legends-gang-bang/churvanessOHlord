<?php
class Lesson_plan_model extends CI_Model{

	public function get(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_id');
		$sql = "SELECT * FROM public.lesson_plan where teacher_id = ".$teacher_id." and subject_id = ".$subject_id."";

		$result = $this->db->query($sql);
		return $result;
	}

}