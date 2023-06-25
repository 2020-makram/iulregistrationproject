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

// Set the filename and path for the CSV file
$filename = 'registration_data.csv';
$filepath = 'csv/' . $filename;

// Open the file handle
$file = fopen($filepath, 'w');

// Retrieve the data from the database
$sql = "SELECT student.id, registration.reg_id, course.coursecode, course.credits 
        FROM student 
        INNER JOIN registration ON student.id = registration.student_id 
        INNER JOIN reg_result ON registration.reg_id = reg_result.reg_id 
        INNER JOIN course ON reg_result.course_code = course.coursecode";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are any rows in the result set
    if (mysqli_num_rows($result) > 0) {
        // Write the column headers to the file
        $header = array('Student ID', 'Registration ID', 'Registered Course', 'Credits');
        fputcsv($file, $header, "\t");

        // Write the data to the file
        while ($data = mysqli_fetch_assoc($result)) {
            $row = array($data['id'], $data['reg_id'], $data['coursecode'], $data['credits']);
            fputcsv($file, $row, "\t");
        }

        // Close the file handle
        fclose($file);

        // Send the file to the browser for download
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . $filename);
        header("Content-Type: application/csv; charset=utf-8");
        readfile($filepath);
        exit();
    } else {
        // Handle the case where no data is found
        echo "No data found.";
    }
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}
?>
</body>
</html>