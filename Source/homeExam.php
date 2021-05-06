<?php
	session_start();
   try
   {
      if(!isset($_SESSION['class']))  header('location:index.php?msg=switchpc');
	   if ($_SESSION['class']== "Admin") 
	   {
		   //header('location:homeAdmin.php');
      }
   }
   catch(exception $e)
   {
      header('location:index.php?msg=switchpc');
   }
?>
<!DOCTYPE html>
<html>
   <head>
   <title>Exam</title>
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
         <!-- <div class='fakeContainer'> -->
         <!-- <h1 class="text-center text-white font-weight-bold bg-dark" >  , Exam in progress <a href="logout.php" class="btn btn-primary m-auto text-white" > Logout </a></h1>  -->
         <div class="progressContainer">

         </div>
         <div class="container" style="margin: auto;overflow:auto;padding:0">
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
      <h2 class="footID" style="color:#fbfbfb; cursor:default "> </h2>
      <input type="submit" id="check" name="submit" onclick="check()" Value="Check" class="btn btn-success d-block" style='margin: 0 0 0 auto;' disabled='' /> <br>

      </div>
      <!-- </div> -->
      </footer>
      </body>

      <script>
         var curSubj;
         var ansR;
         var wrongAck = true;
         var explanation = "";
         var time = "";
         var intervalID = "";
      function getQuest()
      {  
         var questID = $(".footID").text();
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

            if (curSubj!= tableData.subj) time = "";  //check line 165 for initial time per subject
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
               str2+= '<a class= "gallery gallery'+i+'" href="'+cool[i]+'"><img src="'+cool[i]+'" width="40px" height="40px"></a>';
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

            var min = 0;
            var sec = 0;
            var examTime = <?php echo json_encode($_SESSION['min']) ?>;
            if(time == "") time = examTime*60;

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
               if(intervalID == "") intervalID = setInterval(timer, 1000);
            });
         });
      }

      getQuest();

      function timer()
      {
         var min = 0;
         var sec = 0;

         time --;
         min = Math.trunc(time/60);//need to round .9 to 0
         sec = time - (min*60);
         if (time <= 0) 
         {
            $('#timer').text("0:0");
            time = 0;
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


         if(q1 == ansR)
         {
            $(".quizsetting").attr({ 'style': 'color: #78c800 !important;background: #78c800 !important;border-color: #78c800 !important;border-radius: 24px;'});
            $(".quizsetting .custom-control").attr({ 'style': 'transition: background-color 0.6s ease-out;color: #78c800 !important;background: #78c800 !important;border-color: #78c800 !important;border-radius: 24px;'});
            $(".quizsetting .radioSpan").attr({ 'style': 'transition: background-color 0.6s ease-out;color: #78c800 !important;background: #78c800 !important;border-color: #78c800 !important;border-radius: 24px;'});
            var str= '<div id="circle2"><div style="margin-bottom: inherit;">'+
            '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#78c800" viewBox="-100 -180 1300 1300" enable-background="new 0 0 1000 1000" xml:space="preserve">'+
            '<g><path d="M952.3,66.2c-40.8-31.6-97.8-21.9-127.4,21.4l-423.8,620L167.7,454.9c-34.4-39.1-92.1-41-128.9-4.2c-36.7,36.5-38.6,98-4,136.9c0,0,283.6,314.7,324.4,346.3c40.8,31.6,97.8,21.9,127.4-21.4l486-710.7C1002.3,158.1,993.1,97.5,952.3,66.2z"/></g>'+
            '</svg></div></div>';
            $(".quizsetting").prepend(str);
            $("#circle2").hide( "scale", 1);   
            $("#circle2").show( "scale", "ease-out",400); 
         }
         else
         {
            $(".quizsetting").attr({ 'style': 'color: rgb(234, 32, 32);background: rgb(234, 32, 32) !important;border-color: rgb(234, 32, 32) !important;border-radius: 24px;'});
            $(".quizsetting .custom-control").attr({ 'style': 'transition: background-color 0.6s ease-out;color: rgb(234, 32, 32);background: rgb(234, 32, 32) !important;border-color: rgb(234, 32, 32) !important;border-radius: 24px;'});
            $(".quizsetting .radioSpan").attr({ 'style': 'transition: background-color 0.6s ease-out;color: rgb(234, 32, 32);background: rgb(234, 32, 32) !important;border-color: rgb(234, 32, 32) !important;border-radius: 24px;'});
            var str= '<div id="circle2"><div style="margin-bottom: inherit;">'+
            '<svg viewBox="0 0 14 13.000004" xmlns="http://www.w3.org/2000/svg" style="transform: scale(.6);position: relative;top: 2px;left: 1px;">'+
            '<g transform="translate(-1063.5 -175.72)">'+
            '<path d="m1238.5 175.72h14v13h-14z" fill="transparent"></path></g>'+
            '<g transform="translate(-366.04 -414.53)">'+
            '<path d="m365.85 414.53h14v13h-14z" fill="transparent"></path>'+
            '<path d="m369.51 417.68 3.3459 3.346-3.3459 3.3458m6.6686-1.3e-4 -3.3459-3.3457 3.3459-3.346" fill="none" stroke-linecap="round" stroke-width="3.2" stroke="#ec0b1b"></path>'+
            '</g></svg></div></div>';
            $(".quizsetting").prepend(str);
            $("#circle2").hide( "scale", 1);   
            $("#circle2").show( "scale", "ease-out",400);    
         } 
        
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
               $(".quizsetting").attr({ 'style': 'color: unset;background: unset;border-color: unset;border-radius: unset;'});
               $(".quizsetting .custom-control").attr({ 'style': 'transition: none'});
               $(".quizsetting .radioSpan").attr({ 'style': 'transition: none'});
               try {$("#circle2").remove();}catch(e) {}
               getQuest();


            });
            
         });
      }

      function check(skip = false)
      {
         // clearInterval(intervalID);
         if (true)
         {
               //container$('#timer').remove();
            sendAns(skip);

            wrongAck = true;
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
         var dataString ='<button onclick="" style="width:30px;height:30px;border:none;background:transparent;margin-right: -5px;outline: none;padding-left: 0px;padding-right: 0px;"><a href="logout.php"><svg viewBox="0 0 14 13.000004" xmlns="http://www.w3.org/2000/svg" style="transform: scale(1);position: relative;top: -9px;left: -8px;width:30px;height:30px">'+
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
