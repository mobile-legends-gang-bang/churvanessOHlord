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
        $data['records'] = $this->scores_report_model->getscores();
        $this->load->view('reports/scores/records', $data);
    }
    

    // function index(){
    //   $this->load->model("excel_export_model");
    //   $data["employee_data"] = $this->excel_export_model->fetch_data();
    //   $this->load->view("excel_export_view", $data);
    //  }
    public function action() {
        // $this->load->model("scores_report_model");
        // $object = new PHPExcel();
        // $object->setActiveSheetIndex(0);

        $this->excel->setActiveSheetIndex(0);
        $spreadsheet = $this->excel->getActiveSheet();

        $header = array();
        $header[] = 'Student ID';
        $header[] = 'Name';
        $header[] = 'Score Type';
        $header[] = 'Score';
        $header[] = 'Total Score';

        $spreadsheet->setCellValue('A1', "Score's Report");

        $spreadsheet->setCellValue('A3', $header[0]);
        $spreadsheet->setCellValue('B3', $header[1]);
        $spreadsheet->setCellValue('C3', $header[2]);
        $spreadsheet->setCellValue('D3', $header[3])->mergeCells('D3:M3');
        $spreadsheet->setCellValue('N3', $header[4]);

        $cell = 4;
        $records = $this->scores_report_model->getscores();
        foreach ($records->result() as $row) {
            $spreadsheet->setCellValue('A'.$cell, $row->s_id);
            $spreadsheet->setCellValue('B'.$cell, $row->lname.", ".$row->fname." ".$row->mname);
            $spreadsheet->setCellValue('C'.$cell, $row->score_type);
            // $object->getActiveSheet()->setCellValue('D'.$cell, $row->score_sum);

            $maxLength = 10;
            $scores = explode(' - ', $row->scores);
            $scoresLength = count($scores);
            $column = 'D';
            $column++;
            for($i = 0; $i < $scoresLength; $i++) {
                $spreadsheet->setCellValue($column.$cell, $scores[$i]);
                $column++;
            }
            for($i = $scoresLength; $i < $maxLength; $i++) {
                $spreadsheet->setCellValue($column.$cell, '0');
                $column++;
            }

            // $object->getActiveSheet()->setCellValue('D3', $header[3])->mergeCells('D3:M3');
            $spreadsheet->setCellValue('N'.$cell, $row->score_sum);
            $cell++;
        }

       $filename='scores.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); //no cache
                     
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        $objWriter->save('php://output');
    }

    public function action2(){
        $this->load->model("scores_report_model");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

      $table_columns = array("Name", "Address", "Gender", "Designation", "Age");

      $column = 0;

      foreach($table_columns as $field)
      {
      $object->getActiveSheet()->setCellValue('A1', "Scores");
       $column++;
      }

      $scores = $this->scores_report_model->getscores();

      $excel_row = 2;
  
      foreach($scores->result() as $row)
      {
       $maxLength = 10;
       $sum = 0;
       $scores = explode(' - ', $row->scores);
       $scoresLength = count($scores);
       $average = ($row->score_sum/$row->score_perfect)*100;
       $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->s_id);
       $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->lname);
       $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->score_type);
       $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->scores);
       $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->score_sum);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, number_format($average,2));
       $excel_row++;
      }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");;
        header('Content-Disposition: attachment;filename="data.xls"');
        header("Content-Transfer-Encoding: binary ");
        $object_writer->save('php://output');

    }
 }