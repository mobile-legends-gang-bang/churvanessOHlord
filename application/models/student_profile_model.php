<?php
class Student_profile_model extends CI_Model
{
 function select(){
  $this->db->order_by('CustomerID', 'DESC');
  $query = $this->db->get('student_profile');
  return $query;
 }

 function insert($data){
  $this->db->insert_batch('student_profile', $data);
 }

}