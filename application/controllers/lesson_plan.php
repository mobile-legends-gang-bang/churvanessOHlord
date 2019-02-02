<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_plan extends CI_Controller {
	public function index() {
		if(!$this->session->userdata('logged_in')) {
			redirect('login', 'refresh');
		} else
			$data['title'] = "Edukit - Lesson Plan";
			$data['name'] = "Create Lesson Plan";
			$data['content'] = "lesson_plan/index";
			$this->load->view('main/index', $data);
	}

	public function Word(){
		if(isset($_POST["create_word"])){  
      			if(empty($_POST["area2"])){  
          			echo '<script>window.location = "lessonplan/index"</script>';  
      				}  
     			else{  
		           header("Content-type: application/vnd.ms-word");  
		           header("Content-Disposition: attachment;Filename=".rand().".doc");  
		           header("Pragma: no-cache");  
		           header("Expires: 0");   
		           echo $_POST["area2"];  
      			}  
 			}
	}
}
