<?php
session_start();
   
  $i =  $_POST['data']; //this will get the question ID as set already by check.php
  $type = $_POST['type'];
  if(!isset($_SESSION['username'])){
  header('location:index.php');
  }
  
  $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
  mysqli_select_db($con,'epiz_24668685_quizworld2');
    
  if($type == "class") $sql1 = "SELECT `date` FROM `answers` WHERE `class` = '$i' ORDER BY `answers`.`date` DESC";
  else if($type == "all") $sql1 = "SELECT `date` FROM `answers` ORDER BY `answers`.`date` DESC";
  else $sql1 = "SELECT `date` FROM `answers` WHERE `usr_ID` = '$i' ORDER BY `answers`.`date` DESC";


  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

  echo json_encode($row1);  //row1 is an array response from mysqli query, we get this baby back to the js call trouch echo