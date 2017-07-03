<?php session_start();?>
<?php 'functions.php';?>
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

	
	<body nload="form1.reset();" ng-app="stopWatchApp" ng-controller="mainCtrl">
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
		
		<input type="text" id="activityInput" ng-model="activity"/> <button id="upload" onclick="updateList()">Add</button>&nbsp;<button id="upload" onclick="clearText()">Clear</button>

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
		<script src="assets/js/stopWatch.js"></script>
	</body>
	
</html>