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
            $data['records'] = $this->scores_report_model->getscores();
            $data['content'] = "reports/scores/index";
            $this->load->view('main/index', $data);
    }
    public function getscores(){
        $data['records'] = $this->scores_report_model->getscores();
        $data['labels'] = $this->scores_report_model->getlabel();
        $this->load->view('reports/scores/records', $data);
    }

    public function action() {

        $this->excel->setActiveSheetIndex(0);
        $spreadsheet = $this->excel->getActiveSheet();

        $header = array();
        $header[] = 'Student ID';
        $header[] = 'Name';
        $header[] = 'Score Type';
        $header[] = 'Score';
        $header[] = 'Total Score';

        $spreadsheet->setCellValue('A1', "Scores Report");

        $spreadsheet->setCellValue('A3', $header[0]);
        $spreadsheet->setCellValue('B3', $header[1]);
        $spreadsheet->setCellValue('C3', $header[2]);
        $spreadsheet->setCellValue('D3', $header[3])->mergeCells('D3:M3');
        $spreadsheet->setCellValue('N3', $header[4]);

        $cell = 4;
        $records = $this->scores_report_model->getscores();
        foreach(range('A','Z') as $columnID) {
            $this->excel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $spreadsheet->getStyle("D3:M3")->applyFromArray($style);

        foreach ($records->result() as $row) {
            $spreadsheet->setCellValue('A'.$cell, $row->s_id);
            $spreadsheet->setCellValue('B'.$cell, $row->lname.", ".$row->fname." ".$row->mname);
            $spreadsheet->setCellValue('C'.$cell, $row->score_type);
            // $object->getActiveSheet()->setCellValue('D'.$cell, $row->score_sum);

            $maxLength = 10;
            $scores = explode(' - ', $row->scores);
            $scoresLength = count($scores);
            $column = 'C';
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
 }