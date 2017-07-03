<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Stop Watch </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/cssBasic.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		
	<!-- Fonts START -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500, 600, 700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
		

	</head>
	<style>
		body, html{
			background-color: #4A525A;
			background-image: url(images/joggers.png);
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
			background-position: center center;
		}
		.clearfix:after {
			visibility: hidden;
			display: block;
			font-size: 0;
			content: " ";
			clear: both;
			height: 0;
			}
		* html .clearfix             { zoom: 1; } /* IE6 */
		*:first-child+html .clearfix { zoom: 1; } /* IE7 */
		h10{
			display:inline-block;
			width: 100px;
			height: 20px;
			text-align: center;
			color: #666;
			font-family: 'Roboto', sans-serif;
			letter-spacing: .02em;
			font-weight: 600;
			font-size: 14px;
			padding-top: 10px;
			background-image: url(images/pointer.png);
			background-repeat: no-repeat;
			background-position: 76px -1px;
		}
		h11{
			color: #333;
			font-family: 'Roboto', sans-serif;
			font-weight: 500;
			font-size: 18px;
			display: block;
			height: 6px;
		}
		h12{
			color: #00AEEF;
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 32px;
			letter-spacing: 1px;
		}
		h13{
			color: #333;
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			font-size: 14px;
		}
		h13 span{
			font-weight:500;
			}
		.logo{
			position: fixed;
			width: 48px;
			height: 60px;
			left: 20px;
			top: 20px;
			background-image: url(images/watchLogo.png);
			background-repeat: no-repeat;
			z-index: 4;			
		}
		label{
			color: #fff;
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
		}

		#theTime{
			border: 0px;
			border: none;
			height: 85px;
			background-color: rgba(0,0,0, 0);
			color: #fff;
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 300;
			font-size: 70px;
			text-align: center;
			width: 355px;
			resize: none;
		}
		.overlayBkg{
			background-color:rgba(74,82,90, .8);
			position: fixed;
			left:0;
			right: 0px;
			bottom: 0px;
			top:0px;
			z-index: 1;
		}
		.wrapper{
			position: relative;
			z-index: 3;
			width: 355px;
			height: 300px;
			margin: 40px auto 0px;
			text-align: center;
		}
		.wrapperControls{
			position: absolute;
			margin-left: -175px;
			left:50%;
			bottom:40%;
			z-index: 3;
			width: 355px;
			height: 230px;
			z-index: 4;		
		}

		#theDate{
			color:#B3BAC0;
			font-family: 'Roboto', sans-serif;
			font-size: 20px;
			width: 355px;
			text-align: center;
			text-transform: uppercase;
		}
		#upload{
			border: 0px;
			border: none;
			height: 22px;
			margin-left: 10px;
			cursor: pointer;	
		}
		#activityInput{
			height: 22px;
			padding: none;	
			padding: 0px;
			box-sizing: border-box;					
		}
		.buttonClass{
			border: 0px;
			border: none;
			width: 354px;
			position: absolute;
			top:60%;
			left: 50%;
			margin-left: -177px;
			height: 68px;
			margin-bottom: 10px;
			cursor: pointer;
			border-radius: 6px;
			font-size: 22px;
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			color:#fff;
			text-transform: uppercase;
		}
		.buttonClassSecondary{
			border: 0px;
			border: none;
			width: 170px;
			height: 68px;
			position: absolute;
			top:95%;
			left: 50%;
			margin-bottom: 10px;
			cursor: pointer;
			border-radius: 6px;
			font-size: 18px;
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			color: #fff;
			background-color:rgba(255, 255, 255, .4);
		}
		#timeLog{
			font-family: 'Roboto', sans-serif;
			color: #fff;
		}
		#start{
			background-color: rgba(131, 206, 91, .8);			
		}
		#start:hover{
			background-color: rgba(131, 206, 91, 1);			
		}
		#stop{
			background-color: rgba(255, 55, 145, .8);
			display: none;			
		}
		#stop:hover{
			background-color: rgba(255, 55, 145, 1);			
		}
		#pause{
			margin-left: -175px;
		}
		#clear{
			margin-left: 6px;
		}
		.bkgBillboard{
			position: absolute;
			z-index: 2;
			left: 0px;
			right: 0px;
			top:230px;
			height: 200px;
			color:rgba(104, 117, 130, 0.8);
			text-align: center;
			font-family: 'Roboto Condensed', sans-serif;;
			font-size: 200px;
			text-transform: uppercase;
			overflow: hidden;
		}
		.record{
			width: 200px;
			cursor: pointer;
			padding: 14px;
			color: #333;
			float: left;
			border-bottom: 1px solid #DFDFDF;			
		}
		.record:hover{
			background-color:rgba(245, 245, 245, 0.8);			
		}
		.recordCheck{
			background-image: url(images/greenDot.png);	
			background-repeat: no-repeat;
			background-position: 210px; center;		
		}

		.logDrawer{
			position: fixed;
			z-index: 4;
			left:0px;
			right:0px;
			height: 40px;
			bottom: 0px;
			background-color:rgba(250, 250, 250, 1);
			transition: height .25s linear;
		}
		#notes{
			float: right;
			border:none;
			border:0px;
			resize: none;
			width: 260px;
			height: 300px;
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			color: #666;
			background-color: #efefef;
			border-radius: 6px;
			box-sizing: border-box;
			padding: 8px;
		}
		.saveBtn{
			border: 0px;
			border: none;
			height: 26px;
			width: 100px;
			margin-top: 6px;
			background-color: #fff;
			cursor:pointer;
			float: right;
			border-radius: 4px;
			color: #fff;
			background-color: rgba(131, 206, 91, .8);			
		}
		.saveBtn:hover{
			background-color: rgba(131, 206, 91, 1);			
		}
		#notesWrapper{
			position: fixed;
			top: 170px;
			left: 50%;
			margin-left: 0px;
			width: 260px;
			height: 340px;
			float: right;
			display: none;
		}

		.drawerBtn{
			position: absolute;
			height: 39px;
			top:0px;
			left:0px;
			right: 0px;
			cursor: pointer;
			text-align: center;
		}
		.drawerBtn:hover{
			background-color: #EDEDED;
		}
		#timeLog{
			margin: 100px auto 0px;
			display: -webkit-flex;
		    display: flex;
		    -webkit-flex-direction: column-reverse;
		    flex-direction: column-reverse;			
    		z-index: 7;
			top:80px;
			width: 550px;
			padding: 60px 0px 20px 0px;
			display: block;
		}
		#timeLogColumn{
			float: left;
			display: -webkit-flex;
		    display: flex;
		    -webkit-flex-direction: column-reverse;
		    flex-direction: column-reverse;				
    		width: 200px;
			padding: 10px;
			box-sizing:border-box;
			display: block;
		}
		.selecWrappert{
			display: inline-block;
		}
		

	</style>
	
	<body nload="form1.reset();" ng-app="stopWatchApp" ng-controller="mainCtrl">

	<div class="logo"></div>
	
	<div class="wrapper" >
		
		<input type="text" id="activityInput" ng-model="activity"/><button id="upload" onclick="updateList()">add</button>
		<br>
		<br>
		
		<div class="selecWrappert">
			<label id="activity">Activity</label>
		        <select name="myActivity" id="myActivity" onchange="clearTime();" ng-change="theChnge()" onmouseover="openActivityList()" ng-model="myValue"></select>
		        		</div>
						
		<br>
		<br>
		<form>
			<textarea id="theTime">00:00:00:00</textarea>
			<div id="theDate"></div>
			<br>
			<br>
		</form>
		
	</div>	<!-- Wrapper -->
	
	
	<div class="wrapperControls">		
		<button id="start" class="buttonClass">start</button><br/>
		<button id="stop" class="buttonClass">stop</button><br/>
		<button id="clear" ng-click="clearActivity()" class="buttonClassSecondary">clear</button>
		<button id="pause" class="buttonClassSecondary">pause</button>
	</div>	
	
		<div id="theActivity" class="bkgBillboard">{{activity}}</div>
		<div class="overlayBkg"></div>
		

		<div class="logDrawer" id="logDrawer" onclick="openDrawer()">
			
			<div class="drawerBtn">
				<h10 id="log">Logs</h10>
			</div>
			
				<div id="timeLog" class="clearfix">
					<div id="timeLogColumn"></div>
						<div id="notesWrapper">
						<textarea id="notes"  onblur="if(this.value==''){ this.value='Write a note...'}" onfocus="if(this.value=='Write a note...'){ this.value=''}">Select from left</textarea>
						<br>
						<button id="saveBtn" class="saveBtn" onclick="saveNote()">Save</button>
					</div>
				</div>
				
		</div>
	
		<!-- Custom jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		<script src="stopWatch.js"></script>
	</body>
	
</html>