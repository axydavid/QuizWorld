<?php 
$_SESSION['usr_LVL'] = 0;
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	
	if ($_SESSION['class']!= "Admin") 
	{
		header('location:home.php');
    }
    
	$get = mysqli_query($con,"SELECT class,classID FROM classes");
	$option = '';
	 while($row = mysqli_fetch_assoc($get))
	{
        if($row['class']=="Default") continue;
        if($row['class']=="Admin") continue;
      
      $option .= '<option value = "'.$row['class'].'">'.$row['class'].'</option>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel - Admin Panel</title>
<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery-1.12.4.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<!-- <script src="https://SortableJS.github.io/Sortable/Sortable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link  href="dist/fonts/gfonts.css" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="background: linear-gradient(160deg, #1eb1f6 0%, #1eb1f6 42%, #ac34f7 70%, #ac34f7 100%);background-clip: border-box;-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512" style="position: relative;margin-right: -3px;top: -1px;">
        <defs>
    <radialGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:#ac34f7;stop-opacity:1"></stop>
      <stop offset="100%" style="stop-color:#1eb1f6;stop-opacity:1"></stop>
    </radialGradient>
  </defs><path fill="url(#grad1)" d="M256 48C141.6 48 48 141.6 48 256s93.6 208 208 208 208-93.6 208-208S370.4 48 256 48zm0 62.4c34.3 0 62.4 28.1 62.4 62.4s-28.1 62.4-62.4 62.4-62.4-28.1-62.4-62.4 28.1-62.4 62.4-62.4zm0 300.4c-52 0-97.8-27-124.8-66.6 1-41.6 83.2-64.5 124.8-64.5s123.8 22.9 124.8 64.5c-27 39.5-72.8 66.6-124.8 66.6z"></path></svg>&nbsp;<?php echo ucfirst($_SESSION['name']);?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="input.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -3px;"><path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z";/></svg>Input</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="analytics.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;left:2px;top: -3px;"><path d="M288 48H136c-22.092 0-40 17.908-40 40v336c0 22.092 17.908 40 40 40h240c22.092 0 40-17.908 40-40V176L288 48zm-16 144V80l112 112H272z"/> </svg> Reports</a>
	  </li>

      <li class="nav-item active">
        <a class="nav-link" href="adminPanel.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512" style="position: relative;left:2px;top: -2px;"><path xmlns="http://www.w3.org/2000/svg" d="M256 256c52.805 0 96-43.201 96-96s-43.195-96-96-96-96 43.201-96 96 43.195 96 96 96zm0 48c-63.598 0-192 32.402-192 96v48h384v-48c0-63.598-128.402-96-192-96z" fill="#343a40" style="opacity: 1;"/></svg> Admin Panel<span class="sr-only">(current)</span></a>
	  </li>

      <li class="nav-item align-right">
        <a class="nav-link" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="position: relative;top: -2px;"><path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0 1.41zM19 3H5c-1.11 0-2 .9-2 2v3c0 .55.45 1 1 1s1-.45 1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
        <path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0" fill="#343a40"></path>
      </svg> Log Out</a>
      </li>
    </ul>
  </div>
		</nav>
<!-- <input type="button" value="Save" onclick="save();"> -->
<div class="container specialContainer" style="margin-top: 15px;max-width:min-content">
<div class="specialContainer"style="padding-left: 25px;display: flex;">
<div style="width:min-content;padding-right:25px">
    <p style="position: relative;left: 5px;opacity: .8;">Register student:</p>
    <form action="registration.php" onsubmit="return checkUsr(this);" style="margin-bottom: 0.75rem;" method="post">
        <div class="form-groupz">
            <input id='addInput' autocapitalize="word" type="text" name="user" placeholder="Full Name" id="user" class="form-control">
        </div>
        <!-- <div class="form-groupz">
            <input id='addInput' autocapitalize="word" type="text" name="pass" placeholder="Last Name" id="pass" class="form-control">
        </div> -->
        <select name="class" class="custom-select"style="height: auto;width: 227px;display: initial;padding: 2px;padding-left: 2px;padding-left: 5px;margin-bottom:5px"> 
        <?php echo $option; ?>
        </select>
        <button class="btn btn-success d-block" type="submit"> Register </button>
        <div class="duplicate"> </div>
    </form>
    </div>
<div style="width:min-content;padding-right:25px">
<p style="position: relative;left: 5px;opacity: .8;">Change your password:</p>
    <form action="changePassword.php" onsubmit="return checkPass(this);" style="margin-bottom: 0.75rem;" method="post">
        <div class="form-groupz">
            <input id='addInput' autocapitalize="word" type="text" name="oldPass" placeholder="Current Password" id="oldPass" class="form-control">
        </div>
        <div class="form-groupz">
            <input id='addInput' autocapitalize="word" type="text" name="pass1" placeholder="New Password" id="pass1" class="form-control">
        </div>
        <div class="form-groupz">
            <input id='addInput' autocapitalize="word" type="text" name="pass2" placeholder="Repeat New Password" id="pass2" class="form-control">
        </div>
        <button class="btn btn-success d-block" type="submit"> Change Password </button>
        <div class="duplicate"> </div>
    </form>
</div>

</div>
<script>
    var curPass = <?php echo json_encode($_SESSION['password']) ?>;
function checkPass(theForm) {
    if (theForm.pass1.value != theForm.pass2.value)
    {
        alert('The new password doesn\'t match!');
        return false;
    } 
    else if (theForm.oldPass.value != curPass)
    {
        alert('Your current password is wrong!');
        return false;
    }
    else if (theForm.pass1.value == "")
    {
        alert('Your new password is empty!');
        return false;
    }
    else {
        return true;
    }
}
function checkUsr(theForm) {
    if (theForm.user.value == "")
    {
        alert('The students full name is empty!');
        return false;
    }

    else {
        return true;
    }
}
</script>
</body>
</html>