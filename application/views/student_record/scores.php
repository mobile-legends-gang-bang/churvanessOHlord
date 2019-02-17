<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="14" align="center">No record(s) found!</td></tr>
<?php else: ?>
                <thead style="width: ">
                    <tr>
                      <th>Student ID</th>
                      <th class="center_th" style="width: 380px!important;">Name</th>
                      <th class="center_th" style="width: 150px!important;">Assignment Scores <br><?php echo $records->row()->assignment_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Project Scores <br> <?php echo $records->row()->project_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Quarter Exam <br> <?php echo $records->row()->quarterexam_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Quiz Scores <br> <?php echo $records->row()->quiz_perfect?></th>
                      <th class="center_th" style="width: 150px!important;">Seatwork Scores <br> <?php echo $records->row()->seatwork_perfect?></th>
                      <th class="center_th">Average Grade</th>
                    </tr>
                  </thead>
    <?php foreach ($records->result() as $row):?>
        <?php 
            $assignment = ((($row->assignment_scores/$row->assignment_perfect)*100)*0.1);
            $project = ((($row->project_scores/$row->project_perfect)*100)*0.3);
            $quarterexam = ((($row->quarterexam_scores/$row->quarterexam_perfect)*100)*0.4);
            $quiz = ((($row->quiz_scores/$row->quiz_perfect)*100)*0.15);
            $seatwork = ((($row->seatwork_scores/$row->seatwork_perfect)*100)*0.05);
            $average = $assignment+$project+$quarterexam+$quiz+$seatwork;
        ?>
        <tr>
            <td><?php echo $row->s_id ?></td>
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td><?php echo $row->assignment_scores?></td>
            <td><?php echo $row->project_scores?></td>
            <td><?php echo $row->quarterexam_scores?></td>
            <td><?php echo $row->quiz_scores?></td>
            <td><?php echo $row->seatwork_scores?></td>
            <td><?php echo number_format($average,2)?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>