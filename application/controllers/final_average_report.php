<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Final_average_report extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('student_profile_model');
      $this->load->library('excel');
      $this->load->model('section_model');
      $this->load->model('behavior_model');
      $this->load->model('student_record_model');
      $this->load->model('final_average_report_model');
      $this->load->model('note_model');

    }
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else 
            $data['title'] = "Final Average Report";
            $data['name'] = "FINAL AVERAGE REPORT";
            $data['subjectlist'] = $this->section_model->getsubject();
            $data['uniqueclass'] = $this->section_model->getUniqueclass();
            $data['content'] = "reports/final_average/index";
            $this->load->view('main/index', $data);
    }

    public function action() {
        if($this->session->userdata('logged_in')){
            $this->excel->setActiveSheetIndex(0);
            $spreadsheet = $this->excel->getActiveSheet();

            $header = array();
            $header[] = 'Student ID';
            $header[] = 'Name';
            $header[] = '1st Quarter';
            $header[] = '2nd Quarter';
            $header[] = '3rd Quarter';
            $header[] = '4th Quarter';
            $header[] = 'Final Average';

            $spreadsheet->setCellValue('A1', "Quarterly Grade Report");

            $spreadsheet->setCellValue('A3', $header[0]);
            $spreadsheet->setCellValue('B3', $header[1]);
            $spreadsheet->setCellValue('C3', $header[2]);
            $spreadsheet->setCellValue('D3', $header[3]);
            $spreadsheet->setCellValue('E3', $header[4]);
            $spreadsheet->setCellValue('F3', $header[5]);
            $spreadsheet->setCellValue('G3', $header[6]);

            $cell = 4;
            $records = $this->final_average_report_model->getfinalaverage();
            foreach(range('A','Z') as $columnID) {
                $this->excel->getActiveSheet()->getColumnDimension($columnID)
                    ->setAutoSize(true);
            }
            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            $spreadsheet->getStyle("A3:H3")->applyFromArray($style);
            

            foreach ($records->result() as $row) {
                $assignment1 = ((($row->assignment_scores1/$row->assignment_perfect1)*100)*0.1);
                $project1 = ((($row->project_scores1/$row->project_perfect1)*100)*0.3);
                $quarterexam1 = ((($row->quarterexam_scores1/$row->quarterexam_perfect1)*100)*0.4);
                $quiz1 = ((($row->quiz_scores1/$row->quiz_perfect1)*100)*0.15);
                $seatwork1 = ((($row->seatwork_scores1/$row->seatwork_perfect1)*100)*0.05);
                $average1 = $assignment1+$project1+$quarterexam1+$quiz1+$seatwork1;

                $assignment2 = ((($row->assignment_scores2/$row->assignment_perfect2)*100)*0.1);
                $project2 = ((($row->project_scores2/$row->project_perfect2)*100)*0.3);
                $quarterexam2 = ((($row->quarterexam_scores2/$row->quarterexam_perfect2)*100)*0.4);
                $quiz2 = ((($row->quiz_scores2/$row->quiz_perfect2)*100)*0.15);
                $seatwork2 = ((($row->seatwork_scores2/$row->seatwork_perfect2)*100)*0.05);
                $average2 = $assignment2+$project2+$quarterexam2+$quiz2+$seatwork2;

                $assignment3 = ((($row->assignment_scores3/$row->assignment_perfect3)*100)*0.1);
                $project3 = ((($row->project_scores3/$row->project_perfect3)*100)*0.3);
                $quarterexam3 = ((($row->quarterexam_scores3/$row->quarterexam_perfect3)*100)*0.4);
                $quiz3 = ((($row->quiz_scores3/$row->quiz_perfect3)*100)*0.15);
                $seatwork3 = ((($row->seatwork_scores3/$row->seatwork_perfect3)*100)*0.05);
                $average3 = $assignment3+$project3+$quarterexam3+$quiz3+$seatwork3;

                $assignment4 = ((($row->assignment_scores4/$row->assignment_perfect4)*100)*0.1);
                $project4 = ((($row->project_scores4/$row->project_perfect4)*100)*0.3);
                $quarterexam4 = ((($row->quarterexam_scores4/$row->quarterexam_perfect4)*100)*0.4);
                $quiz4 = ((($row->quiz_scores4/$row->quiz_perfect4)*100)*0.15);
                $seatwork4 = ((($row->seatwork_scores4/$row->seatwork_perfect4)*100)*0.05);
                $average4 = $assignment4+$project4+$quarterexam4+$quiz4+$seatwork4;

                $finalaverage = (($average1 + $average2 + $average3 + $average4)/4);
                $spreadsheet->setCellValue('A'.$cell, $row->s_id);
                $spreadsheet->setCellValue('B'.$cell, $row->lname.", ".$row->fname." ".$row->mname);
                $spreadsheet->setCellValue('C'.$cell, number_format($average1,2));
                $spreadsheet->setCellValue('D'.$cell, number_format($average2,2));
                $spreadsheet->setCellValue('E'.$cell, number_format($average3,2));
                $spreadsheet->setCellValue('F'.$cell, number_format($average4,2));
                $spreadsheet->setCellValue('G'.$cell, number_format($finalaverage,2));
                $cell++;
            }

           $filename='final_average_report.xls';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); //no cache
                         
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            $objWriter->save('php://output');
        }
        else
            redirect('login','refresh');
    }
    public function getfinalaverage(){
        $data['records'] = $this->final_average_report_model->getfinalaverage();
        $this->load->view('reports/final_average/final_average', $data);
    }
}