<?php
class Scores_report_model extends CI_Model{

	public function getscores(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$subject_id = $this->input->post('score_subject');
		$quarter = $this->input->post('quarter');
		$score_type = $this->input->post('score_type');

		$sql = "SELECT 		p.s_id, lname, fname, mname, extname, score_type,
							ARRAY_TO_STRING(array_agg(s.score ORDER BY score_id), ' - ') as scores,
							ARRAY_TO_STRING(array_agg(s.over ORDER BY score_id), ' - ') as perfect_score,
							sum(score) as score_sum,
							sum(over) as score_perfect
				FROM 		public.student_profile p
				JOIN 		public.student_scores s
				ON 			p.s_id = s.s_id
				WHERE 		s.teacher_id = ".$this->db->escape($teacher_id)."
				AND 		s.class_name = ".$this->db->escape($class_name)."
				AND 		s.subject_id = ".$this->db->escape($subject_id)."
				AND 		s.quarter = ".$this->db->escape($quarter)."
				AND 		score_type = ".$this->db->escape($score_type)."
				GROUP BY 	p.s_id, lname, fname, mname, extname, score_type
				ORDER BY 	lname, fname, mname, p.s_id";
		$result = $this->db->query($sql);
		return $result;
	}
}