<?php
	$className = $_POST['className'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$w = "SELECT MAX(classID) FROM classes";
	$questAmt = mysqli_query($con,$w);
	if (mysqli_num_rows($questAmt) > 0) 
	{
		while($row2 = mysqli_fetch_assoc($questAmt)) 
		{
			$maxID = $row2["MAX(classID)"] + 1;
		}
	}
	$q = ("INSERT INTO `classes` (`classID`, `class`, `subj`,`subjIDs`) VALUES ('$maxID','$className', 'Intro,', '3,'); ");
	$questAmt = mysqli_query($con,$q);
	mysqli_error($con);
	echo json_encode($maxID);
	