<?php
class Scores_report_model extends CI_Model{

	public function getscores(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$subject_id = $this->input->post('score_subject');
		$quarter = $this->input->post('quarter');
		$score_type = $this->input->post('score_type');
		$result = $this->db->query("SELECT * FROM public.student_scores s
									JOIN public.student_profile p on p.s_id = s.s_id
									WHERE s.teacher_id = ".$teacher_id."
									AND s.class_name = '".$class_name."'
									AND s.subject_id = '".$subject_id."'
									AND s.quarter = '".$quarter."'
									AND score_type = '".$score_type."'
									ORDER BY lname");
		return $result->result();
	}
}