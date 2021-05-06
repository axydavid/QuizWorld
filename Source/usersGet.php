<?php
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');


	$q = "SELECT * FROM `users` WHERE `class` != 'Admin'  ORDER BY `users`.`user` ASC";
	$questAmt = mysqli_query($con,$q);
	$to_encode = mysqli_fetch_all($questAmt, MYSQLI_ASSOC);
	echo json_encode($to_encode);