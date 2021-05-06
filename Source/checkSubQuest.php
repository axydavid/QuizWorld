<?php
session_start();
   
    $subjArray =  json_decode($_POST['subj']); //this will get the question ID as set already by check.php
    $subArray = json_decode($_POST['sub']);
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }

    $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
    mysqli_select_db($con,'epiz_24668685_quizworld2');
   $targetSubj = [];
   for($i=0;$i<count($subjArray);$i++) 
   {
    $sql1 = "SELECT DISTINCT `sub` FROM `questions` WHERE `subj` = '$subjArray[$i]'"; 
    $result1 = mysqli_query($con, $sql1);
    if(gettype($result1)!='boolean')
    {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
        {
            // echo $row1['COUNT(*)'].' : ';
            if (!in_array($row1['sub'], $subArray[$i]))
            {
                $curSub = $row1['sub'];
                $curSubArray = $subArray[$i];
                $sql1 = "UPDATE `questions` SET `sub` = '$curSubArray[0]' WHERE `sub` = '$curSub' AND `subj` = '$subjArray[$i]'";
                $result1 = mysqli_query($con, $sql1);
            }
        }
    }

    $targetSub = '';
    for($q=0;$q<count($subArray[$i]);$q++) 
    {
        $curSubArray = $subArray[$i];
        $curSub = $curSubArray[$q];
        $sql1 = "SELECT COUNT(*) FROM `questions` WHERE `sub` = '$curSub' AND `subj` = '$subjArray[$i]'"; 
        $result1 = mysqli_query($con, $sql1);
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
        {
            // echo $row1['COUNT(*)'].' : ';
           if ($row1['COUNT(*)']==0) $targetSub .=$curSub.',';
        }
    }
    if($targetSub != '')array_push($targetSubj,'<b>'.substr_replace($targetSub, "", -1).'</b> of subject <b>'.$subjArray[$i].'</b>');
   }


    echo json_encode($targetSubj);//row1 is an array response from mysqli query, we get this baby back to the js call trouch echo