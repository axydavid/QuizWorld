<?php
	$subjIDArray  = $_POST['subjIDArray'];
	$subjNameArray = $_POST['subjNameArray'];
	$subjSubd = $_POST['subjSubd'];
	$subjSubdID = $_POST['subjSubdID'];
	//session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	//echo(count($subjIDArray));
	$w = '';
	$q = "UPDATE `subjects` SET `subjName` = case  `subjects`.`subjID`";
      

	for($i=0;$i<count($subjIDArray);$i++)
	{
		if($subjIDArray[$i]!=$subjSubdID) $q .="when '$subjIDArray[$i]' then '$subjNameArray[$i]' ";
		else $w .= "UPDATE `subjects` SET `subjName` = '$subjNameArray[$i]', `subjSubd` = '$subjSubd' WHERE `subjects`.`subjID` = '$subjIDArray[$i]';";

	}
	$q .="end;";
	$queryresult = mysqli_query($con,$q);
	if($w !='')$queryresult = mysqli_query($con,$w);

	if($queryresult) echo "Success chaning values";
	else echo "error updating subjects:".$q;

	?>