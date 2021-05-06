<?php
	$subjIDArray  = $_POST['subjIDArray'];
	$subjNameArray = $_POST['subjNameArray'];
	$subjSubd = $_POST['subjSubd'];
	$subjSubdID = $_POST['subjSubdID'];
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	//echo(count($subjIDArray));

	$q ="";
	
	for($i=0;$i<count($subjIDArray);$i++)
	{
		if($subjIDArray[$i]!=$subjSubdID) $q .= "UPDATE `subjects` SET `subjName` = '$subjNameArray[$i]' WHERE `subjects`.`subjID` = '$subjIDArray[$i]';";
		else $q .= "UPDATE `subjects` SET `subjName` = '$subjNameArray[$i]', `subjSubd` = '$subjSubd' WHERE `subjects`.`subjID` = '$subjIDArray[$i]';";
		
	}

	if (mysqli_multi_query($con,$q))
	{
	do
		{
		// Store first result set
		if ($result=mysqli_store_result($con)) {
		// Fetch one and one row
		while ($row=mysqli_fetch_row($result))
			{
				printf("%s\n",$row[0]);
			}
		// Free result set
		mysqli_free_result($result);
		}
		}
	while (mysqli_next_result($con));
	}
	else
	{
		printf(mysqli_error($con));
		printf($q);
	}

	?>