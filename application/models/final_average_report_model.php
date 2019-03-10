<?php
class Final_average_report_model extends CI_Model{

	public function getfinalaverage(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$class_name = $this->input->post('class_grade');
		$subject_id = $this->input->post('subject_id');
		$sql = "SELECT 		p.s_id, lname, fname, mname, extname,
							ARRAY_TO_STRING(array_agg(s.score ORDER BY score_id), ' - ') as scores,
							ARRAY_TO_STRING(array_agg(s.over ORDER BY score_id), ' - ') as perfect_score,
							sum(score) as sum_of_all_scores,
							sum(over) as sum_of_perfect_scores,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								 AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as assignment_scores1,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as assignment_perfect1,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as project_scores1,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as project_perfect1,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as quarterexam_scores1,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as quarterexam_perfect1,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as quiz_scores1,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as quiz_perfect1,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as seatwork_scores1,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='1'
								 AND s.subject_id = ".$subject_id.") as seatwork_perfect1,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								 AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as assignment_scores2,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as assignment_perfect2,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as project_scores2,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as project_perfect2,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as quarterexam_scores2,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as quarterexam_perfect2,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as quiz_scores2,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as quiz_perfect2,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as seatwork_scores2,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='2'
								 AND s.subject_id = ".$subject_id.") as seatwork_perfect2,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								 AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as assignment_scores3,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as assignment_perfect3,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as project_scores3,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as project_perfect3,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as quarterexam_scores3,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as quarterexam_perfect3,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as quiz_scores3,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as quiz_perfect3,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as seatwork_scores3,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='3'
								 AND s.subject_id = ".$subject_id.") as seatwork_perfect3,

							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								 AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as assignment_scores4,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Assignment'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as assignment_perfect4,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as project_scores4,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Project'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as project_perfect4,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as quarterexam_scores4,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quarter Exam'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as quarterexam_perfect4,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as quiz_scores4,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Quiz'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as quiz_perfect4,
							(select sum(score) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as seatwork_scores4,
							(select sum(over) from public.student_scores s
								 WHERE score_type = 'Seatwork'
								 AND s.s_id = p.s_id
								  AND s.quarter ='4'
								 AND s.subject_id = ".$subject_id.") as seatwork_perfect4
				FROM 		public.student_profile p
				JOIN 		public.student_scores s
				ON 			p.s_id = s.s_id
				WHERE 		s.teacher_id = ".$teacher_id."
				AND 		s.class_name = '".$class_name."'
				AND 		s.subject_id = ".$subject_id."
				GROUP BY 	p.s_id, lname, fname, mname, extname
				ORDER BY 	lname, fname, mname, p.s_id
										";
		
		$result = $this->db->query($sql);
		return $result;
	}
}