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
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
else{
	$usr = $_POST["usr"];
	$pass = $_POST["pass"];
	
	$q = "SELECT UsrNm, Password FROM Person WHERE UsrNm = '$usr' && Password = '$pass'";
	
	//print("$q");
	
	$query = $mysqli->query("$q");
	
	$count = $query->num_rows;
	
	//print ("$count");
	
	if ($count == 1) {
		include('AlertAcademyHomeScreenCode.html');
	}
	else {						// only looks at base html file, not CSS of JavaScript
		//header( 'Location: C:\Users\steve\Documents\School\CSCI 450 Software Engineering\Project\Program Files\HTML - AlertAcademy.html' );
		//exit();
		include('AlertAcademy.js');
		include('AlertAcademy.css');
		include('AlertAcademy.html'); // only includes this, not css or js
	}
}		// if match, go to page, else, send message to user
		// move code into HTML file because of message?

$mysqli->close();
?>

</body>
</html>