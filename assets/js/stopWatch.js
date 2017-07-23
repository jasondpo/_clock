//////////////////////////////////
$(function(){	
	$(".logoutBtn").click(function(){
	    $(".overlay").fadeIn('fast');
	});
	$(".overlay").click(function(){
	    $(".overlay").fadeOut('fast');
	});
	$(".goToActPage").click(function(){
	    window.location.href = "addActivities.php";
	});
	$('.deleteBtn').click(function(event){
    	event.stopPropagation();
    	var ans= $(this).attr("id");
    	//alert(ans);
    	$("#deleteLog").val(ans);
    	$("#deleteLogBtn").click();
	});
	$('.record').click(function(event){
    	var log= $(this).attr("id");
    	var log=log.substr(log.indexOf("-") + 1);
    	var storedNote = $("#noteBox-"+log).html();
    	$('#notes').html(storedNote);
		$("#saveNote").val(log);
    });
	$(".actBackBtn").click(function(){
		window.location.href = "stopWatch.php";
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
	    if (milliseconds >= 60) {milliseconds = 0;
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
	    t = setTimeout(add, 10);
	}
	
	
	
	function startMe(){
	  clearTime();
	  timer();
	  clock();
	  document.getElementById('start').style.display='none';
	  document.getElementById('stop').style.display='block';
	}
	
	/* Start button */
	start.onclick = startMe;
	
	/* Stop button */
	stop.onclick = function(){
	    clearTimeout(t);
	    clock();
	    getMyTime();
	    collectData();
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
	    clearIcon();
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
    var m = addZero(d.getMinutes());
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
	//getNote(obj);
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

function getMyTime(){
	var myTime = $('#diff').val();
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
    
    //$scope.activity = 'Enter Activity';
	
    
});

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
    
 //////////////// Time Difference START //////////////////////////


	var clk=0;
		
	function clock(){
		clk++;
		if(clk==1){
			document.getElementById("startTime").value=getTime();
			document.getElementById("endTime").value="";
			clearDiff();
		}if(clk==2){
			document.getElementById("endTime").value=getTime();
			clk=0;
			diff();
		}
	}
	
	function addZero(i) {
	    if (i < 10) {
	        i = "0" + i;
	    }
	    return i;
	}
	
	function getTime(){
		var d = new Date();
	    var h= d.getHours();
	    var m= addZero(d.getMinutes());
	    var s= addZero(d.getSeconds());
	    var ms= addZero((d.getMilliseconds()/10).toFixed(0));
	    var startTime =h+":"+m+":"+s;
		
		return startTime;
	}
	
	function diff(start, end) {
		
		var start = document.getElementById("startTime").value;
		var end = document.getElementById("endTime").value;
		
	    start = start.split(":");
	    end = end.split(":");
	    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
	    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
	    var diff = endDate.getTime() - startDate.getTime();
	    var hours = Math.floor(diff / 1000 / 60 / 60);
	    diff -= hours * 1000 * 60 * 60;
	    var minutes = Math.floor(diff / 1000 / 60);
	    var seconds = Math.floor(diff / 1000);
	    
		document.getElementById("diff").value=(hours < 9 ? "0" : "") + hours + "h:" + (minutes < 9 ? "0" : "") + minutes+"m";
	}

	function clearDiff(){
		document.getElementById("diff").value="";		
	}
	
	function clearIcon(){
		document.getElementById("diff").value="";
		document.getElementById("startTime").value="";		
		document.getElementById("endTime").value="";		
		
	}
//////////////// Time Difference END //////////////////////////  

/////////////// Submit Data to logForm START ///////////////


	function collectData(){
		var logdate=$("#theDate").html();
		$("#logDate").val(logdate);
		
		var logTimelapse=document.getElementById("diff").value;
		$("#logTimelapse").val(logTimelapse);
		
		var logActivity = document.getElementById("myActivity").value;
		$("#logActivity").val(logActivity);
		
		$("#logTimestop").val(timeDay);
		
		$("#submitData").click();
	}


/////////////// Submit Data to logForm END ///////////////




 