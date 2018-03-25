
//This adds up the selected time

Number.prototype.padDigit = function() { return (this < 10) ? '0'+this : this; }
function timeSummation(id1, id2, id3, id4, id5, id6, id7, id8, id9, id10){
  var t1 = document.getElementById(id1).value.split(':'); //id1 is actually #time1
  var t2 = document.getElementById(id2).value.split(':'); //id2 is actually #time2
  var t3 = document.getElementById(id3).value.split(':');
  var t4 = document.getElementById(id4).value.split(':');
  var t5 = document.getElementById(id5).value.split(':');
  var t6 = document.getElementById(id6).value.split(':');
  var t7 = document.getElementById(id7).value.split(':');
  var t8 = document.getElementById(id8).value.split(':');
  var t9 = document.getElementById(id9).value.split(':');
  var t10 = document.getElementById(id10).value.split(':');      
  var mins = Number(t1[1])+Number(t2[1])+Number(t3[1])+Number(t4[1])+Number(t5[1])+Number(t6[1])+Number(t7[1])+Number(t8[1])+Number(t9[1])+Number(t10[1]);
  var hrs = Math.floor(parseInt(mins / 60));
  hrs = Number(t1[0])+Number(t2[0])+Number(t3[0])+Number(t4[0])+Number(t5[0])+Number(t6[0])+Number(t7[0])+Number(t8[0])+Number(t9[0])+Number(t10[0])+hrs; 
  mins = mins % 60;
  return hrs.padDigit()+':'+mins.padDigit();
}


function addUpTime(){
}



function resetTime(obj){
	alert("Temporarily disabled")
/*
	var stamp=$(obj).attr('class');
	stamp=stamp.split('t');
	t=stamp[1];
	var stp=$('#time'+t).val('0:00');
*/
}

function resetAllTime(){ // Not used yet
   i=0
	while (i < 11) {
		$('#time'+i).val('0:00');
	    i++;
	}
}


function highlightBtn(obj){
	if(obj.style.color=="#CCC" || obj.style.color!="red"){
		$(obj).css({"color":"red", "display":"block"});
		firstZero(obj);
	}else{
		$(obj).css({"color":"#CCC", "display":""});
 		removeTime(obj);
	}	
}

// This finds the first 0:00 in the calculater time slots and places the time in there
function firstZero(obj){
	i=1
	while (i < 11) {
       theVal=window.parent.document.getElementById("time"+i).value;	   
		if(theVal=="0:00"){
// 			ts=i-1;
			var gTime=$(obj).closest(".record").find("h12").text();	
			var tm=gTime.split(':')
			x=tm[0];
			y=tm[1];
			x=x.replace("h","");
			y=y.replace("m","");
			x = +x
			$('#time'+i, window.parent.document).val(x+":"+y);
			break; // stops after first occurance
		}					
	    i++;
	}
}


function removeTime(obj){
	var gTime=$(obj).closest(".record").find("h12").text();	
	var tm=gTime.split(':')
	var x=tm[0];
	var y=tm[1];
	var x=x.replace("h","");
	var y=y.replace("m","");
	var x = +x
	deleteThis=x+":"+y	
	///// Above cleans up time format, below iterates through timeboxes and deletes time that equals variable from above
   i=1
	while (i < 11) {
       theVal= window.parent.document.getElementById("time"+i).value;
	   
		if(theVal==deleteThis){
			window.parent.document.getElementById("time"+i).value="0:00";
			ts=i-1;
			break; // stops after first occurance
		}	
				
	    i++;
	}
}





