<?php session_start();?>
<?php 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Success page </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/login.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>
<body>
	<?php 	
		if(isset($_POST['destroySession'])){  /// Place destroy session inside header.php. If that doesn't work, place on top of php code like this example.  
			session_unset();
			session_destroy();
			echo"<script>window.open('index.php','_self');</script>";
		}
				
		if($_SESSION["granted"]=="open"){
			echo"<script>alert('".$_SESSION["granted"]."');</script>";
			echo"<script>alert('".$_SESSION["userName"]."');</script>";
			echo"<script>alert('".$_SESSION["userId"]."');</script>";

		}else{
		echo"<script>alert('You must sign in first');</script>";
		echo"<script>window.open('index.php','_self');</script>";
		exit(); 
		}
//}
	?>
	


	<script>
		$(function(){
			$(".backBtn").click(function(){
				 window.history.back();
			});
		})
	</script>	



		<div class="login-wrapper">
			
			<div class="v-centered">
				<h2>This page loaded successfully</h2>
				<form method="post" autocomplete='off' action="successPage.php">

					<input type="submit" class="button" name="destroySession" value="Log out"> &nbsp;or&nbsp; <button type="button" class="backBtn">Back</button> 
								
				</form> 
			</div>	
			
		</div>
</body>