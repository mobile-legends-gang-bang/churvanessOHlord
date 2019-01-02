<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model{

	public function addClass(){
		$field = array(
			'section_name'=>$this->input->post('section_name'),
			'grade_level'=>$this->input->post('grade_level'),
			'subject'=>$this->input->post('subject')
			);
		$this->db->insert('class_section', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}