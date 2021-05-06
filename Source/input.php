<?php 
$_SESSION['class'] =  "Admin";
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	
	if ($_SESSION['class']!= "Admin") 
	{
		header('location:home.php');
	}
	$q = ("SELECT * FROM subjects WHERE subjID <> 3");
	
	$get = mysqli_query($con,$q);
	$option = '';

	while($row = mysqli_fetch_assoc($get))
	{    
      $option .= '<option value = "'.$row['subjName'].'">'.$row['subjName'].'</option>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel - Questions</title>
	<script src="dist/js/jquery-1.12.4.min.js"></script>
	<script src="dist/js/popper.min.js"></script>
	<link  href="dist/fonts/gfonts.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
	<link href="dist/css/tabulator.css" rel="stylesheet">
	<link href="dist/css/jquery-ui.css" rel="stylesheet">
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/jquery-ui.min.js"></script>
	<script src="dist/js/jquery.backstretch.min.js"></script>
	<script type="text/javascript" src="dist/js/tabulator.js"></script>
	<link rel="stylesheet" href="dist/css/simpleLightbox.css">
	<script src="dist/js/simpleLightbox.js"></script>
	<script src="dist/js/noback.js"></script>

	<!-- <link href="../dist/css/uploadfile.css" rel="stylesheet">
	<script src="../dist/js/jquery.uploadfile.js"></script> -->


	<!-- <link rel="stylesheet" href="dist/css/bootstrap/bootstrap(3).css"> -->

	 
	<!-- <link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css"> -->

<!-- 
	 font-family: 'Montserrat', sans-serif; 
	font-family: 'Open Sans', sans-serif;
	-->

</head>
<body>
<!-- <div id="overlay-back"></div> -->

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
	<li class="nav-item active">
        <a class="nav-link" href="input.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -3px;"><path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z" fill="#343a40";/></svg>Input<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="analytics.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;left:2px;top: -3px;"><path d="M288 48H136c-22.092 0-40 17.908-40 40v336c0 22.092 17.908 40 40 40h240c22.092 0 40-17.908 40-40V176L288 48zm-16 144V80l112 112H272z" style="opacity: 0.8;"/> </svg> Reports</a>
	  </li>

      <li class="nav-item">
        <a class="nav-link" href="adminPanel.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512" style="position: relative;left:2px;top: -2px;"><path xmlns="http://www.w3.org/2000/svg" d="M256 256c52.805 0 96-43.201 96-96s-43.195-96-96-96-96 43.201-96 96 43.195 96 96 96zm0 48c-63.598 0-192 32.402-192 96v48h384v-48c0-63.598-128.402-96-192-96z" style="opacity: 0.8;"/></svg> Admin Panel</a>
	  </li>

      <li class="nav-item align-right">
        <a class="nav-link" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="position: relative;top: -2px;"><path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0 1.41zM19 3H5c-1.11 0-2 .9-2 2v3c0 .55.45 1 1 1s1-.45 1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
        <path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0" fill="#343a40"></path>
      </svg> Log Out</a>
      </li>
    </ul>
  </div>
		</nav>
		<p id='parr' class="alert alert-danger" style="text-align: center;margin-top:1rem;margin-left:auto;margin-right:auto;width: max-content;display:none;"></p>
		<div id='containah' class="container specialContainer" style="margin-top: 15px;width: min-content;">
		<div style="background: linear-gradient(white,transparent);height:120px;z-index:1">
		</div>
		<div style="position:relative;top:-119px;z-index: -1;height: 0;">
			<table id="prevTab" style="width:100%;height: 120px;">
				<tr style="margin-bottom: auto"></tr>
			</table>
		</div>
		
		<div style="display: flex;margin-bottom: -5px;">
			<input id="nameInput" type="text" class="form-control" placeholder="Full Name" style="height: 27.5px;float:right;margin-right:0px;width:250px;padding: 0.5rem;"disabled='true'>
			<input id="scrInput" type="text" class="form-control" placeholder="Scr" style="height: 27.5px;float:right;margin-right:0px;width:35px;padding: 0.5rem;margin-left:.5em">
			<input id="maxInput" type="text" class="form-control" placeholder="Max" style="height: 27.5px;float:right;margin-right:0px;width:35px;padding: 0.5rem;margin-left:.5em">
			<input id="grdInput" type="text" class="form-control" placeholder="Grd" style="height: 27.5px;float:right;margin-right:0px;width:35px;padding: 0.5rem;margin-left:.5em;"disabled='true'>
			<select id='typeInput' name="class" class="custom-select"style="height: 45px;width: 85px;display: initial;padding: 2px;padding-left: 2px;padding-left: 5px;margin-bottom:5px;margin-left:.5em"><?php echo $option; ?></select>			
			<input id="dateInput" type="text" class="form-control" placeholder="Date" style="height: 27.5px;float:right;margin-right:0px;width:100px;padding: 0.5rem;margin-left:.5em">
			<select id='qtrInput' name="class" class="custom-select" style="height: 45px;width: 65px;display: initial;padding: 2px;padding-left: 2px;padding-left: 5px;margin-bottom:5px;margin-left:.5em"><option value = "Q1">Q1</option><option value = "Q2">Q2</option><option value = "Q3">Q3</option><option value = "Q4">Q4</option></select>
		</div>
		<div style="background: linear-gradient(transparent,white);height:120px;z-index:1">
		</div>
		
		<div style="position:relative;top:-120px;z-index: -1;height: 0;">
			<table id="nextTab" style="width:100%;position:relative;">
		</table>
		</div>
		</div>
		<script>
			var inputs = $('body'), inputTo;
			var subject=[];
			var users;
			var options = '';
			var index = 0;
			
			function proceed()
			{
				//	$q = "UPDATE `questions` SET `quest` = '$quest', `title` = '$title', `ans1` = '$ans1', `ans2` = '$ans2', 
				//`ans3` = '$ans3', `ans4` = '$ans4', `ansR` = '$ansR', `reason` = '$reason', `subj` = '$subj', `sub` = '$sub', `tLimit` = '$tLimit' WHERE `questions`.`q_ID` = $q_ID; ";
				var d1 = $('#dateInput').val().split("/");
				d1 = d1[0]+'/'+d1[2];
				var data = {title:$('#nameInput').val(),ans4:d1, ansR:$('#scrInput').val(),ans2:$('#maxInput').val(),reason:$('#grdInput').val(),subj:$('#typeInput').val(),quest:$('#dateInput').val(),ans1:$('#qtrInput').val()};
				$.post("tableAdd.php", data).done(function( msg ) {
					var tableData = msg;
				});
				drawPast();
				index++;
				drawFuture();
				$('#nameInput').val(users[index].user);
				$('#scrInput').val('');
				
				if(index == names.length) window.location = "input.php?msg=done";
			}

			function skip()
			{
				//	$q = "UPDATE `questions` SET `quest` = '$quest', `title` = '$title', `ans1` = '$ans1', `ans2` = '$ans2', 
				//`ans3` = '$ans3', `ans4` = '$ans4', `ansR` = '$ansR', `reason` = '$reason', `subj` = '$subj', `sub` = '$sub', `tLimit` = '$tLimit' WHERE `questions`.`q_ID` = $q_ID; ";
				// var d1 = $('#dateInput').val().split("/");
				// d1 = d1[0]+'/'+d1[2];
				// var data = {title:$('#nameInput').val(),ans4:d1, ansR:$('#scrInput').val(),ans2:$('#maxInput').val(),reason:$('#grdInput').val(),subj:$('#typeInput').val(),quest:$('#dateInput').val(),ans1:$('#qtrInput').val()};
				// $.post("tableAdd.php", data).done(function( msg ) {
				// 	var tableData = msg;
				// });
				// drawPast();
				index++;
				drawFuture();
				$('#nameInput').val(users[index].user);
				$('#scrInput').val('');

				if(index == names.length) window.location = "input.php?msg=done";
			}

			function drawFuture(init = false)
			{
				if(init)
				{
					for(var i = 1;i<4;i++)
					{
						var str = '<tr class="specialContainer" style="border:none;border-bottom: solid 1px #bfbfbf;height: 40px;max-height: 40px;font-size: 1.063rem;font-weight: 400;"><td style="padding-left: 8px;width: 274px;">'+users[index+i].user+'</td><td style="width: 60px;">'+'Scr'+'</td><td style="width: 60px;">'+$('#maxInput').val()+'</td><td style="width: 60px;">'+'Grd'+'</td><td style="width: 89px;">'+$('#typeInput').val()+'</td><td style="width: 126px;">'+$('#dateInput').val()+'</td><td>'+$('#qtrInput').val()+'</td></tr>';
						$("#nextTab").append(str);
						console.log(index);
					}
				}
				else
				{
					try
					{
						$("#nextTab .specialContainer")[0].children.slideDown("fast");
						// for(var i = 0;i<$("#nextTab .specialContainer")[0].children.length;i++)
						// {
						// 	$("#nextTab .specialContainer")[0].children[i].animate({height: 0}, 300);
						// }
						// setTimeout(function(){
							$("#nextTab").empty();
							for(var i = 1;i<4;i++)
							{
								var str = '<tr class="specialContainer" style="border:none;border-bottom: solid 1px #bfbfbf;height: 40px;max-height: 40px;font-size: 1.063rem;font-weight: 400;"><td style="padding-left: 8px;width: 274px;">'+users[index+i].user+'</td><td style="width: 60px;">'+'Scr'+'</td><td style="width: 60px;">'+$('#maxInput').val()+'</td><td style="width: 60px;">'+'Grd'+'</td><td style="width: 89px;">'+$('#typeInput').val()+'</td><td style="width: 126px;">'+$('#dateInput').val()+'</td><td>'+$('#qtrInput').val()+'</td></tr>';
								$("#nextTab").append(str);
								console.log(index);
							}
						// },350);
						
					} catch(e){}
				}

			}

			function drawPast()
			{
				if($("#prevTab .specialContainer").length>2) $("#prevTab .specialContainer")[0].remove();
					var str = '<tr class="specialContainer" style="border:none;border-top: solid 1px #bfbfbf;height: 40px;max-height: 40px;font-size: 1.063rem;font-weight: 400;"><td style="padding-left: 8px;width: 274px;">'+$('#nameInput').val()+'</td><td style="width: 60px;">'+$('#scrInput').val()+'</td><td style="width: 60px;">'+$('#maxInput').val()+'</td><td style="width: 60px;">'+$('#grdInput').val()+'</td><td style="width: 89px;">'+$('#typeInput').val()+'</td><td style="width: 126px;">'+$('#dateInput').val()+'</td><td>'+$('#qtrInput').val()+'</td></tr>'
					$("#prevTab").append(str)
			}
			window.addEventListener('load', function(){
				var msg = "<?php if(!empty($_GET['msg']))echo $_GET['msg']; ?>";

				if(msg == "done")
				{
					var str ='<div style="position: absolute;display: flex;left: 50%;top: 12%;transform: translate(-50%, -50%);"><div style="width: 73px;margin: auto;margin-top: 1em;" class="alert alert-dismissible alert-success"><button type="button" class="close" style="top: -6px;">&times;</button>Done.</div></div>';
					$("#containah").prepend(str);
					//$("#containah").show();
				}
				//after stuff is loaded
				$.ajax({url:"usersGet.php"}).done(function( msg ) {
					users = JSON.parse(msg);
					var name = users[0].user;
					name = name.split(" ");
					$.each(name, function(i, value) {
						name[i] = value.charAt(0).toUpperCase()+value.slice(1);
					});
					name = name.join(' ');
					$('#nameInput').val(name);
					drawFuture(true);
				});

				$('#dateInput').change(function(){
					var d = $('#dateInput').val();
					var d1 = d.split("/");
					var quarter = Math.floor((parseInt(d1[0]) + 2) / 3);
					$('#qtrInput').val("Q"+quarter);
					drawFuture();
				});

				var d = new Date();
				var quarter = Math.floor((d.getMonth() + 3) / 3);
				d = d.toLocaleDateString();

				$('#dateInput').val(d);
				var d1 = d.split("/");
				var quarter = Math.floor((parseInt(d1[0]) + 2) / 3);
				d1 = d1[0]+'/'+d1[2];
				//cells.ans4 = d1;
				$('#qtrInput').val("Q"+quarter);
				$('#maxInput').val(100);

				$('#typeInput').change(function(){
					drawFuture();
				});

				$('#maxInput').keyup(function(e){
					drawFuture();
				});
				$('#scrInput').keyup(function(e){
				console.log('keypress');
				if(e.keyCode == 27 || e.which == 27) 
				{
					$('#scrInput').val('');
					$('#grdInput').val(Math.round(($(this).val() / $('#maxInput').val())*100));
				}
				else if((e.keyCode == 13 || e.which == 13) && $('#scrInput').val() == '')
				{
					skip();
				}
				else if((e.keyCode == 13 || e.which == 13) && $('#scrInput').val() != '')
				{
					proceed();
				}
				else
				{
					$('#grdInput').val(Math.round(($(this).val() / $('#maxInput').val())*100));
				}
				drawFuture();
				});
				
			});

		</script>
		
	</div>


		

	
</body>

</html>