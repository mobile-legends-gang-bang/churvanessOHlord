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
		$result = $this->db->query("SELECT * FROM public.class c 
									JOIN public.subject s on c.subject_id = s.subject_id
									JOIN public.class_list l on l.classname = c.class_name");
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
		$section_name=$this->input->post('section_name');
		$grade_level=$this->input->post('grade_level');

		$this->db->set('section_name', $section_name);
		$this->db->set('grade_level', $grade_level);
		$this->db->where('class_id', $class_id);
		$result=$this->db->update('class');
		return $result;

	function deleteclass(){
		$class_id=$this->input->post('class_id');
		$this->db->where('class_id', $class_id);
		$result=$this->db->delete('class');
		return $result;
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