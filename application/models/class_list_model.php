<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Class_list_model extends CI_Model{

	public function getclasslist(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.class_list
									WHERE teacher_id = ".$teacher_id."");
		return $result->result();
	}

	public function updateclasslist(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$id = $this->input->post('id');
		$sql = "UPDATE public.class_list
				SET behavior_type='".$behavior_type."', behavior_name ='".$behavior_name."'
				WHERE teacher_id=".$teacher_id."
				AND behavior_id=".$behavior_id."";
		return $this->db->query($sql);
	}

	public function deleteclasslist(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$behavior_id = $this->input->post('behavior_id');
		$sql = "DELETE from public.class_list
				WHERE teacher_id=".$teacher_id."
				AND behavior_id=".$behavior_id."";
		return $this->db->query($sql);
	}
}