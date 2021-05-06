<?php 
$_SESSION['usr_LVL'] = 0;
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	
	if ($_SESSION['class']!= "Admin") 
	{
		header('location:analyticsUser.php');
    }
    
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
<title>Admin Panel - Analytics</title>
<meta charset="UTF-8">

<script src="dist/js/jquery-1.12.4.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<link  href="dist/fonts/gfonts.css" rel="stylesheet">
<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
<link href="dist/css/jquery-ui.css" rel="stylesheet">
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="dist/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="dist/js/tabulator.js"></script>
<link rel="stylesheet" href="dist/css/simpleLightbox.css">
<script src="dist/js/simpleLightbox.js"></script>
  
<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link href="dist/css/barChart.css" rel="stylesheet">
<script src="dist/js/Chart.min.js"></script>
<link href="dist/css/tabulator(2).css" rel="stylesheet">
  <link href="dist/jQueryDatalist/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
  <script src="dist/jQueryDatalist/jquery.flexdatalist.min.js"></script>


</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light no-print">
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

      <li class="nav-item active">
        <a class="nav-link" href="analytics.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;left:2px;top: -3px;"><path d="M288 48H136c-22.092 0-40 17.908-40 40v336c0 22.092 17.908 40 40 40h240c22.092 0 40-17.908 40-40V176L288 48zm-16 144V80l112 112H272z" fill="#343a40" style="opacity: 1;"/> </svg> Reports<span class="sr-only">(current)</span></a>
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
<!-- <input type="button" value="Save" onclick="save();"> -->
<div class="specialContainer contentContainer no-print" style="margin-top: 15px;margin-bottom: 15px;width: max-content;padding-left: 15px;margin-left: auto;margin-right: auto;">
<div style="display:flex;margin-left: auto;margin-right: auto;">
<input type="input" class="form-control flexdatalist" placeholder="Search for student..." id='userInput' list="userInputList"  autocapitalize="word" style="margin-left: auto;margin-right: 5px;"/>
<datalist class="form-control" id="userInputList">
</datalist>
<input type='image' src='img/delete.png' value='x' onclick='deleteClassAnswer($("#classInput").val());' height='30px' style='position: relative; top: 5px;left:-2px;'/>
</div>
</div>
<div class="container specialContainer contentContainer" style="margin-top: 15px;margin-bottom: 15px;">

</div>
<script>
  "use strict";
    var totalGrade = 0;
    var table;
    var wrongQuest = [];
    var truClass = true;
    var namo;
    var surnamo;
    var claso;
    var theID;
    var lastButtons;
    var timeOut = "";
    var lastValue;
    var BBchartTot = [];

    function drawRadarChart(data)
    {
      var WWPT = [];
      var WWPTtot = 0;
      var QA = [];
      var QAtot = 0;
      var prevDate = 0;

      var totGrades = [];
      var yourGrades = [];

      var totGradesWW = [];
      var totGradesPT = [];
      var totGradesQA = [];
      var i = 0;
      $.each(data, function(index, value) {


        if(value.subj == 'WW' || value.subj == 'ww')
        {
          totGradesWW.push(parseInt(value.reason));
        }
        else if(value.subj == 'PT'|| value.subj == 'pt')
        {
          totGradesPT.push(parseInt(value.reason));
        }
        else if(value.subj =='QA'||value.subj =='qa')
        {
          totGradesQA.push(parseInt(value.reason));
        }
        // else if(value.subj =='wwt' || value.subj =='WWt')
        // {
        //   totGradesWWt.push({x: index,y: value.ans2,r: 5});
        // }

        // if(index==data.length-1) data.push({ans4:'google'});
        // if(data[index+1].ans4 != value.ans4)
        // {
        //   var sumWWPT=0;
        //   var sumQA=0;
        //   try
        //   {
        //     const add = (a, b) => parseInt(a) + parseInt(b);
        //     sumWWPT = WWPT.reduce(add)/WWPT.length;
        //     sumQA = QA.reduce(add)/QA.length;

        //   } catch(e){}
        //   if(QA.length < 1 )monthlyTotGrade.push(sumWWPT);
        //   else monthlyTotGrade.push(((sumWWPT*1.6) + (sumQA*0.4))/2);
        //   i++;
        //   WWPT = [];
        //   QA = [];
        // }
      });
      var sumWWPT=0;

      const add = (a, b) => parseInt(a) + parseInt(b);
      if(totGradesWW.length>1) totGradesWW = totGradesWW.reduce(add)/totGradesWW.length;
      else if(totGradesWW.length==1) totGradesWW = totGradesWW[0];

      if(totGradesPT.length>1) totGradesPT = totGradesPT.reduce(add)/totGradesPT.length;
      else if(totGradesPT.length==1) totGradesPT = totGradesPT[0];

      if(totGradesQA.length>1) totGradesQA = totGradesQA.reduce(add)/totGradesQA.length;
      else if(totGradesQA.length==1) totGradesQA = totGradesQA[0];



      if(totGradesWW>0) totGrades.push(Math.round(totGradesWW));
      else totGrades.push('');
      if(totGradesPT>0) totGrades.push(Math.round(totGradesPT));
      else totGrades.push('');
      if(totGradesQA>0) totGrades.push(Math.round(totGradesQA));
      else totGrades.push('');

      if((totGrades[0]!='' || totGrades[1]!='') && totGrades[2]!='') yourGrades = Math.round(((((totGrades[0]+totGrades[1])/2)*1.6) + (totGrades[2]*0.4))/2);
      else if(totGrades[0]!='' && totGrades[1]!='') yourGrades = Math.round((totGrades[0]+totGrades[1])/2);
      else if(totGrades[0]!='' || totGrades[1]!='') yourGrades = Math.round(totGrades[0]+totGrades[1]);
      else if(totGrades[2]!='') yourGrades = Math.round(totGrades[2]);

      if(truClass) yourGrades = 'Your final grade: '+yourGrades;
      else yourGrades = "Final grade: "+yourGrades;
      // if(totGradesWWt.length>0) totGrades.push({ label: ['WWt'],backgroundColor: "#dd003930",borderColor: "#dd0039",data: totGradesWWt });

      // var data = { label: ["Denmark"],backgroundColor: "rgba(60,186,159,0.2)",borderColor: "rgba(60,186,159,1)",data: [{x: 258702,y: 7.526,r: 10}] };
      var str3 = '<div class="div2" style="width:26%; height:200px;"><canvas id="RAChart" width="300" height="330" style="display: block; width: 633px; height: 300px;"></canvas></div>';
      $(".container").append(str3);
      var chartDiv = $("#RAChart");
      var myBBChart = new Chart(chartDiv, {
      type: 'radar',
      data: {
        labels: ["WW", "PT", "QA"],
        datasets: [
          {
            label: "Avg. Grade",
            fill: true,
            backgroundColor: "#7f7f7f30",
            borderColor: "#7f7f7f",
            pointBorderColor: ["#3e95cd","#3cba9f","#ffdd32"],
            pointBackgroundColor: ["#3e95cd","#3cba9f","#ffdd32"],
            data: totGrades
          }
        ],
      },
      options : {
        tooltips: {
          mode: 'index',
          intersect: false,
          callbacks: {
              title: function(tooltipItem, data) {
                var label = data.labels[tooltipItem[0].index];
                    return label;
                }
              }
        },
        scale: {
            angleLines: {
                display: true
            },
            ticks: {
                min: 0,
                max: 100,
                stepSize: 20
               // fontSize: 14
            },
            pointLabels: {
              fontSize: 14,
              fontStyle:'bold'
            }
            
        },
        legend: {
            display: false
        },
        title: {
          display: true,
          text: yourGrades,
          fontSize:16
        }
        
      }   
  });



  }

    function drawBubbleChart(data)
    {
      var WWPT = [];
      var WWPTtot = 0;
      var QA = [];
      var QAtot = 0;
      var prevDate = 0;

      var totGrades = [];
      var totGradesWW = [];
      var totGradesPT = [];
      var totGradesQA = [];
      var totGradesWWt = [];
      var i = 0;
      $.each(data, function(index, value) {
        if(value.quest == 'google' || value.quest == undefined) return true;
        var dataDate = value.quest;
        var dataDate2 ='';
        dataDate = dataDate.split('/');

        var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        dataDate2= labels[dataDate[0]];
        dataDate2 = dataDate[1] + ' ' + dataDate2;
        // dataDate = dataDate[0]+dataDate[1];
        dataDate = parseInt(dataDate[0])+((dataDate[1]/100)*3.3333333333);

        if(value.subj == 'WW' || value.subj == 'ww')
        {
          totGradesWW.push({x: dataDate,y: value.reason,r: 15,date:dataDate2});
        }
        else if(value.subj == 'PT'|| value.subj == 'pt')
        {
          totGradesPT.push({x: dataDate,y: value.reason,r: 15,date:dataDate2});
        }
        else if(value.subj =='QA'||value.subj =='qa')
        {
          totGradesQA.push({x: dataDate,y: value.reason,r: 7,date:dataDate2});
        }
        else if(value.subj =='wwt' || value.subj =='WWt')
        {
          totGradesWWt.push({x: dataDate,y: value.reason,r: 3,date:dataDate2});
        }

        // if(index==data.length-1) data.push({ans4:'google'});
        // if(data[index+1].ans4 != value.ans4)
        // {
        //   var sumWWPT=0;
        //   var sumQA=0;
        //   try
        //   {
        //     const add = (a, b) => parseInt(a) + parseInt(b);
        //     sumWWPT = WWPT.reduce(add)/WWPT.length;
        //     sumQA = QA.reduce(add)/QA.length;

        //   } catch(e){}
        //   if(QA.length < 1 )monthlyTotGrade.push(sumWWPT);
        //   else monthlyTotGrade.push(((sumWWPT*1.6) + (sumQA*0.4))/2);
        //   i++;
        //   WWPT = [];
        //   QA = [];
        // }
      });
      if(totGradesWW.length>0) totGrades.push({ label: ['WW'],backgroundColor: "#3e95cd30",borderColor: "#3e95cd",data: totGradesWW });
      if(totGradesPT.length>0) totGrades.push({ label: ['PT'],backgroundColor: "#3cba9f30",borderColor: "#3cba9f",data: totGradesPT });
      if(totGradesQA.length>0) totGrades.push({ label: ['QA'],backgroundColor: "#ffdd3230",borderColor: "#ffdd32",data: totGradesQA });
      if(totGradesWWt.length>0) totGrades.push({ label: ['WWt'],backgroundColor: "#dd003930",borderColor: "#dd0039",data: totGradesWWt });
      totGrades.sort(function(a, b){return a.data.x - b.data.x}); 
      //if(totGrades.length > 30) totGrades.splice(0, totGrades.length-29); 
      BBchartTot = totGrades;
      // var data = { label: ["Denmark"],backgroundColor: "rgba(60,186,159,0.2)",borderColor: "rgba(60,186,159,1)",data: [{x: 258702,y: 7.526,r: 10}] };
      var str3 = '<div class="div2" style="width:100%; height:310px;margin-left: auto;margin-top: 6%;"><canvas id="BBChart" width="633" height="200" style="display: block; width: 633px; height: 300px;"></canvas></div>';
      $(".container").append(str3);
      var chartDiv = $("#BBChart");
      var myBBChart = new Chart(chartDiv, {
    type: 'bubble',
    data: {
      labels: "Africa",
      datasets: totGrades,
    },
    options: {
              tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
                var label = data.datasets[tooltipItem[0].datasetIndex].data[tooltipItem[0].index].date;
                    return label;
                },
              label: function(tooltipItem, data) {
                var label =data.datasets[tooltipItem.datasetIndex].label+': '+tooltipItem.value;
                //+ data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].date +', '+
                return label;
              }
            }
        },
      title: {
        display: true,
        text: 'Monthly grades report',
        fontSize:16
      },
       scales: {
        yAxes: [{
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Grade'
            }
            ,ticks: {
                  beginAtZero: true,
                  max: 100,
                  min: 0,
                  stepSize: 20,
                  fontSize: 14
                }
          }],
          xAxes: [{
            gridLines:{
              // color:'white'
            },
            ticks: {
              fontSize: 14,
              stepSize: 1,
              // callback: function(valueS, index, values) {
              //   var label = '';
              //   $.each(BBchartTot, function(index, value) {
              //     $.each(value.data, function(index2, value2) {
              //       if(value2.x == valueS)
              //       {
              //         label = value2.date;
              //         return true;
              //       }
              //     });
              //     if (label != '') return true;
              //   });
              //   return label;
              // }
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Month'
            }
          }]
      }
    }
});


  }

  function drawBubbleChartAll(data)
    {
      var WWPT = [];
      var WWPTtot = 0;
      var QA = [];
      var QAtot = 0;
      var prevDate = 0;

      var totGrades = [];
      var totGradesWW = [];
      var totGradesPT = [];
      var totGradesQA = [];
      var totGradesWWt = [];
      var i = 0;
      $.each(data, function(index, value) {
        if(value.quest == 'google' || value.quest == undefined) return true;
        var dataDate = value.quest;
        var dataDate2 ='';
        dataDate = dataDate.split('/');

        var labels = ['','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        dataDate2= labels[dataDate[0]];
        dataDate2 = dataDate[1] + ' ' + dataDate2;
        dataDate = parseInt(dataDate[0])+((dataDate[1]/100)*3.3333333333);


        if(value.subj == 'WW' || value.subj == 'ww')
        {
          totGradesWW.push({x: dataDate,y: value.reason,r: 15,date:dataDate2, name:value.title});
        }
        else if(value.subj == 'PT'|| value.subj == 'pt')
        {
          totGradesPT.push({x: dataDate,y: value.reason,r: 15,date:dataDate2, name:value.title});
        }
        else if(value.subj =='QA'||value.subj =='qa')
        {
          totGradesQA.push({x: dataDate,y: value.reason,r: 8,date:dataDate2, name:value.title});
        }
        else if(value.subj =='wwt' || value.subj =='WWt')
        {
          totGradesWWt.push({x: dataDate,y: value.reason,r: 4,date:dataDate2, name:value.title});
        }

        // if(index==data.length-1) data.push({ans4:'google'});
        // if(data[index+1].ans4 != value.ans4)
        // {
        //   var sumWWPT=0;
        //   var sumQA=0;
        //   try
        //   {
        //     const add = (a, b) => parseInt(a) + parseInt(b);
        //     sumWWPT = WWPT.reduce(add)/WWPT.length;
        //     sumQA = QA.reduce(add)/QA.length;

        //   } catch(e){}
        //   if(QA.length < 1 )monthlyTotGrade.push(sumWWPT);
        //   else monthlyTotGrade.push(((sumWWPT*1.6) + (sumQA*0.4))/2);
        //   i++;
        //   WWPT = [];
        //   QA = [];
        // }
      });
      if(totGradesWW.length>0) totGrades.push({ label: ['WW'],backgroundColor: "#3e95cd30",borderColor: "#3e95cd",data: totGradesWW });
      if(totGradesPT.length>0) totGrades.push({ label: ['PT'],backgroundColor: "#3cba9f30",borderColor: "#3cba9f",data: totGradesPT });
      if(totGradesQA.length>0) totGrades.push({ label: ['QA'],backgroundColor: "#ffdd3230",borderColor: "#ffdd32",data: totGradesQA });
      if(totGradesWWt.length>0) totGrades.push({ label: ['WWt'],backgroundColor: "#dd003930",borderColor: "#dd0039",data: totGradesWWt });
      totGrades.sort(function(a, b){return a.data.x - b.data.x}); 
      //if(totGrades.length > 30) totGrades.splice(0, totGrades.length-29); 
      BBchartTot = totGrades;
      // var data = { label: ["Denmark"],backgroundColor: "rgba(60,186,159,0.2)",borderColor: "rgba(60,186,159,1)",data: [{x: 258702,y: 7.526,r: 10}] };
      var str3 = '<div class="div2" style="width:100%; height:310px;margin-left: auto;margin-top: 6%;"><canvas id="BBChart" width="633" height="200" style="display: block; width: 633px; height: 300px;"></canvas></div>';
      $(".container").append(str3);
      var chartDiv = $("#BBChart");
      var myBBChart = new Chart(chartDiv, {
    type: 'bubble',
    data: {
        
      datasets: totGrades,
    },
    options: {
              tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
                var label = data.datasets[tooltipItem[0].datasetIndex].data[tooltipItem[0].index].date;
                    return label;
                },
              label: function(tooltipItem, data) {
                var name = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].name;
                name = name.charAt(0).toUpperCase() + name.slice(1);

                var label =data.datasets[tooltipItem.datasetIndex].label +" - "+name+': '+tooltipItem.value;
                //+ data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index].date +', '+
                return label;
              }
            }
        },
      title: {
        display: true,
        text: 'Monthly grades report',
        fontSize:16
      },
       scales: {
        yAxes: [{
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Grade'
            }
            ,ticks: {
                  beginAtZero: true,
                  max: 100,
                  min: 0,
                  stepSize: 20,
                  fontSize: 14
                }
          }],
          xAxes: [{
            gridLines:{
              //color:'white'
            },
            ticks: {
              fontSize: 14,
              stepSize: 1,
              // callback: function(valueS, index, values) {
              //   var label = '';
              //   $.each(BBchartTot, function(index, value) {
              //     $.each(value.data, function(index2, value2) {
              //       if(value2.x == valueS)
              //       {
              //         label = value2.date;
              //         return true;
              //       }
              //     });
              //     if (label != '') return true;
              //   });
              //   return label;
              // }
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Month'
            }
          }]
      }
    }
});


  }

    function drawDailyLine(data)
    {
      var WWf = [];
      var WWftot = 0;
      var prevDate = 0;

      var dailyTotGrade = [];
      var dailyTotDate= [];
      var i = 0;
      $.each(data, function(index, value) {


        if(value.subj.toLowerCase() =='wwt')
        {
          WWf.push(value.reason);
          WWftot += value.reason;
        }

        if(index==data.length-1) data.push({quest:'google'});
        if(data[index+1].quest != value.quest && WWf.length >0)
        {
          var sumWWf=0;
          try
          {
            const add = (a, b) => parseInt(a) + parseInt(b);
            sumWWf = WWf.reduce(add)/WWf.length;

          } catch(e){}
            var dataDate = value.quest.slice(0,-5);
            var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            dataDate = dataDate.split('/');
            dataDate[0]= labels[dataDate[0]];
            dataDate = dataDate[1] + ' ' + dataDate[0];
            dailyTotGrade.push( Math.round(sumWWf));
            dailyTotDate.push(dataDate);
          i++;
          WWf = [];
        }
      });

      if(dailyTotGrade.length > 6)
      {
        dailyTotGrade.splice(0, dailyTotGrade.length-6); 
        dailyTotDate.splice(0, dailyTotDate.length-6); 
      }

      var str3 = '<div class="div2" style="width:32%; height:200px;margin-left: auto;"><canvas id="DLChart" width="470" height="350" style="display: block; width: 633px; height: 300px;"></canvas></div>';
      $(".container").append(str3);
      var chartDiv = $("#DLChart");
      var myMLChart = new Chart(chartDiv, {
        type: 'line',
        data: {
          labels: dailyTotDate,
          datasets: [{ 
              cubicInterpolationMode: 'monotone',
              //pointRadius: 5,
              pointHoverRadius: 5,
              data: dailyTotGrade,
              label: "Grade",
              pointBackgroundColor:'#dd0039',
              borderColor: "#dd0039",
              fill:true,
              backgroundColor: "#dd003950"
            }]
        },
        options: {
        responsive: true,
        title: {
          display: true,
          fontSize:16,
          text: 'Daily assesment'
        },
        legend: {
            display: false
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            gridLines:{
            },
            ticks: {
              fontSize: 14,
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Grade'
            }
            ,ticks: {
                  beginAtZero: true,
                  max: 100,
                  min: 0,
                  stepSize: 10,
                  fontSize: 14
                }
          }]
        }
      }
      });

  }
    function drawMonthlyLine(data)
    {
      var WWPT = [];
      var WWPTtot = 0;
      var QA = [];
      var QAtot = 0;
      var prevDate = 0;

      var monthlyTotGrade = [];
      var i = 0;


     for(var i = 0;i < data.length;i++)
      {
        var dataDater = data[i].quest.split('/');
        data[i].quest2=dataDater[0]+dataDater[1]+dataDater[2];
      }
      data.sort(function(a, b){return a.quest2 - b.quest2});

      $.each(data, function(index, value) {


        if(value.subj == 'WW'|| value.subj == 'PT'||value.subj == 'ww'|| value.subj == 'pt')
        {
          WWPT.push(value.reason);
        }
        else if(value.subj =='QA'||value.subj =='qa')
        {
          QA.push(value.reason);
        }
        if(index==data.length-1) data.push({ans4:'google'});
        if(data[index+1].ans4 != value.ans4)
        {
          var sumWWPT=0;
          var sumQA=0;
          const add = (a, b) => parseInt(a) + parseInt(b);

          try
          {
            sumWWPT = WWPT.reduce(add)/WWPT.length;
          } catch(e){console.log('calc error!!!!')}
          
          try
          {
            sumQA = QA.reduce(add)/QA.length;
          } catch(e){console.log('calc error!!!!')}

          if(QA.length == 1 ) sumQA = QA[0];
          if(WWPT.length == 1) sumWWPT = WWPT[0];
          if(value.ans4 != null)
          {
            var dataDate = value.ans4;
            dataDate = dataDate.split('/');
            var labels = ['','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            if(QA.length < 1 && WWPT.length < 1) console.log('WWt detected');
            else if(QA.length < 1 ) monthlyTotGrade.push({x:labels[dataDate[0]],y:Math.round(sumWWPT),index:dataDate[0]});
            else if(WWPT.length < 1) monthlyTotGrade.push({x:labels[dataDate[0]],y:Math.round(sumQA),index:dataDate[0]});
            else monthlyTotGrade.push({x:labels[dataDate[0]],y:Math.round(((sumWWPT*1.6) + (sumQA*0.4))/2),index:dataDate[0]});
            
          }
            i++;
            WWPT = [];
            QA = [];
         
        }
      });
      monthlyTotGrade.sort(function(a, b){return a.index - b.index}); 
      for(var i = 0;i < monthlyTotGrade.length;i++)
      {
        //if(i==monthlyTotGrade.length-1) monthlyTotGrade.push({ans4:'google'});
        if(i==monthlyTotGrade.length-1) break;
        if(monthlyTotGrade[i].index == monthlyTotGrade[i+1].index)
        {
          monthlyTotGrade[i].y = Math.round((parseInt(monthlyTotGrade[i].y) + parseInt(monthlyTotGrade[i+1].y)) / 2);
          monthlyTotGrade.splice(i+1, 1)
          i--;
        }
      }
      var str3 = '<div class="div2" style="width:42%; height:230px;"><canvas id="MLChart" width="550" height="331" style="display: block; width: 633px; height: 300px;"></canvas></div>';
      $(".container").append(str3);
      var chartDiv = $("#MLChart");
      var myMLChart = new Chart(chartDiv, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{ 
              cubicInterpolationMode: 'monotone',
              //pointRadius: 5,
              pointHoverRadius: 5,
              data: monthlyTotGrade,
              label: "Grade",
              pointBackgroundColor:'#3e95cd',
              borderColor: "#3e95cd",
              fill:true,
              backgroundColor: "#3e95cd50"
            }]
        },
        options: {
        responsive: true,
        title: {
          display: true,
          fontSize:16,
          text: 'Monthly assesment'
        },
        legend: {
            display: false
        },
        tooltips: {
          mode: 'index',
          intersect: false,
          callbacks: {
              title: function(tooltipItem, data) {
                var label = data.datasets[0].data[tooltipItem[0].index].x;
                    return label;
                }
              }
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            gridLines:{
              color: ['#e5e5e5', '#e5e5e5', '#e5e5e5', '#acacac', '#e5e5e5', '#e5e5e5', '#acacac', '#e5e5e5', '#e5e5e5', '#acacac', '#e5e5e5', '#e5e5e5']
            },
            ticks: {
              fontSize: 14,
              callback: function(value, index, values) {
              
                if(value=='Jan') value = ['Jan','Q1'];
                else if(value=='Apr') value = ['Apr','Q2'];
                else if(value=='Jul') value = ['Jul','Q3'];
                else if(value=='Oct') value = ['Oct','Q4'];
                return value;
              }
            },
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: false,
              labelString: 'Grade'
            }
            ,ticks: {
                  beginAtZero: true,
                  max: 100,
                  min: 0,
                  stepSize: 10,
                  fontSize: 14
                }
          }]
        }
      }
      });

  }

    function chartCalc(data)
    {
      if(truClass) var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;"><div style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;margin-right: auto;">Here👇 are the results for your class:</div>';
      else var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;"><div style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;margin-right: auto;">Here👇 are the results for <b style="text-transform:capitalize;">'+namo +':</div>';
      str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;fill: white;"href="javascript:window.print()">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      str+= '</svg></a></div>'; 
      $(".container").prepend(str);

      drawDailyLine(data);
      drawMonthlyLine(data);
      drawRadarChart(data);
      if(truClass) drawBubbleChartAll(data);
      else drawBubbleChart(data);
      
      //if(truClass)drawRec(element,namo);
      drawTable(data);
      
      
      
      // var totalSubjRight = 0;
      // for(var i = 0; i<gradeTotalArray.length; i++) totalSubjRight += gradeTotalArray[i];
      // totalSubjRight = totalSubjRight / gradeTotalArray.length;
      // if(truClass) var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;"><div style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">Here👇 are the results for class <b style="text-transform:capitalize;">'+claso+'</b>:</div>';
      // else var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;"><div style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">Here👇 are the results for <b style="text-transform:capitalize;">'+namo+' '+surnamo+'</b> from class '+claso+':</div>';
      // str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;margin-left: auto;fill: white;"href="javascript:window.print()">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      // str+= '</svg></a></div>'; 
      // $(".container").prepend(str);

      // nameArray.unshift("Total");
      // gradeArray.unshift(totalSubjRight);
      // drawChart(nameArray,gradeArray,"Overview",true);

      // totalGrade = JSON.parse(JSON.stringify(totalSubjRight));
      // firstTime = false;
      // drawPie(totalGrade);

      // nameArray = 0;
      // gradeArray = 0;

      // for(var y = 0; y<element.length;y++)
      // {
      //   var nameArray = element[y].subArray;
      //   var gradeArray = element[y].gradeArray;
      //   nameArray.unshift("Total");
      //   gradeArray.unshift(element[y].grade);
      //   drawChart(nameArray,gradeArray,element[y].name,firstTime);
      // }

      // if(element.length % 2 != 0) 
      // {
      //   var str3 = '<div class="class" style="min-width: 512px;margin-left: auto;margin-right: auto;"><br></div>';
      //   $(".container").append(str3);  
      // }
      // drawRec(element,namo);
      // if(!truClass)drawTable(wrongQuest);//all ID array, get quest with these ID than draw a table
      // else drawStudents(tableData);
      // wrongQuest = [];
    }

    function drawRec(element,namo)
    {
      var failed= false;
      var str = "";
       if(!truClass) var str2 = '<div class="alert alert-dismissible alert-primary" style="width:100%">Hey, <b style="text-transform:capitalize;">'+namo+'</b> seems to have failed in some subjects👎, here are the points <b style="text-transform:capitalize; style="text-transform:capitalize;">'+namo+'</b> struggles with:\n\n';
      else{

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

          while(gradeArray.length > 0)
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
    }
      if(!truClass)
      {
        str += '\nThe evaluation history📜 below👇, contains all the tests that <b style="text-transform:capitalize;">'+namo+'</b> took so far.</div>';
        if(failed)$(".container").append(str2+str);
        else $(".container").append("<div class='alert alert-dismissible alert-primary' style='width:100%'><b style='text-transform:capitalize;'>"+namo+"</b> passed all subjects, he's ready for the real test 👍\nHowever there's always room for improvement, have a look the cheatsheet📜 below👇, it pinpoints all his mistakes: </div>");
      }
      else{
        str += '\nA evaluation history📜 below👇, contains all the tests that the students took.</div>';
        if(failed)$(".container").append(str2+str);
        else $(".container").append("<div class='alert alert-dismissible alert-primary' style='width:100%'>The students passed all subjects, they're ready for the real test 👍\nHowever there's always room for improvement, given more development time a cheatsheet📜 below👇, could pinpoint common mistakes the class is making. </div>");
      
      }
      var failed= false;
      
      
    }
    function drawPie(corr)
    {
      corr = Math.round(corr);
      var wrong = 100-corr;
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
          if(value[i]>24)   str3 += '<div>'+name[i]+'</div><div class="perc valor">'+Math.round(value[i])+'%</div></div>';
          else str3 += '</div><div class="perc0">'+name[i]+'&nbsp;&nbsp;</div><div class="perc2 valor">'+Math.round(value[i])+'%</div>';
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
            if(w==0) 
            {
              bars[w].style.padding = "9px 0 9px 5px";
              bars[w].style.minHeight ="37.55px";
              bars[w].style.boxShadow = "0px 0px 5px black";

            }            
            if(curValue>=85) bars[w].style.background = "#007a3d";
            else if(curValue>=75) bars[w].style.background = "#f9d616";
            else bars[w].style.background = "#ce1126";
            bars[w].style.width = curValue + "%";
            if(bars[w].style.width == "0px") 
            {
              var goodValue = bars[w].getElementsByTagName('div')[1].textContent;
              if(w==0) bars[w].setAttribute('style', 'width:'+goodValue+';background:'+bars[w].style.background+';padding: 9px 0 9px 5px;box-shadow: 0px 0px 5px black');
              else bars[w].setAttribute('style', 'width:'+goodValue+';background:'+bars[w].style.background);
            }
            curValue = 0;
          }
          var min = Math.min(...value);
          if(addPie && min>=85) 
          {
            bars[0].style.background = "#007a3d";
          }
          else if(addPie && min>=75) 
          {
            bars[0].style.background = "#f9d616";
          }
          else if(addPie && min<75) 
          {
            bars[0].style.background = "#ce1126";
            
          }
        }, 100);
    }

    function drawTable(tableData)
    {
      tableData.pop();
      tableData.pop();
      for(var i = 0;i<tableData.length;i++){
        tableData[i].subj = tableData[i].subj.toUpperCase();
        try
        {
          if(tableData[i].subj =='wwt' || tableData[i].subj =='WWt'|| tableData[i].subj =='Wwt'|| tableData[i].subj =='WWT') 
          {
            tableData.splice(i, 1);
            i--;
          }

        }catch(e){}
      }
      var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;align-items: center;/*! justify-content: center; */margin-top: 7%;"><h3 style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">Evaluation history📜</h3>';
      str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;margin-left: auto;fill: white;"href="javascript:table.print(false, true)">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      str+= '</svg></a></div><div style="margin-left: auto;margin-right: auto;"><div id="example-table" style=""></div></div>';  
      $(".container").append(str);
      table = new Tabulator("#example-table", 
			{
				
				//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        //data:tableData, //assign data to table
				selectable:false,
        groupBy:"ans4",
        groupStartOpen:function(value, count, data, group){
					//value - the value all members of this group share
					//count - the number of rows in this group
					//data - an array of all the row data objects in this group
					//group - the group component for the group
					var d = new Date();
					var d1 = (d.getMonth()+1)+'/'+d.getFullYear();
					return value == d1; //all groups with more than three rows start open, any with three or less start closed
				},
        initialSort:[{column:"q_id", dir:"asc"}],
				layout:"fitColumns", //fit columns to width of table (optional)
        responsiveLayout:true,
        printAsHtml:false, 
        printCopyStyle:false, //copy Tabulator styling to HTML table
				//persistentLayout:true,
				columns:[ //Define Table Columns
          {title:"ID", field:"q_id", align:"center", width:15},
					// {title:"Hidden", field:"ans4", align:"left", formatter:"text", minWidth:0.1,width:0.1,padding:0.1, editable:false},
					//{title:"Student Name", field:"title", align:"left",width:300, editor:inputEditor, editable:true, cellDblClick:editf, variableHeight:true, responsive:2},
					{title:"Student Name", field:"title", align:"left",width:300, editable:false, variableHeight:true, responsive:2},
					{title:"Scr", field:"ansr", align:"center", width:50, editable:false},
					{title:"Total", field:"ans2", align:"center", width:50, formatter:"text", editable:false},
					{title:"Grd", field:"reason", align:"center",  width:50, editable:false},
					{title:"Type", field:"subj", align:"left", width:50, editable:false,},
					{title:"Date", field:"quest", align:"left", width:100, editable:false, variableHeight:true, responsive:2},
					{title:"Qtr", field:"ans1", align:"left",width:50, editable:false}
				]});

        // $.ajax({ method: "POST", url: "getQuestArray.php", data:{ data : JSON.stringify(tableData)}})
        // .fail(function(data) {console.log( "errorTable:"+JSON.stringify(data));})
        // .done(function(data) {
        //   console.log("logging: "+ JSON.stringify(data)+", "+data);
        //   table.setData(data);
        // });
        table.setData(tableData);

    }

    function drawStudents(tableData)
    {
      var str = '<div class="alert alert-dismissible alert-primary" style="width:100%;display: flex;align-items: center;/*! justify-content: center; */"><h3 style="text-align: center;margin-bottom: 0;margin-top: 0;margin-left: auto;padding-left: 67px;">Student List📜</h3>';
      str+= '<a class="nav-link" style="display: initial;padding: 0;float: right;margin-left: auto;fill: white;"href="javascript:table.print(false, true)">Print <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -2px;left: 4px;"><path d="M399.95 160h-287.9C76.824 160 48 188.803 48 224v138.667h79.899V448H384.1v-85.333H464V224c0-35.197-28.825-64-64.05-64zM352 416H160V288h192v128zm32.101-352H127.899v80H384.1V64z"/>';
      str+= '</svg></a></div><div id="example-table" style="margin-left: auto;margin-right: auto;width:auto !important;"></div>';  
      $(".container").append(str);

      //calc numbers
      var prevName = "";
        tableData.sort((a, b) => parseFloat(a.usr_ID) - parseFloat(b.usr_ID));
        var tableDataNew = [];
        var ansArray= [];
        var userArray=[];
        var fail = false;
        var valueArray;
        for (var s = 0;s <= tableData.length;s++)
        {
          if(s == tableData.length)
          {
            var ansArrayLength = ansArray.length;
            var ansArrayTotal = ansArray.reduce((a, b) => a + b, 0);
            
            userArray.push({progress: ansArrayTotal/ansArrayLength, subject: tableData[s-1].subj });
            ansArray = [];
            var totalVal=0;
            for (var z = 0;z<userArray.length;z++)
            {
              totalVal+=userArray[z].progress;

            }
            totalVal = totalVal/userArray.length;

            tableDataNew.push({user:tableData[s-1].usrName, class:tableData[s-1].class, progress2:JSON.parse(JSON.stringify(totalVal)), progress:JSON.parse(JSON.stringify(userArray))});
            userArray = [];
            break;
          }

          if(s>0 && (tableData[s].subj != tableData[s-1].subj)|| s == tableData.length)
          {
            var ansArrayLength = ansArray.length;
            var ansArrayTotal = ansArray.reduce((a, b) => a + b, 0);
            
            userArray.push({progress: ansArrayTotal/ansArrayLength, subject: tableData[s-1].subj });
            ansArray = [];
          }
          if((tableData[s].usrName.toLowerCase() != prevName.toLowerCase() && prevName != "") || s == tableData.length)
          {
            var totalVal=0;

            //calc result and add to array/object -> divide everything from the array with its length
            for (var z = 0;z<userArray.length;z++)
            {
              totalVal+=userArray[z].progress;

            }
            totalVal = totalVal/userArray.length;

            tableDataNew.push({user:tableData[s-1].usrName, class:tableData[s-1].class, progress2:JSON.parse(JSON.stringify(totalVal)), progress:JSON.parse(JSON.stringify(userArray))});
            userArray = [];
          }

          prevName = tableData[s].usrName;

          if(tableData[s].answer == tableData[s].ansR) ansArray.push(100);
          else ansArray.push(0);
        } 
      
   

      //custom progress formatter for tabulator
      var progressFormatter = function(cell, formatterParams){ //progress bar
      valueArray = cell.getValue()|| 0;
      var max = formatterParams && formatterParams.max ? formatterParams.max : 100,
      min = formatterParams && formatterParams.min ? formatterParams.min : 0,
      color, percent;
      var str="";
      //make sure value is in range
      // value = parseFloat(value) <= max ? parseFloat(value) : max;
      // value = parseFloat(value) >= min ? parseFloat(value) : min;
      for (var z = 0;z<valueArray.length;z++)
      {
        var value = valueArray[z].progress;
        if(value > 84){
        color = "#007a3d";
      }else if(value > 74){
        color = "#f9d616";
      }else{
        color = "#ce1126";
        fail = true;
      }
      var colorFor = "white";
      str+= "<div style='margin-right: "+ 98/(valueArray.length*100) +"%;border: 1px solid; border-radius:5px; display: inline-block;width:" + 98/valueArray.length + "%'><div style='text-shadow: 1px 1px 2px black; width:" + value + "%;margin-right:4px; color:" + colorFor + "; background-color:" + color + "; height: 16px; display:inline-block;' data-max='" + max + "' data-min='" + min + "'>&nbsp;"+ valueArray[z].subject+ ": " + Math.round(value) + "%</div></div>";
   
      }

      return str;
    }

      //custom progress formatter for tabulator
      var progressFormatter2 = function(cell, formatterParams){ //progress bar
      var value2 = cell.getValue()|| 0,
      max = formatterParams && formatterParams.max ? formatterParams.max : 100,
      min = formatterParams && formatterParams.min ? formatterParams.min : 0,
      color, percent;

        var color="";
        if(value2 > 84){
          color = "#007a3d";
        }else if(value2 > 74){
          color = "#f9d616";
        }else{
          color = "#ce1126";
        }
        if(fail) color = "#ce1126";
        var colorFor = "white";
        str= "<div style='border: 1px solid; border-radius:5px; display: inline-block;width: 100%'><div style='text-shadow: 1px 1px 2px black; width:" + value2 + "%;margin-right:4px; color:" + colorFor + "; background-color:" + color + "; height: 16px; display:inline-block;' data-max='" + max + "' data-min='" + min + "'>&nbsp;Total: " + Math.round(value2) + "%</div></div>";
      
      return str;
     }

      //init tabulator
      table = new Tabulator("#example-table", 
			{
				
				//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
				data:tableDataNew, //assign data to table
				selectable:1,
        //groupBy:"subj",
				initialSort:[{column:"quest", dir:"asc"}],
				layout:"fitColumns", //fit columns to width of table (optional)
        responsiveLayout:true,
        printAsHtml:true, 
        printCopyStyle:false, //copy Tabulator styling to HTML table
				//persistentLayout:true,
				columns:[ //Define Table Columns
          // {title:"ID", field:"q_ID", align:"center", width:15},
          {title:"Full Name", field:"user", align:"left", width:200},
          {title:"Class", field:"class", align:"left", width:130},
          {title:"Overall Performance", field:"progress2", formatter:progressFormatter2, sorter:"number", width:100},
          {title:"Performance", field:"progress", formatter:progressFormatter, sorter:"number"}
        ]});
        table.setSort("progress2", "desc");
        $('.tabulator-row .tabulator-cell').css('overflow','visible');
    }

    function deleteClassAnswer(value)
    {
      if(value == '') value = 'all';
      $.ajax({ method: "POST", url: "questDel.php", data:{ class : JSON.stringify(value)}})
        .fail(function(data) {})
        .done(function(data) {
          console.log(data);
          truClass = true;
          // namo = <?php echo json_encode($_SESSION['username']) ?>;
          // surnamo = <?php echo json_encode($_SESSION['surname']) ?>;
          claso = $("#classInput").val();
          theID = $("#classInput").val();
          $(".container").children().remove();
      
            $.ajax({  method: "POST", url: "getOverall.php", data:{ data : theID, type: "class" }})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
            .done(function(data){
              chartCalc(JSON.parse(data));
              data = [];
              $("#classInput").select();
              $("#classInput").val('');
            });
        
        });

    }

    // $("#classInput").on('keyup', function (e) {
    // if (e.keyCode === 13) 
    // {
    //   var type = "class";
    //   $(this).select();
    //   truClass = true;

    //   claso = $(this).val();
    //   theID = $(this).val();
    //   if ($(this).val() == "all") type = "all";
    //   $(".container").children().remove();

    //   loadData(theID,type);
    // }
    // else if (e.keyCode === 27) 
    // {
    //   $(this).val("");
    // }
    // });

  
    $("#classInput").on('focus', function (e) {
      $("#userInput").val("");

    });
    $("#userInput").on('focus', function (e) {
      $("#classInput").val("");

    });

    function loadData(theID)
    {

      // claso = "all";
      //theID = theID;

      // if(dateS == 0)
      // {
        if (theID == undefined) return null;
       
      // $.ajax({ method: "POST", url: "getDate.php", data:{ data : theID, type: type }})
      // .fail(function(data) {console.log( "fail: "+JSON.stringify(data));})
      //   .done(function(data){
      //   var list = JSON.parse(data);
      //   var listDate = [];
      //   for (var i = 0; i<list.length; i++) listDate[i] = list[i].date;
      //   var strBut = "";

      //   var unique = listDate.filter((v, i, a) => a.indexOf(v) === i); 
      //   strBut += '<div class="" style="width:100%;display: flex;"><div class="m-auto">';
      //   for(var h=0;h<unique.length;h++) strBut += ' <input type="button" class="btn btn-primary btn-sm m-auto" onclick="loadData(\''+theID+'\',\''+type+'\',\''+unique[h]+'\')" id="dateButton" style="display: inline; margin: 0 2.5px 0 2.5px !important;" value="'+unique[h]+'"</button>';
      //   strBut +='</div></div>';
      //   lastButtons = strBut;
      //   $(".container").append(strBut);
      if (theID == 'all') 
      {
        $.ajax({  method: "POST", url: "getOverallQuestAll.php", data:{ data : theID}})
          .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
          .done(function(data){
            chartCalc(JSON.parse(data));
            //$('input[type="button"]').first().addClass('selectedz');
            data = [];

          });
        }
      else {
        $.ajax({  method: "POST", url: "getOverallQuest.php", data:{ data : theID}})
          .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
          .done(function(data){
            chartCalc(JSON.parse(data));
            //$('input[type="button"]').first().addClass('selectedz');
            data = [];

          });
        }
        // });
      // }
      // else
      // { 
      //   $.ajax({  method: "POST", url: "getOverall.php", data:{ data : theID, type: type, date : dateS }})
      //     .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
      //     .done(function(data){
      //       $(".container").children().remove();
      //       $(".container").append(lastButtons);
      //       $('input[type="button"][value="'+dateS+'"]').addClass('selectedz');
      //       chartCalc(data);
      //       data = [];

      //     });
      // }
    }


    window.addEventListener("load", function()
    {

      claso = "all";
      truClass = true;
      //loadData("lool","all");
      $.ajax({  method: "POST", url: "getOverallQuestName.php"}).done(function(data){
        data;
      });
      $('.flexdatalist').flexdatalist({
      minLength: 0,
      data:"getOverallQuestName.php",
      searchIn: ['title','initials'],
      visibleProperties: ["initials","title"],
      focusFirstResult: 'true',
      searchDelay: 1,
      searchByWord: 'true',
      maxShownResults: 5
      });

      loadData('all');

$('input.flexdatalist').on('change:flexdatalist', function(e, set, options) {
    // if (e.keyCode === 27) 
    // {
    //   set.text = "";
    // }
    });    

    $('input.flexdatalist').on('select:flexdatalist', function(e, set, options) {
        //console.log(set.text);
        $(".container").children().remove();
        truClass = false;
        namo = set.title;
        // try
        // {
        //   namo = set.user;
        //   surnamo = set.pass;
        // } catch(error){}

        // claso = set.class;
        set.title = set.title.charAt(0).toUpperCase() + set.title.slice(1);
        $('#userInput-flexdatalist').val(set.title);
        loadData(set.title);

    });
    
    });


</script>
</body>
</html>