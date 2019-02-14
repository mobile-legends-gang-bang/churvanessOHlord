<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('calendar_model');
    }
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else 
            $data['title'] = "Edukit - Calendar";
            $data['name'] = "CALENDAR OF ACTIVITIES AND SCHEDULE";
            $data['content'] = "calendar/index";
            $this->load->view('main/index', $data);
    }
    public function get_events() {
     // Our Start and End Dates
     $teacher_id = $this->session->userdata['logged_in']['teacher_id'];
     $title = $this->input->get("title");
     $start = $this->input->get("start");
     $end = $this->input->get("end");

     $events = $this->calendar_model->get_events($title,$start, $end);

    $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "title" => $r->title,
             "end" => $r->end,
             "start" => $r->start
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
 }
 public function add_event() {
        $teacher_id = $this->session->userdata['logged_in']['teacher_id'];

        if($this->session->userdata('logged_in')) {
            $this->form_validation->set_rules('title', '', 'required');
            $this->form_validation->set_rules('start', '', 'required');
            $this->form_validation->set_rules('end', '', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $start = $this->input->post('start');
                $end = $this->input->post('end');

                $data = array();
                    $data['title']  = $title;
                    $data['start']  = $start;
                    $data['end']  = $end;
                    $this->db->insert('public.events', $data);
                
            } else 
                echo 'Please fill up all required fields!';
        } else 
            redirect('login', 'refresh');
    }
public function delete_event() {
         $id = $this->input->get("id");
         $data =array(
            ':id' => $_POST['id']
            );
          $this->db->delete('public.events',$data);

           redirect(site_url("calendar"));

        }


}
?>