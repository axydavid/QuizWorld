<?php
	$classID  = $_POST['classID'];
	$classR = $_POST['classR'];
	$subj = $_POST['subj'];
	$subjID = $_POST['subjID'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$q = "UPDATE `classes` SET `class` = '$classR', `subj` = '$subj', `subjIDs` = '$subjID' WHERE `classes`.`classID` = $classID;";
	$questAmt = mysqli_query($con,$q);
	mysqli_error($con);
	printf("%s\n",$q);
	?>