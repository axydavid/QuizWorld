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
	    $option .= '<option value = "'.$row['classID'].'">'.$row['class'].'</option>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel - Subjects</title>
<link rel="stylesheet" href="dist/css/bootstrap/bootstrap(2).css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://SortableJS.github.io/Sortable/Sortable.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">


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
      <li class="nav-item active">
        <a class="nav-link" href="subjects.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="fill:#343a40;position: relative;top: -2px;"><path d="M405.2 64h-21c15 5.7 22.8 20.6 22.8 42.7v298.7c0 22.1-7 37.3-22.8 42.7h21c23.7 0 42.8-19.2 42.8-42.7V106.7c0-23.5-19.1-42.7-42.8-42.7zM345.5 64.2c-1.4-.1-2.8-.2-4.2-.2H106.7C83.2 64 64 83.2 64 106.7v298.7c0 23.5 19.2 42.7 42.7 42.7h234.7c1.4 0 2.8-.1 4.2-.2 21.5-2.1 38.5-20.4 38.5-42.5V106.7c-.1-22.1-17.1-40.4-38.6-42.5zM208 256l-56-32-56 32V96h112v160z"></path></svg> Class &amp; Subjects<span class="sr-only">(current)</span></a>
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
        <a class="nav-link" href="homeAdmin.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="position: relative;top: -2px;" viewBox="0 0 512 512"><path d="M170.718 216.482L141.6 245.6l93.6 93.6 208-208-29.118-29.118L235.2 279.918l-64.482-63.436zM422.4 256c0 91.518-74.883 166.4-166.4 166.4S89.6 347.518 89.6 256 164.482 89.6 256 89.6c15.6 0 31.2 2.082 45.764 6.241L334 63.6C310.082 53.2 284.082 48 256 48 141.6 48 48 141.6 48 256s93.6 208 208 208 208-93.6 208-208h-41.6z"/>
        <path d="M170.718 216.482L141.6 245.6l93.6 93.6 208-208-29.118-29.118L235.2 279.918l-64.482-63.436zM422.4" fill="#343a40"></path>
      </svg> Take Exam</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="position: relative;top: -2px;"><path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0 1.41zM19 3H5c-1.11 0-2 .9-2 2v3c0 .55.45 1 1 1s1-.45 1-1V6c0-.55.45-1 1-1h12c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
        <path d="M10.79 16.29c.39.39 1.02.39 1.41 0l3.59-3.59c.39-.39.39-1.02 0-1.41L12.2 7.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L12.67 11H4c-.55 0-1 .45-1 1s.45 1 1 1h8.67l-1.88 1.88c-.39.39-.38 1.03 0" fill="#343a40"></path>
      </svg> Log Out</a>
      </li>
    </ul>
  </div>
		</nav>
<!-- <input type="button" value="Save" onclick="save();"> -->
<div class="container specialContainer" style="margin-top: 15px;">
<div class="specialContainer">
<div style="display: flex;">
<div>
<p style="position: relative;left: 30px;opacity: .8;">Class:</p>
<form style="position: relative;left: 30px;">
 <select id="classSelect" class="custom-select" style="height: auto;width: 227px;display: initial;padding: 2px;padding-left: 2px;padding-left: 5px;"> 
<?php echo $option; ?>
</select>
</form>
<input type='image' src='img/delete.png' value='x' onclick='deleteClass();' height='25px' style='position: relative; top: -28px;left:3px;'/>
<input type="input" class="form-control" placeholder="Add class" id='addInput'  autocapitalize="word"/>
</div>
<div style="position: relative;left: 24px;">
    <p style="opacity: .8;">Exam:</p>
    <input  id="numberSelect" type="number" value="60" class="form-control" name="quantity" min="10" max="99999999" style="height: auto;display: initial;padding: 2px;padding-left: 2px;padding-left: 5px;width:50px;"> Min per Subject
    <input id="examButton" type="button" onclick="exam()" value="Exam" class="btn btn-sm btn-primary d-block" style="margin-top: 5px;">
</div>
</div>
</div>
<p id='parr' class="alert alert-danger" style="text-align: center;margin-top:1rem;margin-left:auto;margin-right:auto;width: max-content;display:none;"></p>

<div id="container" style="display:flex;flex-wrap: wrap;padding-left: 25px;padding-top  : 25px;border: solid 1px #bfbfbf;border-radius: 5px;margin-top: 16px;">
<p style="position: relative;left: 5px;opacity: .8;width: 100%;margin-bottom: 0px;">Class subjects:</p>
<div>
<input type='image' src='img/delete.png' value='x' onclick='clearClass();' height='25px' style="position: relative; top: 36px;left:-22px;float: left;"/>
<ul class="ul" id="items" style="position: relative;right: -10px;margin-right:40px">
	<!-- <li value="secret"><div>This is</div></li> -->
	<!-- <li >item 2</li>
	<li>item 3</li>
    <li>item 4</li> -->
    
</ul>
</div>
<div class='break2'></div>
<ul class="ul3" id="items2">
    <p style="position: relative;left: 5px;opacity: .8;">Subjects:</p>
    <div class='lol' style="display:flex"><input type='image' src='img/plus.png' height="32px" style="margin: 7px auto;" value="Add" onclick="add('#items2');"></div>
    <div class='break'></div>
    <div style="display:flex"><ul id="deleter" ondrop="$('#deleter').removeClass('deleter2');" ondragover="$('#deleter').attr('class', 'deleter2');"></ul></div>
</ul>

<ul class="ul3" id="items3">
    <p style="position: relative;left: 5px;opacity: .8;">Subdivisions:</p>
    <div class='lol' style="display:flex"><input type='image' src='img/plus.png' height="32px" style="margin: 7px auto;" value="Add" onclick="add('#items3');"></div>
    <div class='break'></div>
    <div style="display:flex"><ul id="deleter2" ondrop="$('#deleter2').removeClass('deleter2');" ondragover="$('#deleter2').attr('class', 'deleter2');"></ul></div>
</ul>
</div>
<script>
window.addEventListener('load', function(){
    getDB(2);
    $('#classSelect').val('2');
    checkSubQuest();
});

    var i = 0;
    var editing = false;

function clearClass()
{
    $("#items .filtered").nextAll("li").remove();
    
    var classSubjects = ""; var classID, className; var subjID ="";
    $('#items li').each(function(){
        classSubjects += $(this).text()+",";
        subjID += $(this).attr("value")+",";
        classID=$('select').children('option:selected').val();
        className=$('select').children('option:selected').text();
    });
    $.ajax({  method: "POST", url: "classUpdate.php", data:{ classID:classID, subj:classSubjects,classR:className, subjID:subjID}})
    .fail(function(data) {console.log( "error:"+JSON.stringify(data));saveItems = true;})
    .done(function(data){
        console.log("clearedITEMS OK : "+saveItems+" : "+data);saveItems = false; 
        var namo = $(this).children('option:selected').val();
        console.log("clearing: "+namo);
        getDB(namo);
        })


}

function deleteClass()
{ 
    var theID = $("#classSelect").val();
    var class2 = $('#classSelect').children('option:selected').text();
    if(theID == 1 || theID == 0) return false;
    $.ajax({  method: "POST", url: "classDel.php", data:{ classID : theID, class : class2 }})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
            .done(function(data){
                $('#classSelect').val('2');
                $("#classSelect option[value='"+theID+"']").remove();
                $("#addInput").val('');
                getDB(2);
            })
    $.ajax({ method: "POST", url: "ansClassDel.php", data:{ class : JSON.stringify(class2)}});


}

function exam()
{
    var classExam = $('#classSelect').children('option:selected').text();
    var minutes = $('#numberSelect').val();
    
    $.ajax({  method: "POST", url: "setExam.php", data:{ class : classExam, minutes : minutes }})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
            .done(function(data){
                $('#examButton').animate({'border-color': "transparent"}, 50);
                $('#examButton').animate({'background-color': "#4cbb17"}, 500);
            });
}

function getDB(classIDZ)
{  
    var tableData2={};
    var str2 = "";
    var cool3;
    var cool2;
    var str = "";

    $("#items").empty();
    $("#items2 li").remove();
    $("#items3 li").remove();


    $.ajax({url:"subjectsClassGet.php"}).fail(function(data) {console.log( "error classGet:"+JSON.stringify(data));}).done(function( msg ) {
        console.log( "data classGet:"+JSON.stringify(msg));
        tableData2 = JSON.parse(msg);
        
        cool2 = tableData2[1].subj.split(",");
        cool3 = tableData2[1].subjIDs.split(",");
        for (var i =0;i<tableData2.length;i++)
        {
            if (classIDZ == null) var classIDZ=$('select').children('option:selected').val();
            if(tableData2[i].classID == classIDZ)
            {
                console.log(i);
                cool2 = tableData2[i].subj.split(",");
                cool3 = tableData2[i].subjIDs.split(",");
                break;
            }
        }

        if (cool2[cool2.length-1] === "") cool2.splice(cool2.length-1, 1);
        if (cool3[cool3.length-1] === "") cool3.splice(cool3.length-1, 1);
        var prevValue = "";

        for(var i=0; i<cool2.length; i++) 
        {
            str2 += "<li value='"+cool3[i]+"'>"+cool2[i]+"</li>";
        }

        $("#items").append(str2);
        var subjIDArray = [];
        for(var i=0; i<tableData2.length; i++) 
        {
            // try
            // { 
            //     for(var i=0; i<cool3.length; i++) 
            //     {
            //         if(cool3[i]==tableData2[i].subjID) 
            //         {
            //             continue;
            //         }
            //     }    
            // } 
            // catch(e){console.log(e) }
            if(cool3.includes(tableData2[i].subjID)) { continue; }
                var kole = subjIDArray.includes(tableData2[i].subjID);
            if(!subjIDArray.includes(tableData2[i].subjID))
            {
                str += "<li value='"+tableData2[i].subjID+"'>"+tableData2[i].subjName+"</li>";
                // if(tableData2[i].subjName=="Intro") str = '<li class="'+strF+'" value="'+tableData2[i].subjID+'">'+tableData2[i].subjName+'</li>';
                subjIDArray.push(tableData2[i].subjID);
            }
            //prevValue = tableData2[i].subjID;
        }
        var str3 = '<li class="filtered" value="3">Intro</li>';
        $("#items2 p").after(str);
        $("#items2 p").after(str3);
        $("#items li[value=3]").addClass("filtered");
    });
}
function add(what)
{  
    maxID = -1;

    if (what=='#items3')
    {
    maxID = $('.selected').attr("value");
    $(what).find('.lol').before('<li value="'+maxID+'" class="fadeIn" style="height:0px;padding:0px;transition: all 0.20s;">Sub</li>');
    $(what).find('.lol').prev().height(18);
    $(what).find('.lol').prev().css('padding', '.75rem 1.25rem');
    $(what).find('.lol').prev().dblclick();
    setTimeout(function() {$(what).find('.lol').prev().css('height', ''); }, 500);
    }
    else if(what=='#items2')
    { 
        $.ajax({url:"subjectsAdd.php"}).fail(function(data) {console.log( "error:"+JSON.stringify(data));})
        .done(function(msg){
        maxID = parseInt(msg);
        console.log( "data:"+JSON.stringify(msg));
        $(what).find('.lol').before('<li value="'+maxID+'" class="fadeIn" style="height:0px;padding:0px;transition: all 0.20s;">Subject</li>');
        $(what).find('.lol').prev().height(18);
        $(what).find('.lol').prev().css('padding', '.75rem 1.25rem');
        setTimeout(function() {
            $("#items2.ul3 li.selected").removeClass("selected");
            $("#items2.ul3 li").attr("ondrag","");
            $(what).find('.lol').prev().css('height', ''); 
            $(what).find('.fadeIn:last-of-type').addClass("selected");
            $(what).find('.fadeIn:last-of-type').attr("ondrag","$(this).removeClass('selected');$('#items3 li').remove();");
            $(what).find('.fadeIn:last-of-type').dblclick();

            var thisID =  $(what).find('.fadeIn:last-of-type').attr("value");
            $.ajax({  method: "POST", url: "subdivisionsGet.php", data: { subjID: thisID}})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
            .done(function( msg ) {
             console.log( "data:"+JSON.stringify(msg));
            tableData = JSON.parse(msg);
            for(var i = 0;i<tableData.length;i++)
            {
                if ($('#classSelect').children('option:selected').text() == tableData[i].class)
                {
                    var cool = tableData[i].subjSubd.split(",");
                    break;
                }
            }
            
            try{
            if (cool[cool.length-1] === "") cool.splice(cool.length-1, 1);
            for(var i=0; i<cool.length; i++) str += "<li class='subdivision' value='"+thisID+"' style='height:0px;padding:0px;transition: all 0.2s ease 0s;'>"+cool[i]+"</li>";
            $("#items3 li").remove();
            $("#items3 p").after(str);
            $(".subdivision").height(18);
            $(".subdivision").css('padding', '.75rem 1.25rem');
            
            //$('#items2').find('.lol').next().css('height', '');
            setTimeout(function() { $(".subdivision").css('height', ''); }, 500);
            } catch(e){}

    });
        }, 200);});

    }
    


}

function checkSubQuest()
{
$.ajax({url:"subjectsGet.php"}).done(function( msg ) {
            tableData = JSON.parse(msg);
            var subject=[];
            var subdivision = Array.from(Array(2), () => new Array(4));
            for(var i =0;i<tableData.length;i++)
            {
                subject[i]= tableData[i].subjName;
                
                var cool = tableData[i].subjSubd.split(",");
                if (cool[cool.length-1] === "") cool.splice(cool.length-1, 1);

                subdivision[i]=cool;
            }

            $.ajax({method: "POST", url: "checkSubQuest.php", data:{ subj:JSON.stringify(subject),sub:JSON.stringify(subdivision) }}).done(function( msg ) {
            var returer = JSON.parse(msg);
            if(returer.length>0)
            {
                $('#parr').empty();
                $('#parr').append('ATTENTION: These Subdivision(s) do not have questions assigned to them, please add at least one question to prevent possible errors:');
                for(var i=0;i<returer.length;i++) $('#parr').append('<br/> <span style="font-family: auto;position: relative;top: -2px;">👉</span> '+returer[i]);
                $('#parr').append('<br/><br/>If you cannot edit the questions at the moment do not assign these subjects to any <b>Class subjects</b> as you will get errors. ');
                $('#parr').show(250);

            }
            else 
            {
                $('#parr').hide(250);
                $('#parr').empty();
            }

            });
        });
}
function save()
{
//var order = $('#items').sortable('serialize');
$('#items li').each(function(){
    console.log($(this).attr("value")+" : "+ $(this).text());
});

//console.log(order[0].innerText);
}

function remover(what)
{
    var ul = $(what);
    
    $('li', ul).each(function(){
        var joe =  $(this);
        joe[0].setAttribute('draggable',false);
        joe[0].style.cssText = '-webkit-animation : fadeOut 500ms';
        if(what=="#deleter")
        {
            var joeID = joe[0].getAttribute('value');
            var joeName = joe.text();
            $.ajax({  method: "POST", url: "subjectsDel.php", data:{ subjID:joeID, subj:joeName }})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
            .done(function(data){console.log("saved OK : "+saveItems3+" : "+data);saveItems3 = false; })
        }
        //$(this).css('-webkit-animation', 'fadeOut 500ms');
        $(this).bind('webkitAnimationEnd',function(){
            joe[0].remove();
    });
    });
}

function removeDuplicates(id,height,width)
{
    var ul = $('#' + id);
    var i=0;
    $('li', ul).each(function(){
    if($('li:contains("' + $(this).text() + '")', ul).length > 1)
    {   
        if (i==1)
        {
        var joe =  $(this);
        
        if (joe[0].text!="Intro")
        {
        joe[0].style.cssText = '-webkit-animation : fadeOut 700ms; transition: all 0.50s;';
        $(this).bind('webkitAnimationStart',function(){
            if(height==true)joe[0].style.height = '0px';
            if(width==true)joe[0].style.width = '0px';
            joe[0].style.padding = '0px';
            joe[0].style.margin = '0px';
        });
        $(this).bind('webkitAnimationEnd',function(){
            joe[0].remove();
            return false;
         });
        }
        }
        i++;
    }
        });
}

var onchange = function(element, callback) {
    var HTML = element.innerHTML;
    window.setInterval(function() {
        var newHTML = element.innerHTML;
        if(HTML !== newHTML) {
            HTML = newHTML;
            callback(element);
        }
    });
}

$('select').change(function(){
    var namo = $(this).children('option:selected').val();
  console.log("changing: "+namo);
  getDB(namo);
});

$("#addInput").on('keyup', function (e) {
    if (e.keyCode === 13) {
        
        var className = $("#addInput").val();
        $.ajax({  method: "POST", url: "classAdd.php", data:{ className:className}})
            .fail(function(data) {console.log( "errorAdd:"+JSON.stringify(data));})
            .done(function(data){
                console.log("maxidclass: "+data);
                $('select').append($('<option>', {value: data, text: className}));
                $('select').val(data);
                $("#addInput").val('');
                getDB(data);
            })
    }
});

$(document).keydown(function (e) {
	if(e.keyCode == 13)
    {
        $("#inputMe").blur();
	}});
function updateItems()
{
    console.log("saved");
       $("#deleter2").css('opacity', '0');
       $("#deleter").css('opacity', '0');

       try{clearTimeout(timeOut);} catch(e){ }

       try{clearTimeout(timeOut2);} catch(e){ }
      timeOut2 = setTimeout(function() {
       var classSubjects = ""; var classID, className; var subjID ="";
          $('#items li').each(function(){
                classSubjects += $(this).text()+",";
                subjID += $(this).attr("value")+",";
                classID=$('select').children('option:selected').val();
                className=$('select').children('option:selected').text();
            });
            $.ajax({  method: "POST", url: "classUpdate.php", data:{ classID:classID, subj:classSubjects,classR:className, subjID:subjID}})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));saveItems = true;})
            .done(function(data){console.log("savedITEMS OK : "+saveItems+" : "+data);saveItems = false; })}, 1000);
        
       timeOut = setTimeout(function() 
       {
        var subjSubdID = "";
        var subjSubd = "";
        var subjID;
        var subjName = "";
        var subjIDArray =[];
        var subjNameArray=[];
        var classSubjects = "";
        var classID, className;


        // if(saveItems3 == true)
        // {
            $('#items3 li').each(function(){
                subjSubd += $(this).text()+",";
                subjSubdID = $(this).attr("value");
            });
        // }



      var i =0;
      $('#items li, #items2 li').each(function(){
        subjID = $(this).attr("value");
        subjName=$(this).text();
        
        subjIDArray.push(subjID);
        subjNameArray.push(subjName);
        i++;

        });
    $.ajax({  method: "POST", url: "subjectsUpdate2.php", data:{ subjIDArray:subjIDArray, subjNameArray:subjNameArray,subjSubd:subjSubd,subjSubdID:subjSubdID }})
    .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
    .done(function(data){console.log("saved OK : "+saveItems3+" : "+data);saveItems3 = false;});
        //$('#items li').each(function(){console.log($(this).attr("value")+" : "+ $(this).text());});

       }, 1000);

}

$(function  () {
    $('#items').sortable({
	// SortableJS options go here
	// See: (https://github.com/SortableJS/Sortable#options)

    animation: 150,
    dragClass: 'drag',
    group: 'shared',
    filter: '.filtered',
	// . . .
});

$('#items2').sortable({
	// SortableJS options go here
	// See: (https://github.com/SortableJS/Sortable#options)
    dragClass: 'drag',
    animation: 150,
    group: {
        name: 'shared'
    },
    filter: '.filtered',
	// . . .
});
$('#deleter').sortable({
	// SortableJS options go here
	// See: (https://github.com/SortableJS/Sortable#options)
    dragClass: 'drag',
    animation: 150,
    group: {
        name: 'shared'
    },
    connectWith: "#items3",
	// . . .
});



$('#deleter2').sortable({
	// SortableJS options go here
	// See: (https://github.com/SortableJS/Sortable#options)
    dragClass: 'drag',
    animation: 150,
    group: {
        name: 'shared2'
    },
	// . . .
});
$('#items3').sortable({
	// SortableJS options go here
	// See: (https://github.com/SortableJS/Sortable#options)
    dragClass: 'drag',
    animation: 150,
    group: {
        name: 'shared2'
    },
	// . . .
});
});

var mySortableList = $('#items').sortable('widget');

var oriVal;
var timeOut, timeOut2;
var saveItems3 = false;
var saveItems = false;





// var oriSize;
// $("ul").on('click', 'li', function () {
// var thisA = $(this);
// oriSize = thisA[0].scrollWidth;
// });

onchange($('#deleter')[0], function(){
   if ( $('#deleter:active').length) {} else
    {
        remover("#deleter");
        console.log("DELETED");
    }
});

onchange($('#deleter2')[0], function(){
   if ( $('#deleter2:active').length) {} else{remover("#deleter2");console.log("DELETED")}
});

onchange($('#container')[0], function(){
   if ( $('#container:active').length) {} 
    else
    {
        updateItems();
    }
});

onchange($('#items3')[0], function(){
   if ( $('#items3:active').length) {$("#deleter2").css('opacity', '0.5');} else{$("#deleter2").css('opacity', '0');saveItems3 = true;}
});

onchange($('#items2')[0], function(){
   if ( $('#items2:active').length) {$("#deleter").css('opacity', '0.5');} else{$("#deleter").css('opacity', '0');$("#deleter2").css('opacity', '0');$('#deleter2').removeClass('deleter2');}
});

onchange($('#items')[0], function(){
   if ( $('#items:active').length) {} else{
    try{clearTimeout(timeOut2);} catch(e){ }
    timeOut2 = setTimeout(function() {
        $("#deleter2").css('opacity', '0');
        $('#deleter2').removeClass('deleter2');
       var classSubjects = ""; var classID, className; var subjID ="";
          $('#items li').each(function(){
                classSubjects += $(this).text()+",";
                subjID += $(this).attr("value")+",";
                classID=$('#classSelect').children('option:selected').val();
                className=$('#classSelect').children('option:selected').text();
            });
            $.ajax({  method: "POST", url: "classUpdate.php", data:{ classID:classID, subj:classSubjects,classR:className, subjID:subjID}})
            .fail(function(data) {console.log( "error:"+JSON.stringify(data));saveItems = true;})
            .done(function(data){console.log("savedITEMS OK : "+saveItems+" : "+data);saveItems = false;})}, 1000);
    }
});


$("#items2").on('mousedown', 'li', function () {
    

});



$("#items2").on('mouseup', 'li', function () {
    if(editing) return false;
    if ($(this).hasClass("filtered")) return false;
    $("#items2.ul3 li.selected").removeClass("selected");
    $("#items2.ul3 li").attr("ondrag","");
    $(this).addClass("selected");
    $(this).attr("ondrag","$(this).removeClass('selected');$('#items3 li').remove();");
    var thisA = $(this).attr('value');
    //var oriSize = thisA[0].scrollWidth-14;
    console.log("selected");

    var str = "";
    $.ajax({  method: "POST", url: "subdivisionsGet.php", data: { subjID: thisA}})
    .fail(function(data) {console.log( "error:"+JSON.stringify(data));})
    .done(function( msg ) {
    console.log( "data:"+JSON.stringify(msg));
    tableData = JSON.parse(msg);
    var cool = tableData[0].subjSubd.split(",");
    if (cool[cool.length-1] === "") cool.splice(cool.length-1, 1);
    for(var i=0; i<cool.length; i++) str += "<li class='subdivision' value='"+thisA+"' style='height:0px;padding:0px;transition: all 0.2s ease 0s;'>"+cool[i]+"</li>";
    $("#items3 li").remove();
    $("#items3 p").after(str);
    $(".subdivision").height(18);
    $(".subdivision").css('padding', '.75rem 1.25rem');
    //$('#items2').find('.lol').next().css('height', '');
    setTimeout(function() { $(".subdivision").css('height', ''); }, 200);
});
});
// $("#items2").on('mouseup', 'li', function () {
//     $(this).removeClass("selected");
//     console.log("selected");
// });
$("#items2").on('dblclick', 'li', function () {
    if(editing){$('#inputMe').val("");return false;}
    if ($(this).hasClass("filtered")) return false;
    var thisA = $(this);
    var oriSize = thisA[0].scrollWidth;
    oriSize = oriSize - 17;
    editing = true;
    var thisA = $(this);
    oriVal = $(thisA).text();
    $(this).text("");
    guy =  $("<input type='text' id=inputMe style='width:"+oriSize+"px;'>").appendTo(this);
    guy.focus();
    guy.val(oriVal);
    guy.attr('draggable',false);
    //guy.addClass("filtered");


});

$("#items").on('dblclick', 'li', function () {
    if(editing){$('#inputMe').val("");return false;}
    if ($(this).hasClass("filtered")) return false;
    var thisA = $(this);
    var oriSize = thisA[0].scrollWidth;
    editing = true;
    var thisA = $(this);
    oriVal = $(thisA).text();
    $(this).text("");
    guy =  $("<input type='text' id=inputMe2 style='width:"+oriSize+"px;'>").appendTo(this);
    guy.focus();
    guy.val(oriVal);
    
});

$("#items3").on('dblclick', 'li', function () {
    if(editing){$('#inputMe').val("");return false;}
    if ($(this).hasClass("filtered")) return false;
    try{clearTimeout(timeOut);} catch(e){ }
    var thisA = $(this);
    var oriSize = thisA[0].scrollWidth;
    editing = true;
    var thisA = $(this);
    oriVal = $(thisA).text();
    $(this).text("");
    guy =  $("<input type='text' id=inputMe style='width:"+oriSize+"px;'>").appendTo(this);
    guy.focus();
    guy.val(oriVal);

});
var time;
$("ul").on('focusout', 'li > input', function () {
    editing = false;
    if ($(this).hasClass("filtered")) return false;
    var $this = $(this);
    var $parent = $this.parent();
    $parent.text($this.val() || oriVal);
    $parent.attr('draggable',true);
    $parent.removeClass("filtered");
    $this.remove(); // Don't just hide, remove the element.
    removeDuplicates('items',false,true);
    removeDuplicates('items2',true,false);
    removeDuplicates('items3',true,false);
    clearTimeout(time);
    time = setTimeout(function(){
    $parent.parent().trigger("mouseup");
    $parent.parent().trigger("change");
    updateItems();
    },200);
});

</script>
</body>
</html>