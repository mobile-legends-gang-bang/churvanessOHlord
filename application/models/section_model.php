<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model{

	public function saveclass(){
		$data = array(
			'section_name'=>$this->input->post('section_name'),
			'grade_level'=>$this->input->post('grade_level'),
			'subject'=>$this->input->post('subject')
			);
		$query = $this->db->insert('class_section', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		return $query;
	}

	public function getclass(){
		$result = $this->db->query("SELECT * FROM public.class_section
				ORDER BY section_name ASC ");
		return $result->result();
	}

	[DataContract]
	public class DataPoint
	{
		public DataPoint(string label, double y)
		{
			this.Label = label;
			this.Y = y;
		}
 
		//Explicitly setting the name to be used while serializing to JSON.
		[DataMember(Name = "label")]
		public string Label = "";
 
		//Explicitly setting the name to be used while serializing to JSON.
		[DataMember(Name = "y")]
		public Nullable<double> Y = null;
	}
}