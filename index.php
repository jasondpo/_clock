<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Login page </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/login.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>
	
	<script>
		$(function(){
			$(".signupBtn").click(function(){
				window.location.href = "register.php";
			});
		})
		
		//NOTE: Use "img" tags in targeted div
		$(function(){
			$('.slideshowContainer img:gt(0)').hide();
			setInterval(function(){$('.slideshowContainer :first-child').fadeOut('slow').next('img').fadeIn('slow').end().appendTo('.slideshowContainer');}, 12000);
		});
		
	</script>
	
	<body>
	
		<div class="homeOverlay"></div>
		
		<div class="login-wrapper">
			<h15><span>Record</span>Breaker</h15>
			<div class="v-centered">
				<form method="post" autocomplete='off' action="index.php">
												
					<input type="text" id="userName" name="userName" value="Username" onblur="if(this.value==''){ this.value='Username';}" onfocus="if(this.value=='Username'){this.value=''}"/>
					<br>
					<br>
					<input type="text" id="password" name="userPassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password';}"/>
					<br>
					<br>
					<input type="submit" class="button" name="logIn" value="Log in"> &nbsp;&nbsp; <button type="button" class="signupBtn">Sign up</button> 
								
				</form> 
			</div>	
			
		</div>
		
		<div class="slideshowContainer">
			<img src="assets/images/homepage/slide-1.png">
			<img src="assets/images/homepage/slide-2.png">
			<img src="assets/images/homepage/slide-3.png">
			<img src="assets/images/homepage/slide-4.png">
			<img src="assets/images/homepage/slide-5.png">			
		</div>

	</body>
	
</html>