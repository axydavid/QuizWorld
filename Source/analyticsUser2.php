<?php 
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');

	$get = mysqli_query($con,"SELECT class,classID FROM classes");
	$option = '';
	 while($row = mysqli_fetch_assoc($get))
	{
	  $option .= '<option value = "'.$row['classID'].'">'.$row['class'].'</option>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Overview</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
<link href="dist/css/barChart.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.js"></script>
<link href="dist/css/tabulator(2).css" rel="stylesheet">
	<script type="text/javascript" src="dist/js/tabulator.js"></script>

</head>
<body>
<!-- <input type="button" value="Save" onclick="save();"> -->
<div class="container specialContainer contentContainer" style="margin-top: 15px;margin-bottom: 15px;">

</div>
<script>
  "use strict";
    var totalGrade = 0;
    var table;
    var wrongQuest = [];
    var namo = <?php echo json_encode($_SESSION['username']) ?>;
    var surnamo = <?php echo json_encode($_SESSION['surname']) ?>;
    var claso = <?php echo json_encode($_SESSION['class']) ?>;
    var theID = <?php echo json_encode($_SESSION['class']) ?>;
    $.ajax({  method: "POST", url: "getOverall.php", data:{ data : theID, type : "class"}})
        .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
        .done(function(data){
          chartCalc(data);
        });

    function chartCalc(data)
    {
      try{var tableData = JSON.parse(data); } catch(e){$("#bar-horzontal").append(data);}
      // tableData.shift();
      //console.log(tableData);
      var subj,sub;
      var prevVal, prevSubj;
      var prevSubRight=0;
      var prevSubjRight=0;
      var element = [];
      var subArray= [];
      var gradeArray= [];
      var gradeTotalArray= [];
      var gradeCache= [];

      for (var z=0;z<tableData.length;z++)
      {

        if(tableData[z]==null) break;
        if(true)
          {
            var right = 100;
            if(tableData[z].answer!=tableData[z].ansR) right = 0;
            // prevSubRight = (prevSubRight+right) / 2;
            //if(i==1) prevSubRight=right;
            gradeCache.push(right);
            gradeTotalArray.push(JSON.parse(JSON.stringify(right)));
            if(tableData[z].sub=='Sub15') console.log(gradeCache);
            if(right==0) wrongQuest.push(tableData[z].q_ID); //get all questions


          }

          if(z==tableData.length-1)
          {
            prevSubjRight = 0;
            var cacheTotal=0;

          if(gradeCache.length>0)
          { 
            for(var i = 0; i<gradeCache.length; i++) 
            {
              cacheTotal += gradeCache[i];
            }
          }
            cacheTotal = cacheTotal / gradeCache.length;
            subArray.push(tableData[z].sub);
            gradeArray.push(JSON.parse(JSON.stringify(cacheTotal)));

            for(var i = 0; i<gradeArray.length; i++) prevSubjRight += gradeArray[i];
            prevSubjRight = prevSubjRight / gradeArray.length;

            element.push({name:JSON.parse(JSON.stringify(tableData[z].subj)), grade:JSON.parse(JSON.stringify(prevSubjRight)), subArray:JSON.parse(JSON.stringify(subArray)), gradeArray:JSON.parse(JSON.stringify(gradeArray))});
            break;
          }
          
          if(tableData[z].sub!=tableData[z+1].sub) 
          {
            var cacheTotal=0;

            if(gradeCache.length>0)
            { 
              for(var i = 0; i<gradeCache.length; i++) 
              {
                cacheTotal += gradeCache[i];
              }
            }
            cacheTotal = cacheTotal / gradeCache.length;
            subArray.push(JSON.parse(JSON.stringify(tableData[z].sub)));
            gradeArray.push(JSON.parse(JSON.stringify(cacheTotal)));
            gradeCache = [];
          }
          //console.log(tableData[i]);
          if(tableData[z].subj!=tableData[z+1].subj) 
          {
            prevSubjRight = 0;
            for(var i = 0; i<gradeArray.length; i++) prevSubjRight += gradeArray[i];
            prevSubjRight = prevSubjRight / gradeArray.length;
            element.push({name:JSON.parse(JSON.stringify(tableData[z].subj)), grade:JSON.parse(JSON.stringify(prevSubjRight)), subArray:JSON.parse(JSON.stringify(subArray)), gradeArray:JSON.parse(JSON.stringify(gradeArray))});
            prevSubjRight = 0;
            subArray = [];
            gradeArray = [];
              
          }
      }
      var element2 = element;
      var firstTime = true;

      var nameArray = [];
      var gradeArray = [];

      for(var y = 0; y<element.length;y++)
      {
        nameArray.push(element[y].name);
        gradeArray.push(element[y].grade);
        totalGrade = (element[y].grade + totalGrade) / 2;
      }

      var totalSubjRight = 0;
      for(var i = 0; i<gradeTotalArray.length; i++) totalSubjRight += gradeTotalArray[i];
      totalSubjRight = totalSubjRight / gradeTotalArray.length;

      var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;">';
      str +='<button onclick="" style="width:30px;height:30px;border:none;background:transparent;margin-right: -5px;outline: none;padding-left: 0px;padding-right: 0px;position: absolute;"><a href="logout.php"><svg viewBox="0 0 14 13.000004" xmlns="http://www.w3.org/2000/svg" style="transform: scale(1);position: relative;top: -4px;left: -8px;/*! width:30px; *//*! height:30px; */">'+
            '<g transform="translate(-1063.5 -175.72)">'+
            '<path d="m1238.5 175.72h14v13h-14z" fill="transparent"></path></g>'+
            '<g transform="translate(-366.04 -414.53)">'+
            '<path d="m365.85 414.53h14v13h-14z" fill="transparent"></path>'+
            '<path d="m369.51 417.68 3.3459 3.346-3.3459 3.3458m6.6686-1.3e-4 -3.3459-3.3457 3.3459-3.346" fill="none" stroke-linecap="round" stroke-width="1" stroke="white"></path>'+
            '</g></svg></a></button>';
      str+='<div style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">👋<b style="text-transform:capitalize;">'+namo+' '+surnamo+'</b> from class '+claso+', here👇 are your results:</div>';
      str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;margin-left: auto;fill: white;"href="javascript:window.print()">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      str+= '</svg></a></div>';
      $(".container").append(str);

      nameArray.unshift("Total");
      gradeArray.unshift(totalSubjRight);
      drawChart(nameArray,gradeArray,"Overview",true);

      totalGrade = JSON.parse(JSON.stringify(totalSubjRight));
      firstTime = false;
      drawPie(totalGrade);

      nameArray = 0;
      gradeArray = 0;

      for(var y = 0; y<element.length;y++)
      {
        var nameArray = element[y].subArray;
        var gradeArray = element[y].gradeArray;
        nameArray.unshift("Total");
        gradeArray.unshift(element[y].grade);
        drawChart(nameArray,gradeArray,element[y].name,firstTime);
      }

      if(element.length % 2 != 0) 
      {
        var str3 = '<div class="class" style="min-width: 512px;margin-left: auto;margin-right: auto;"><br></div>';
        $(".container").append(str3);  
      }
      drawRec(element,namo);
      drawTable(wrongQuest);//all ID array, get quest with these ID than draw a table

    }

    function drawRec(element,namo)
    {
      var failed= false;
      var str2 = '<div class="alert alert-dismissible alert-primary" style="width:100%">Hey <b style="text-transform:capitalize;">'+namo+'</b>, it seems you failed in some subjects😭🤦, that sucks👎, but don'+"'"+'t worry, I got your back 👍 just study this list:\n\n';
      var str = '';
      for(var z = 0; z < element.length; z++)
      {
        if(element[z].grade < 70)
        {
          var failed= true;

          var totalRecGrade = [];
          var totalRecName = [];

          element[z].gradeArray.shift();
          element[z].subArray.shift();

          var gradeArray = element[z].gradeArray;
          var nameArray =  element[z].subArray; 

          var min = Math.min(...gradeArray);
          var minArrayIndex = gradeArray.indexOf(min);

          str += "👉 "+nameArray[minArrayIndex];

          gradeArray.splice(minArrayIndex, 1);
          nameArray.splice(minArrayIndex, 1);

          if(gradeArray.length > 0)
          {
            min = Math.min(...gradeArray);
            minArrayIndex = gradeArray.indexOf(min);

            if(gradeArray[minArrayIndex]<70) str += ", "+ nameArray[minArrayIndex];
            gradeArray.splice(minArrayIndex, 1);
            nameArray.splice(minArrayIndex, 1);
          }
          str += ' of <b>'+element[z].name+'</b>\n';

        }
      }
      str += '\nAlso check out the cheatsheet📜 below👇, it contains all the questions you have difficulty understanding 👍</div>';
      if(failed)$(".container").append(str2+str);
      else $(".container").append("<div class='alert alert-dismissible alert-primary' style='width:100%'>Good job!👏👏👏 You passed all subjects, you're ready for the real test 😎👍\nHowever if you want to ace the test with 💯, have a look the cheatsheet📜 below👇 </div>");
      failed= false;

      
    }
    function drawPie(corr)
    {
      corr = Math.round(corr);
      var wrong = 100-corr;
      var chartDiv = $("#barChart");
            //var chartDiv = document.getElementById("barChart").getContext("2d");
            var myChart = new Chart(chartDiv, {
              type: 'pie',
              data: {
                  labels: ["Wrong", "Correct"],
                  datasets: 
                  [{
                      data: [wrong,corr],
                      backgroundColor: ["#ce1126","#007a3d"]
                  }]
              },
              options: {
                  title: {
                      display: true,
                      text: 'Overall performance'
                  },
              responsive: true,
              maintainAspectRatio: false,
              }
          });
    }

    function drawChart(name,value,title,addPie = false)
    {
        var str3 = '<div class="class" style="min-width: 512px;margin-left: auto;margin-right: auto;"><br><h3 class="headers">'+title+'</h3><div class="bar-horizontal" id="bar-horizontal'+title+'">';
        for (var i=0;i<name.length;i++)
        {
          str3 += '<div class="combo"><div class="div" style="background: #AAAAAA; width: 0;">';
          if(value[i]>24)   str3 += '<div>'+name[i]+'</div><div class="perc">'+Math.round(value[i])+'%</div></div>';
          else str3 += '</div><div class="perc0">'+name[i]+'&nbsp;&nbsp;</div><div class="perc2">'+Math.round(value[i])+'%</div>';
          str3 += '</div>';
        } 
        str3 +='<div id="ticks">'+
        '<div class="tick"><p>20</p></div>'+
        '<div class="tick"><p>40</p></div>'+
        '<div class="tick"><p>60</p></div>'+
        '<div class="tick"><p>80</p></div>'+
        '<div class="tick"><p>100</p></div>'+
        "</div></div></div>";
        if(addPie) str3 += '<div class="div2" style="width:49%; height:200px;margin-left: auto;"><canvas id="barChart" width="633" height="300" style="display: block; width: 633px; height: 300px;"></canvas></div>';
        $(".container").append(str3);

        setTimeout(function(){
          var bars = document.getElementById("bar-horizontal"+title).getElementsByClassName("div");
          var barsValue = document.getElementById("bar-horizontal"+title).getElementsByClassName("valor");
          var curValue;
          for (var w = 0;w<bars.length;w++) 
          {
            //curValue = Math.round(value[w]);
            try{
              curValue = barsValue[w].textContent;
              //curValue = bars[w].getElementsByTagName('div')[1].textContent;
            curValue = curValue.slice(0, -1);} catch (e){curValue = Math.round(value[w]);}
            if(w==0) bars[w].style.padding = "9px 0 9px 5px";
            if(curValue>=80) bars[w].style.background = "#007a3d";
            else if(curValue>=70) bars[w].style.background = "#f9d616";
            else bars[w].style.background = "#ce1126";
            bars[w].style.width = curValue + "%";
            if(bars[w].style.width == "0px") 
            {
              var goodValue = bars[w].getElementsByTagName('div')[1].textContent;
              if(w==0) bars[w].setAttribute('style', 'width:'+goodValue+';background:'+bars[w].style.background+';padding: 9px 0 9px 5px');
              else bars[w].setAttribute('style', 'width:'+goodValue+';background:'+bars[w].style.background);
            }
            curValue = 0;
          }
          var min = Math.min(...value);
          if(addPie && min>=80) 
          {
            bars[0].style.background = "#007a3d";
          }
          else if(addPie && min>=70) 
          {
            bars[0].style.background = "#007a3d";
          }
          else if(addPie && min<70) 
          {
            bars[0].style.background = "#ce1126";
            
          }
        }, 100);
    }

    function drawTable(tableData)
    {
      var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;align-items: center;/*! justify-content: center; */"><h3 style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">Cheatsheet📜</h3>';
      str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;margin-left: auto;fill: white;"href="javascript:table.print(false, true)">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      str+= '</svg></a></div><div id="example-table" style="width: 100%;"></div>';  
      $(".container").append(str);
      table = new Tabulator("#example-table", 
			{
				
				//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
				//data:tableData, //assign data to table
				selectable:false,
        //groupBy:"subj",
        initialSort:[{column:"Subject", dir:"asc"},{column:"Subdivision", dir:"asc"}],
				layout:"fitColumns", //fit columns to width of table (optional)
        responsiveLayout:true,
        printAsHtml:true, 
        printCopyStyle:false, //copy Tabulator styling to HTML table
        printHeader:"<h3 style='text-align:center'><strong style='text-transform:capitalize;'>"+namo+" "+surnamo+"</strong> : "+claso+" cheatsheet</h3>",
				//persistentLayout:true,
				columns:[ //Define Table Columns
          // {title:"ID", field:"q_ID", align:"center", width:15},
          {title:"Subject", field:"subj", align:"left"},
          {title:"Subdivision", field:"sub", align:"left"},
					{title:"Title", field:"title", align:"left"},
					{title:"Question", field:"quest", align:"left"},
					{title:"Choice 1", field:"ans1", align:"left"},
					{title:"Choice 2", field:"ans2", align:"left"},
					{title:"Choice 3", field:"ans3", align:"left"},
					{title:"Choice 4", field:"ans4", align:"left"},
					{title:"Hint", field:"reason", align:"left"},
				]});

        $.ajax({ method: "POST", url: "getQuestArray.php", data:{ data : JSON.stringify(tableData)}})
        .fail(function(data) {console.log( "errorTable:"+JSON.stringify(data));})
        .done(function(data) {
          console.log("logging: "+ JSON.stringify(data)+", "+data);
          table.setData(data);
        });

    }
    window.addEventListener("load", function()
    {

    });


</script>
</body>
</html>