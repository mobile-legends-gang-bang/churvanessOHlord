    <?php if ($records->num_rows() == 0): ?>
        <tr><td colspan="14" align="center">No record(s) found!</td></tr>
    <?php else: ?>
        <thead>
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th colspan="10">Score</th>
              <th>Total Score</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <?php foreach ($labels->result() as $row): ?>
                    <?php
                        $maxLength = 10;
                        $labels = explode(' - ', $row->labels);
                        $scoresLength = count($labels);
                    ?>
                    <?php for($i = 0; $i < $scoresLength; $i++): ?>
                        <td align="right"><?php echo $labels[$i]?></td>
                    <?php endfor; ?>
                    
                <?php endforeach;?>
                <td></td>
            </tr>
          </thead>
        <?php foreach ($records->result() as $row): ?>
            <tr>
                <td><?php echo $row->s_id ?></td>
                <td><?php echo $row->lname.", ".$row->fname." ".$row->mname?></td>
                <?php
                    $maxLength = 10;
                    $scores = explode(' - ', $row->scores);
                    $scoresLength = count($scores);
                ?>
                <?php for($i = 0; $i < $scoresLength; $i++): ?>
                    <td align="right"><?php echo $scores[$i]?></td>
                <?php endfor; ?>
                <?php for ($i = $scoresLength; $i < $maxLength; $i++) : ?>
                    <td align="right">0</td>
                <?php endfor; ?>
                <td><?php echo $row->score_sum?></td>
            </tr>
        <?php endforeach;?>
    <?php endif; ?>