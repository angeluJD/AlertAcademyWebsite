<!DOCTYPE html>
<html lang="en">
<head><title>hello.php</title></head>
<body>

<?php

/* Change the value of $password if you have set a password on the root userid
*  Change NULL to port number to use DBMS other than the default using port 3306
*/
$user = 'root1';
$password = 'August30'; //To be completed if you have set a password to root
$database = 'AlertAcademy'; //To be completed to connect to a database. The database must exist.
$port = 8889; //Default must be NULL to use default port
// Create connection
$conn = new mysqli('localhost', $user, $password, $database, $port);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

else {
    // Retrieve form data
    $username = $_POST['UsrNm'];
    $firstname = $_POST['First_Name'];
    $lastname = $_POST['Last_Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password']; // Plain text password

// SQL insert statement
    $sql = "INSERT INTO Person (UsrNm, First_Name, Last_Name, Email, Password) 
        VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";


    if ($conn->query($sql) === TRUE) {
        // Registration successful

        session_start();

        echo "<script type=\"text/JavaScript\">  sessionStorage.setItem('Current_User', '$username') </script>"; // passes info to HTML code in new page

        $_SESSION['thisuser'] = $username;    // passes info to PHP code in new page
        
        include('AlertAcademyHomeScreenCode.php');
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br> . $conn->error";
    }
}
$conn->close();
?>
</body>
</html>
