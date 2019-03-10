<?php error_reporting(0); ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Grades_report extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('student_profile_model');
      $this->load->library('excel');
      $this->load->model('section_model');
      $this->load->model('behavior_model');
      $this->load->model('student_record_model');
      $this->load->model('grades_report_model');
      $this->load->model('note_model');

    }
    public function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        } else 
            $data['title'] = "Grades Report";
            $data['name'] = "GRADES REPORT";
            $data['subjectlist'] = $this->section_model->getsubject();
            $data['uniqueclass'] = $this->section_model->getUniqueclass();
            $data['notesview'] = $this->note_model->getnotesToday();
            $data['content'] = "reports/grades/index";
            $this->load->view('main/index', $data);
    }

    public function action() {
        if($this->session->userdata('logged_in')){
            $this->excel->setActiveSheetIndex(0);
            $spreadsheet = $this->excel->getActiveSheet();

            $header = array();
            $header[] = 'Student ID';
            $header[] = 'Name';
            $header[] = 'Assignment Score';
            $header[] = 'Project Score';
            $header[] = 'Quarter Exam Score';
            $header[] = 'Quiz Score';
            $header[] = 'Seatwork Score';
            $header[] = 'Average';

            $spreadsheet->setCellValue('A1', "Grade Report");

            $spreadsheet->setCellValue('A3', $header[0]);
            $spreadsheet->setCellValue('B3', $header[1]);
            $spreadsheet->setCellValue('C3', $header[2]);
            $spreadsheet->setCellValue('D3', $header[3]);
            $spreadsheet->setCellValue('E3', $header[4]);
            $spreadsheet->setCellValue('F3', $header[5]);
            $spreadsheet->setCellValue('G3', $header[6]);
            $spreadsheet->setCellValue('H3', $header[7]);

            $cell = 4;
            $records = $this->grades_report_model->getscores();
            $formula = $this->grades_report_model->getformula();
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
                $assignment = ((($row->assignment_scores/$row->assignment_perfect)*100)*($formula->row()->assignment_percentage));
                $project = ((($row->project_scores/$row->project_perfect)*100)*($formula->row()->project_percentage));
                $quarterexam = ((($row->quarterexam_scores/$row->quarterexam_perfect)*100)*($formula->row()->quarter_exam_percentage));
                $quiz = ((($row->quiz_scores/$row->quiz_perfect)*100)*($formula->row()->quiz_percentage));
                $seatwork = ((($row->seatwork_scores/$row->seatwork_perfect)*100)*($formula->row()->seatwork_percentage));
                $average = $assignment+$project+$quarterexam+$quiz+$seatwork;
                $spreadsheet->setCellValue('A'.$cell, $row->s_id);
                $spreadsheet->setCellValue('B'.$cell, $row->lname.", ".$row->fname." ".$row->mname);
                $spreadsheet->setCellValue('C'.$cell, $row->assignment_scores);
                $spreadsheet->setCellValue('D'.$cell, $row->project_scores);
                $spreadsheet->setCellValue('E'.$cell, $row->quarterexam_scores);
                $spreadsheet->setCellValue('F'.$cell, $row->quiz_scores);
                $spreadsheet->setCellValue('G'.$cell, $row->seatwork_scores);
                $spreadsheet->setCellValue('H'.$cell, number_format($average,2));
                $cell++;
            }

           $filename='grade_report.xls';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); //no cache
                         
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
            $objWriter->save('php://output');
        }
        else
            redirect('login','refresh');
    }
}