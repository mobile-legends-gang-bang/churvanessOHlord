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
     $start = $this->input->get("start");
     $end = $this->input->get("end");

     $startdt = new DateTime('now'); // setup a local datetime
     $startdt->setTimestamp($start); // Set the date based on timestamp
     $start_format = $startdt->format('Y-m-d H:i:s');

     $enddt = new DateTime('now'); // setup a local datetime
     $enddt->setTimestamp($end); // Set the date based on timestamp
     $end_format = $enddt->format('Y-m-d H:i:s');

     $events = $this->calendar_model->get_events($start_format, $end_format);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "id" => $r->id,
             "title" => $r->title,
             "end" => $r->end,
             "start" => $r->start
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
 }
 public function add_event() {
   
        if($this->session->userdata('logged_in')) {
            $this->form_validation->set_rules('name', '', 'required');
            $this->form_validation->set_rules('start_date', '', 'required');
            $this->form_validation->set_rules('end_date', '', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $start_date = date('Y-m-d H:i:s', strtotime($this->input->post('start_date')));
                $end_date = date('Y-m-d H:i:s', strtotime($this->input->post('end_date')));
                $teacher_id = $this->session->userdata['logged_in']['teacher_id'];

                $data = array(
                    'teacher_id' => $teacher_id,
                    'title' => $name,
                    'start' => $start_date,
                    'end' => $end_date
                );
                $this->calendar_model->add_event($data);
                redirect(site_url("calendar"));
            } else 
                echo 'Please fill up all required fields!';
        } else 
            redirect('login', 'refresh');
    }
public function edit_event() 
    {
        $eventid = intval($this->input->post("eventid"));
        $event = $this->calendar_model->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->common->nohtml($this->input->post("name"));
        $start_date = $this->common->nohtml($this->input->post("start_date"));
        $end_date = $this->common->nohtml($this->input->post("end_date"));
        $delete = intval($this->input->post("delete"));

        if(!$delete) {

            if(!empty($start_date)) {
                $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                $start_date = $sd->format('Y-m-d H:i:s');
                $start_date_timestamp = $sd->getTimestamp();
            } else {
                $start_date = date("Y-m-d H:i:s", time());
                $start_date_timestamp = time();
            }

            if(!empty($end_date)) {
                $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                $end_date = $ed->format('Y-m-d H:i:s');
                $end_date_timestamp = $ed->getTimestamp();
            } else {
                $end_date = date("Y-m-d H:i:s", time());
                $end_date_timestamp = time();
            }

            $this->calendar_model->update_event($eventid, array(
                "title" => $name,
                "start" => $start_date,
                "end" => $end_date,
                )
            );
            
        } else {
            $this->calendar_model->delete_event($eventid);
        }

        redirect(site_url("calendar"));
    }

}
?>