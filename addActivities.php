<?php include 'functions.php';?>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Activity Manager </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/login.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>
	
	<style>
		.activityWrapper{
			width: 320px;
			box-sizing: border-box;
			padding: 20px;
			height: 450px;
			background-color: #555e68;
			margin: 200px auto 10px;
			border-radius: 6px;
		}
		.activityTableWrapper{
			width:280;
			height: 300px;
			overflow-x: hidden;
		}
		table, tr, td{
			color: #b8c6d7;
			font-family: 'Roboto', sans-serif;
			letter-spacing: .03em;
			font-weight: 300;
		}
		hr {
		    display: block;
		    height: 1px;
		    border: 0;
		    border-top: 1px solid #646f7b;
		    margin: 1em 0;
		    padding: 0; 
		}
		#newActivityInput{
			width: 230px
		}
		.bkgActBillboard{
			position: absolute;
			text-align: center;
			left: 0px;
			right: 0px;
			top:60px;
			font-size: 64px;
			font-family: 'Roboto', sans-serif;
			color: #7C8996;
		}
		.deleteActBtn{
			background-color: #3d454e;
			color: #5c6672;
			font-weight: 800;
			letter-spacing: .06em;
			cursor: pointer;
			width: 80px;
			transition: all .15s linear;
		}
		.deleteActBtn:hover{
			background-color: #353c44;
			font-weight: 600;
		}
		.addAct{
			background-color: #6fae4d;
			color: #395a27;
			font-weight: 600;
			letter-spacing: .04em;
			cursor: pointer;
			transition: background-color .15s linear;			
		}
		.addAct:hover{
			background-color: #7ec756;
		}
		.actBackBtn{
			position: absolute;
			width: 34px;
			height: 35px;
			border-radius: 100%;
			background-color: #373e46;
			box-sizing: border-box;
			left: 50%;
			margin-left: -16px;
			top:160px;
			cursor: pointer;
			transition: background-color .15s linear;
			background-image: url(assets/images/closeBtn.png);
			background-position: center center;
			background-repeat: no-repeat;
		}
		.actBackBtn:hover{
			background-color: #00AEEF;			
		}
	
	</style>
	
	<body ng-app="stopWatchApp" ng-controller="mainCtrl">
	
	<div id="theActivity" class="bkgActBillboard">{{activity}}</div>
	
	<div class="actBackBtn"></div>
	
	<div class="activityWrapper">
		
		<form method="post" autocomplete='off' action="addActivities.php">
										
			<input type="text" id="newActivityInput" class="inputClass" name="newActivity" ng-model="activity" onblur="if(this.value==''){ this.value='Enter new activity';}" onfocus="if(this.value=='Enter new activity'){ this.value=''}"/>
					
			<input type="submit" class="addAct" name="addAct" value="Add"> 
						
		</form>
		
		<hr/>
		<br/> 
		
		<form method="post" autocomplete='off' action="addActivities.php">	
			<input type="submit" class="deleteActBtn" name="deleteActButton" value="Delete">
			<br/>
			<br/>
			<div class="activityTableWrapper">
				<table class="activityTable">
				<?php echo displayActList(); ?> 
				</table>
			</div>
			
			
		</form>
		
	</div>

	</body>
	
	<!-- Custom jQuery -->
	<script src="assets/js/stopWatch.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
	<script>
///////// ANGULAR ////////////////////////////////////////////////////////////

	angular.module("stopWatchApp", [])
	
	.controller('mainCtrl', function($scope){
		 
		//$scope.activity = 'Enter new activity';	    
    
	});
	
	</script> 
	
</html>