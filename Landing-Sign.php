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
	
	$q = "SELECT UsrNm, Password FROM Person WHERE UsrNm = '$usr' && Password = '$pass'";
	
	//print("$q");
	
	$query = $mysqli->query("$q");
	$count = $query->num_rows;
	
	//print ("$count");

	$query2 = $mysqli->query("SELECT ClsID FROM Cls WHERE Cls.Person_ID = (select Person.Person_ID from Person where UsrNm = '$usr' && Password = '$pass')");
	$count2 = $query2->num_rows;
	
	//print ("$count2");
	
	$query3 = $mysqli->query("SELECT Assign_ID FROM Assign WHERE Person_ID = (select Person.Person_ID from Person where UsrNm = '$usr' && Password = '$pass')");
	$count3 = $query3->num_rows;
	
	//print ("$count3");
	
	if ($count == 1) {		
		echo "<script type=\"text/JavaScript\">  sessionStorage.setItem('Current_User', '$usr') </script>"; 

		echo "<script type=\"text/JavaScript\">  sessionStorage.setItem('Num_Classes', '$count2') </script>";

		echo "<script type=\"text/JavaScript\">  sessionStorage.setItem('Num_Assignments', '$count3') </script>";
		
		include('AlertAcademyHomeScreenCode.html');
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
