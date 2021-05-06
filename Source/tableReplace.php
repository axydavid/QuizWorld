<?php
	$q_ID  = $_POST['q_ID'];
	$quest = $_POST['quest'];
	$ans1 = $_POST['ans1'];
	$ans2 = $_POST['ans2'];
	$ans3 = $_POST['ans3'];
	$ans4 = $_POST['ans4'];
	$ansR = $_POST['ansR'];
	$subj = $_POST['subj'];
	$sub = $_POST['sub'];
	$tLimit = $_POST['tLimit'];
	$img = $_POST['img'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$q = ("REPLACE INTO `questions` (`q_ID`, `quest`, `ans1`, `ans2`, `ans3`, `ans4`, `ansR`, `subj`, `sub`, `tLimit`,`img`) VALUES ('$q_ID', '$quest', '$ans1', '$ans2', '$ans3', '$ans4', '$ansR', '$subj', '$sub', '$tLimit', '$img'); ");
	$questAmt = mysqli_query($con,$q);
	echo json_encode($questAmt);
