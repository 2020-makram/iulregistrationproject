<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
	<h1>Admin Page</h1>
	<form action="download.php" method="post">
		<input type="submit" name="download" value="Download Excel File">
	</form>

	<?php
	// Include the database connection file
	include('connect.php');

	// Retrieve the data from the database
	$sql = "SELECT student.id, registration.reg_id, course.coursecode, course.credits 
	        FROM student 
	        INNER JOIN registration ON student.id = registration.student_id 
	        INNER JOIN reg_results ON registration.reg_id = reg_results.reg_id 
	        INNER JOIN course ON reg_results.course_code = course.coursecode";
	$result = mysqli_query($con, $sql);

	// Check if the query was successful
	if (mysqli_num_rows($result) > 0) {
	    // Write the column headers to the file
	    $header = array('Student ID', 'Registration ID', 'Registered Course', 'Credits');
	    fputcsv($file, $header, "\t");

	    // Write the data to the file
	    while ($data = mysqli_fetch_assoc($result)) {
	        $row = array($data['id'], $data['reg_id'], $data['coursecode'], $data['credits']);
	        fputcsv($file, $row, "\t");
	    }
	} else {
	    // Handle the case where the query fails
	    echo "No data found.";
	}
	?>
</body>
</html>