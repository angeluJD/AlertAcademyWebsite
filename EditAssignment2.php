<!DOCTYPE html>
<html lang="en">
<head><title>AlertAcademy</title></head>
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
    $AssignName = $_POST["name"];
	$Due = $_POST["DueDate"];
	$Cl = $_POST["arr"];
	$Desc = $_POST["description"];
	$ID = $_POST["ID"];
	
	$q = "update Assign set Assign_ID = '$ID', Assign_Name = '$AssignName', Due = '$Due', ClsID = '$Cl', Descrip = '$Desc', Person_ID = '$Pers' where Assign_ID = '$ID'";
	$conn->query("$q");
	
    include('AlertAcademyHomeScreenCode.php');
}
$conn->close();
?>
</body>
</html>