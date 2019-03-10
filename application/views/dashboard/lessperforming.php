
<?php
    $limit = 45;
    foreach($records as $key => $row){
    
        $average[$key] = ((($row->assignment_scores/$row->assignment_perfect)*100)*($formula->row()->assignment_percentage)) + ((($row->project_scores/$row->project_perfect)*100)*($formula->row()->project_percentage)) + ((($row->quarterexam_scores/$row->quarterexam_perfect)*100)*($formula->row()->quarter_exam_percentage)) + ((($row->quiz_scores/$row->quiz_perfect)*100)*($formula->row()->quiz_percentage)) + ((($row->seatwork_scores/$row->seatwork_perfect)*100)*($formula->row()->seatwork_percentage));
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