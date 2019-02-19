<?php
class Lesson_plan_model extends CI_Model{

	public function get(){
		$id = $this->input->post('id');
		$sql = "SELECT * FROM public.lesson_plan";
		$result = $this->db->query($sql);
		return $result;
	}

}