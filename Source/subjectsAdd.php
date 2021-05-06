<?php
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$w = "SELECT MAX(subjID) FROM subjects";
	$questAmt = mysqli_query($con,$w);
	if (mysqli_num_rows($questAmt) > 0) 
	{
		while($row2 = mysqli_fetch_assoc($questAmt)) 
		{
			$maxID = $row2["MAX(subjID)"] + 1;
		}
	}
	$q = ("INSERT INTO `subjects` (`subjID`, `subjName`, `subjSubd`) VALUES ('$maxID', 'Subject', ''); ");
	$questAmt = mysqli_query($con,$q);
	mysqli_error($con);
	echo json_encode($maxID);
	