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
	
	table.ThisClass {
		margin-left: auto; 
		margin-right: auto;
	}
	
	option.gray {background-color: #d6d6d6; font-weight: bold; font-size: 12px;}
	
	option.blue {background-color: #accffc; font-weight: bold; font-size: 12px;}
	
	option.red {background-color: #fa788c; font-weight: bold; font-size: 12px;}
	
	option.green {background-color: #8efa97; font-weight: bold; font-size: 12px;}
	
	option.yellow {background-color: #faf79d; font-weight: bold; font-size: 12px;}
	
	option.orange {background-color: #FFA500; font-weight: bold; font-size: 12px;}
	
	option.purple {background-color: #fa83fc; font-weight: bold; font-size: 12px;}
	
	option.brown {background-color: #fab978; font-weight: bold; font-size: 12px;}
</style>

<script> 
let User = sessionStorage.getItem('Current_User');	<!-- tells page which user to get information for -->

</script>
		
	</head>
	<body>
	<h1 align="center">Alert Academy</h1>
		<!-- Navigation -->
		<div class="sidebar">
			<button id="logout-button" onclick="logoutFunction()">Logout</button>
		</div>

		<div class="rows">
			<?php
				$user = 'root';
				$password = 'Access1998!';
				$database = 'AlertAcademy';
				$port = NULL;
				$Con = new mysqli('127.0.0.1', $user, $password, $database, $port);

				if ($Con->connect_error) {
					die('Connect Error (' . $Con->connect_errno . ') '
							. $Con->connect_error);
				}
				else{
					$Class = $_POST["ClassEdit"];
					
					$q = "SELECT* FROM Cls where ClsID = '$Class'";
					
					$Query = $Con->query("$q");
					$count = $Query->num_rows;
					
					if ($count == 1){
						while($row = $Query->fetch_assoc()) {
							$Cname = $row["ClsName"];
							$Col = $row["Color"];
							$Prof = $row["ProfName"];
							$Sch = $row["School"];
							$ID = $row["ClsID"];
							$Per = $row["Person_ID"];
							// get all data
						}
						
						echo "<div style='text-align:center'>";
						
						echo "<form id='edit' action='http://localhost/ClassEdit2.php' method='post'>";
						echo "<label for='name'>Class name:</label> <input type='text' id='name' name='name' value='$Cname'><br>";
						echo "<select Class = 'Drop' name=colors> <option class='gray' value= '0'>Gray</option> <option class='blue' value= '1'>Blue</option> <option class='red' value= '2'>Red</option> <option class='green' value= '3'>Green</option> <option class='yellow' value= '4'>Yellow</option> <option class='orange' value= '5'>Orange</option> <option class='purple' value= '6'>Purple</option> <option class='brown' value= '7'>Brown</option> </select>";
						echo "<br> <label for='professor'>Professor name:</label> <input type='text' id='professor' name='professor' value='$Prof'> <br>";
						echo "<label for='school'>School:</label> <input type='text' id='school' name='school' value='$Sch'><br>";
						echo "<input type='hidden' name='ID' value='$ID'>";
						echo "<input type='hidden' name='P' value='$Per'>";
						echo "<button type='submit' class='btn'>Save</button>";
						echo "</form>";

						$q = "select UsrNm from Person where Person.Person_ID = '$Per'";
						$P = $Con->query("$q");
						
						while($row = $P->fetch_assoc()){
							$Pers = $row["UsrNm"];
						}
						
						echo "<form id='cancel' action='http://localhost/Cancel.php' method='post'>";
						echo "<input type='hidden' name='Person' value='$Pers'>";
						echo "<br><button type='submit' class='btn'>Cancel</button>";
						echo "</form>";
						
						echo "</div>";
					}
					else{
						include('AlertAcademyHomeScreenCode.php');
					}
				}
				$Con->close();
			?>
		</div>
		
		<script>
			function logoutFunction() {
			  
			  location.replace("http://localhost/AlertAcademy.html")
			}
		</script>
		
		<!--This is where the home screen tab will be located, I just need to fixed the layout of it., Angelu-->
		<!--In addition the tab actually works I just need the connection of the other code to be connected to the home tab, the Profile icon, the +Course tab, and the +Assignment tab, Angelu-->
	</body>
</html>
