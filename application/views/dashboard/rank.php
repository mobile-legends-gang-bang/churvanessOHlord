<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="2" align="center">Current Rank Unavailable</td></tr>
<?php else: ?>
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
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td><?php echo number_format($average,2)?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>