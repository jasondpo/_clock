<?php session_start();?>
<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Stop Watch </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/stopwatch.css">
		<link rel="stylesheet" href="assets/css/login.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		
	<!-- Fonts START -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500, 600, 700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
		

	</head>

	
	<body ng-app="stopWatchApp" ng-controller="mainCtrl">
		
	<div class="actualTime">	
		<input id="startTime">
		<br/>
		<br/>
		<input id="endTime">
		<br/>
		<br/>
		<input id="diff" value="">
	</div>
	
	<div class="submitData-wrapper">
		<form method="post" name="logForm" id="logForm" action="log.php" autocomplete='off' target="logframe">
											
			<input type="text" id="logId" name="logId" value="<?php echo $_SESSION["userId"]; ?>"/>
			
			<input type="text" id="logActivity" name="logActivity" value="logActivity"/>
		
			<input type="text" id="logTimelapse" name="logTimelapse" value="logTimelapse"/>
			
			<input type="text" id="logDate" name="logDate" value="logDate"/>
		
			<input type="text" id="logNotes" name="logNotes" value="logNotes"/>
			
			<input type="text" id="logTimestop" name="logTimestop" value="logTimestop"/>
			<br/>
			<input type="submit" id="submitData" name="submitData" value="submit">  <!-- the btn -->
						
		</form> 
	</div>
		
	<?php 	
		if(isset($_POST['destroySession'])){  /// Place destroy session inside header.php. If that doesn't work, place on top of php code like this example.  
			session_unset();
			session_destroy();
			echo"<script>window.open('index.php','_self');</script>";
		}
				
		if($_SESSION["granted"]=="open"){
/*
			echo"<script>alert('".$_SESSION["granted"]."');</script>";
			echo"<script>alert('".$_SESSION["userName"]."');</script>";
			echo"<script>alert('".$_SESSION["userId"]."');</script>";
*/

		}else{
		echo"<script>alert('You must sign in first');</script>";
		echo"<script>window.open('index.php','_self');</script>";
		exit(); 
		}
//}
	?>
	<div class="overlay">
		<div class="login-wrapper">
		
			<div class="v-centered">
			
				<form method="post" autocomplete='off' action="successPage.php">
	
					<input type="submit" class="button" name="destroySession" value="Delete and Logout">
					<br/>
					<br/>
					<input type="submit" class="button" name="saveData" value="Save and Logout">
								
				</form> 
			</div>
		</div>		
	</div>
	<div class="logo"></div>
	<div class="greetings">
		<h14>Welcome, <?php echo $_SESSION["userName"];?> <span class="logoutBtn">&nbsp;|&nbsp; Logout</span></h14> 
	</div>
	
	<div class="wrapper" >
		
		<div class="goToActPage"></div>

		<br>
		<br>
		
		<div class="selecWrappert">
			
		        <select name="myActivity" id="myActivity" onchange="clearTime();" ng-change="theChnge()" onmouseover="openActivityList()" ng-model="myValue"> 
			       <?php echo displayList(); ?> 
		        </select>
		        		</div>
						
		<br>
		<br>
		<form>
			<textarea id="theTime">00:00:00:00</textarea>
			<br>
			<br>
		</form>
		
	</div>	<!-- Wrapper -->
	
	
	<div class="wrapperControls">
		<div id="theDate"></div>
		<button id="clear" ng-click="clearActivity()" class="buttonClassSecondary">clear</button>		
		<button id="start" class="buttonClass">start</button>
		<button id="stop" class="buttonClass">stop</button>
	</div>	
	
		<div id="theActivity" class="bkgBillboard">{{activity}}</div>
		<div class="overlayBkg"></div>
		

		<div class="logDrawer" id="logDrawer" onclick="openDrawer()">
			
			<div class="drawerBtn">
				<h10 id="log">Logs</h10>
			</div>
			
			<iframe name="logframe" class="logframe" src="log.php"></iframe>  
	
		</div>
	
		<!-- Custom jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		<script src="assets/js/stopWatch.js"></script>
	</body>
	
</html>