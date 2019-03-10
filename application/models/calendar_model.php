<?php

class Calendar_Model extends CI_Model 
{

    public function get_events($start, $end) 
    {
     $teacher_id = $this->session->userdata['logged_in']['teacher_id'];
       $result = $this->db->query("SELECT * FROM public.events
                                    ORDER BY id");
        return $result;       
    }

    public function add_event($data) 
    { 
             $teacher_id = $this->session->userdata['logged_in']['teacher_id'];
                 $this->db->insert("events", $data);
       
    }

    public function delete_event(){
       $teacher_id = $this->session->userdata['logged_in']['teacher_id'];
        $id = $this->input->post('id');
        $sql = "DELETE from public.events
                WHERE teacher_id=$teacher_id
                AND id=$id";
        return $this->db->query($sql);
    }
    public function update_event(){
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $start=$this->input->post('start');
        $end=$this->input->post('end');

        $sql = "  UPDATE public.events SET title=:title, start=:start, end=:end WHERE id=:id ";
        return $this->db->query($sql);
    }

}


