<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model{

	public function saveclass(){
		$data = array(
			'teacher_id' => $this->session->userdata['logged_in']['teacher_id'],
			'class_name'=>$this->input->post('classname'),
			'subject_id'=>$this->input->post('subject_name')
			);
		$query = $this->db->insert('class', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}

	public function getclass(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT distinct(class_name) FROM public.class c 
									JOIN public.subject s on c.subject_id = s.subject_id
									JOIN public.class_list l on l.classname = c.class_name
									WHERE c.teacher_id = ".$teacher_id."");
		return $result->result();
	}
	public function getclasslist(){
		$result = $this->db->query("SELECT * FROM public.class_list
				ORDER BY classname ASC ");
		return $result->result();
	}
	public function getsubject(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.subject WHERE teacher_id = ".$teacher_id."
				ORDER BY subject_name ASC");
		return $result->result();
	}
	public function getclassid(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT class_id FROM public.class WHERE teacher_id = ". $teacher_id." AND class_name = 'Einstein'");
		return $result->result();
	}
	public function subject_name_exist($subject_name)
	{
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$sql = "Select subject_name from public.subject  
				Where subject_name = ? and teacher_id = ?";
		$query_result = $this->db->query($sql,array($subject_name, te));
		return $query_result;
	}
	function updateclass(){
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

	function deleteclass(){
		$class_id = $this->input->post('class_id');
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];


		$sql = "DELETE FROM public.class where class_id = ".$class_id."
				AND teacher_id = ".$teacher_id."";
		return $this->db->query($sql);
	}

	public function savesubject(){
		$data = array(
			'teacher_id' => $this->session->userdata['logged_in']['teacher_id'],
			'subject_name'=>$this->input->post('subject_name'),
			'subject_description'=>$this->input->post('subject_description'),
			'sched_from'=>$this->input->post('sched_from'),
			'sched_to'=>$this->input->post('sched_to')
			);
		$query = $this->db->insert('subject', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}

	public function savescore(){
		$teacher_id	= $this->session->userdata['logged_in']['teacher_id'];
		$student_id = $this->input->post('student_id');
		$subject_name = $this->input->post('score_subject');
		$score_quarter = $this->input->post('score_quarter');
		$score_type = $this->input->post('score_type');
		$score = $this->input->post('score');
		$data = array(
			'teacher_id'	=> $teacher_id,
			's_id'	=> $student_id,
			'subject_id'	=> $subject_name,
			'quarter'	=> $score_quarter,
			'score_type' => $score_type,
			'score' => $score	
		);
		$query = $this->db->insert('student_scores', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}

}