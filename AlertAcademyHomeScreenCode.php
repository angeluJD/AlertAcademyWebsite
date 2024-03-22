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
		
		.rows {
			margin: auto;
			width: 100%;
			padding: 10px;
			text-align: center;
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
		
		table.classes {
			margin-left: auto; 
			margin-right: auto;
		}
		
		table.assignments {
			margin-left: auto; 
			margin-right: auto;
		}
	</style>

<script>
	let User1 = sessionStorage.getItem('Current_User');	<!-- tells HTML code which user to get information for -->
	<!--alert(User1);-->
</script>

	</head>
	
	<body>
		<h1 align="center">Alert Academy</h1>
		
		<!-- Navigation -->
		<div class="sidebar">
			<a class="active" href="home">Home</a> <!-- Try to add another code to return to the Home Screen even though it already in the Home Screen, Angelu-->
			<a href="profile">Profile</a> <!--Add in the command for the profile section, Angelu-->
			<a href="Course.php">+Course</a> <!--This is the course link or coding would be located in, Angelu-->
			<a href="assignment">+Assignment</a> <!-- This is where the adding assignment is going to be located so I am just waiting on the codes for these to work when it comes to the html codes, Angelu-->
			<a href="setting">Settings</a> <!--This is where the settings link is going to be connected considering that in the template that I made show what the setting will look like, Angelu-->
			<a href="help">Help</a> <!-- This is the help button; however, I do not know if we should add the help button, Angelu -->
			<button id="logout-button" onclick="logoutFunction()">Logout</button>
		</div>
		
		<div class="rows">
			<?php
				$Con = new mysqli('127.0.0.1', 'root', 'Access1998!', 'AlertAcademy', NULL);

				if ($Con->connect_error) {die('Connect Error (' . $Con->connect_errno . ') '. $Con->connect_error);}
				else{
					$U = $_SESSION['thisuser'];	// tells PHP code which user is in use
					
					$q = "select ClsID, ClsName, Color, ProfName, School from cls where cls.Person_ID = (select Person.Person_ID from Person where Person.UsrNm = '$U')";
					
					$Class_List = $Con->query("$q");
					
					if ($Class_List->num_rows > 0) {
						echo "<table border='1' class = \"classes\">";
						
						echo "<tr><td>Class Name</td><td>Color #</td><td>Professor</td><td>School</td></tr>";
						while($row = $Class_List->fetch_assoc()) {			// loop for classes
							$C = $row["ClsName"];
							$Col = $row["Color"];
							$Prof = $row["ProfName"];
							$Sch = $row["School"];
							$ID = $row["ClsID"];
						 
							//echo "Class name: ". $C. " - Color #: ". $Col. " - Professor: ". $Prof. " - School: ". $Sch. "<br>";
						 
							echo "<tr><td>{$C}</td><td>{$Col}</td><td>{$Prof}</td><td>{$Sch}</td><td><button id = '$ID' class=\"editbtn\" value = \"$ID\">edit</button></td><td><form action='http://localhost/DeleteClass.php' method='post'> <input type='submit' name='delete' value='Delete'> <input type='hidden' name='ClassDelete' value='$ID'> <input type='hidden' name='ClassDeleteUser' value='$U'> </form></td></tr>";
						}
					  
						echo "</table>";
					}		// end of class data
					
					echo "<br>";
					
					$q = "select Assign_ID, Assign_Name, Due, Color, Assign.Person_ID, Assign.ClsID from Assign, Cls where Assign.Person_ID = (select Person.Person_ID from Person where Person.UsrNm = '$U') && (Assign.ClsID = Cls.ClsID) order by Assign.Due";
					  
					$Assign_List = $Con->query("$q");
					
					if ($Assign_List->num_rows > 0){
						echo "<table border='1' class = \"assignments\">";
						
						echo "<tr><td>Assignment Name</td><td>Due Date</td><td>Color #</td></tr>";
						while($row = $Assign_List->fetch_assoc()){			// assignment loop
							$N = $row["Assign_Name"];
							$Due = $row["Due"];
							$Col = $row["Color"];
							$ID = $row["Assign_ID"];
							
							//echo "Assignment name: ". $N. " - Due Date: ". $Due. " - Color #: ". $Col. "<br>";
							
							echo "<tr><td>{$N}</td><td>{$Due}</td><td>{$Col}</td><td><button id = '$ID' class=\"editbtn\" value = \"$ID\">edit</button></td><td><button id = '$ID' class=\"delbtn\" value = \"$ID\">Delete</button></td></tr>";
						}
					}
				}

				$Con->close();
				?>
		</div>
		
		<script>
			function logoutFunction() {
			  <?php session_destroy(); ?>
			  
			  location.replace("http://localhost/AlertAcademy.html")
			}
		</script>
		<!--This is where the home screen tab will be located, I just need to fixed the layout of it., Angelu-->
		<!--In addition the tab actually works I just need the connection of the other code to be connected to the home tab, the Profile icon, the +Course tab, and the +Assignment tab, Angelu-->
	</body>
</html>
