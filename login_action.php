<?php
    session_start();
    include("connect.php");
    
    $id = $_POST['id'];
    $password = $_POST['password'];

    $query = "select * from student where id = '$id' && password = '$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Add the id parameter to the URL
        header('location:student_profile.php?id=' . $row['id']);

        // Store the student information in the session
        $_SESSION['student_info'] = $row;
    } else {
        header("location:login.php?flag=1");
    }
?>