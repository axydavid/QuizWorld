<?php
	$classID  = $_POST['classID'];
	$class  = $_POST['class'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$q = ("DELETE FROM `classes` WHERE `classes`.`classID` = $classID");
	mysqli_query($con,$q);

	$q = ("DELETE FROM `users` WHERE `users`.`class` = '$class'");
	mysqli_query($con,$q);