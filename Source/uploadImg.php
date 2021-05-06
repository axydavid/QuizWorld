<?php
$q_ID  = $_POST['q_ID'];
$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
mysqli_select_db($con,'epiz_24668685_quizworld2');
$q_ID2 = $q_ID;
$output_dir = "img" . $q_ID2 . "/";
if (!file_exists($output_dir)) {
    mkdir($output_dir, 0777, true);
}
if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
		$randNr = rand();
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$randNr.$fileName);
		$ret[]= $randNr.$fileName;
		$q = ("UPDATE questions SET img = concat(ifnull(img,''), '$output_dir$randNr$fileName,') where q_ID = '$q_ID'");
		$questAmt = mysqli_query($con,$q);
	}
	else  //Multiple files, file[]
	{
	  $randNr = rand();
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$randNr.$fileName);
		  $ret[]= $randNr.$fileName;
		  $q = ("UPDATE questions SET img = concat(ifnull(img,''), '$output_dir$randNr$fileName,') where q_ID = '$q_ID'");
		  $questAmt = mysqli_query($con,$q);
	  }
	
	}



    echo json_encode($questAmt);
 }

 ?>