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
	
	$usr = $_POST["P"];
	
	echo "<script type='text/JavaScript'> sessionStorage.setItem('Current_User', '$usr') </script>";	// error
	$_SESSION['thisuser'] = $usr;
	
    // Retrieve form data
    $AssignmentName = $_POST["name"];
	$Due = $_POST["DueDate"];
	$D = $_POST["description"];
	$Class = $_POST["arr"];
	
	$q = "insert into Assign values(NULL, '$AssignmentName', '$Due', '$D', (select Person.Person_ID from Person where Person.UsrNm = '$usr'), '$Class')";
	$conn->query("$q");
	
    include('AlertAcademyHomeScreenCode.php');
}
$conn->close();
?>
</body>
</html>