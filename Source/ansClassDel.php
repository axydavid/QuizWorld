<?php
	$class  = json_decode($_POST['class']);
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	if($class == "\"all\"" || "all") 
	{
		$q = ("DELETE FROM `answers`;");
		$q .= ("UPDATE `users` SET `progObj` = ''");
		mysqli_multi_query($con,$q);
		echo 'ALL detected';
	}
	else 
	{
		$q = ("DELETE FROM `answers` WHERE `answers`.`class` = '$class';");
		$q .= ("UPDATE `users` SET `progObj` = '' WHERE `users`.`class` = '$class'");
		mysqli_multi_query($con,$q);
		echo 'CLASS detected';
	}
