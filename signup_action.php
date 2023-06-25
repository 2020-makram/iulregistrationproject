<?php 
    include('connect.php');

    function PasswordCheck($password_string)
    {
        $password_string = trim($password_string);
        if($password_string == '')
        {
            die("Password not entered");
        }

        elseif(strlen($password_string) < 8)
        {
            die("Password must be more than 8 characters in length ");
        }

        elseif(!(preg_match('#[0-9]#', $password_string)))
        {
            die("Password must contain at least one number");
        }

        else{
            //succcess, now process password
        }
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email or id already exists in database
    $check_query = "SELECT * FROM student WHERE email='$email' OR id='$id'";
    $result = mysqli_query($con, $check_query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        die("Email or university ID is already in use.");
    }

    PasswordCheck($password);

    $query="insert into student (id,name,email,password) values ('$id','$name','$email','$password')";
    mysqli_query($con,$query);

    header('location:login.php');
?>