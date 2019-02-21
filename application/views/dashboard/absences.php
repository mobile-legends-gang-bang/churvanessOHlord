<?php if ($records->num_rows() == 0): ?>
    <tr><td colspan="2" align="center">Current Absences Unavailable</td></tr>
<?php else: ?>
    <?php foreach ($records->result() as $row):?>
        <tr>
            <td><?php echo $row->lname.", ".$row->fname." ".$row->mname." ".$row->extname?></td>
            <td style="padding-left: 50px;"><?php echo $row->absent?></td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>