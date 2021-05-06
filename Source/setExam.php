<?php
	$class  = $_POST['class'];
	$minutes  = $_POST['minutes'];
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	$date = date("Ymd")+date("H")*60 + date("i");

	$q = ("UPDATE `users` SET `exam` = '1',  `examDate` = '$date', `minutes` = '$minutes', `progObj` = '' WHERE `users`.`class` = '$class'");
	
	$questAmt = mysqli_query($con,$q);
	//$to_encode = mysqli_fetch_all($questAmt, MYSQLI_ASSOC);
	//echo json_encode($to_encode);	
	echo json_encode($questAmt);