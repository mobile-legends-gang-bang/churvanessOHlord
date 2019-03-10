<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="14" align="center">No record(s) found!</td></tr>
<?php else: ?>
                <thead style="width: ">
                    <tr>
                      <th>Student ID</th>
                      <?php 
                      $assignment_perfect = $records->row()->assignment_perfect1 + $records->row()->assignment_perfect2 + $records->row()->assignment_perfect3 + $records->row()->assignment_perfect4;
                      $project_perfect = $records->row()->project_perfect1 + $records->row()->project_perfect2 + $records->row()->project_perfect3 + $records->row()->project_perfect4;
                      $quarterexam_perfect = $records->row()->quarterexam_perfect1 + $records->row()->quarterexam_perfect2 + $records->row()->quarterexam_perfect3 + $records->row()->quarterexam_perfect4;
                      $quiz_perfect = $records->row()->quiz_perfect1 + $records->row()->quiz_perfect2 + $records->row()->quiz_perfect3 + $records->row()->quiz_perfect4;
                      $seatwork_perfect = $records->row()->seatwork_perfect1 + $records->row()->seatwork_perfect2 + $records->row()->seatwork_perfect3 + $records->row()->seatwork_perfect4;
                      ?>
                      <th class="center_th" style="width: 380px!important;">Name</th>
                      <th class="center_th" style="width: 150px!important;">Assignment Scores <br><?php echo $assignment_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Project Scores <br> <?php echo $project_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Quarter Exam <br> <?php echo $quarterexam_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Quiz Scores <br> <?php echo $quiz_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Seatwork Scores <br> <?php echo $seatwork_perfect?></th>
                      <th class="center_th">Average Grade</th>
                    </tr>
                  </thead>
    <?php foreach ($records->result() as $row):?>
      <?php 
            $assignment1 = ((($row->assignment_scores1/$row->assignment_perfect1)*100)*($formula->row()->assignment_percentage));
            $project1 = ((($row->project_scores1/$row->project_perfect1)*100)*($formula->row()->project_percentage));
            $quarterexam1 = ((($row->quarterexam_scores1/$row->quarterexam_perfect1)*100)*($formula->row()->quarter_exam_percentage));
            $quiz1 = ((($row->quiz_scores1/$row->quiz_perfect1)*100)*($formula->row()->quiz_percentage));
            $seatwork1 = ((($row->seatwork_scores1/$row->seatwork_perfect1)*100)*($formula->row()->seatwork_percentage));
            $average1 = $assignment1+$project1+$quarterexam1+$quiz1+$seatwork1;

            $assignment2 = ((($row->assignment_scores2/$row->assignment_perfect2)*100)*($formula->row()->assignment_percentage));
            $project2 = ((($row->project_scores2/$row->project_perfect2)*100)*($formula->row()->project_percentage));
            $quarterexam2 = ((($row->quarterexam_scores2/$row->quarterexam_perfect2)*100)*($formula->row()->quarter_exam_percentage));
            $quiz2 = ((($row->quiz_scores2/$row->quiz_perfect2)*100)*($formula->row()->quiz_percentage));
            $seatwork2 = ((($row->seatwork_scores2/$row->seatwork_perfect2)*100)*($formula->row()->seatwork_percentage));
            $average2 = $assignment2+$project2+$quarterexam2+$quiz2+$seatwork2;

            $assignment3 = ((($row->assignment_scores3/$row->assignment_perfect3)*100)*($formula->row()->assignment_percentage));
            $project3 = ((($row->project_scores3/$row->project_perfect3)*100)*($formula->row()->project_percentage));
            $quarterexam3 = ((($row->quarterexam_scores3/$row->quarterexam_perfect3)*100)*($formula->row()->quarter_exam_percentage));
            $quiz3 = ((($row->quiz_scores3/$row->quiz_perfect3)*100)*($formula->row()->quiz_percentage));
            $seatwork3 = ((($row->seatwork_scores3/$row->seatwork_perfect3)*100)*($formula->row()->seatwork_percentage));
            $average3 = $assignment3+$project3+$quarterexam3+$quiz3+$seatwork3;

            $assignment4 = ((($row->assignment_scores4/$row->assignment_perfect4)*100)*($formula->row()->assignment_percentage));
            $project4 = ((($row->project_scores4/$row->project_perfect4)*100)*($formula->row()->project_percentage));
            $quarterexam4 = ((($row->quarterexam_scores4/$row->quarterexam_perfect4)*100)*($formula->row()->quarter_exam_percentage));
            $quiz4 = ((($row->quiz_scores4/$row->quiz_perfect4)*100)*($formula->row()->quiz_percentage));
            $seatwork4 = ((($row->seatwork_scores4/$row->seatwork_perfect4)*100)*($formula->row()->seatwork_percentage));
            $average4 = $assignment4+$project4+$quarterexam4+$quiz4+$seatwork4;

            $finalaverage = (($average1 + $average2 + $average3 + $average4)/4);

            $assignment_scores = $row->assignment_scores1+$row->assignment_scores2+$row->assignment_scores3+$row->assignment_scores4;
            $project_scores = $row->project_scores1+$row->project_scores2+$row->project_scores3+$row->project_scores4;
            $quarterexam_scores = $row->quarterexam_scores1+$row->quarterexam_scores2+$row->quarterexam_scores3+$row->quarterexam_scores4;
            $quiz_scores = $row->quiz_scores1+$row->quiz_scores2+$row->quiz_scores3+$row->quiz_scores4;
            $seatwork_scores = $row->seatwork_scores1+$row->seatwork_scores2+$row->seatwork_scores3+$row->seatwork_scores4;

        ?>
        <tr>
            <td><?php echo $row->s_id ?></td>
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td><?php echo $assignment_scores?></td>
            <td><?php echo $project_scores?></td>
            <td><?php echo $quarterexam_scores?></td>
            <td><?php echo $quiz_scores?></td>
            <td><?php echo $seatwork_scores?></td>
            <td><?php echo number_format($finalaverage,2)?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>