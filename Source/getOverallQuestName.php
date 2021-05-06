<?php
session_start();
   
    // $i =  $_POST['data']; //this will get the question ID as set already by check.php
    // $type =  $_POST['type'];
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
    $con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
    mysqli_select_db($con,'epiz_24668685_quizworld2');
    
    //if($i = "" || $i == "*") $sql1 = "SELECT * FROM `answers` ORDER BY `answers`.`subj` ASC, `answers`.`sub` ASC";
    $sql1 = "SELECT DISTINCT `title` FROM `questions` ORDER BY `questions`.`title` ASC";
    //else $sql1 = "SELECT `usr_ID`,`user`,`pass` FROM `users` WHERE `user` LIKE '%$i%' OR `pass` LIKE '%$i%' ORDER BY `users`.`user` ASC, `users`.`pass` ASC";
    //echo $sql1;
      $result1 = mysqli_query($con, $sql1);
      if(!$result1) echo mysqli_error($con);
      else 
      {
        $row1 = [];
        //$row1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        while($row2 = mysqli_fetch_assoc($result1)) 
        {
            //$row1[$z]->type = 'usr_ID';
            $words = explode(" ", $row2["title"]);
            $acronym = "";
              foreach ($words as $w) 
              {
                
                if(strlen($w) > 0)$acronym .=  $w[0];
              }
              $row2["initials"] = strtoupper($acronym." -");
              if ($row2["title"] =="")
              {
                $row2["title"] = 'Unset Name }';
                $row2["initials"]='{';
              }
              array_push($row1,$row2);
            }
        $str = ucwords(strtolower(json_encode($row1)));
        echo $str;
        // 
      }
