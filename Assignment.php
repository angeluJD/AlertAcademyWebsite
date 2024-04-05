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
	
	option.gray {background-color: #d6d6d6; font-weight: bold; font-size: 12px;}
	
	option.blue {background-color: #accffc; font-weight: bold; font-size: 12px;}
	
	option.red {background-color: #fa788c; font-weight: bold; font-size: 12px;}
	
	option.green {background-color: #8efa97; font-weight: bold; font-size: 12px;}
	
	option.yellow {background-color: #faf79d; font-weight: bold; font-size: 12px;}
	
	option.orange {background-color: #FFA500; font-weight: bold; font-size: 12px;}
	
	option.purple {background-color: #fa83fc; font-weight: bold; font-size: 12px;}
	
	option.brown {background-color: #fab978; font-weight: bold; font-size: 12px;}
</style>
		
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
					$Pers = $_POST["User"];
					
					$q = "select ClsID from Cls where (Person_ID = (select Person.Person_ID from Person where UsrNm = '$Pers') && ClsName = 'N/A')";
					$C = $Con->query("$q");
					
					if ($C->num_rows == 1){					// check if "N/A" class is still there
						while($row = $C->fetch_assoc()){
							$Class = $row["ClsID"];
						}
					}
					else{
						$Class = -1;
					}
					
					echo "<div style='text-align:center'>";
						
					echo "<form id='edit' action='http://localhost/Assignment2.php' method='post'>";
					echo "<label for='name'>Assignment name:</label> <input type='text' id='name' name='name'><br>";
					echo "<label for='DueDate'>Due Date:</label><input type='date' id='DueDate' name='DueDate'><br>";
					echo "<label for='description'>Assignment Description:</label> <input type='text' id='description' name='description'><br>";
					echo "<select id = arr name=arr><option  value = '$Class'>Select class</option></select><br>";
					echo "<input type='hidden' name='P' value='$Pers'>";
					echo "<button type='submit' class='btn'>Save</button>";
					echo "</form>";

					echo "<form id='cancel' action='http://localhost/Cancel.php' method='post'>";
					echo "<input type='hidden' name='Person' value='$Pers'>";
					echo "<br><button type='submit' class='btn'>Cancel</button>";
					echo "</form>";
					
					echo "</div>";
					
					$q = "SELECT ClsID, ClsName FROM Cls where Cls.Person_ID = (select Person.Person_ID from Person where UsrNm = '$Pers')";
					
					$Query = $Con->query("$q");
					$count = $Query->num_rows;
					
					if ($count > 0){					// populate class list
						echo "<script>";
						echo "let CID = [];";
						echo "let CN = [];";
						echo "let i = 0;";
						
						while($row = $Query->fetch_assoc()) {
							$E = $row["ClsID"];
							$F = $row["ClsName"];
							echo "CID[i] = '$E';";
							echo "CN[i] = '$F';";
							echo "i++;";
						}						// arrays done
						
						echo "let select = document.getElementById('arr');";
						
						echo "for(let z = 0; z < CID.length; z++){";
							echo "let I = CID[z];";
							echo "let N = CN[z];";
							echo "let el = document.createElement('option');";
							
							echo "el.textContent = N;";
							echo "el.value = I;";
							echo "select.appendChild(el);";
						echo "}";
						
						echo "</script>";
					}
				}

				$Con->close();
				?>
		</div>

		<script>
			function logoutFunction() {
			  
			  
			  	location.replace("AlertAcademy.html")
			}
		</script>
		<!--This is where the home screen tab will be located, I just need to fixed the layout of it., Angelu-->
		<!--In addition the tab actually works I just need the connection of the other code to be connected to the home tab, the Profile icon, the +Course tab, and the +Assignment tab, Angelu-->
	</body>
</html>
