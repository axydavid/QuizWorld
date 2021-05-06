<?php

session_start();


$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');


	$password = $_POST['pass1'];
	$class = $_SESSION['class'];
	$usr = $_SESSION['user'];

	// echo $username;
	// echo $password;

	$q = "UPDATE users SET pass = '$password' WHERE user = '$usr'";
	//"insert into users(usr_ID, user, pass, class, progObj) values ('$usrID','$username', '$password', '$class', '')";
	mysqli_query($con,$q);
	$_SESSION['pass'] = $password;
	$_SESSION['password'] = $password;
	header('location:adminPanel.php');

?>


