	var h1 = document.getElementsByTagName('textarea')[0],
	    start = document.getElementById('start'),
	    stop = document.getElementById('stop'),
	    clear = document.getElementById('clear'),
	    milliseconds = 0, seconds = 0, minutes = 0, hours =0,
	    t;
	
	function add() {
	    milliseconds++;
	    if (milliseconds >= 60) {
	        milliseconds = 0;
	        seconds++;
	        if (seconds >= 60) {
	            seconds = 0;
	            minutes++;
	        }if (minutes >= 60) {
	            minutes = 0;
	            hours++;
	        }

	    }
	    
	    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" +(minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds ? (seconds > 9 ? seconds : "0" + seconds) : "00") + ":" + (milliseconds > 9 ? milliseconds : "0" + milliseconds);
	
	    timer();
	}
	
	function timer() {
	    t = setTimeout(add, 1);
	}
	function startMe(){
	  clearTime();
	  timer();
	  document.getElementById('start').style.display='none';
	  document.getElementById('stop').style.display='block';
	}
	
	/* Start button */
	start.onclick = startMe;
	
	/* Stop button */
	stop.onclick = function() {
	    clearTimeout(t);
	    getTime();
	    setTimeout(openDrawer, 500);
	    document.getElementById('stop').style.display='none';
		document.getElementById('start').style.display='block';
		setTimeout(function(){document.getElementById('notesWrapper').style.display="block";}, 1000);
	}
	function clearTime(){
		h1.textContent = "00:00:00:00";
	    milliseconds = 0; seconds = 0; minutes = 0; hours = 0;
	}
	
	/* Clear button */
	clear.onclick = function() {
	    h1.textContent = "00:00:00:00";
	    milliseconds = 0; seconds = 0; minutes = 0; hours = 0;
	}
	
$(function(){	
	$('#timeLog').click(function(event){
    	event.stopPropagation();
     });

})
v=0
$(function(){
	$('#pause').click(function(event){
		v++
		if(v==1){	
	    	clearTimeout(t);
	    	$("#pause").html("resume");
		}
		if(v==2){	
    		timer();
    		$("#pause").html("pause");
			v=0;
		}
    });	
})		
///////////////////////////////////////////////////////////////////////
	
	// Array of day names
	var dayNames = new Array("SUN","MON","TUE","WED","THU","FRI","SAT");
	
	// Array of month Names
	var monthNames = new Array(
	"JAN","FEB","MAR","APR","MAY","JUNE","JULY","AUG","SEP","OCT","NOV","DEC");
	
	var now = new Date();
	
	document.getElementById('theDate').innerHTML=dayNames[now.getDay()] + ", " + monthNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear();
	
	timeStamp = dayNames[now.getDay()] + ", " + monthNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear();
	
//////////////////////////////////////////////// -->
	

function getDayTime() {
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    timeDay = h > 12 ? h-12 + ":" + m+' pm' : h + ":" + m+' am' ;
}

num=0

function counter(){
	num++
	number=num;
}
	
///////////////////////////////////////////////////////////////////////

var activityNotes = [
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...',
    'Write a note...', 
    'Write a note...'     
];

function getID(obj){
	deselectRecord();
	thelog=obj.id;
	document.getElementById(thelog).style.backgroundColor="#D2EBFB";
}

function deselectRecord(){
 allRecords=[];
 	var allLogs = document.getElementsByClassName("record");
 	
   for (var x = 0; x < allLogs.length; x++) {
     allRecords.push(allLogs[x]);
     allRecords[x].style.backgroundColor = "";
   }
}


function identify(obj){	
	getNote(obj);
	document.getElementById('notesWrapper').style.display="block";
}

function getNote(obj){
	document.getElementById('notes').value=activityNotes[obj-1];
	thisNote=obj-1; // this is the number of the array
}

function saveNote(){
	//alert('I work'+thisNote)
	message=document.getElementById('notes').value;
	activityNotes[thisNote] = message;
    document.getElementById("notes").innerHTML = message;
    checkUpdate();
}
function checkUpdate(){
	noteVal=document.getElementById('notes').value;
	if(noteVal!="Write a note..."){
		$("#logBox"+(thisNote+1)).addClass("recordCheck");
	}else if(noteVal=="Write a note..." || noteVal==""){
		$("#logBox"+(thisNote+1)).removeClass("recordCheck");
	}
}

function getTime(){
	var myTime = $('#theTime').html();
    var myAct = document.getElementById("myActivity").value;
    getDayTime();
    counter();
	$("#timeLogColumn").prepend("<div id='logBox"+number+"' class='record' onclick='identify("+number+"); getID(this)'><h11>"+myAct+"</h11><br><h12>"+myTime +"</h12><br><h13>"+timeStamp+"<h13> | <span>"+timeDay+"</span></div>");
}



///////// ANGULAR ////////////////////////////////////////////////////////////

angular.module("stopWatchApp", [])

.controller('mainCtrl', function($scope){ 
	
	$scope.clearActivity = function(){
      $scope.activity = "";
    };
    
    $scope.theChnge = function(){
	  var e = document.getElementById("myActivity");
	  var selectedAct = e.options[e.selectedIndex].value;
      $scope.activity = selectedAct;
    }; 
    
});

////////////////////////////// 

var theActivity = [

    '<option value="Jogging">Jogging</option>',
    '<option value="Baby sitting">Baby sitting</option>',
    '<option value="Homework">Homework</option>'

];

document.getElementById("myActivity").innerHTML = theActivity;

/*
function reUpload(){
	document.getElementById("myActivity").innerHTML = theActivity;
}
*/

/*
function updateList(){
	var act = document.getElementById("activityInput").value;
	
	
	// get reference to select element
	var sel = document.getElementById('myActivity');
	
	// create new option element
	var opt = document.createElement('option');
	
	// create text node to add to option element (opt)
	opt.appendChild( document.createTextNode(act) );
	
	// set value property of opt
	opt.value = act; 
	
	// add opt to end of select box (sel)
	sel.prepend(opt); 
	$('select option:first-child').attr("selected", "selected");
}
*/

function updateList(){
 	var b = document.getElementById("activityInput").value;
	//var newSubject ="'<option value='school'>school</option>";
	var newSubject ='<option value="'+b+'">'+b+'</option>';
	theActivity.unshift(newSubject);
	//alert(theActivity);
	document.getElementById("myActivity").innerHTML = theActivity;
	reUpload();	
};
//////////////////////////////


    function openDrawer(){
	    var b = document.getElementById("logDrawer");
	    var l = document.getElementById("log");

	    if(b.style.height == "40px" || b.style.height !="100%"){
			b.style.height="100%";
			l.style.backgroundPosition="76px -41px";
	    }else{
		   b.style.height="40px";
		   l.style.backgroundPosition="76px 0px";
		   document.getElementById('notesWrapper').style.display="none";
		   deselectRecord();			
	    }
    }
    