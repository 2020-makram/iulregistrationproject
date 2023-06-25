<!DOCTYPE html>
<html>
<head>
	<title>Student Details - My Website</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<header>
		<nav>
			<ul class="right-tabs">
				<li><a href="home.php">Home</a></li>
				<?php
					// Start the session
					session_start();

					// Check if the user is logged in
					if (isset($_SESSION['student_id'])) {
						// Get the student information from the database
						include('connect.php');
						$student_id = $_SESSION['student_id'];
						$sql = "SELECT * FROM student WHERE id = '$student_id'";
						$result = $con->query($sql);
						if ($result && $result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$name = $row['name'];
						}

						// Display the logout link with the student name
						echo "<li><a href='logout.php'>$name (Logout)</a></li>";
					} else {
						// Display the login link
						echo "<li><a href='login.php'>Login</a></li>";
					}
				?>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
	</header>


	<div class="student-details">
		<?php
			// Include the database connection file
			include('connect.php');

			// Check if the student ID is set in the URL
			if (isset($_GET['id'])) {
				// Get the student ID from the URL parameter
				$student_id = $_GET['id'];

				// Query the database to get the student information
				$sql = "SELECT * FROM student WHERE id = '$student_id'";
				$result = $con->query($sql);

				// Display the student information
				if ($result && $result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        echo "<p><strong>Student Name:</strong> " . $row["name"] . "</p>";
				        echo "<p><strong>Student ID:</strong> " . $row["id"] . "</p>";
				        echo "<p><strong>Student Email:</strong> " . $row["email"] . "</p>";
				    }
				} else {
				    echo "No student found with ID " . $student_id;
				}

				// Close the database connection
				$con->close();
			} else {
				echo "Student ID parameter missing in URL";
			}
		?>
	</div>

	<div class="register-button">
		<a href="registration_2.php?id=<?php echo $student_id; ?>" class="button">Register</a>
	</div>

	<?php require "footer.php";?>

</body>
</html>