<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
}
$IDArray = $_POST['data'];

    $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
    mysqli_select_db($con,'epiz_24668685_quizworld2');
    
    $IDArray = json_decode($IDArray, true);

     $sql1 = "SELECT q_ID,title,quest,ans1,ans2,ans3,ans4,reason,subj,sub from questions WHERE q_ID IN(";

    for($i = 0;$i<sizeof($IDArray);$i++)
    {
      if($i+1 == sizeof($IDArray)) $sql1 .= "'$IDArray[$i]')";
      else $sql1 .= "'$IDArray[$i]',";

    } 

    $result1 = mysqli_query($con, $sql1);
    $json = mysqli_fetch_all ($result1, MYSQLI_ASSOC);
    echo json_encode($json);


     //row1 is an array response from mysqli query, we get this baby back to the js call trouch echo
