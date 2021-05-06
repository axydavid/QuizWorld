<?php 
$_SESSION['class'] =  "Admin";
	session_start();
	$con = mysqli_connect('localhost','epiz_24668685','aviavi200100');
	mysqli_select_db($con,'epiz_24668685_quizworld2');
	
	if ($_SESSION['class']!= "Admin") 
	{
		header('location:home.php');
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
        <a class="nav-link" href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" style="position: relative;top: -3px;"><path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z" fill="#343a40";/></svg>Input<span class="sr-only">(current)</span></a>
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
		<div class="container specialContainer" style="margin-top: 15px;width: min-content;">

		<div class="questContainer" style="margin-top: 0px;margin-left:-5px;margin-bottom:5px;">
		<button class="btn btn-success btn-sm m-auto" id="reactivity-add" style="display: inline;"> Add </button>
		<button class="btn btn-success btn-sm m-auto" id="reactivity-delete" style="display: inline;"> Delete </button>
		<button class="btn btn-success btn-sm m-auto" disabled="" id="reactivity-undo" style="display: inline;"> Undo(0) </button>
		<button class="btn btn-success btn-sm m-auto" disabled="" id="reactivity-redo" style="display: inline;"> Redo </button>
		<button class="btn btn-success btn-sm m-auto" id="reactivity-update" style="display: inline;"> Update </button>
		<input id="dateInput" type="text" class="form-control" placeholder="currDate" style="width:100px;height: 13.5px;padding-left:5px;padding-right:5px">

		<input id="addInput" type="text" class="form-control" placeholder="Search" style="float:right;margin-right:0px;width:150px;">
		<!-- <label id="eventsmessage"> Array: </label> -->
		</div>

		<div id="loading-overlay" style="width:100%;height:100%;position:absolute;background:transparent;z-index:1;display:none;"></div>
		<div id="example-table"></div>
		</div>
		<script>
			var lastSel = [];
			var sizeCalcInt = 0;
			var lastRow = [];
			var picUpd;
			(function(window){
			window.firstPointer = true;
			window.pointer = 0;
			window.tableData = [];
			})(this);
			var table;
			var inputs = $('body'), inputTo;

			// // bind on keydown
			// inputs.on('keydown', function(e) {

			// 	// if we pressed the tab
			// 	if (e.keyCode == 9 || e.which == 9) {

			// 		// e.preventDefault();
			// 		// e.stopPropagation();
			// 	}
			// });
			// var editingCell = false;
			// var printIcon = function(cell, formatterParams, onRendered){ //plain text value
			// 	$(cell.getElement()).css("display", "inline-flex");
			// 	var cellqID = cell.getRow().getData().q_ID;
			// 	var i = 0;
			// 	var divTag = "<div style='display:inline-table;margin-left: 6px;' id='gallery"+cellqID+"'>";
			// 	var str = [];
			// 	if(cell.getRow().getData().img == null) return returnStr;
			// 	str = cell.getRow().getData().img.split(",");
			// 	if (str[str.length-1] === "") str.splice(str.length-1, 1);
			// 	//var imgTag =  "<a href='img/2.png'><img src='img/2.png' height='"+formatterParams.height+"' width='"+formatterParams.width+"'/></a> \n";
			// 	//var imgTag2 = "</div>&nbsp;<a href='img/plus.png'><img src='img/plus.png' height='"+formatterParams.height+"' width='"+formatterParams.width+"'/></a>";
			// 	var imgTag3 = "<div id='fileUploader"+cellqID+"'style='display: inline-grid;overflow: visible !important;'>+</div><input id='delete"+cellqID+"' type='image' src='img/delete.png' value='x' onclick='deletePics(this);' height='18px' style='position: relative; top: 4px;'/></div>";

			// 	var returnStr = divTag;
			// 	while(i < str.length) {
			// 		returnStr = returnStr.concat("<a href='"+str[i]+"'><img src='"+str[i]+"' height='"+formatterParams.height+"' width='"+formatterParams.width+"'/></a> \n");
			// 		i++;
			// 		}
			// 	returnStr = returnStr.concat(imgTag3);

			// 	//str.split(";");
			// 	return returnStr;
				
			// };

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

				var inputEditor = function(cell, onRendered, success, cancel, editorParams){
					//cell - the cell component for the editable cell
					//onRendered - function to call when the editor has been rendered
					//success - function to call to pass the successfuly updated value to Tabulator
					//cancel - function to call to abort the edit and return to a normal cell
					//editorParams - params object passed into the editorParams column definition property

					//create and style editor
					var editor = document.createElement("input");
					var input;
					editor.setAttribute("type", "text");

					//create and style input
					editor.style.padding = "3px";
					editor.style.width = "100%";
					editor.style.boxSizing = "border-box";

					//Set value of editor to the current value of the cell
					editor.value = cell.getValue();
					var colField = cell.getColumn().getField();
					
					//set focus on the select box when the editor is selected (timeout allows for editor to be added to DOM)
					onRendered(function(){
						var changed = false;
						colField = cell.getColumn().getField();
						inputs.on('keydown', function(e) {
							console.log(colField);
							if(event.shiftKey && event.keyCode == 9 && colField == 'ans4')
							{
								successFunc();
								//if(colField == 'title') {cell.nav().up(); cell.nav().next();}
								//else 
								cell.getRow().getPrevRow().getCells()[2].nav().next();
								inputs.off('keydown');
								return editor;
							}
						
							else if ((e.keyCode == 9 || e.which == 9) && colField == 'ans2') {
								successFunc();
								//if(colField == 'ansR') {cell.nav().down();cell.nav().prev();}
								//else 
								try{cell.getRow().getNextRow().getCells()[1].nav().next();}
								catch(e){
									
									setTimeout(function(){
										table.addRow().then(function(){
											table.setData("table.php").then(function() {
											
											var row = table.getRows()[table.getRows().length-1];
											row.getCells()[1].nav().next();
										});
										});
	
									}, 1)
								}
								inputs.off('keydown');
								return editor;
								
							}
							else if(e.keyCode == 27 || e.which == 27) cancel();
							// else if(event.shiftKey && (e.keyCode == 13 || e.which == 13)) cell.nav().up();
							else if((e.keyCode == 13 || e.which == 13))
							{
								successFunc();
								inputs.off('keydown');
								//table.setData("table.php");
								return editor;
							}
							// else if(e.keyCode == 13 || e.which == 13) 
							// {
							// 	successFunc();
							// 	inputs.off('keydown');
							// 	return editor;
							// }
							
							


					});

					editor.focus();
						editor.style.css = "100%";
						if(colField != 'title') editor.select();

					});

					//when the value has been set, trigger the cell to update
					function successFunc(){
						success(editor.value);
						
					}

					//editor.addEventListener("change", successFunc);
					editor.addEventListener("blur", successFunc);
					editor.addEventListener("keypress", keyHandler);
					
					function keyHandler(){
						console.log('keydown');

						};
					//return the editor element
					return editor;
				};

				var autoCompleteParams = 
				{
					showListOnEmpty:true, //show all values when the list is empty,
					freetext:true, //allow the user to set the value of the cell to a free text entry
					allowEmpty:true, //allow empty string values
					searchFunc:function(term, values){ //search for exact matches
						var matches = [];
						console.log('editing Stuff');
						values.forEach(function(item){
							var result = item.title.toLowerCase().indexOf(term);
							if(result != -1){
								matches.push(item);
							}
						});
						
						if(matches.length > 5) matches.splice(5, matches.length-1); 
						return matches;
					},
					listItemFormatter:function(value, title){ //prefix all titles with the work "Mr"
						var matches = value.match(/\b(\w)/g); // ['J','S','O','N']
						matches = matches.join(''); 
						return matches +" - "+ title;
					},
					values:true, //create list of values from all values contained in this column
					sortValuesList:"asc", //if creating a list of values from values:true then choose how it should be sorted
					defaultValue:".", //set the value that should be selected by default if the cells value is undefined
					elementAttributes:{
						id:"nameDataList" //set the maximum character length of the input element to 10 characters
					}
				}
				table = new Tabulator("#example-table", 
			{
				
				//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
				//data:tableData, //assign data to table
				addRowPos:"top",
				selectable:true,
				selectableRangeMode:"click",
				selectableRollingSelection:false,
				//initialSort:[{column:"quest", dir:"asc"}],
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
				layout:"fitColumns", //fit columns to width of table (optional)
				responsiveLayout:true,
				//keybindings:false,
				//persistentLayout:true,
				history:true,
				columns:[ //Define Table Columns
					{title:"ID", field:"q_ID", align:"center",editor:inputEditor,editable:false, width:15},
					{title:"Hidden", field:"ans4", align:"left", formatter:"text", editor:inputEditor, minWidth:0.1,width:0.1,padding:0.1, editable:true},
					//{title:"Student Name", field:"title", align:"left",width:300, editor:inputEditor, editable:true, cellDblClick:editf, variableHeight:true, responsive:2},
					{title:"Student Name", field:"title", align:"left",width:300, editor:"autocomplete", editorParams:autoCompleteParams, editable:true, variableHeight:true, responsive:2},
				
					{title:"Scr", field:"ansR", align:"center", width:50, editor:inputEditor,editable:true},
					{title:"Total", field:"ans2", align:"center", width:50, formatter:"text", editor:inputEditor, editable:true, cellDblClick:editf},
					{title:"Grd", field:"reason", align:"center",  width:50, editor:inputEditor, editable:false},
					{title:"Type", field:"subj", align:"left", width:50, editor:"select", editable:true, editorParams:{values:subject}},
					{title:"Date", field:"quest", align:"left", width:100,formatter:"date", editor:"input", editable:true, variableHeight:true, responsive:2},
					{title:"Qtr", field:"ans1", align:"left",width:50, editor:"select", editable:true, editorParams:{values:['Q1','Q2','Q3','Q4']}}
					// {title:"Choice 3", field:"ans3", align:"left", formatter:"text", editor:"textarea", editable:false, cellDblClick:editf},

//  					{title:"Subdivision", field:"sub", align:"left", editor:"select", editable:true
// 						, editorParams:function(cell){
// 							var sweet;
// 						var rows = table.getRows();
// 						var origSubj = cell.getRow().getData().subj;
// 						var values1 = {};
							
// 						rows.forEach(function(row){
// 							var data = row.getData();
// 							var id = subject.indexOf(data.subj);

// 							if(data.subj==origSubj) sweet =subdivision[id];//values1[data.sub] = "lol" + subdivision[id];
// 						});
// 						return {values:sweet};
// }
// },
					// {title:"Difficulty", field:"dif", align:"left", formatter:"progress", width:150, editor:true},
					// {title:"Images", field:"img", align:"left", formatter:printIcon,formatterParams:{height:"18px",width:"18px"},cellClick:edits,variableWidth:true, resizable:true},
				],
				rowClick:function(e, row){ //trigger an alert message when the row is clicked

				},
				
				// cellEditing:function(cell)
				// {
				// 	console.log('im editing');


				// 	// editingCell = true;
					


				// 	//if(colField != "subj" || colField != "sub") setTimeout(heightEnh(cell), 1000)

				// },
				
				// cellEditCancelled:function(cell)
				// {
				// 	// var tableData;
				// 	// editingCell = false;
				// 	// // var cellHeight = cell.getRow().getElement();
				// 	// // var cellSize = $(cellHeight).height();
				// 	//  //cellHeight.style.height = "29px";
				// 	//  //$(cellHeight).height(29);
				// 	// //if(cellSize > 29) $("html").animate({ scrollTop: '-'+sizeCalcInt/2 + 'px' },660);
				// 	//  $.ajax({url:"table.php"}).done(function( msg ) {tableData = msg;});
				// 	// 	table.setData(tableData);
				// },
	
				cellEdited:function(cell)
				{
					if(cell.getColumn().getField() == 'ansR' || cell.getColumn().getField() == 'ans2')
					{
						var cells = cell.getRow().getData();
						cells.reason = Math.round((cells.ansR / cells.ans2)*100);
						cell.getRow().getData().reason = cells.reason;
						cell.getRow().getCells()[5].getElement().textContent = cells.reason;
					}
					else if(cell.getColumn().getField() == 'quest')
					{
						var cells = cell.getRow().getData();
						var d1 = cells.quest.split("/");
						var quarter = Math.floor((parseInt(d1[0]) + 2) / 3);
						d1 = d1[0]+'/'+d1[2];
						cells.ans4 = d1;
						cells.ans1 = "Q"+quarter;
						$.post("tableEdit.php", cell.getRow().getData());
						table.redraw();
					}
					$.post("tableEdit.php", cell.getRow().getData());//.then(function(){table.setData("table.php");})
				},
			// 	$('#loading-overlay').show();
				
			// 	// editingCell = false;
			// 	// var scrollPos = $(document).scrollTop();
			// 	// if(window.firstPointer){
			// 	// 		window.firstPointer = false;
			// 	// 		var currentRow = new Object();
			// 	// 		var lastLastRow = new Object();
			// 	// 		var currentRow =  cell.getRow().getData(); 
			// 	// 		var lastLastRow = cell.getRow().getData(); 
			// 	// 		var coll = cell.getField();
			// 	// 		try
			// 	// 	{	
			// 	// 		var oldVal = cell.getOldValue();
			// 	// 		var stringStuff = JSON.parse('{"'+coll+'":"'+oldVal+'"}');
			// 	// 		var newVal = cell.getValue();
			// 	// 		var stringStuff2 = JSON.parse('{"'+coll+'":"'+newVal+'"}');
			// 	// 	} catch(e){ }

			// 	// 		var lastLastRow = $.extend(false, lastLastRow, stringStuff);
			// 	// 		var currentRow = $.extend(false, currentRow, stringStuff2);
			// 	// 		lastRow.unshift(lastLastRow);
			// 	// 		pointer = lastRow.length;
			// 	// 		window.firstPointer = false;
			// 	// 	}
			// 	// 	else
			// 	// 	{
			// 	// 		//lastRow.push(cell.getRow().getData());
			// 	 		window.pointer++;
			// 	// 	}
			// 	// 	lastRow[pointer] = cell.getRow().getData();

			// 	// if(window.firstPointer);

			// 	//}
				
			// 	 var cellHeight = cell.getRow().getElement();
			// 	 var origColor = $(cellHeight).css("background-color");
			// 	 //$("html").animate({ scrollTop: '-'+sizeCalcInt/2 + 'px' },900);
			// 	 //$(cellHeight).animate({height: 29}, 300);
			// 	//  table.redraw();
			// 	 $(cellHeight).css("transition", "background .25s ease-out");
			// 	 if($(cellHeight).is(".tabulator-row-odd")) $(cellHeight).addClass('gradientor');
			// 	 else $(cellHeight).addClass('gradientor2');
			// 	//  $("html").scrollTop(scrollPos);
			// 	 var cellData = cell.getRow().getData();
			// 	 cellData.reason = Math.round((cellData.ansR / cellData.ans2)*100);
			// 	 $.post("tableEdit.php", cellData, function( data ) 
			// 	 {})
			//    .done(function() {
			// 	//table.setData("table.php");
			// 	//cell.height = 29;
			// 	// $("html").scrollTop(scrollPos);
			// 	$(cellHeight).css("background-color", origColor);
				
			// 		table.setData("table.php").then(function(){
			// 		// $("html").scrollTop(scrollPos);
			// 		$(cellHeight).css("transition", "background 0s ease-out");

			// 		document.getElementById("reactivity-undo").innerHTML = "Undo("+window.pointer+")";
			// 		$('#loading-overlay').hide();

			// 		});

			// 	// $.ajax({url:"subjectsGet.php"}).done(function( msg ) {
			//     // tableData = JSON.parse(msg);
			// 	// var subject=[];
			// 	// var subdivision = Array.from(Array(2), () => new Array(4));
			// 	// for(var i =0;i<tableData.length;i++)
			// 	// {
			// 	// 	subject[i]= tableData[i].subjName;
					
			// 	// 	var cool = tableData[i].subjSubd.split(",");
			// 	// 	if (cool[cool.length-1] === "") cool.splice(cool.length-1, 1);

			// 	// 	subdivision[i]=cool;
			// 	// }


			// 	// });

			// 	// table.setData("table.php").then(function(){
			// 	// 	picUpdate();
			// 	// 	$("html").scrollTop(scrollPos);
			// 	// 	});

			// 	// $(cellHeight).animate({backgroundColor: origColor}, 300);//
			// 	// document.getElementById("reactivity-undo").innerHTML = "Undo("+window.pointer+")";

			// 	});


			// 	},
				groupClick:function(e, group){
					// clearTimeout(picUpd);
					  // picUpd = setTimeout(picUpdate,400);
					  setTimeout(function(){},1);
				},
				rowAdded:function(row)
				{
				 var d = $('#dateInput').val();
				 var d1 = d.split("/");
				 var quarter = Math.floor((parseInt(d1[0]) + 2) / 3);
				 d1 = d1[0]+'/'+d1[2];

				 var rowCount = table.rowManager.activeRowsCount;
				 var prevRow = table.getRowFromPosition(rowCount-1,true);
				 var cells = prevRow.getCells();
				 try{
					var totalGrd = cells[5].getData().ans2;
					var typeGrd = cells[5].getData().subj;
				 }
				 catch(e){
					prevRow._row.data
					var totalGrd = prevRow._row.data.ans2;
					var typeGrd = prevRow._row.data.subj;
				 }
				 var defaults =  { id: rowCount, quest: d, ans1:'Q'+quarter, subj:typeGrd,ans2:totalGrd,ans4:d1 };
				 $.post("tableAdd.php", defaults, function( data ) 
				 {
				 console.log( data ); // John
				 })
				.done(function() {
				//table.setData("table.php");
				
				});
				//$("html").scrollTop(scrollPos);

				},
				
				rowSelected:function(row){
				lastSel.push(row.getData().q_ID);
				},
				
				rowDeselected:function(row){
				var index = lastSel.indexOf(row.getData().q_ID);
				if (index !== -1) lastSel.splice(index, 1);
				},
			});

			table.setData("table.php").then(function(){
				
			});

			});


			document.getElementById("reactivity-add").addEventListener("click", function()
			{		 
				 table.addRow();
				 table.setData("table.php");
				// 
			// });

				//  $.post("tableAdd.php", lastRow[window.pointer], function( data )
				// 	{
				// 	console.log( data ); // John
				// 	})
				// 	.done(function() {
				// 	table.setData("table.php");

				// 	});
			});
			document.getElementById("reactivity-update").addEventListener("click", function()
			{
				table.setData("table.php");
			});

			document.getElementById("reactivity-undo").addEventListener("click", function()
			{
				if(window.pointer > 0) window.pointer --;

				$.post("tableReplace.php", lastRow[window.pointer], function( data ) {
				console.log(window.pointer);
				})
				.done(function() {
				table.setData("table.php");
				document.getElementById("reactivity-undo").innerHTML = "Undo("+window.pointer+")";
				});
			});
			document.getElementById("reactivity-redo").addEventListener("click", function()
			{
				if(window.pointer < lastRow.length-1) window.pointer ++;
					$.post("tableReplace.php", lastRow[window.pointer], function( data ) {
					console.log(window.pointer);
					})
					.done(function() {
					table.setData("table.php");
					document.getElementById("reactivity-undo").innerHTML = "Undo("+window.pointer+")";
					});
				
			});
			//remove bottom row from table on button click
			document.getElementById("reactivity-delete").addEventListener("click", function()
			{
				var i;
				var selRows = table.getSelectedRows();

				for (i = 0; i < selRows.length; i++) {
				  var rowData = selRows[i].getData();
				  if(rowData.q_ID == 1) continue;
				  var last = {"q_ID": rowData.q_ID};
				  lastRow[window.pointer] = rowData;
				  window.pointer ++;
				  //table.deleteRow(lastSel[i]);
				  selRows[i].delete();
				  $.post("tableDel.php", last, function( data ) 
				  {
					console.log( data ); // John
				  })  
				  .done(function() {
					table.setData("table.php").then(function(){
				
			});
				});
				}
				document.getElementById("reactivity-undo").innerHTML = "Undo("+window.pointer+")";
 
				//lastSel = [];

				//document.getElementById("eventsmessage").innerHTML = JSON.stringify(lastRow);

			});
			 function editf(e, cell){cell.edit(true); }
			 function edits(e, cell){var d = cell.getRow().getData().q_ID; table.deselectRow(1); }
			
			// function matchAny(data, filterParams)
			// {
			// 	//data - the data for the row being filtered
			// 	//filterParams - params object passed to the filter

			// 	var match = false;

			// 	for(var key in data){
			// 		if(data[key] == filterParams.value){
			// 			match = true;
			// 		}
			// 	}

			// 	return match;
			// 	//$("#example-table").tabulator("setFilter", matchAny, {value:5});
			// 	//var filter = $("#filter-field").val() == "function" ? customFilter : $("#filter-field").val();
			// }
			
			function updateFilter()
			{
				//table.searchRows("quest", "=", filVal.value);
				table.clearFilter();
				//table.setFilter("quest", "like", filVal.value);
				table.setFilter([
					[
						{field:"q_ID", type:"like", value:filVal.value}, 
						{field:"title", type:"like", value:filVal.value}, 
						{field:"quest", type:"like", value:filVal.value}, 
						{field:"ans1", type:"like", value:filVal.value}, 
						{field:"ans2", type:"like", value:filVal.value}, 
						{field:"ans3", type:"like", value:filVal.value}, 
						{field:"ans4", type:"like", value:filVal.value}, 
						{field:"reason", type:"like", value:filVal.value}, 
						{field:"subj", type:"like", value:filVal.value}, 
						{field:"sub", type:"like", value:filVal.value}, 
					]
					]);
				//table.setFilter(matchAny, filVal.value);
			}
			
			var filVal = document.getElementById("addInput");
			filVal.addEventListener('input', updateValue);
			
			function updateValue(e) 
			{
			  updateFilter();
			  clearTimeout(picUpd);
			  picUpd = setTimeout(picUpdate,400);
			}

			function heightEnh(cell) 
			{
			  	//$('.tabulator-editing').find( 'textarea' ).focus(heightEnh);
				var txtArea = $('.tabulator-editing').find( 'textarea' );
				//var txtArea = document.getElementsByClassName("tabulator-editing").lastChild;
				var txtEdit = document.getElementsByClassName("tabulator-editing");
				//var sizeCalc = txtArea.context.scrollingElement.scrollHeight.toString() +'px';
				//sizeCalcInt = txtArea.context.scrollingElement.scrollHeight;
				
				//var txtAreaList2 = $(cell.getElement()).find( 'textarea' );
				// var txtArea2 = txtAreaList2.context.textContent.split(/\r*\n/);

				// txtEdit[0].style.height = sizeCalc;

				 //txtArea.context.style.height = sizeCalc;
				//$(txtEdit[0]).animate({height: sizeCalcInt}, 300);
				//$(txtArea[0]).animate({height: sizeCalcInt+10}, 300);
				//$("#textAreaID").animate({ height: sizeCalc }, 500);
				//window.scrollBy(0, sizeCalcInt);
				//if(txtArea2.length > 1)$("html").animate({ scrollTop: sizeCalcInt/2 + 'px' }, 300);
			}
			window.addEventListener('load', function(){
				//after table is loaded
				var d = new Date();
				var quarter = Math.floor((d.getMonth() + 3) / 3);
				var d1 = (d.getMonth()+1)+'/'+d.getFullYear();
				d = d.toLocaleDateString();

				$('#dateInput').val(d);
			});
			window.addEventListener('resize', function(){
				table.redraw();
				// clearTimeout(picUpd);
				// picUpd = setTimeout(picUpdate,400);
			});
			$(window).resize(function() {
			//resize just happened, pixels changed
			});
			
			function picUpdate() 
			{
				var totalRows = table.rowManager.activeRowsCount;
				var i = 0;
				var rowData = table.getRows();
				var thisID;
				while(i<totalRows) 
				{
					i++;
					thisID = rowData[i-1].getData().q_ID;
					$('#fileUploader'+thisID).uploadFile({
							url:"uploadImg.php",
							multiple:true,
							dragDrop:false,
							fileName:"myfile",
							formData: {"q_ID":thisID},
						onSuccess:function(files,data,xhr,pd)
						{
							table.setData("table.php");
						},	
						});		
						
					try
					{		
						$('#gallery'+thisID+' a').simpleLightbox();
					} catch(e){continue;}	

										
						
				}//+cell.getRow().getData().q_ID+

			}
			function deletePics(element)
			{
				var str = element.id;
				var thisID = str.replace("delete", "");
				$.post("uploadLite.php", {"q_ID":thisID}, function( data ) {
				console.log(data);
				
				})
				.fail(function(data) {
					alert( "error:"+JSON.stringify(data));
				})
				.done(function() {

				});
				table.setData("table.php");
			}

		</script>
		
	</div>


		

	
</body>

</html>