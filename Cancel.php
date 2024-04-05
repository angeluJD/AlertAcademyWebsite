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
	
	$usr = $_POST["Person"];
	
	echo "<script type='text/JavaScript'> sessionStorage.setItem('Current_User', '$usr') </script>";
	$_SESSION['thisuser'] = $usr;
	
    include('AlertAcademyHomeScreenCode.php');
}
$conn->close();
?>

</body>
</html>