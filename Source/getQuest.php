<?php
session_start();
   
    $i =  $_POST['questID']; //this will get the question ID as set already by check.php
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
    $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
    mysqli_select_db($con,'epiz_24668685_quizworld2');
      
      $i = $_SESSION['questID'];
      $sql1 = "SELECT * FROM `questions` WHERE `q_ID` = $i ";
      $result1 = mysqli_query($con, $sql1);
      if(!$result1) header('location:check.php');
      $row1 = mysqli_fetch_assoc($result1);
      $_SESSION['subj'] = $row1['subj'];
      $_SESSION['sub'] = $row1['sub'];

      echo json_encode($row1);//row1 is an array response from mysqli query, we get this baby back to the js call trouch echo