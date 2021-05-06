<?php
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
  // here comes your delete query: use $_POST['deleteItem'] as your id
  $delete = $_POST['deleteItem'];
  mysqli_query($con, "DELETE FROM `questions` where `q_id` = '$delete'");
  mysqli_query($con, "DELETE FROM `answers` where `ans_id` = '$delete'");
  
}
?> 