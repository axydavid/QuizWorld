<?php
 	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	$con->set_charset('utf8mb4');
	$q1 = $_POST['ans'];
	$ansR = $_POST['ansR'];
	$time = $_POST['time'];
	$date = $_POST['date'];
	//echo "hi".$q1;
	$usr_ID = $_SESSION['usr_ID'];
	$user = $_SESSION['username'];
	$pass = $_SESSION['pass'];
	$class = $_SESSION['class'];
	$subj = $_SESSION['subj'];
	$subjPrev = $_SESSION['subj'];
	$sub = $_SESSION['sub'];

	$quest = $_SESSION['questID'];
	$questPrev = $_SESSION['questID'];

	$finalresult = "SELECT `sessionID` FROM users WHERE `usr_ID` = '$usr_ID'";
	$queryresult = mysqli_query($con,$finalresult);
	$row = mysqli_fetch_assoc($queryresult);
	$sessionStuff = $row["sessionID"];
	if($sessionStuff != $_SESSION['sessionID']) {echo "<script type='text/javascript'>window.top.location='index.php?msg=switchpc';</script>"; exit;}
	$ansRcheck = 0;
	if($q1 == $ansR) $ansRcheck = 100;

	//$questAmt = $_SESSION['questAmt'];
if (isset($q1) && $subj !="Intro")
{
	$w = "SELECT MAX(ans_ID) FROM answers";
	$questAmt = mysqli_query($con,$w);
	if (mysqli_num_rows($questAmt) > 0) 
	{
		while($row2 = mysqli_fetch_assoc($questAmt)) 
		{
			$maxID = $row2["MAX(ans_ID)"] + 1;
		}
	}
	$finalresult = " insert into answers (ans_ID,q_ID,answer,ansR,time,usr_ID,usrName,usrPass,class,subj,sub,date) values ('$maxID','$quest','$q1','$ansR','$time','$usr_ID','$user','$pass','$class','$subj','$sub','$date') ";
	$queryresult = mysqli_query($con,$finalresult); 
}
	
	//Checks if user has already started the exam
	$getShuff = " SELECT `progObj` FROM `users` WHERE `usr_ID` = $usr_ID ";
	$queryresult = mysqli_query($con,$getShuff); 
	$table = mysqli_fetch_all($queryresult, MYSQLI_ASSOC);
	$progObj = $table[0]['progObj'];
	//echo("ARRAY: ".$progObj);

function getQuestionsID($con,$getS)
{
	//Here we'll get all the subjects from a class and shuffle them
	$getShuffSub = " SELECT `subjIDs`, `subj` FROM `classes` WHERE `class` = '$getS'  ";
	$queryresult = mysqli_query($con,$getShuffSub); 
	//$subjIDs = mysqli_fetch_assoc($queryresult);
	while($row = mysqli_fetch_assoc($queryresult)) {
		$subjIDs= $row["subjIDs"];
		$subjs= $row["subj"];
    }
	// $subjIDs = $subjIDs[0];
	// $subjIDs = $subjIDs["subjIDs"];
	$subjIDs = str_split($subjIDs);
	$subjIDs = implode("",$subjIDs);
	$subjIDsArray = explode(',', $subjIDs);
	$subjIDsArray = array_filter($subjIDsArray);

	$subjs = str_split($subjs);
	$subjs = implode("",$subjs);
	$subjsArray = explode(',', $subjs);
	$subjsArray = array_filter($subjsArray);
	//shuffle($subjIDsArray);
	return array($subjIDsArray, $subjsArray);
}

function getSubNames($con,$getS)
{
	//Here we'll get all the subs from an subject and shuffle them
	$getShuffSub = " SELECT `subjSubd` FROM `subjects` WHERE `subjID` = '$getS' ";
	$queryresult = mysqli_query($con,$getShuffSub); 
	$subIDs = mysqli_fetch_all($queryresult, MYSQLI_ASSOC);
	$subIDs = $subIDs[0];
	$subIDs = $subIDs["subjSubd"];
	$subIDs = str_split($subIDs);
	$subIDs = implode("",$subIDs);
	$subArray = explode(',', $subIDs);
	$subArray = array_filter($subArray);
	shuffle($subArray);
	return $subArray;
}

function getQuestIDs($con,$getS)
{
	//Here we'll get all questions from a sub and shuffle the questions
	$getShuffSub = " SELECT `q_ID` FROM `questions` WHERE `sub` = '$getS' ";
	$queryresult = mysqli_query($con,$getShuffSub); 
	$i=0;
	while($row = mysqli_fetch_assoc($queryresult)) {
		$questArray[$i]= (int)$row["q_ID"];
		$i++;
    }
	$questArray = array_filter($questArray);
	shuffle($questArray);
	return $questArray;
}
	
	if(empty($progObj))
	{
		//echo json_encode($progObj);
		$allSubjsArray = getQuestionsID($con,$class);
		$subjIDsArray = $allSubjsArray[0];
		$subjArray = $allSubjsArray[1];

		$subj = $subjIDsArray[1];//nr 0 is intro subject
		$subArray = getSubNames($con,$subj);
		$sub = $subArray[0];
		$questArray = getQuestIDs($con,$sub);
		$quest = $questArray[0];
		$questKey = 0;
		$subKey = 0;
		$subjKey = 1;
		$questAmt = 0;

	} else
	{
		$newObj = json_decode($progObj);
		$questKey = $newObj->questKey;
		$subKey = $newObj->subKey;
		$subjKey = $newObj->subjKey;
		$questArray = $newObj->questArray;
		$subArray = $newObj->subArray;
		$subjIDsArray = $newObj->subjIDsArray;
		$subjArray = $newObj->subjArray;
		$questAmt = $newObj->questAmt;
		$ansRArray =$newObj->ansRArray;


		$questKey = array_search($quest, $questArray);
		$questKey++;
		$changeSub = 0;
		if($questKey >= count($questArray))
		{
			for($i=0;$i<count($subArray);$i++)
			{
				if($sub==$subArray[$i])
				{
					$subKey = $i;
					break;
				}
			}
			//$subKey = array_search($sub, $subArray);
			$subKey++;
			$questKey = 0;
			$changeSub = 1;
		}

		if($subKey >= count($subArray)) 
		{
			for($i=0;$i<count($subjIDsArray);$i++)
			{
				if($subj==$subjIDsArray[$i])
				{
					$subjKey = $i;
					break;
				}
			}
			//$subjKey = array_search($subj, $subjIDsArray);
			$subjKey++;
			$subKey = 0;
			$changeSub = 2;
		}

		if($subjKey >= count($subjIDsArray)) 
		{
			$finalresult = " UPDATE users SET `progObj` = '', `exam` = '0', `examDate` = '' WHERE `usr_ID` = '$usr_ID' ";
			$queryresult = mysqli_query($con,$finalresult); 
			$_SESSION['questID'] = 1;
			header('location:goodbye.php');
			exit("exam ended");
		}


		if($changeSub==2)
		{
			$subj = $subjIDsArray[$subjKey];
			$subArray = getSubNames($con,$subj);// gets all random Sub from subjectID 		subjID->subNameArray[i]
			$_SESSION['subj'] = $subj;
			$questAmt=0;
		}

		if($changeSub>0)
		{
			$sub = $subArray[$subKey];
			$questArray = getQuestIDs($con,$sub);//gets all random questionsID from the Sub 	Sub	Name-> q_ID
			$_SESSION['sub'] = $sub;
		}
		$changeSub=0;
		$quest = $questArray[$questKey];
		//echo $quest;

		//please note that we use subject ID, Subdivision NAME, question ID, but all of them are in arrays which have theyr own key
	}
	$questAmt++;
	if( $questKey == 1 && $subKey == 0) $ansRArray = [];
	if($questPrev =="1") 
	{
		$ansRArray = [];
		$ansRcheck = 0;
	}
	array_push($ansRArray, $ansRcheck);
	$myObj = new \stdClass();
	$myObj->subjIDsArray = $subjIDsArray;
	$myObj->subjArray = $subjArray;
	$myObj->subArray = $subArray;
	$myObj->questArray = $questArray;
	$myObj->subjKey = $subjKey;
	$myObj->subKey = $subKey;
	$myObj->questKey = $questKey;
	$myObj->questAmt = $questAmt;
	$myObj->quest = $questPrev;
	$myObj->ansRArray = $ansRArray;
	$myObj->ansTime = date("Ymd")+date("H")*60 + date("i");

	$serializedObject = json_encode($myObj);
	//echo("ARRAY insert: ".$serializedObject." \n");
	if($questArray[0]==null) echo "If you see this ugly message it probally means that: \nSubject: ".$subjArray[$subjKey]." Subdivision: ".$subArray[$subKey]." \nhas no questions recoded. \nTeacher check question list page.";
	$finalresult = " UPDATE users SET `progObj` = '$serializedObject' WHERE `usr_ID` = '$usr_ID' ";
	$queryresult = mysqli_query($con,$finalresult); 
	
	if(!$queryresult)
	{
		//echo "Data not saved:'$ans_ID','$q1','5','$usr_ID'";
		//echo mysqli_error($con);
	}
	else{
		//success
		//$e = $_SESSION['questAmt'];
	}

	$_SESSION['questID'] = $quest;
	$_SESSION['sub'] = $sub;
	//$_SESSION['questAmt'] = $questAmt;
	echo $serializedObject;
	//header('location:home.php');	
    ?>