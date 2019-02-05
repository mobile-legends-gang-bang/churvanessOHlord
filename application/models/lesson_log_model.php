<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_log_model extends CI_Model{

	public function savelessonlog(){
		$data = array(
			'teacher_id' 	=>	$this->session->userdata['logged_in']['teacher_id'],
			'subject_id'	=>	$this->input->post('subject_name'),
			'week_no'		=>	$this->input->post('week_no'),
			'day1_time1' 	=>	$this->input->post('day1_time1'),
			'day1_time2' 	=>	$this->input->post('day1_time2'),
			'day1_time3' 	=>	$this->input->post('day1_time3'),
			'day1_time4' 	=>	$this->input->post('day1_time4'),
			'day2_time1' 	=>	$this->input->post('day2_time1'),
			'day2_time2' 	=>	$this->input->post('day2_time2'),
			'day2_time3' 	=>	$this->input->post('day2_time3'),
			'day2_time4' 	=>	$this->input->post('day2_time4'),
			'day3_time1' 	=>	$this->input->post('day3_time1'),
			'day3_time2' 	=>	$this->input->post('day3_time2'),
			'day3_time3' 	=>	$this->input->post('day3_time3'),
			'day3_time4' 	=>	$this->input->post('day3_time4'),
			'day4_time1' 	=>	$this->input->post('day4_time1'),
			'day4_time2' 	=>	$this->input->post('day4_time2'),
			'day4_time3' 	=>	$this->input->post('day4_time3'),
			'day4_time4' 	=>	$this->input->post('day4_time4'),
			'day5_time1' 	=>	$this->input->post('day5_time1'),
			'day5_time2' 	=>	$this->input->post('day5_time2'),
			'day5_time3' 	=>	$this->input->post('day5_time3'),
			'day5_time4' 	=>	$this->input->post('day5_time4'),
			'day1_description1' 	=>	$this->input->post('day1_description1'),
			'day1_description2' 	=>	$this->input->post('day1_description2'),
			'day1_description3' 	=>	$this->input->post('day1_description3'),
			'day1_description4' 	=>	$this->input->post('day1_description4'),
			'day2_description1' 	=>	$this->input->post('day2_description1'),
			'day2_description2' 	=>	$this->input->post('day2_description2'),
			'day2_description3' 	=>	$this->input->post('day2_description3'),
			'day2_description4' 	=>	$this->input->post('day2_description4'),
			'day3_description1' 	=>	$this->input->post('day3_description1'),
			'day3_description2' 	=>	$this->input->post('day3_description2'),
			'day3_description3' 	=>	$this->input->post('day3_description3'),
			'day3_description4' 	=>	$this->input->post('day3_description4'),
			'day4_description1' 	=>	$this->input->post('day4_description1'),
			'day4_description2' 	=>	$this->input->post('day4_description2'),
			'day4_description3' 	=>	$this->input->post('day4_description3'),
			'day4_description4' 	=>	$this->input->post('day4_description4'),
			'day5_description1' 	=>	$this->input->post('day5_description1'),
			'day5_description2' 	=>	$this->input->post('day5_description2'),
			'day5_description3' 	=>	$this->input->post('day5_description3'),
			'day5_description4' 	=>	$this->input->post('day5_description4')
			);
		$query = $this->db->insert('public.lesson_log', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}
}