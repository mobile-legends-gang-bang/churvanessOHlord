<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="14" align="center">No record(s) found!</td></tr>
<?php else: ?>
                <thead style="width: ">
                    <tr>
                      <th>Student ID</th>
                      <th class="center_th" style="width: 380px!important;">Name</th>
                      <th class="center_th">1st Quarter</th>
                      <th class="center_th">2nd Quarter</th>
                      <th class="center_th">3rd Quarter</th>
                      <th class="center_th">4th Quarter</th>
                      <th class="center_th">Average Grade</th>
                    </tr>
                  </thead>
    <?php foreach ($records->result() as $row):?>
        <?php 
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

        ?>
        <tr>
            <td><?php echo $row->s_id ?></td>
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td><?php echo number_format($average1,2)?></td>
            <td><?php echo number_format($average2,2)?></td>
            <td><?php echo number_format($average3,2)?></td>
            <td><?php echo number_format($average4,2)?></td>
            <td><?php echo number_format($finalaverage,2)?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>