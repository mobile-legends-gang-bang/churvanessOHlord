<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log_model extends CI_Model{

	public function getLessonLog(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$week_no = $this->input->post('week_no');
		$subject_id = $this->input->post('subject_name');
		$result = $this->db->query("SELECT * FROM public.lesson_log
									WHERE teacher_id = ".$teacher_id."
									AND week_no = ".$week_no."
									AND subject_id = ".$subject_id."");
		return $result->result();
	}
	function updatelessonlog(){
		$class_id=$this->input->post('class_id');
		$subject_name=$this->input->post('subject_name_edit');
		$subject_description=$this->input->post('subject_description_edit');
		$sched_from=$this->input->post('sched_from_edit');
		$sched_to=$this->input->post('sched_to_edit');

		$sql = "UPDATE public.subject s
				SET subject_description = '".$subject_description."', subject_name = '".$subject_name."', sched_from = '".$sched_from."', sched_to = '".$sched_to."'
				FROM public.class c 
				WHERE c.subject_id = s.subject_id
				AND c.class_id = ".$class_id."";
		return $this->db->query($sql);
	}
}