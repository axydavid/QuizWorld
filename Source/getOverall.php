<?php
session_start();
   
    $i =  $_POST['data']; //this will get the question ID as set already by check.php
    $type = $_POST['type'];
    $date = $_POST['date'];
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
    $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
    mysqli_select_db($con,'epiz_24668685_quizworld2');
      
    if($type == "class") $sql1 = "SELECT * FROM `answers` WHERE `class` = '$i' AND `date` = '$date' ORDER BY `answers`.`subj` ASC, `answers`.`sub` ASC";
    else if($type == "usrID" || $type == "usr_ID") $sql1 = "SELECT * FROM `answers` WHERE `usr_ID` = '$i' AND `date` = '$date' ORDER BY `answers`.`subj` ASC, `answers`.`sub` ASC";
    else if($type == "all") $sql1 = "SELECT * FROM `answers` WHERE `date` = '$date' ORDER BY `answers`.`subj` ASC, `answers`.`sub` ASC";
    //echo("usr: ".$sql1);

    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    echo json_encode($row1);//row1 is an array response from mysqli query, we get this baby back to the js call trouch echo