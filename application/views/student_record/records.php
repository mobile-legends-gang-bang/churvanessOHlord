<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="14" align="center">No record(s) found!</td></tr>
<?php else: ?>
    <?php foreach ($records->result() as $row):?>
        <?php $count = $row->count_absent/5;?>
        <tr>
            <td><?php echo $row->s_id ?></td>
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td><?php echo $row->count_absent?></td>
            <td><?php echo $count?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>