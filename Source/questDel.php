<?php
	$class  = json_decode($_POST['class']);
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	if($class == "\"all\"" || $class == "all") 
	{
		$q = ("DELETE FROM `questions` WHERE `questions`.`title` = '$class';");
		//$q .= ("UPDATE `users` SET `progObj` = ''");
		mysqli_query($con,$q);
		echo 'ALL detected';
	}
	else 
	{
		$q = ("DELETE FROM `questions`;");
		//$q .= ("UPDATE `users` SET `progObj` = '' WHERE `users`.`class` = '$class'");
		mysqli_query($con,$q);
		echo 'CLASS detected';
	}
