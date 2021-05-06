<?php 

	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100','epiz_24668685_quizworld2');
	//mysqli_select_db($con,'epiz_24668685_quizworld2');
	if(!$con){
		echo 'error connection: ' . mysqli_connect_error();
	}
	$get = mysqli_query($con,"SELECT class,classID FROM classes");
	$option = '';
	 while($row = mysqli_fetch_assoc($get))
	{
	  if($row['class']!="Admin")$option .= '<option value = "'.$row['class'].'">'.$row['class'].'</option>';
	}
	if(!empty($_GET['msg'])) 
	{
		$msg = $_GET['msg'];
		
		if($msg == "switchpc") 
		{
			if(session_status() == PHP_SESSION_ACTIVE) session_destroy();
		}
	}

?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>

	<link  href="dist/fonts/gfonts.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(3).css">
	<script src="dist/js/jquery-1.12.4.min.js"></script>

	<script src="dist/js/popper.min.js"></script>
	 
	<!-- <link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css"> -->
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/jquery-ui.min.js"></script>
	<script src="dist/js/jquery.backstretch.min.js"></script>

	<!-- <script src="https://SortableJS.github.io/Sortable/Sortable.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script> -->
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<!-- 
	 font-family: 'Montserrat', sans-serif; 
	font-family: 'Open Sans', sans-serif;
	-->
	<!-- <style type="text/css">
	html{
		background: linear-gradient(199deg, #1eb1f6, #ac34f7, #ffc800);
		background-size: 600% 600%;
		animation: Infinity 30s ease infinite;
	}


@keyframes Infinity {
    0%{background-position:0% 50%}
    50%{background-position:100% 51%}
    100%{background-position:0% 50%}
}
	</style> -->
</head>
<body style="display:grid">

	<div id="containah" style="display: flex;height: 100%;">

		<div class="row">
			<h3 class="text-center" style="color:white;	width: 100%;font-size: 32px;text-shadow: 1px 1px 3px black;"> Aircraft maintenance mock test </h3><br>

			<div class="col-lg-6" style="margin-left: auto;margin-right: auto;">
				<div class="card">
					<h4 class="card-header text-center"> Login </h4>
					<form action="login.php" style="margin-bottom: 0.75rem;" method="post">
						<div class="form-group">
							<input id="nameInput" autocomplete="off" autocapitalize="word" type="text" name="user" id="user" placeholder="Your Name" class="form-control">
						</div>
						<div class="form-group">
							<input id="passInput" autocomplete="off"  autocapitalize="word" type="password" name="pass" id="pass" placeholder="Password" class="form-control">
						</div>
						<button class="btn btn-success d-block m-auto" type="submit"> Sign In </button>
					</form>
				
				</div>
			</div>

			<!-- <div class="col-lg-6">
				<div class="card">
					<h4 class="card-header text-center"> Register </h4>
					<br>
					<form action="registration.php" style="margin-bottom: 0.75rem;" method="post">
						<div class="form-group">
							<input autocapitalize="word" type="text" name="user" placeholder="First Name" id="user" class="form-control">
						</div>
						<div class="form-group">
							<input autocapitalize="word" type="text" name="pass" placeholder="Last Name" id="pass" class="form-control">
						</div>
						<select name="class" class="custom-select"style="margin-left: 20px;max-width: 361px;background-color: transparent;filter: invert();border-color: black;color: black;font-size: 19px;margin-bottom: 1rem !important;"> 
						<?php echo $option; ?>
						</select>
						<button class="btn btn-success d-block m-auto" type="submit"> Register </button>
						<div class="duplicate"> </div>
					</form>

				</div>
			</div> -->
				</div>
			</div>

		


</body>
<script>
	$("#passInput").hide();
    $.backstretch([
		'background/1 (0).jpg',
		'background/1 (1).jpg',
		'background/1 (2).jpg',
		'background/1 (3).jpg',
		'background/1 (4).jpg',
		'background/1 (5).jpg',
		'background/1 (6).jpg',
		'background/1 (7).jpg',
		'background/1 (8).jpg',
		'background/1 (9).jpg',
		'background/1 (10).jpg',
		'background/1 (12).jpg',
		'background/1 (13).jpg',
		'background/1 (14).jpg'
      ], {
        fade: 750,
        duration: 10000,
        preload: 1, //Use the lazy-loading functionality
        start: 0 //Optional - now starts with "dome.jpg"
    });
	// $(document).ready(function() {
	// });
	$(window).on("backstretch.after", function (e, instance, index) {
		//$('.backstretch-item').animate({zoom: '110%'},15000);
		$('.backstretch-item').css("transform","scale(1.05)");
	});
	// $("#passInput").focus(function(){
	// 	var usrValue = $("#nameInput").val().toLowerCase();
	// 	if (usrValue == "admin")
	// 	{
	// 		this.type = 'password';
	// 	}
	// 	else if (usrValue == "teacher")
	// 	{
	// 		this.type = 'password';
	// 	}
	// 	else
	// 	{
	// 		this.type = 'text';
	// 		this.
	// 	}
	// });
	var msg = "<?php if(!empty($_GET['msg']))echo $_GET['msg']; ?>";

	if(msg == "nousr")
	{
		var nr = Math.floor(Math.random() * 10);
		var str2 ='';
		if(nr == 0) str2 = 'perhaps you should learn to type your own name?';
		else if(nr == 1) str2 = 'truly truly I say unto you, try again and you will eventually succeed.';
		else if(nr == 2) str2 = 'please try again.';
		else if(nr == 3) str2 = 'type it again, carefully!';
		else if(nr == 4) str2 = 'you should consider getting new glasses so you can type it correctly.';
		else if(nr == 5) str2 = 'type your name again.';
		else if(nr == 6) str2 = 'ask your teacher to type your name for you if you cannot do it yourself.';
		else if(nr == 7) str2 = 'your turret has been destroyed, DEFEAT! JK try again.';
		else if(nr == 8) str2 = 'if you keep getting this message contact your teacher, perhaps your name has not been registered.';
		else if(nr == 9) str2 = "perhaps your name exists, perhaps not, it's a mystery, try again so you can figure it out!";
		var str = '<div style="position: absolute;width: 100%;display: flex;"><div style="width: max-content;margin: auto;margin-top: 1em;background-color: #FF4136DB;" class="alert alert-dismissible alert-danger"><button type="button" class="close">&times;</button>This name cannot be found, '+str2+'</div></div>';
		$("#containah").prepend(str);
	}
	else if(msg == "switchpc")
	{
		var str ='<div style="position: absolute;width: 100%;display: flex;"><div style="width: max-content;margin: auto;margin-top: 1em;background-color: #FF4136DB;" class="alert alert-dismissible alert-danger"><button type="button" class="close">&times;</button>You have signed in to another computer, so I have signed you out from this one.</div></div>';
		$("#containah").prepend(str);
	}

	$("#nameInput").on('keyup', function (e) {
		var usrValue = $("#nameInput").val().toLowerCase();
		if (usrValue == "admin")
		{
			$("#passInput").show(500);
			$("#passInput").focus();

		}
		else if (usrValue == "teacher")
		{
			$("#passInput").show(500);
			$("#passInput").focus();
		}
		else
		{
			$("#passInput").hide(500);
		}
	});

		$(".alert button.close").click(function (e) {
		$(this).parent().fadeOut(1000);
	});
	</script>
</html>