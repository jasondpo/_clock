<?php
function openDB(){
    //$servername = "jasondpo.ipowermysql.com"; live host
	//$username = "jasoncode"; live host
	//$password = "codebank"; live host
	$username = "root";
	$password = "root";
	$dbname = "loginTest";	

	// $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); live host
    $db = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
	if ($db != true){
    die("Unable to open DB ");
    }
    return($db);             
}

function createTables(){
    $db=openDB();
    		
	    $sql ="DROP TABLE IF EXISTS user";
	      $result = $db->query($sql);
	            If ( $result != true){
	            	die("Unable to drop answers table");
	            }
	            else{
	            	ECHO "<br>Answers Table Dropped<br>";                
	            }
	            	     
	     
	     $sql="CREATE TABLE user ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."name VARCHAR(50) NOT NULL ,"
	    ."password VARCHAR(50) NOT NULL  );";
	   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create questions table");
	   }
	   else{
	        ECHO "<br> Questions Table Created<br>";                
	     }       
	     
	}

	
/////////////// Register users and validate logon process ///////////////

function registerUser(){ 
    if(isset($_POST["registerBtn"])){
	// User clicked register button      
        if ($_POST["registerpassword"] != $_POST["confirmpassword"]){
            echo "<script>alert('Passwords do not match');</script>";
			echo"<script>window.open('register.php','_self');</script>";
            exit();
        }else{
	        echo "<script>alert('password match');</script>";

        }
        
	// Both passwords match, see if user name already in use      
        $db = openDB();               
        $query = "SELECT password FROM user WHERE name= '".$_POST['registername']."' ;";
        $ds = $db->query($query);
        $cnt = $ds->rowCount();
        if ($cnt == 1){	            
        	echo "<script>alert('User name already registered, use different name');</script>";
			echo"<script>window.open('register.php','_self');</script>";
            exit();              
        }else{
            echo "<script>alert('Name is not there');</script>";
        }

                    
        //Add to user table   
        
		$sql ="INSERT INTO `user` (`name`, `password`)"." VALUES " 
                ."( '"
                .$_POST['registername']."','"
                .$_POST['registerpassword']."');"; 
        $result = $db->query($sql);
        if ( $result != true){
        	echo "<script>alert('Registry failed');</script>";
        }else{
			echo "<script>alert('Registry successful');</script>";
				$last_id = $db->lastInsertId();
				session_start();
				$_SESSION["granted"] = "open";
				$_SESSION["userName"] = $_POST['registername'];
				$_SESSION["userId"] = $last_id;
			echo"<script>window.open('stopWatch.php','_self');</script>";
            exit();
        }

    }
  }   
//////// Returning user  ///////////////////////////
	if(isset($_POST["logIn"])){

		$db = openDB();               
		$query = "SELECT password, id FROM user WHERE name='".$_POST['userName']."' ;";
		$ds = $db->query($query);
		$cnt = $ds->rowCount();		
		if ($cnt == 1 ){
			
			$row = $ds->fetch(); // Get data row			
						
			if($row["password"]==$_POST['userPassword']){
				echo"<script>alert('Access granted')</script>";
				session_start();
				$_SESSION["granted"] = "open";
				$_SESSION["userName"] = $_POST['userName'];
				$_SESSION["userId"] = $row["id"];
				echo"<script>window.open('stopWatch.php','_self');</script>";
				exit();
			}else{
				echo"<script>alert('User name or password is incorrect.')</script>";
				echo"<script>window.open('index.php','_self');</script>";
		        exit();
		    }
		
	}	
}	
?>








