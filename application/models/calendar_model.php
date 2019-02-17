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

    public function delete_event($id) 
    {
             $teacher_id = $this->session->userdata['logged_in']['teacher_id'];

        $this->db->where("id", $id)->delete("calendar_events");
    }

}


