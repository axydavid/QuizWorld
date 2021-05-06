<?php

session_start();
$_SESSION['questID'] = 1;

//header('location:index.php');

$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');


	$username = $_POST['user'];
	//$password = $_POST['pass'];
	$class = $_POST['class'];
	

	// echo $username;
	// echo $password;

	$check = "select * from users where user='$username'";
	$resultcheck = mysqli_query($con,$check);	

	 $row = mysqli_num_rows($resultcheck);
		if($row == 1)
		{
		
			
		}	
		else
		{

			$w = "SELECT MAX(usr_ID) FROM users";
			$questAmt = mysqli_query($con,$w);
			if (mysqli_num_rows($questAmt) > 0) 
			{
				while($row2 = mysqli_fetch_assoc($questAmt)) 
				{
					$maxID = $row2["MAX(usr_ID)"] + 1;
				}
			}

			$q = "insert into users(usr_ID, user, pass, class, progObj) values ('$maxID','$username', '', '$class', '')";
			$s = mysqli_query($con,$q);
	
			$q1 = "select * from users where user = '$username'";
			$e = "SELECT COUNT(q_id) FROM questions";

			$result = mysqli_query($con,$q1);
			$questAmt = mysqli_query($con,$e);

			if (mysqli_num_rows($questAmt) > 0) 
			{

			}

			$row = mysqli_num_rows($result);
			header('location:adminPanel.php');
		}
?>


