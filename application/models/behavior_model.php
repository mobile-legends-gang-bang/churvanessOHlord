<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Behavior_model extends CI_Model{

	public function getbehavior(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.behavior
									WHERE teacher_id = ".$teacher_id."");
		return $result->result();
	}

	public function updatebehavior(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$behavior_id = $this->input->post('behavior_id');
		$behavior_type = $this->input->post('behavior_type');
		$behavior_name = $this->input->post('behavior_name');
		$sql = "UPDATE public.behavior
				SET behavior_type='".$behavior_type."', behavior_name ='".$behavior_name."'
				WHERE teacher_id=".$teacher_id."
				AND behavior_id=".$behavior_id."";
		return $this->db->query($sql);
	}

	public function deletebehavior(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$behavior_id = $this->input->post('behavior_id');
		$sql = "DELETE from public.behavior
				WHERE teacher_id=".$teacher_id."
				AND behavior_id=".$behavior_id."";
		return $this->db->query($sql);
	}
}