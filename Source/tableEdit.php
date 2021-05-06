<?php
	$q_ID  = $_POST['q_ID'];
	$title = $_POST['title'];
	$quest = $_POST['quest'];
	$ans1 = $_POST['ans1'];
	$ans2 = $_POST['ans2'];
	$ans3 = $_POST['ans3'];
	$ans4 = $_POST['ans4'];
	$ansR = $_POST['ansR'];
	$reason = $_POST['reason'];
	$subj = $_POST['subj'];
	$sub = $_POST['sub'];
	$tLimit = $_POST['tLimit'];
	
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	$q = "UPDATE `questions` SET `quest` = '$quest', `title` = '$title', `ans1` = '$ans1', `ans2` = '$ans2', `ans3` = '$ans3', `ans4` = '$ans4', `ansR` = '$ansR', `reason` = '$reason', `subj` = '$subj', `sub` = '$sub', `tLimit` = '$tLimit' WHERE `questions`.`q_ID` = $q_ID; ";
	$questAmt = mysqli_query($con,$q);
	if(!$questAmt){echo("<script>console.log('PHP: " . mysqli_error($con) . "')</script>");}
	// $to_encode = mysqli_fetch_all($questAmt, MYSQLI_ASSOC);
	// echo json_encode($to_encode);
	?>