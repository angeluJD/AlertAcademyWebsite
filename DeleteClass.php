<!DOCTYPE html>
<html lang="en">
<head><title>Landing-Sign.php</title></head>
<body>

<?php
/* Change the value of $password if you have set a password on the root userid
*  Change NULL to port number to use DBMS other than the default using port 3306
*/
$user = 'root';
$password = 'Access1998!'; //To be completed if you have set a password to root
$database = 'AlertAcademy'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
else{
	session_start();
	
	$_SESSION['thisuser'] = $_POST["ClassDeleteUser"];

	$Class = $_POST["ClassDelete"];
	
	$q = "CALL Clear_Cls('$Class')";
	
	$mysqli->query("$q");
	
	include('AlertAcademyHomeScreenCode.php');
	
}		// if match, go to page, else, send message to user

$mysqli->close();
?>

</body>
</html>