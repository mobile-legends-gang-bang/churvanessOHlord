<?php
class Student_record_model extends CI_Model{

	public function getstudentsBySection(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_seat');
		$result = $this->db->query("SELECT * FROM public.student_profile
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'
									ORDER BY lname");
		return $result->result();
	}
	public function getseat(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_seatcheck');
		$result = $this->db->query("SELECT * FROM public.seatplan
									WHERE teacher_id = ".$teacher_id."
									AND class_name = '".$class_name."'");
		return $result->result();		
 
	}
	public function getabsent(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$subject_id = $this->input->post('subject_id');
		$sql = "SELECT s.s_id, lname, fname, mname, extname, a.class_name, subject_id,  
									ARRAY_TO_STRING(array_agg(a.present ORDER BY attendance_id), ' - ') as present,
									count(present) as count_absent
									from public.attendance a
									JOIN public.student_profile s on a.s_id = s.s_id
									WHERE present= false
									AND a.teacher_id = ".$teacher_id."
									AND a.class_name = '".$class_name."'
									AND subject_id = ".$subject_id."
									GROUP BY s.s_id, a.class_name, subject_id
									";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getpresent(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$subject_id = $this->input->post('subject_id');
		$sql = "SELECT s.s_id, lname, fname, mname, extname, a.class_name, subject_id,  
									ARRAY_TO_STRING(array_agg(a.present ORDER BY attendance_id), ' - ') as present,
									count(present) as count_present
									from public.attendance a
									JOIN public.student_profile s on a.s_id = s.s_id
									WHERE present= true
									AND a.teacher_id = ".$teacher_id."
									AND a.class_name = '".$class_name."'
									AND subject_id = ".$subject_id."
									GROUP BY s.s_id, a.class_name, subject_id
									";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getscores(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade2');
		$subject_id = $this->input->post('subject_id2');
		$quarter = $this->input->post('quarter');
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