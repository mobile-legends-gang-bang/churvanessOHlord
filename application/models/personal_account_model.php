<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_account_model extends CI_Model{

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

	public function getTeacherInfo(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.register WHERE teacher_id = ".$teacher_id." ");
		return $result->result();
	}
}