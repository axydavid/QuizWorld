<?php

session_start();
// $usr_ID = $_SESSION['usr_ID'];
// $finalresult = " UPDATE users SET `progObj` = '' WHERE `usr_ID` = '$usr_ID' ";
// $queryresult = mysqli_query($con,$finalresult); 
session_destroy();

header('location:index.php');


?>