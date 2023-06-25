<!DOCTYPE html> 
<html> 
	<head> 
		<title>Registration</title> 
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<style> #registration-table td.credit-col { height: 50px; } </style> </head> <body> <header> <nav> <ul> <li><a href="signup.php">Sign Up</a></li> <li><a href="login.php">Login</a></li> </ul> </nav> </header> <main> <h1>Registration Form</h1> <br> Please check the courses you would like to register then click submit:<br> <br> <h2>First Year - Semester 1</h2> <form method="post" action="registration_result.php"> <table id="registration-table"> <tr> <th>Course Code</th> <th>Course Name</th> <th class="credit-col">Course Credits</th> </tr>

		<?php
			// Include the database connection file
			include("connect.php");

			// Check if the database connection was successful
			if (!$con) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Retrieve course information from the database for First Year - Semester 1
			$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 1";
			$result = mysqli_query($con, $sql);

			// Check if the query was successful
			if (!$result) {
				die("Query failed: " . mysqli_error($con));
			}

			// Generate table rows dynamically using a loop
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
				echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
				echo "<td>" . $row['coursename'] . "</td>";
				echo "<td class='credit-col'>" . $row['credits'] . "</td>";
				echo "</tr>";
			}

			// Retrieve course information from the database for First Year - Semester 2
			$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 2";
			$result = mysqli_query($con, $sql);

			// Check if the query was successful
			if (!$result) {
				die("Query failed: " . mysqli_error($con));
			}

			// Display the Second Semester courses if there are any
			if (mysqli_num_rows($result) > 0) {
				echo "</table><br><br>";
				echo "<h2>First Year - Semester 2</h2>";
				echo "<table id='registration-table'>";
				echo "<tr>";
				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th class='credit-col'>Course Credits</th>";
				echo "</tr>";

				// Generate table rows dynamically using a loop
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
					echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
					echo "<td>" . $row['coursename'] . "</td>";
					echo "<td class='credit-col'>" . $row['credits'] . "</td>";
					echo "</tr>";
				}
			}

			echo "</table><br><br>";

			// Retrieve course information from the database for Second Year - Semester 1
			$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 3";
			$result = mysqli_query($con, $sql);

			// Check if the query was successful
			if (!$result) {
				die("Query failed: " . mysqli_error($con));
			}

			// Display the Second year - first Semester courses if there are any
			if (mysqli_num_rows($result) > 0) {
				echo "</table><br><br>";
				echo "<h2>Second Year - Semester 1</h2>";
				echo "<table id='registration-table'>";
				echo "<tr>";
				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th class='credit-col'>Course Credits</th>";
				echo "</tr>";

				// Generate table rows dynamically using a loop
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
					echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
					echo "<td>" . $row['coursename'] . "</td>";
					echo "<td class='credit-col'>" . $row['credits'] . "</td>";
					echo "</tr>";
				}
			}

			// Retrieve course information from the database for Second Year - Semester 2
			$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 4";
			$result = mysqli_query($con, $sql);

			// Check if the query was successful
			if (!$result) {
				die("Query failed: " . mysqli_error($con));
			}

			// Display the Second year - first Semester courses if there are any
			if (mysqli_num_rows($result) > 0) {
				echo "</table><br><br>";
				echo "<h2>Second Year - Semester 2</h2>";
				echo "<table id='registration-table'>";
				echo "<tr>";
				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th class='credit-col'>Course Credits</th>";
				echo "</tr>";

				// Generate table rows dynamically using a loop
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
					echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
					echo "<td>" . $row['coursename'] . "</td>";
					echo "<td class='credit-col'>" . $row['credits'] . "</td>";
					echo "</tr>";
				}
			}

			// Retrieve course information from the database for Third Year - Semester 1
			$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 5";
			$result = mysqli_query($con, $sql);

			// Check if the query was successful
			if (!$result) {
				die("Query failed: " . mysqli_error($con));
			}

			// Display the Third year - first Semester courses if there are any
			if (mysqli_num_rows($result) > 0) {
				echo "</table><br><br>";
				echo "<h2>Third Year - Semester 1</h2>";
				echo "<table id='registration-table'>";
				echo "<tr>";
				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th class='credit-col'>Course Credits</th>";
				echo "</tr>";

				// Generate table rows dynamically using a loop
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
					echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
					echo "<td>" . $row['coursename'] . "</td>";
					echo "<td class='credit-col'>" . $row['credits'] . "</td>";
					echo "</tr>";
				}
			}

				// Retrieve course information from the database for Third Year - Semester 2
				$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 6";
				$result = mysqli_query($con, $sql);
	
				// Check if the query was successful
				if (!$result) {
					die("Query failed: " . mysqli_error($con));
				}
	
				// Display the Third year - Second Semester courses if there are any
				if (mysqli_num_rows($result) > 0) {
					echo "</table><br><br>";
					echo "<h2>Third Year - Semester 2</h2>";
					echo "<table id='registration-table'>";
					echo "<tr>";
					echo "<th>Course Code</th>";
					echo "<th>Course Name</th>";
					echo "<th class='credit-col'>Course Credits</th>";
					echo "</tr>";
	
					// Generate table rows dynamically using a loop
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
						echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
						echo "<td>" . $row['coursename'] . "</td>";
						echo "<td class='credit-col'>" . $row['credits'] . "</td>";
						echo "</tr>";
					}
				}

								// Retrieve course information from the database for Third Year - Summer
								$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 62";
								$result = mysqli_query($con, $sql);
					
								// Check if the query was successful
								if (!$result) {
									die("Query failed: " . mysqli_error($con));
								}
					
								// Display the Third year - Summer courses if there are any
								if (mysqli_num_rows($result) > 0) {
									echo "</table><br><br>";
									echo "<h2>Third Year - Summer</h2>";
									echo "<table id='registration-table'>";
									echo "<tr>";
									echo "<th>Course Code</th>";
									echo "<th>Course Name</th>";
									echo "<th class='credit-col'>Course Credits</th>";
									echo "</tr>";
					
									// Generate table rows dynamically using a loop
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
										echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
										echo "<td>" . $row['coursename'] . "</td>";
										echo "<td class='credit-col'>" . $row['credits'] . "</td>";
										echo "</tr>";
									}
								}

							// Retrieve course information from the database for Fourth Year - Semester 1
							$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 7";
							$result = mysqli_query($con, $sql);
				
							// Check if the query was successful
							if (!$result) {
								die("Query failed: " . mysqli_error($con));
							}
				
							// Display the Fourth Year - Semester 1 courses if there are any
							if (mysqli_num_rows($result) > 0) {
								echo "</table><br><br>";
								echo "<h2>Fourth Year - Semester 1</h2>";
								echo "<table id='registration-table'>";
								echo "<tr>";
								echo "<th>Course Code</th>";
								echo "<th>Course Name</th>";
								echo "<th class='credit-col'>Course Credits</th>";
								echo "</tr>";
				
								// Generate table rows dynamically using a loop
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
									echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
									echo "<td>" . $row['coursename'] . "</td>";
									echo "<td class='credit-col'>" . $row['credits'] . "</td>";
									echo "</tr>";
								}
							}

							// Retrieve course information from the database for Fourth Year - Semester 2
							$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 8";
							$result = mysqli_query($con, $sql);
				
							// Check if the query was successful
							if (!$result) {
								die("Query failed: " . mysqli_error($con));
							}
				
							// Display the Fourth Year - Semester 2 courses if there are any
							if (mysqli_num_rows($result) > 0) {
								echo "</table><br><br>";
								echo "<h2>Fourth Year - Semester 2</h2>";
								echo "<table id='registration-table'>";
								echo "<tr>";
								echo "<th>Course Code</th>";
								echo "<th>Course Name</th>";
								echo "<th class='credit-col'>Course Credits</th>";
								echo "</tr>";
				
								// Generate table rows dynamically using a loop
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
									echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
									echo "<td>" . $row['coursename'] . "</td>";
									echo "<td class='credit-col'>" . $row['credits'] . "</td>";
									echo "</tr>";
								}
							}

							// Retrieve course information from the database for Fourth Year - Summer
							$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 82";
							$result = mysqli_query($con, $sql);
				
							// Check if the query was successful
							if (!$result) {
								die("Query failed: " . mysqli_error($con));
							}
				
							// Display the Fourth Year - Summer courses if there are any
							if (mysqli_num_rows($result) > 0) {
								echo "</table><br><br>";
								echo "<h2>Fourth Year - Summer</h2>";
								echo "<table id='registration-table'>";
								echo "<tr>";
								echo "<th>Course Code</th>";
								echo "<th>Course Name</th>";
								echo "<th class='credit-col'>Course Credits</th>";
								echo "</tr>";
				
								// Generate table rows dynamically using a loop
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
									echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
									echo "<td>" . $row['coursename'] . "</td>";
									echo "<td class='credit-col'>" . $row['credits'] . "</td>";
									echo "</tr>";
								}
							}

								// Retrieve course information from the database for Fifth Year - Semester 1
								$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 9";
								$result = mysqli_query($con, $sql);
					
								// Check if the query was successful
								if (!$result) {
									die("Query failed: " . mysqli_error($con));
								}
					
								// Display the Fifth Year - Semester 1 courses if there are any
								if (mysqli_num_rows($result) > 0) {
									echo "</table><br><br>";
									echo "<h2>Fifth Year - Semester 1</h2>";
									echo "<table id='registration-table'>";
									echo "<tr>";
									echo "<th>Course Code</th>";
									echo "<th>Course Name</th>";
									echo "<th class='credit-col'>Course Credits</th>";
									echo "</tr>";
					
									// Generate table rows dynamically using a loop
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
										echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
										echo "<td>" . $row['coursename'] . "</td>";
										echo "<td class='credit-col'>" . $row['credits'] . "</td>";
										echo "</tr>";
									}
								}

								// Retrieve course information from the database for Fifth Year - Semester 2
								$sql = "SELECT coursecode, coursename, credits FROM course WHERE coursesemester = 10";
								$result = mysqli_query($con, $sql);
					
								// Check if the query was successful
								if (!$result) {
									die("Query failed: " . mysqli_error($con));
								}
					
								// Display the Fifth Year - Semester 2 courses if there are any
								if (mysqli_num_rows($result) > 0) {
									echo "</table><br><br>";
									echo "<h2>Fifth Year - Semester 2</h2>";
									echo "<table id='registration-table'>";
									echo "<tr>";
									echo "<th>Course Code</th>";
									echo "<th>Course Name</th>";
									echo "<th class='credit-col'>Course Credits</th>";
									echo "</tr>";
					
									// Generate table rows dynamically using a loop
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td><input type='checkbox' name='courses[]' id='" . $row['coursecode'] . "' value='" . $row['coursecode'] . "'>";
										echo "<label for='" . $row['coursecode'] . "' style='padding-left: 25px'>" . $row['coursecode'] . "</label></td>";
										echo "<td>" . $row['coursename'] . "</td>";
										echo "<td class='credit-col'>" . $row['credits'] . "</td>";
										echo "</tr>";
									}
								}
		

		?>
	</table>
	<input type="submit" name="submit" value="Submit">
</form>
</main> <footer> <p>&copy; 2023 Makram CHEHAYEB. All rights reserved.</p> </footer> </body> </html>