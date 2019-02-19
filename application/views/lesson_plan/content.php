<?php if ($content->num_rows() == 0): ?>
    <p>Automated Message: No Data found</p>
<?php else: ?>
    <?php foreach ($content->result() as $row):?>
        <?php echo $row->content?>
    <?php endforeach;?>
<?php endif; ?>