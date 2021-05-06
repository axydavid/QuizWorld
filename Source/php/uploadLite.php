<?php
$q_ID  = $_POST['q_ID'];
$output_dir = "img" . $q_ID . "/";
$fileName = "1.jpg";

$con = mysqli_connect('localhost','id11289665_admin','avi200100');
$q = ("UPDATE `questions` SET `img` = concat(ifnull(`img`,''), '$output_dir.$fileName,') where `q_ID` = '$q_ID';");
$questAmt = mysqli_query($con,$q);
echo json_encode($questAmt);
?>