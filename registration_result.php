<!DOCTYPE html>
<html>
<head>
	<title>Registration Result</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Registration Result</h1>
	<table>
		<tr>
			<th>Course ID</th>
			<th>Course Name</th>
			<th>Credits</th>
		</tr>
		<?php
		session_start();
		include("connect.php");

		// Check if the 'courses' key is set in the $_POST array
		if(isset($_POST['courses'])) {
			
			// Get the selected courses from the previous page
			$courses = $_POST['courses'];

			// Get the student ID from the session variable
			$student_id = $_SESSION['student_info']['id'];

			// Get the current date as YYYY-MM-DD format
			$date = date('Y-m-d');

			// Check if the student has already registered
			$query = "SELECT * FROM registration WHERE student_id = '$student_id'";
			$result = mysqli_query($con, $query);

			if(mysqli_num_rows($result) > 0) {
			    // If the student has already registered, retrieve the existing registration record
			    $row = mysqli_fetch_assoc($result);
			    $reg_id = $row['reg_id'];
			} else {
			    // If the student has not registered before, insert a new record into the registration table
			    $query = "INSERT INTO registration (student_id, date) VALUES ('$student_id', '$date')";
			    mysqli_query($con, $query);

			    // Get the reg_id of the new registration record
			    $reg_id = mysqli_insert_id($con);
			}

			// Insert a new record into the reg_result table for each selected course with the same reg_id
			foreach($courses as $course_code) {
			    // Check if the student has already registered for this course
			    $query = "SELECT * FROM reg_result WHERE student_id = '$student_id' AND course_code = '$course_code'";
			    $result = mysqli_query($con, $query);

			    if(mysqli_num_rows($result) > 0) {
			        // If the student has already registered for this course, skip adding the course to the reg_result table
			        echo "<p>Course $course_code has already been registered.</p>";
			    } else {
			        // If the student has not registered for this course, add it to the reg_result table
			        $query = "INSERT INTO reg_result (reg_id, student_id, course_code, date) VALUES ('$reg_id', '$student_id', '$course_code', '$date')";
			        if(mysqli_query($con, $query)) {
			            // Insertion was successful
			        } else {
			            // Insertion failed
			            echo "Error: " . mysqli_error($con);
			        }
			    }
			}

			// Retrieve the registered courses and calculate the total credits
			$registered_courses = array();
			$query = "SELECT course.coursecode, course.coursename, course.credits FROM course INNER JOIN reg_result ON course.coursecode = reg_result.course_code WHERE reg_result.reg_id = '$reg_id'";
			$result = mysqli_query($con, $query);

			// Initialize the total credits to 0
			$total_credits = 0;

			while($row = mysqli_fetch_assoc($result)) {
			    // Add the credits for this course to the total_credits variable
			    $total_credits += $row['credits'];
			    $registered_courses[] = $row;
			}
		} else {
			// If 'courses' key is not set in $_POST array, redirect to the previous page
			header("Location: previous_page.php");
			exit();
		}
		?>

		

		<!-- Display the registered courses in a table -->
		<?php
		if(!empty($registered_courses)) {
			foreach ($registered_courses as $course) {
			    echo "<tr>";
			    echo "<td>" . $course['coursecode'] . "</td>";
			    echo "<td>" . $course['coursename'] . "</td>";
			    echo "<td>" . $course['credits'] . "</td>";
			    echo "</tr>";
			}
		} else {
			echo "<p>No courses registered.</p>";
			}
		?>
	</table>

	<br><br>
	<br>

	<!-- Display the total number of credits for the registered courses -->
	<p>You have registered <?php echo $total_credits; ?> credits.</p</body>
</html>