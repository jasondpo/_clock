<?php session_start();?>
<?php include 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Log </title> 
	</head>

<head>
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/stopwatch.css">
		
<style>
	html, body{
		background-image: none;
		background-color:rgba(250, 250, 250, 0);
	}

</style>
</head>

<body>


<div id="timeLog" class="clearfix">
	<div id="timeLogColumn">
		<?php echo displayData(); ?>	
	</div>
		<div id="notesWrapper">
			
		<form method="post" name="noteForm" id="noteForm" action="log.php" autocomplete='off'> 
			<textarea id="notes"  name="newNote"> <?php echo $row['notes'];?></textarea>
			<br>
			<input type="text" id="saveNote" name="saveNote"/>
			<input type="submit" class="saveBtn" name="submitNote" value="Submit">
		</form>
	</div>
</div>

<form method="post" name="deleteForm" id="deleteForm" action="log.php" autocomplete='off'>
								
	<input type="text" id="deleteLog" name="deleteLog"/>
	<input type="submit" id="deleteLogBtn" name="deleteLogBtn" value="submit">  
					
</form> 


<div class="noteStorageWrapper">
	<?php displayNotes();?>
</div>

</body>


<!-- Custom jQuery -->
<script src="assets/js/stopWatch.js"></script>



