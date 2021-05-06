<?php
  	ob_start();
	session_start();
	//session_destroy();
	$_SESSION['questID'] = 1;
	
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100','epiz_24668685_quizworld2');
	//mysqli_select_db($con,'epiz_24668685_quizworld2');
	if($con->connect_error){
		echo "Connection failed:";
	}

	$username = $_POST['user'];
	$password = $_POST['pass'];

	$q = "select * from users where user = '$username' && pass='$password'";

	$result = mysqli_query($con,$q);
	try{$row = mysqli_num_rows($result);} catch(exception $e) {$row = false;}

	if($row == true){
		$_SESSION['username'] = $username;
		$_SESSION['user'] = $username;
		$_SESSION['name'] = $username;
		$_SESSION['pass'] = $password;
		$_SESSION['password'] = $password;
		$_SESSION['surname'] = $password;
		while($row1 = mysqli_fetch_assoc($result)) 
		{
			$usr_ID = $row1["usr_ID"];
			$_SESSION['usr_ID'] = $usr_ID;
			$_SESSION['usrID'] = $usr_ID;
			$_SESSION['class'] = $row1["class"];
			$_SESSION['min'] = $row1["minutes"];
			$_SESSION['minutes'] = $row1["minutes"];


			$progObj = json_decode($row1["progObj"]);
			

			if(!empty($progObj))
			{
				$ansTime = $progObj->ansTime;
				$curTime = date("Ymd") + date("H")*60 + date("i");
				$timeDif = $curTime - $ansTime;
				

				if($timeDif > 60)
				{
					$finalresult = " UPDATE users SET `progObj` = '' WHERE `usr_ID` = '$usr_ID' ";
					$queryresult = mysqli_query($con,$finalresult);
					$progObj = ""; 
				}
			}
			$_SESSION['prog'] = $progObj;
			$_SESSION['progObj'] = $progObj;

			if($row1["exam"] == 1)
			{
				$curTime = date("Ymd") + date("H")*60 + date("i");
				$timeDif = $curTime - $row1["examDate"];

				if($timeDif > 60) 
				{
					$finalresult = " UPDATE users SET `exam` = '0',`examDate` = '' WHERE `usr_ID` = '$usr_ID' ";
					$queryresult = mysqli_query($con,$finalresult);
				}
				else if($_SESSION['class']!="Admin")
				{
					//header('location:homeExam.php');
					exit();
				}


			}

		}
		$random = session_id();
		$finalresult = " UPDATE users SET `sessionID` = '$random' WHERE `usr_ID` = '$usr_ID' ";
		$queryresult = mysqli_query($con,$finalresult);
		if($queryresult) $_SESSION['sessionID'] = $random;
		if($_SESSION['class']=="Admin") header('location:admin.php');
		//else header('location:home.php');	
		exit();
	}
	else
	{
		header('location:index.php?msg=nousr');
		exit();
	}
	//echo("<script>location.href = '".ADMIN_URL."/index.php?msg=$msg';</script>");
	ob_end_flush();
?>