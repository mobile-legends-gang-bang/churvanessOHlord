

    <?php
    $limit = 10;
    foreach($records as $key => $row){
    	$assignment[$key] = ((($row->assignment_scores/$row->assignment_perfect)*100)*0.1);
    	$project[$key] = ((($row->project_scores/$row->project_perfect)*100)*0.3);
    	$quarterexam[$key] = ((($row->quarterexam_scores/$row->quarterexam_perfect)*100)*0.4);
    	$quiz[$key] = ((($row->quiz_scores/$row->quiz_perfect)*100)*0.15);
    	$seatwork[$key] = ((($row->seatwork_scores/$row->seatwork_perfect)*100)*0.05);
    	$average[$key] = $assignment+$project+$quarterexam+$quiz+$seatwork;

    }
    array_multisort($average, SORT_DESC, $records);
    $records = array_chunk($records, $limit);
    print_r($average); return;
    foreach($records as $aa){

    	for($i = 0; $i < 10; $i++){
    		$assignment[$i] = ((($aa[$i]->assignment_scores/$aa[$i]->assignment_perfect)*100)*0.1);
    		$project[$i] = ((($aa[$i]->project_scores/$aa[$i]->project_perfect)*100)*0.3);
    		$quarterexam[$i] = ((($aa[$i]->quarterexam_scores/$aa[$i]->quarterexam_perfect)*100)*0.4);
    		$quiz[$i] = ((($aa[$i]->quiz_scores/$aa[$i]->quiz_perfect)*100)*0.15);
    		$seatwork[$i] = ((($aa[$i]->seatwork_scores/$aa[$i]->seatwork_perfect)*100)*0.05);
    		$average[$i] = $assignment[$i]+$project[$i]+$quarterexam[$i]+$quiz[$i]+$seatwork[$i];

    		echo "<tr><td style='width: 200px;'>".$aa[$i]->lname.', '.$aa[$i]->fname.', '.$aa[$i]->mname."</td><td style='padding-left:80px'>".number_format($average[$i],2)."</td></tr>";
    	}
    }
    ?>
