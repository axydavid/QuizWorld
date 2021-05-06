<?php
	$subjID  = $_POST['subjID'];
	$subj  = $_POST['subj'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$q = "DELETE FROM `subjects` WHERE `subjects`.`subjID` = $subjID;";
	$q .="UPDATE classes set subjIDs = replace(subjIDs,'$subjID,','');";
	$q .="UPDATE classes set subj = replace(subj,'$subj,','')";
	mysqli_multi_query($con,$q);
	echo $q;	
