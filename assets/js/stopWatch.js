


//////////////////////////////////
$(function(){	
	$(".logoutBtn").click(function(){
	    $(".overlay").fadeIn('fast');
	});
	$(".overlay").click(function(){
	    $(".overlay").fadeOut('fast');
	});

})

//////////////////////////////
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
if (typeof(Storage) !== "undefined") {
	
	var storedNames = JSON.parse(localStorage.getItem("locals"));
    g = storedNames.split(" ");
    itemsLength=g.length-1;
	    i=0
	var text = "";
	while (i < g.length-1) {
	     text += '<option value="'+g[i]+'">'+g[i]+'</option>';       
	    i++;
	}
document.getElementById("myActivity").innerHTML = text;   
} else {
    alert("Sorry, your browser does not support Web Storage...");
}

////////// Add more info to local storage  //////////////
var x = document.getElementById("myActivity"); // this is somehow grabbing each option
var txt = "";
var a;
for (a = 0; a < x.length; a++) {
    txt = txt + x.options[a].text+' ';
} 
function updateList(){
	location.reload(); // Not sure why the 'reload' works here, but not at end of function

	textVal=document.getElementById('activityInput').value;	
	textVal=textVal+" "+txt;
	localStorage.setItem("locals", JSON.stringify(textVal));

	///////
	 var storedText = localStorage.getItem("myStorage");
	//// After this point alerts don't work 
	 storedText=storedText.split(" ");
	    u=0
	var text = "";
	while (u < storedText.length) {
	     text += '<option value="'+storedText[u]+'">'+storedText[u]+'</option>';       
	    u++;
	}
	document.getElementById("myActivity").innerHTML = text;
}

function reloadPage(){}

////////// Clear local storage  //////////////

function clearText(){
	textVal="";
	localStorage.setItem("locals",textVal);
    location.reload(); 
}
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
 setTimeout(function(){
	 document.getElementById("myActivity").selectedIndex = "1";}, 500)   
    
    