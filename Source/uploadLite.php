<?php
$q_ID  = $_POST['q_ID'];
$output_dir = "img" . $q_ID . "/";
$fileName = "1.jpg";

$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
mysqli_select_db($con,'epiz_24668685_quizworld2');

$q = ("UPDATE questions SET img = '' where q_ID = '$q_ID'");
$query = mysqli_query($con,$q);

$files = glob($output_dir.'*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

mysqli_error($con);
echo json_encode($query);

?>