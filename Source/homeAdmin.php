<?php
	session_start();
   try
   {
      if(!isset($_SESSION['class']))  header('location:index.php?msg=switchpc');
	   else if ($_SESSION['class']!= "Admin") header('location:home.php');
   }
   catch(exception $e)
   {
      header('location:index.php?msg=switchpc');
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="dist/css/bootstrap/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <link rel="stylesheet" href="dist/css/simpleLightbox.css">
	   <script src="dist/js/simpleLightbox.js"></script>
      <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }
      </style>
   </head>
   <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="background: linear-gradient(160deg, #1eb1f6 0%, #1eb1f6 42%, #ac34f7 70%, #ac34f7 100%);background-clip: border-box;-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512" style="position: relative;margin-right: -3px;top: 0px;">
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
      <a class="nav-link" href="subjects.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;"><path d="M405.2 64h-21c15 5.7 22.8 20.6 22.8 42.7v298.7c0 22.1-7 37.3-22.8 42.7h21c23.7 0 42.8-19.2 42.8-42.7V106.7c0-23.5-19.1-42.7-42.8-42.7zM345.5 64.2c-1.4-.1-2.8-.2-4.2-.2H106.7C83.2 64 64 83.2 64 106.7v298.7c0 23.5 19.2 42.7 42.7 42.7h234.7c1.4 0 2.8-.1 4.2-.2 21.5-2.1 38.5-20.4 38.5-42.5V106.7c-.1-22.1-17.1-40.4-38.6-42.5zM208 256l-56-32-56 32V96h112v160z"></path><path d="M405.2 64h-21c15 5.7 22.8 20.6 22.8 42.7v298.7c0 22.1-7 37.3-22.8 42.7h21c23.7 0 42.8-19.2 42.8-42.7V106.7c0-23.5-19.1-42.7-42.8-42.7zM345.5 64.2c-1.4-.1-2.8-.2-4.2-" style="fill: grey;"></path></svg> Class &amp; Subjects</a>
      </li>      
      <li class="nav-item">
        <a style='padding-left: 0px;margin-left: -4px;' class="nav-link" href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M289 448h-66v-65h66v65zm-1-98h-64c0-101 96-95.1 96-159 0-35.2-28.8-63.4-64-63.4S192 158 192 192h-64c0-71 57.3-128 128-128s128 56.4 128 127c0 79.9-96 89-96 159z"></path>
</svg> Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="analytics.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;"><path d="M32.6 256H256V32.6c-5-.4-10.6-.6-16-.6-114.9 0-208 93.1-208 208 0 5.4.2 11 .6 16z"></path><path d="M109.8 402.2C147.9 449.6 206.4 480 272 480c114.9 0 208-93.1 208-208 0-65.6-30.4-124.1-77.8-162.2C370.5 84.3 331 67.9 288 64.6V288H64.6c3.3 43 19.7 82.5 45.2 114.2z" style="opacity: 0.3;"></path></svg> Analytics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminPanel.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -3px;"><path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"/></svg>Admin Panel</a>
      </li>
      <li class="nav-item align-right">
        <a class="nav-link active" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="position: relative;top: -2px;" viewBox="0 0 512 512"><path d="M170.718 216.482L141.6 245.6l93.6 93.6 208-208-29.118-29.118L235.2 279.918l-64.482-63.436zM422.4 256c0 91.518-74.883 166.4-166.4 166.4S89.6 347.518 89.6 256 164.482 89.6 256 89.6c15.6 0 31.2 2.082 45.764 6.241L334 63.6C310.082 53.2 284.082 48 256 48 141.6 48 48 141.6 48 256s93.6 208 208 208 208-93.6 208-208h-41.6z" fill="#343a40"/>
        <path d="M170.718 216.482L141.6 245.6l93.6 93.6 208-208-29.118-29.118L235.2 279.918l-64.482-63.436zM422.4" fill="#343a40"></path>
      </svg> Take Exam<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="position: relative;top: -2px;"><path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0 1.41zM19 3H5c-1.11 0-2 .9-2 2v3c0 .55.45 1 1 1s1-.45 1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
        <path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0" fill="#343a40"></path>
      </svg> Log Out</a>
      </li>
    </ul>
  </div>
		</nav>
         <!-- <h1 class="text-center text-white font-weight-bold bg-dark" >  , Exam in progress <a href="logout.php" class="btn btn-primary m-auto text-white" > Logout </a></h1>  -->
         <div class="progressContainer">

         </div>
         <div class="container" style="height:72.4%">
         <br>
            <div class="col-lg-8 d-block m-auto bg-light quizsetting ">
                  <div id="subjSub"></div>
                     <h2 id="title"> <b></b> </h2>
                     <p id="question"> </p>
                     <div id="img"></div>
                     <br>
                  <div class="form-group">
                  </div>

                  </div>
               <p id="letc"></p>
            </div>
            <br>
      <footer id='footer'>
      <div id='footerDiv'>
      <!-- <h5 class="text-center"> Axy_David</h5>  -->
      <input type="button" id="skip" name="skip" onclick="check(true)" Value="Skip" class="btn btn-outline-secondary m-auto d-block" style='margin: auto auto auto 0 !important;' /> <br>
      <h2 class="footID"> </h2>
      <input type="submit" id="check" name="submit" onclick="check()" Value="Check" class="btn btn-success d-block" style='margin: 0 0 0 auto;' disabled='' /> <br>

      </div>
      </footer>
      </body>

      <script>
         var curSubj;
         var ansR;
         var wrongAck = false;
         var explanation = "";
         var time = "";
         var intervalID;
         var questID = 0;
      function getQuest()
      {  
         questID = $(".footID").text();
         $.ajax({  method: "POST", url: "getQuest.php", data:{ questID: questID }}) //, data:{ classID:classID }
         .fail(function(data) {console.log( "getQuest error:"+JSON.stringify(data));})
         .done(function(data){
            $("#question").html(data);
            var tableData = JSON.parse(data);
            var ansArray =[]; //[tableData.ans1, tableData.ans2, tableData.ans3, tableData.ans4];
            $("input[type='submit']").attr("disabled");
            if(tableData.ans1 != "") ansArray.push(tableData.ans1);
            if(tableData.ans2 != "") ansArray.push(tableData.ans2);
            if(tableData.ans3 != "") ansArray.push(tableData.ans3);
            if(tableData.ans4 != "") ansArray.push(tableData.ans4);
            //if(ansArray.length > 1) $("input[type='submit']").removeAttr("disabled");
            ansR = tableData.ansR;
            explanation = tableData.reason;
            var str ="";
            curSubj = tableData.subj;

            
            var tDT = tableData.title;
            tDT.substr(0,1).toUpperCase()+tDT.substr(1);
            var tDQ = tableData.quest;
            tDQ.substr(0,1).toUpperCase()+tDQ.substr(1);
            $("#subjSub").text(tableData.subj+" : "+tableData.sub);
            $("#title b").text(tDT);
            $("#question").html(tDQ);
            $(".footID").text(tableData.q_ID);
            var tDA;
            var abc = ['A','B','C','D','E','F','G'];

            for(var i = 0; i<ansArray.length;i++)
            {
               var x = i+1;
               var xabc = abc[i];
               tDA = ansArray[i].substr(0,1).toUpperCase()+ansArray[i].substr(1);

               str +=   '<div class="custom-control custom-radio">'+
                        '<span class="radioSpan">'+xabc+'</span>'+
                        '<input type="radio" class="" id="customRadio'+x+'" name="q1" value="'+x+'" />'+
                        '<label class="custom-control-label2" for="customRadio'+x+'">'+tDA+'</label>'+
                        '</div>';
            }
            
            var cool = tableData.img.split(",");
            if (cool[cool.length-1] === "") cool.splice(cool.length-1, 1);
            var str2 = '';

            for(var i = 0; i<cool.length;i++)
            {
               //if (i==0) str2+= '<a class= "gallery gallery'+i+'" href="'+cool[i]+'"><img src="'+cool[i]+'" width="40px" height="40px"></a>';
               str2+= '<a class= "gallery gallery0" href="'+cool[i]+'"><img src="'+cool[i]+'" width="40px" height="40px"></a>';
            }

            $(".form-group").empty();
            $("#img").empty();

            $(".form-group").prepend(str);
            $(".custom-radio").last().addClass("custom-radio2");
            if(cool.length>0)
            {
               $("#img").prepend(str2);
               $('.gallery').simpleLightbox();
            }

            //$("#check").attr("disabled");
            $('#check').prop('disabled', true);
            $(function(){
               $("input[type='radio']").change(function(){
               //$("#check").removeAttr("disabled");
               $('#check').prop('disabled', false);

               });
            });
            $("input[name='q1']:checked").parent().addClass("selected");
            $('input[type=radio][name=q1]').change(function() {
            $("input[name='q1']").parent().removeClass("selected");
            $("input[name='q1']:checked").parent().addClass("selected");
            // console.log($("input[name='q1']:checked").val());
            });
            $(".container").css({ 'right': '-20px', 'left': '' }).animate({right: '0px',opacity:"1"}, 200, function() {
               //$(".container").css({ 'right': '', 'left': '0px' })
            var timeInit = true;
            if(time == "") timeInit = false;
            var min = 0;
            var sec = 0;
            time = tableData.tLimit;

            min = Math.trunc(time/60);//need to round .9 to 0
            sec = time - (min*60);


            if( $('#timer').length)
            {
               $('#timer').css('color', '#3c3c3c');
               $('#timer').text(min+":"+sec);
            }
            else{
               $(".progressContainer").append("<div id='timer' style='position: relative;top: -5px;margin-left: 10px;width:20px;width:35px;display: ruby;order: 1;'>"+min+":"+sec+"</div>");

            }
               intervalID = setInterval(timer, 1000);
            });
         });
      }

      getQuest();

      function timer()
      {
         var min = 0;
         var sec = 0;

         min = Math.trunc(time/60);//need to round .9 to 0
         sec = time - (min*60);
         time --;
         if (time < 1) 
         {
            time = "0";
            check(true);
         }

         if (time < 11) 
         {
            $('#timer').text(min+":"+sec);
            $('#timer').css('color', '#ea2b2b');
         }
         else{
            $('#timer').css('color', '#3c3c3c');

         }
         
         $('#timer').text(min+":"+sec);
      }

      function sendAns(skip = false)
      {  
         var correct = false;
         var q1 = $("input[name='q1']:checked").val();
         if(skip==true) q1 = 0;
         var dateR = new Date().toLocaleDateString();
         $.ajax({  method: "POST", url: "check.php", data:{ ans:q1, time:time,ansR:ansR, date:dateR }})
         .fail(function(data) {console.log( "error send:"+JSON.stringify(data));})
         .done(function(data){
            data = data.split('</font>');
            data = data[data.length-1];
            console.log(data);

            $(".container").css({ 'right': '0px', 'left': '' }).animate({right: '20px',opacity:"0"}, 200, function() {
               var tableData;
               try{tableData = JSON.parse(data); } catch(e){

               if(data.search("you see this ugly message it probally means that") != -1) 
               {
                  var tempData =  data.split('{"subjIDsArray":');
                     $("#question").html(tempData[0]);
                     $(".container").css("opacity","1");
                     return false;

               }
               }

               if(tableData == null)
               {
                  if(data.search("you see this ugly message it probally means that") != -1) 
               {
                  var tempData =  data.split('{"subjIDsArray":');
                     $("#question").html(tempData[0]);
                     $(".container").css("opacity","1");
                     return false;

               }
               if(data.search("wait for your results") !=- 1)
               {
                  window.location.replace('analytics.php');
               }
               }

               try{var subjKey = tableData.subjKey;} catch(e){
                  var tempData =  data.split('{"subjIDsArray":');
                  $("#question").html(tempData[0]);
                  $(".container").css("opacity","1");
                  return false;
               }
               var subj = curSubj;
               var questIDPHP = tableData.quest;
               var subjAmt = tableData.questArray.indexOf(questIDPHP)+1;
               var subjArray = tableData.subjArray;
               console.log(subjAmt);
               var subjTot = 100/tableData.questArray.length;
               subjAmt = subjAmt*subjTot;
               subjAmt += "%";

               var ansRLength =tableData.ansRArray.length;
               var ansRTotal = tableData.ansRArray.reduce((a, b) => a + b);
               curValue = ansRTotal/ansRLength;
               
               var color = "rgb(234, 32, 32)";
               if(curValue>=85) color = "#78c800";
               else if(curValue>=75) color = "#f9d616";
               else if(curValue>=65) color = "#f97616";

               if(subj!="Intro")try{$(".progress"+subjKey+" .progress-bar").css({ 'width': subjAmt, 'background-color':color});} catch(e){}
               if(subj!="Intro" && subjAmt=="0%")try{$(".progress"+(subjKey-1)+" .progress-bar").css({ 'width': '100%', 'background-color':color});} catch(e){}
               try
               {
               if($(".progress"+(subjKey-1)+" .progress-bar").width()==0)
               {
                  for(var i = 1;i<subjKey;i++) $(".progress"+(i)+" .progress-bar").css({ 'width': '100%', 'background-color':'gray'});
               }
               } catch(e){}
               getQuest();

            });
            
         });
      }

      function check(skip = false)
      {
         clearInterval(intervalID);
         if ($("input[name='q1']:checked").val()==ansR || wrongAck == true)
         {
            if(wrongAck) 
            {
               sendAns(true);
            }
            else
            {
               $("label[for='customRadio"+ansR+"']").parent().addClass('right', { duration:250, children:true });
               sendAns(skip);
            }
            wrongAck = false;
            $('#check').prop('disabled', true);
            $('#check').addClass('btn-success');
            $('#check').removeClass('btn-danger');
            $("footer").removeClass('wrong');
            $('#check').val('CHECK');
            $("#skip").css("margin", "auto !important");
            $('#reason').find('*').remove();
            $('#reason').remove();
            $(".footID").css("visibility", "visible");
            $("#skip").css("visibility", "visible");
            $("#skip").css("position", "");

         }
         else
         {
            wrongAck = true;
            //$('.selected').animate({'border-color':'#ea2b2b','color':'#ea2b2b','background':'#ffc1c1'}, 500);
            $('.selected').addClass('wrong', { duration:500, children:true });
            $("label[for='customRadio"+ansR+"']").parent().addClass('right', { duration:500, children:true });
            $('#check').prop('disabled', '');
            $('#check').addClass('btn-danger');
            $('#check').removeClass('btn-success');
            $("footer").addClass('wrong');
            $('#check').val('CONTINUE');

            $(".footID").css("visibility", "hidden");
            $("#skip").css("visibility", "hidden");
            $("#skip").css("position", "absolute");
            $("#skip").css("margin", "0px !important");
            var tDE = explanation.substr(0,1).toUpperCase()+explanation.substr(1);

            var str= '<div id="reason" style="font-size: 18px;width:700px;position: relative;top: 10px;" ><h3 style="margin-bottom:4px; display:inline"><div id="circle" style="margin-bottom: inherit;">'+
            '<svg viewBox="0 0 14 13.000004" xmlns="http://www.w3.org/2000/svg" style="transform: scale(.6);position: relative;top: 2px;left: 1px;">'+
            '<g transform="translate(-1063.5 -175.72)">'+
            '<path d="m1238.5 175.72h14v13h-14z" fill="transparent"></path></g>'+
            '<g transform="translate(-366.04 -414.53)">'+
            '<path d="m365.85 414.53h14v13h-14z" fill="transparent"></path>'+
            '<path d="m369.51 417.68 3.3459 3.346-3.3459 3.3458m6.6686-1.3e-4 -3.3459-3.3457 3.3459-3.346" fill="none" stroke-linecap="round" stroke-width="3.2" stroke="#ec0b1b"></path>'+
            '</g></svg></div><b1>Hint: </b1></h3>'+tDE+'</div>';
            $("#footerDiv").prepend(str);
            $("#circle").hide( "scale", 1);   
            $("#circle").show( "scale", "ease-out",400);            
         

            //wrong!!!! show right answer, let user press button again, stop timer
         }
      }
      // $(".container").hide("slide", { direction: "left" }, 1000, function() {
      // });
      var classID = <?php echo json_encode($_SESSION['class']) ?>;
      $.ajax({  method: "POST", url: "classGet.php", data:{ classID:classID }})
      .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
      .done(function(data){
         //echo("getting class subjects... : "+JSON.stringify(data));
         //$(".container").before(data);
         //console.log(data);
         var classData = JSON.parse(data);
         cool2 = classData[0].subj.split(",");
         cool3 = classData[0].subjIDs.split(",");
         if (cool2[cool2.length-1] === "") cool2.splice(cool2.length-1, 1);
         if (cool3[cool3.length-1] === "") cool3.splice(cool3.length-1, 1);
         var dataString ='<button onclick="" style="width:30px;height:30px;border:none;background:transparent;margin-right: -5px;outline: none;padding-left: 0px;padding-right: 0px;"><a href="logout.php"><svg viewBox="0 0 14 13.000004" xmlns="http://www.w3.org/2000/svg" style="transform: scale(1);position: relative;top: -7px;left: -8px;width:30px;height:30px">'+
            '<g transform="translate(-1063.5 -175.72)">'+
            '<path d="m1238.5 175.72h14v13h-14z" fill="transparent"></path></g>'+
            '<g transform="translate(-366.04 -414.53)">'+
            '<path d="m365.85 414.53h14v13h-14z" fill="transparent"></path>'+
            '<path d="m369.51 417.68 3.3459 3.346-3.3459 3.3458m6.6686-1.3e-4 -3.3459-3.3457 3.3459-3.346" fill="none" stroke-linecap="round" stroke-width="1" stroke="#bababa"></path>'+
            '</g></svg></a></button>';
         
         for(var i=1; i<cool2.length; i++) 
      {
         dataString += '<div class="progress progress'+i+' '+cool2[i]+'"><div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div></div>';
         //if (i=0) dataString = '<div class="progress progress'+i+' '+cool2[i]+'"><div class="progress-bar bg-success" role="progressbar" style="width: 3.3%"></div></div>';
      }
      $(".progressContainer").append(dataString);
      $(".progress0 .progress-bar").css({ 'width': "3.3%"});   
      });

      </script>
</html>
