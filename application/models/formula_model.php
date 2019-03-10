<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Formula_model extends CI_Model{

	public function getformula(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$result = $this->db->query("SELECT * FROM public.formula								WHERE teacher_id = ".$teacher_id."");
		return $result->result();
	}

	public function deletenote(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$note_id = $this->input->post('note_id');
		$sql = "DELETE from public.notes
				WHERE teacher_id=".$teacher_id."
				AND note_id=".$note_id."";
		return $this->db->query($sql);
	}

	public function getnotesToday(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$date_today = date('Y-m-d');
		$result = $this->db->query("SELECT * FROM public.notes WHERE teacher_id = ".$teacher_id." AND note_date = '".$date_today."'");
		return $result->result();
	}

	public function countnotesToday(){
		$teacher_id = $this->session->userdata['logged_in']['teacher_id'];
		$date_today = date('Y-m-d');
		$result = $this->db->query("SELECT count(note_date) as note_date FROM public.notes WHERE teacher_id = ".$teacher_id." AND note_date = '".$date_today."'");
		return $result->result();
	}
}