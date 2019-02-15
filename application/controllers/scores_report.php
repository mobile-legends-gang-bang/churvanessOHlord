<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Scores_report extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('student_profile_model');
      $this->load->library('excel');
      $this->load->model('section_model');
      $this->load->model('behavior_model');
      $this->load->model('scores_report_model');
      $this->load->model('note_model');

    }
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else 
            $data['title'] = "Scores Report";
            $data['name'] = "SCORES REPORT";
            $data['subjectlist'] = $this->section_model->getsubject();
            $data['uniqueclass'] = $this->section_model->getUniqueclass();
            $data['notesview'] = $this->note_model->getnotesToday();
            $data['content'] = "reports/scores/index";
            $this->load->view('main/index', $data);
    }
    public function getscores(){
        $data = $this->scores_report_model->getscores();
        echo json_encode($data);
    }
    // function index(){
    //   $this->load->model("excel_export_model");
    //   $data["employee_data"] = $this->excel_export_model->fetch_data();
    //   $this->load->view("excel_export_view", $data);
    //  }

    public function action(){
        $this->load->model("scores_report_model");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

      $table_columns = array("Name", "Address", "Gender", "Designation", "Age");

      $column = 0;

      foreach($table_columns as $field)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
       $column++;
      }

      $scores = $this->scores_report_model->getscores();

      $excel_row = 2;

      foreach($scores as $row)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->s_id);
       $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->lname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->score_type);
       $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->score);
       $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "yes");
       $excel_row++;
      }

      
        $this->output->set_content_type('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $this->output->set_header('Content-Disposition: attachment;filename="' . 'test' . '.xlsx"');
        $this->output->set_header('Cache-Control: max-age=0');
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        $object_writer->save('php://output');

    }
}