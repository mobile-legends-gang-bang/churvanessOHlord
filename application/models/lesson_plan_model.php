<?php
class Lesson_plan_model extends CI_Model{

	public function get(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$lesson_plan_id = $this->input->post('lesson_plan_id');
		$sql = "SELECT * FROM public.lesson_plan where teacher_id = ".$teacher_id." and lesson_plan_id = ".$lesson_plan_id." ORDER BY date DESC";

		$result = $this->db->query($sql);
		return $result;
	}

	public function getlessonplan(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.lesson_plan p
				JOIN public.subject s ON s.subject_id = p.subject_id
				WHERE p.teacher_id = ".$teacher_id."");
		return $result->result();
	}

	public function delete(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$lesson_plan_id = $this->input->post('lesson_plan_id');
		$sql = "DELETE FROM public.lesson_plan where teacher_id = ".$teacher_id." and lesson_plan_id = ".$lesson_plan_id."";

		return $this->db->query($sql);
	}
}