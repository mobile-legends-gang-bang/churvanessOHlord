<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Personal_info_report extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('student_profile_model');
      $this->load->library('excel');
      $this->load->model('section_model');
      $this->load->model('behavior_model');
      $this->load->model('scores_report_model');
    }
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else 
            $data['title'] = "Personal Information Report";
            $data['name'] = "STUDENTS PERSONAL INFORMATION";
            $data['uniqueclass'] = $this->section_model->getUniqueclass();
            $data['content'] = "reports/personal_info/index";
            $this->load->view('main/index', $data);
    }
    // function index(){
    //   $this->load->model("excel_export_model");
    //   $data["employee_data"] = $this->excel_export_model->fetch_data();
    //   $this->load->view("excel_export_view", $data);
    //  }

    public function action(){
      $this->load->model("student_profile_model");
      $object = new PHPExcel();
      $object->setActiveSheetIndex(0);

      $table_columns = array("Student ID", "Last Name", "First Name", "Middle Name", "Extension Name", "Birthday", "Age","Address", "Guardian Name", "Relation","Contact Number",);

      $column = 0;

      foreach($table_columns as $field){
      $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
      $column++;
      }

      $students = $this->student_profile_model->getstudentsBySection();

      $excel_row = 2;

      foreach($students as $row)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->s_id);
       $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->lname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->fname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->mname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->extname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->birthday);
       $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->age);
       $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->address);
       $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->guardianname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->relation);
       $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->contactnum);
       $excel_row++;
      }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header('Content-Disposition: attachment;filename="personal_information.xls"');
        header("Content-Transfer-Encoding: binary ");
        $object_writer->save('php://output');

    }
 }