<!DOCTYPE html>
<html lang="en">
<head><title>Saving...</title></head>
<body>

<?php

/* Change the value of $password if you have set a password on the root userid
*  Change NULL to port number to use DBMS other than the default using port 3306
*/
$user = 'root';
$password = 'Access1998!'; //To be completed if you have set a password to root
$database = 'AlertAcademy'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
// Create connection
$conn = new mysqli('localhost', $user, $password, $database, $port);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

else {
	session_start();
	
	$Pers = $_POST["P"];
	$q = "select UsrNm from Person where Person.Person_ID = '$Pers'";
	$usrs = $conn->query("$q");
	
	if ($usrs->num_rows == 1){
		while($row = $usrs->fetch_assoc()){
			$usr = $row["UsrNm"];
		}
	}
	else{
		// error
	}
	
	echo "<script type='text/JavaScript'> sessionStorage.setItem('Current_User', '$usr') </script>";	// error
	$_SESSION['thisuser'] = $usr;
	
    // Retrieve form data
    $ClassName = $_POST["name"];
	$Col = $_POST["colors"];
	$prof = $_POST["professor"];
	$Sch = $_POST["school"];
	$ID = $_POST["ID"];
	
	$q = "update cls set ClsID = '$ID', ClsName = '$ClassName', Color = '$Col', ProfName = '$prof', School = '$Sch', Person_ID = '$Pers' where ClsID = '$ID'";
	$conn->query("$q");
	
    include('AlertAcademyHomeScreenCode.php');
}
$conn->close();
?>
</body>
</html>