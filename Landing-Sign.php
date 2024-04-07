<!DOCTYPE html>
<html lang="en">
<head><title>Landing-Sign.php</title></head>
<body>

<?php
/* Change the value of $password if you have set a password on the root userid
*  Change NULL to port number to use DBMS other than the default using port 3306
*/
$user = 'root';
$password = 'August30'; //To be completed if you have set a password to root
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
	
	$q = "SELECT Password, UsrNm FROM Person WHERE Password = '$pass' && UsrNm = '$usr'";
	
	//print("$q");
	
	$query = $mysqli->query("$q");
	$count = $query->num_rows;
	
	//print ("$count");
	
	if ($count == 1) {
		session_start();
		
		echo "<script type=\"text/JavaScript\">  sessionStorage.setItem('Current_User', '$usr') </script>";	// sends info to HTML segment of new page

		$_SESSION['thisuser'] = $usr;	// Sends info to PHP code in next page
		
		include('AlertAcademyHomeScreenCode.php');
	}
	else {
		 echo '<script> 
        alert("Invalid username or password. Please try again.")
         window.location.href = "AlertAcademy.html";</script>';
        exit();

	}
}		// if match, go to page, else, send message to user

$mysqli->close();
?>

</body>
</html>
