<?php

	
	$HTML = "";

	$weeks = explode("<w>", file_get_contents("questions.txt"));
	
	foreach(array_slice($weeks, 1) as $wNum=>$w){
		$questions = explode("<q>", $w);

		$HTML .= "<h1 data-num='" . ($wNum + 1) . "'>Week " . ($wNum + 1) . " <i class='fa fa-minus-square-o'></i></h1>";
		$HTML .= "<div class='week small-12 columns' data-num='" . ($wNum + 1) . "'>";

		$qPrefix = 1;
		foreach(array_slice($questions, 1) as $qNum=>$q){
			if(file_exists("slides/" . trim($q))){
				$HTML .= "<a class='slides button secondary small' href='slides/$q' target='_blank'>$q</a><br>";
			}else{
				$answers = explode("<a>", $q);

				$HTML .= "<div class='question'><b>$qPrefix. $answers[0]</b></div>";
				$HTML .= "<div class='answer'>$answers[1]</div>";
				$HTML .= "<br>";

				$qPrefix++;
			}
		}

		$HTML .= "</div>";
	}
	
	echo $HTML;
?>