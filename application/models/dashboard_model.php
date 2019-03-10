
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
	public function getformula(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$sql = "SELECT * FROM public.formula where teacher_id = ".$teacher_id."";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getbehaviorPositive(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_id');
		$class_name = $this->input->post('class_name');
		$result = $this->db->query("SELECT count(behavior_type) as behavior_type FROM public.behavior b
									JOIN public.behavior_record r on b.behavior_id = r.behavior_id
									WHERE b.teacher_id = ".$teacher_id."
									AND behavior_type = 'Positive'
									AND subject_id = ".$subject_id."
									AND class_name ='".$class_name."'");
		return $result;
	}

	public function getbehaviorNegative(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = $this->input->post('subject_id');
		$class_name = $this->input->post('class_name');
		$result = $this->db->query("SELECT count(behavior_type) as behavior_type FROM public.behavior b
									JOIN public.behavior_record r on b.behavior_id = r.behavior_id
									WHERE b.teacher_id = ".$teacher_id."
									AND behavior_type = 'Negative'
									AND subject_id = ".$subject_id."
									AND class_name ='".$class_name."'");
		return $result;
	}

	public function rankstudents(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_name');
		$sql = "SELECT 		ARRAY_TO_STRING(array_agg(s.score ORDER BY score_id), ' - ') as scores,
							ARRAY_TO_STRING(array_agg(s.over ORDER BY score_id), ' - ') as perfect_score,
							sum(score) as sum_of_all_scores,
							sum(over) as sum_of_perfect_scores,
							p.s_id, lname, fname, mname, extname,
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
				GROUP BY 	p.s_id, lname, fname, mname									";
		$result=$this->db->query($sql);
		return $result->result();	
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
	public function lessperforming(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_name');
		$sql = "SELECT 		ARRAY_TO_STRING(array_agg(s.score ORDER BY score_id), ' - ') as scores,
							ARRAY_TO_STRING(array_agg(s.over ORDER BY score_id), ' - ') as perfect_score,
							sum(score) as sum_of_all_scores,
							sum(over) as sum_of_perfect_scores,
							p.s_id, lname, fname, mname, extname,
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
				GROUP BY 	p.s_id, lname, fname, mname
				LIMIT 10
									";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getattendancerecord(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$subject_id = 47;
		$class_name = 'Einstein';

		$sql = "SELECT 	DISTINCT(attendance_date), 
				ARRAY(select distinct attendance_date FROM public.attendance ORDER BY attendance_date) AS dates,
				ARRAY(select count(present) FROM public.attendance WHERE present = TRUE GROUP BY attendance_date) AS present_count
				FROM public.attendance
				WHERE subject_id = " .$subject_id. "
				AND class_name = '" .$class_name. "'
				AND teacher_id = " .$teacher_id. "";
		$result = $this->db->query($sql);
		return $result;
	}
}