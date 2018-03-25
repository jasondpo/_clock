<?php
session_start();	
	
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
    		
	    $sql ="DROP TABLE IF EXISTS user, userdata, activity, archived";
	      $result = $db->query($sql);
	            If ( $result != true){
	            	die("Unable to drop user, userdata and activity tables");
	            }
	            else{
	            	ECHO "<br>User, userdata and activity tables dropped<br>";                
	            }
	            
///////// NEW TABLE ////////	  	            	     
	     
	    $sql="CREATE TABLE user ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."name VARCHAR(50) NOT NULL ,"
	    ."password VARCHAR(50) NOT NULL  );";
	   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create user table");
	   }
	   else{
	        ECHO "<br> User Table Created<br>";                
	     }
	     
///////// NEW TABLE ////////	     
	     
	    $sql="CREATE TABLE userdata ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."userid VARCHAR(50) NOT NULL ,"
	    ."useractivity VARCHAR(50) NOT NULL ,"
	    ."timelapse VARCHAR(50) NOT NULL ,"
	    ."date VARCHAR(50) NOT NULL ,"
	    ."notes TEXT NOT NULL ,"
	    ."timestart VARCHAR(50) NOT NULL ,"
	    ."timestop VARCHAR(50) NOT NULL  );";
	   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create User Data table");
	   }
	   else{
	        ECHO "<br> User Data table created<br>";                
	     }	
	     
///////// NEW TABLE ////////			         
   
	    $sql="CREATE TABLE activity ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."userid VARCHAR(50) NOT NULL ,"
	    ."theactivity VARCHAR(50) NOT NULL  );";	   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Activity table");
	   }
	   else{
	        ECHO "<br> Activity table created<br>";                
	     } 
	     
///////// ARCHIVED TABLE ////////	     
	     
	    $sql="CREATE TABLE archived ("
	    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
	    ."userid VARCHAR(50) NOT NULL ,"
	    ."useractivity VARCHAR(50) NOT NULL ,"
	    ."timelapse VARCHAR(50) NOT NULL ,"
	    ."date VARCHAR(50) NOT NULL ,"
	    ."notes TEXT NOT NULL ,"
	    ."timestart VARCHAR(50) NOT NULL ,"
	    ."timestop VARCHAR(50) NOT NULL  );";
	   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create Archived table");
	   }
	   else{
	        ECHO "<br> Archived table created<br>";                
	     }	
       	     
	}

	
/////////////// Register users and validate logon process ///////////////

function registerUser(){ 
    if(isset($_POST["registerBtn"])){
	// User clicked register button      
        if ($_POST["registerpassword"] != $_POST["confirmpassword"]){
            //echo "<script>alert('Passwords do not match');</script>";
			echo"<script>window.open('register.php','_self');</script>";
            exit();
        }else{
	       // echo "<script>alert('password match');</script>";

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
				//echo"<script>alert('Access granted')</script>";
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

/////////////////////////// OLD Submit Data ///////////////////////////

if(isset($_POST["submitData"])){
        $db = openDB();
            $sql ="INSERT INTO userdata (userid, useractivity, timelapse, date, notes, timestart, timestop)"
                      ." VALUES " 
                    ."( '"
                    .$_POST['logId']."','"
                    .$_POST['logActivity']."','"
                    .$_POST['logTimelapse']."','"
                    .$_POST['logDate']."','"
                    .$_POST['logNotes']."','"
                    .$_POST['beginTime']."','"
                    .$_POST['logTimestop']."' );"; 
            $result = $db->query($sql);
            if ( $result != true){
                ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save Log data</h102></div></div>";
             //  LogMsg("contacts.php insert contacts", $sql);
             exit();
            }
            else{
                //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Log data saved</h102></div></div>";
            }
          // initSession();  
 
    }
    
/////////////////////////// Save Submited item ///////////////////////////

if(isset($_POST["addAct"])){
    $db = openDB();
        $sql ="INSERT INTO activity (userid, theactivity)"
                  ." VALUES " 
                ."( '"
                .$_SESSION["userId"]."','"
                .$_POST['newActivity']."' );"; 
        $result = $db->query($sql);
        if ( $result != true){
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save activity data</h102></div></div>";
         //  LogMsg("contacts.php insert contacts", $sql);
         exit();
        }
        else{
          //  ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Activity saved</h102></div></div>";
        }
      // initSession();  
} 
    
    
/////////////////////////// Display Activity List ///////////////////////////

 function displayList(){
    
    $db = openDB();               
    $query = "SELECT theactivity FROM activity WHERE userid='".$_SESSION["userId"]."' ORDER BY theactivity ASC";
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No activities found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	
    foreach ($ds as $row){
        echo '<option value="'.$row["theactivity"].'">'.$row["theactivity"].'</option>';
    }
} 

/////////////////////////// Display List for Activity Manager page///////////////////////////

 function displayActList(){
    
    $db = openDB();               
    $query = "SELECT id, theactivity FROM activity WHERE userid='".$_SESSION["userId"]."' ORDER BY id DESC";
    $ds = $db->query($query);
    $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No activities found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	
    foreach ($ds as $row){
        echo '<tr>   <td width="12%"> <input type="radio" value="'.$row["id"].'" name="actListItem"/></td>    <td width="88%">'.$row["theactivity"].'</td>     </tr>';
    }
}  


    
/////////////////////////// Delete item in activity list on the Activity Manager page///////////////////////////

if(isset($_POST["deleteActButton"])){
		$db = openDB();
        $sql ="DELETE FROM `activity` WHERE id = "."'".$_POST["actListItem"]."'"; 
        $result = $db->query($sql);
	     
}


/////////////////////////// Display DataList ///////////////////////////

function displayData(){
    
    $db = openDB();               
    $query = "SELECT id, notes, useractivity, timelapse, date, timestart, timestop FROM userdata WHERE userid='".$_SESSION["userId"]."' ORDER BY id DESC";
    //$query = "SELECT id, useractivity, timelapse, date, notes, timestop FROM userdata WHERE userid='1' ORDER BY id DESC";
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No data found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	$x=1;
    foreach ($ds as $row){
        echo "<div id='logBox-".$row["id"]."' class='record' onclick='identify(".$row["id"]."); getID(this)'>
        	<div id='".$row["id"]."' class='deleteBtn'>X</div> <div id='add".$row["id"]."' class='addBtn' onclick='highlightBtn(this)'>+</div>";
        if(!empty($row['notes'])){echo "<div class='greenSave'></div>";};
        echo "<h11>".$row["useractivity"]."</h11><br><h12>".$row["timelapse"]."</h12><br><h13>".$row["date"]."<h13> | <span>".$row["timestart"]." - ".$row["timestop"]."</span></div>";
    }
}

/////////////////////////// Display Notes ///////////////////////////

function displayNotes(){
    
    $db = openDB();               
    $query = "SELECT notes, id FROM userdata WHERE userid='".$_SESSION["userId"]."'";
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No notes were found </span>";
        return; // No contacts 
    } 
	
    foreach ($ds as $row){
        echo "<div id='noteBox-".$row["id"]."'class='noteBox'>".$row["notes"]."</div>";
    }

}

/////////////////////////// Delete Data ///////////////////////////

if (isset($_POST["deleteLogBtn"])){
    $db = openDB();
        $sql ="DELETE FROM `userdata` WHERE id = "."'".$_POST['deleteLog']."'"; 
        $result = $db->query($sql);
      
} 

/////////////////////////// Save Notes ///////////////////////////
if ( isset($_POST["submitNote"])){
    $db = openDB();
        $sql ="UPDATE `userdata`"
                . " SET `notes` = '".$_POST['newNote']."'"
                . "WHERE id = ". "'".$_POST['saveNote']."'";               

        $result = $db->query($sql);
        if ( $result != true){
            
          ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Could not update notes data</h102></div></div>";
        }
        else{
            //ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Notes updated</h102></div></div>";
        }
}

/////////////////////////// Archive Data ///////////////////////////
if ( isset($_POST["archiveBtn"])){
	$db = openDB();
	$query = "INSERT INTO archived SELECT * FROM userdata WHERE userid='".$_SESSION["userId"]."'; DELETE FROM userdata WHERE userid ='".$_SESSION["userId"]."'";
	    $ds = $db->query($query);
	     $cnt = $ds->rowCount();
	    if ($cnt == 0){
	        echo "<span> Could not archive data </span>";
	        return; // No contacts 
	    } else{
             echo "<span> Data has been archived</span>";
        }
}
/////////////////////////// Show Archive ///////////////////////////

function displayArchive(){    
    $db = openDB();               
    $query = "SELECT id, notes, useractivity, timelapse, date, timestart, timestop FROM archived WHERE userid='".$_SESSION["userId"]."' ORDER BY id DESC";
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No data found </span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	$x=1;
    foreach ($ds as $row){
        echo "<div id='logBox-".$row["id"]."' class='record' onclick='identify(".$row["id"]."); getID(this)'><div id='".$row["id"]."' class='deleteBtn'>X</div>";
        if(!empty($row['notes'])){echo "<div class='greenSave'></div>";};
        echo "<h11>".$row["useractivity"]."</h11><br><h12>".$row["timelapse"]."</h12><br><h13>".$row["date"]."<h13> | <span>".$row["timestart"]." - ".$row["timestop"]."</span></div>";
    }
}
	
?>








