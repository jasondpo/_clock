<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Register page </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/login.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	</head>

	<script>
		$(function(){
			$(".backBtn").click(function(){
				 window.history.back();
			});
		})
	</script>	
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            registerUser();
        }
    ?>
	
	<body>

		<div class="login-wrapper">
			
			<div class="v-centered">
				<form method="post" autocomplete='off' action="register.php">
												
					<input type="text" id="registername" name="registername" value="Username" onblur="if(this.value==''){ this.value='Username';}" onfocus="if(this.value=='Username'){this.value=''}"/>
					<br>
					<br>
					<input type="text" id="registerpassword" name="registerpassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password';}"/>
					<br>
					<br>
					<input type="text" id="confirmpassword" name="confirmpassword" value="Confirm Password" onblur="if(this.value==''){ this.value='Confirm Password'; this.type='text'}" onfocus="if(this.value=='Confirm Password'){ this.value=''; this.type='password';}"/>
					<br>
					<br>
					<input type="submit" class="button" name="registerBtn" value="Register"> &nbsp;&nbsp; <button type="button" class="backBtn">Back</button>	
								
				</form> 
			</div>	
			
		</div>

	</body>
	
</html>