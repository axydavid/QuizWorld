<?php
	$q_ID  = $_POST['q_ID'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$q = ("SELECT img FROM questions WHERE q_ID ='$q_ID'");
    $questAmt = mysqli_query($con,$q);
    echo json_encode($questAmt);
