<!DOCTYPE html>
<html>
	<head>
		<title> Alert Academy </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	body {
  		margin: 0;
  		font-family: "Lato", sans-serif;
		}

	.sidebar {
  		margin: 0;
  		padding: 0;
 		width: 200px;
  		background-color: #f1f1f1;
  		position: fixed;
  		height: 100%;
  		overflow: auto;
		}

	.sidebar a {
  		display: block;
  		color: black;
  		padding: 16px;
  		text-decoration: none;
		}
 
	.sidebar a.active {
  		background-color: #04AA6D;
  		color: white;
		}

	.sidebar a:hover:not(.active) {
  		background-color: #555;
  		color: white;
		}

	div.content {
  		margin-left: 200px;
  		padding: 1px 16px;
  		height: 1000px;
		}

	@media screen and (max-width: 700px) {
  		.sidebar {
    			width: 100%;
    			height: auto;
    			position: relative;
  		}
  	.sidebar a {float: left;}
  	div.content {margin-left: 0;}
	}

	@media screen and (max-width: 400px) {
  		.sidebar a {
    			text-align: center;
    			float: none;
  			}
	}
    /* Styles for logout button */
    #logout-button {
        display: block;
        background-color: red; /* Set background color to red */
        color: white; /* Text color */
        padding: 16px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }

    #logout-button:hover {
        background-color: darkred; /* Darker red on hover */
    }
</style>

<script> 
let User = sessionStorage.getItem('Current_User');	<!-- tells page which user to get information for -->

</script>
		
	</head>
	<body>
	<h1 align="center">Alert Academy</h1>
		<!-- Navigation -->
		<div class="sidebar">
			<a href="AlertAcademyHomeScreenCode.php">Home</a> <!--Add in the command for the profile section, Angelu-->
			<a href="profile">Profile</a> <!-- Try to add another code to return to the Home Screen even though it already in the Home Screen, Angelu-->
			<a class="active" href="course">+Course</a> <!--This is the course link or coding would be located in, Angelu-->
			<a href="assignment">+Assignment</a> <!-- This is where the adding assignment is going to be located so I am just waiting on the codes for these to work when it comes to the html codes, Angelu-->
			<a href="setting">Settings</a> <!--This is where the settings link is going to be connected considering that in the template that I made show what the setting will look like, Angelu-->
			<a href="help">Help</a> <!-- This is the help button; however, I do not know if we should add the help button, Angelu -->
			<button id="logout-button" onclick="logoutFunction()">Logout</button>
		</div>

		<div class="rows">
			<?php
				$user = 'root1';
				$password = 'August30';
				$database = 'AlertAcademy';
				$port = 8889;
				$Con = new mysqli('localhost', $user, $password, $database, $port);

				if ($Con->connect_error) {
					die('Connect Error (' . $Con->connect_errno . ') '
							. $Con->connect_error);
				}
				else{
					// workin on this -Steven

				}

				$Con->close();
				?>
		</div>

		<script>
			function logoutFunction() {
			  <?php session_destroy(); ?>
			  
			  	location.replace("AlertAcademy.html")
			}
		</script>
		<!--This is where the home screen tab will be located, I just need to fixed the layout of it., Angelu-->
		<!--In addition the tab actually works I just need the connection of the other code to be connected to the home tab, the Profile icon, the +Course tab, and the +Assignment tab, Angelu-->
	</body>
</html>
