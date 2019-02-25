<?php
class Grades_report_model extends CI_Model{

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

	public function getallscores(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade2');
		$subject_id = $this->input->post('subject_id2');
		$quarter = $this->input->post('quarter');
			if($quarter == 'Whole Quarter')
				echo "whole quarter"; return;
		$sql = "SELECT 		p.s_id, lname, fname, mname, extname,
							ARRAY_TO_STRING(array_agg(s.score ORDER BY score_id), ' - ') as scores,
							ARRAY_TO_STRING(array_agg(s.over ORDER BY score_id), ' - ') as perfect_score,
							sum(score) as sum_of_all_scores,
							sum(over) as sum_of_perfect_scores,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id) as assignment_scores,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id) as assignment_perfect,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id) as project_scores,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id) as project_perfect,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id) as quarterexam_scores,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id) as quarterexam_perfect,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id) as quiz_scores,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id) as quiz_perfect,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id) as seatwork_scores,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id) as seatwork_perfect
				FROM 		public.student_profile p
				JOIN 		public.student_scores s
				ON 			p.s_id = s.s_id
				WHERE 		s.teacher_id = ".$teacher_id."
				AND 		s.class_name = '".$class_name."'
				AND 		s.subject_id = ".$subject_id."
				AND 		s.quarter = '".$quarter."'
				GROUP BY 	p.s_id, lname, fname, mname, extname
				ORDER BY 	lname, fname, mname, p.s_id
									";
		$result = $this->db->query($sql);
		return $result;
	}
}