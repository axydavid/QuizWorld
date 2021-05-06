<?php
	$quest  = $_POST['quest'];
	$title  = $_POST['title'];
	$ans4  = $_POST['ans4'];
	$ans2  = $_POST['ans2'];
	$ans1  = $_POST['ans1'];
	$ansR  = $_POST['ansR'];
	$subj  = $_POST['subj'];
	$reason  = $_POST['reason'];

	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$w = "SELECT MAX(q_ID) FROM questions";
	$questAmt = mysqli_query($con,$w);
	if (mysqli_num_rows($questAmt) > 0) 
	{
		while($row2 = mysqli_fetch_assoc($questAmt)) 
		{
			$maxID = $row2["MAX(q_ID)"] + 1;
		}
	}
	$q = ("INSERT INTO `questions` (`q_ID`, `title`, `quest`, `ans1`, `ans2`, `ans3`, `ans4`, `ansR`, `reason`, `subj`, `sub`, `tLimit`, `img`) VALUES ('$maxID', '$title', '$quest', '$ans1', '$ans2', '', '$ans4', '$ansR', '$reason', '$subj', '', '30',''); ");
	$questAmt = mysqli_query($con,$q);
	$problem = mysqli_error($con);
	printf($maxID);
	