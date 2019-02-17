    <?php if ($records->num_rows() == 0): ?>
        <tr><td colspan="14" align="center">No record(s) found!</td></tr>
    <?php else: ?>
        <?php foreach ($records->result() as $row): ?>
            <tr>
                <td><?php echo $row->s_id ?></td>
                <td><?php echo $row->lname.", ".$row->fname." ".$row->mname?></td>
                <td><?php echo $row->score_type?></td>
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