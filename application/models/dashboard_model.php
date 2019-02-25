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

	// public function getstudentRankScore(){
	// 	$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
	// 	$subject_id = $this->input->post('subject_name');
	// 	$class_name = $this->input->post('class_grade');
	// 	$result = $this->db->query("SELECT score,fname FROM public.student_scores s
	// 								JOIN public.student_profile p on s.s_id = p.s_id
	// 								WHERE s.teacher_id = ".$teacher_id."
	// 								AND subject_id = ".$subject_id."
	// 								AND s.class_name = '".$class_name."' order by score DESC");
	// 	return $result;
	// }

	public function getstudentRank(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_name');
		$class_name = $this->input->post('class_grade');
		$type = $this->input->post('score_type');
		$result = $this->db->query("SELECT fname as name, score as score FROM public.student_scores s
									JOIN public.student_profile p on s.s_id = p.s_id
									WHERE s.teacher_id = ".$teacher_id."
									AND subject_id = ".$subject_id."
									AND s.class_name = '".$class_name."' 
									AND s.score_type = '".$type."' order by score DESC");
		return $result;
	}

	public function rankstudents(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_name');
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
				GROUP BY 	p.s_id, lname, fname, mname, extname
				ORDER BY 	lname, fname, mname, p.s_id
				LIMIT 10
									";
		$result = $this->db->query($sql);
		return $result;
	}

	public function rankabsent(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_name');
		$sql = "SELECT 		p.s_id, lname, fname, mname, extname,
							ARRAY_TO_STRING(array_agg(s.present ORDER BY attendance_id), ' - ') as absent,
							count(s.present) as absent
				FROM 		public.student_profile p
				JOIN 		public.attendance s
				ON 			p.s_id = s.s_id
				WHERE 		s.teacher_id = ".$teacher_id."
				AND 		present =false
				AND 		s.class_name = '".$class_name."'
				GROUP BY 	p.s_id, lname, fname, mname, extname
				ORDER BY 	lname, fname, mname, p.s_id
				LIMIT 10
									";
		$result = $this->db->query($sql);
		return $result;
	}
}