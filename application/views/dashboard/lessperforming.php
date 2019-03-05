
<?php
    $limit = 45;
    foreach($records as $key => $row){
    
        $average[$key] = ((($row->assignment_scores/$row->assignment_perfect)*100)*0.1) + ((($row->project_scores/$row->project_perfect)*100)*0.3) + ((($row->quarterexam_scores/$row->quarterexam_perfect)*100)*0.4) + ((($row->quiz_scores/$row->quiz_perfect)*100)*0.15) + ((($row->seatwork_scores/$row->seatwork_perfect)*100)*0.05);
        $names[$key] = $row->lname;
    }
    array_multisort($average, SORT_ASC, $records);
    $records = array_chunk($records, $limit);

    foreach($records as $aa){
        for($i = 0; $i < 10; $i++){
            echo "<tr><td style='width: 200px;'>".$aa[$i]->lname.', '.$aa[$i]->fname.', '.$aa[$i]->mname."</td><td style='padding-left:80px'>".number_format($average[$i],2)."</td></tr>";
        }
    }
    ?>