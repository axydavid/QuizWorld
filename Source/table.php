<?php
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');


	$q = ("SELECT * FROM questions");
	$questAmt = mysqli_query($con,$q);
	$to_encode = mysqli_fetch_all($questAmt, MYSQLI_ASSOC);
	echo json_encode($to_encode);
	// if (mysqli_num_rows($questAmt) > 0) 
	// {
		// $to_encode = array();
		// while ($row = mysqli_fetch_assoc($questAmt)) 
		// {
			// $to_encode[]->q_ID = $row["q_ID"];
			// $to_encode[]->quest = $row["quest"];
			// $to_encode[]->ans1 = $row["ans1"];
			// $to_encode[]->ans2 = $row["ans2"];
			// $to_encode[]->ans3 = $row["ans3"];
			// $to_encode[]->ans4 = $row["ans4"];
			// $to_encode[]->ansR = $row["ansR"];
			// $to_encode[]->subj = $row["subj"];
			// $to_encode[]->limit = $row["limit"];
		// }

	// }