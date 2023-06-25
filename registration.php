<?php
include('connect.php');
 session_start();
print_r($_SESSION["student_info"]);
print_r($_SESSION["student_info"]["id"]);

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['action']) && $_POST['action'] == 'delete')
	{
		//delete your profile
		$id = $_SESSION['student_info']['id'];
		$query = "delete from users where id = '$id' limit 1";
		$result = mysqli_query($con,$query);

		if(file_exists($_SESSION['user_info']['image'])){
			unlink($_SESSION['user_info']['image']);
		}

		//delete the posts of the deleted user
		$query = "delete from posts where user_id = '$id'";
		$result = mysqli_query($con,$query);

		header("Location: index.php");
		die;

	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['username']))
	{
		//profile edit
		//boolean to make sure and take action
		$image_added = false;
		//if image name is not empty + no error + image type=jpeg => 7a yfout 3l function
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"
        ){
			//file was uploaded
			//images = directory yale bdi 7ot souwar fiya
			$folder = "images/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			//create new attribute : image, put it in the folder 

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);

			//if the file exists already 

			if(file_exists($_SESSION['user_info']['image'])){
				unlink($_SESSION['user_info']['image']);
			}

			//result = image added 

			$image_added = true;
		}

		//update the database : if added => update the information of the users 

		$username = addslashes($_POST['username']);
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);
		$id = $_SESSION['user_info']['id'];

		if($image_added == true){
			$query = "update users set name = '$username',email = '$email',password = '$password',image = '$image' where id = '$id' limit 1";
		}else{
			$query = "update users set name = '$username',email = '$email',password = '$password' where id = '$id' limit 1";
		}

		$result = mysqli_query($con,$query);

		$query = "select * from users where id = '$id' limit 1";
		$result = mysqli_query($con,$query);

		//update & refresh 
		if(mysqli_num_rows($result) > 0){

			$_SESSION['user_info'] = mysqli_fetch_assoc($result);
		}

	

		header("Location: profile.php");
		die;
	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['post']) )
	{
		//adding post
		$image = "";
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"){
			//file was uploaded
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
 
		}

		$post = addslashes($_POST['post']);
		$user_id = $_SESSION['user_info']['id'];
		$date = date('Y-m-d H:i:s');

		$query = "insert into posts (user_id,post,image,date) values ('$user_id','$post','$image','$date')";

		$result = mysqli_query($con,$query);
 
		header("Location: profile.php");
		die;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>

	<?php require "header.php";?>

	<div>

	<h1>Registration Form</h1>
	<form method="post" action="registration_result.php">
		<input type="checkbox" name="courses[]" value="ELCM119"> Calculus I <br>
		<input type="checkbox" name="courses[]" value="ELCM120"> Algebra I <br>
		<input type="checkbox" name="courses[]" value="ELCM121"> General Physics <br>
		<input type="checkbox" name="courses[]" value="ELCM113"> Computer Applications <br>
		<input type="checkbox" name="courses[]" value="ELCM123"> Technical Drawing <br>

		<input type="submit" name="submit" value="Submit">
	</form>

    </div>







		<div style="margin: auto;max-width: 600px">

			<?php if(!empty($_GET['action']) && $_GET['action'] == 'edit'):?>

				<h2 style="text-align: center;">Edit profile</h2>

				<form method="post"  enctype="multipart/form-data" style="margin: auto;padding:10px;">
					<img src="<?php echo $_SESSION['user_info']['image']?>" style="width: 100px;height: 100px;object-fit: cover;margin: auto;display: block;">
					image: <input type="file" name="image"><br>
					<input value="<?php echo $_SESSION['user_info']['name']?>" type="text" name="username" placeholder="Username" required><br>
					<input value="<?php echo $_SESSION['user_info']['email']?>" type="email" name="email" placeholder="Email" required><br>
					<input value="<?php echo $_SESSION['user_info']['password']?>" type="text" name="password" placeholder="Password" required><br>

					<button>Save</button>
					<a href="profile.php">
						<button type="button">Cancel</button>
					</a>
				</form>

			<?php elseif(!empty($_GET['action']) && $_GET['action'] == 'delete'):?>

				<h2 style="text-align: center;">Are you sure you want to delete your profile??</h2>

				<div style="margin: auto;max-width: 600px;text-align: center;">
					<form method="post" style="margin: auto;padding:10px;">
						
						<img src="<?php echo $_SESSION['user_info']['image']?>" style="width: 100px;height: 100px;object-fit: cover;margin: auto;display: block;">
						<div><?php echo $_SESSION['user_info']['name']?></div>
						<div><?php echo $_SESSION['user_info']['email']?></div>
						<input type="hidden" name="action" value="delete">
						<button>Delete</button>
						<a href="profile.php">
							<button type="button">Cancel</button>
						</a>
					</form>
				</div>

			<?php else:?>

				<h2 style="text-align: center;">Student Profile</h2>
				<br>
				<div style="margin: auto;max-width: 600px;text-align: center;">
					<div>
						<td><img src="<?php echo $_SESSION['user_info']['image']?>" style="width: 150px;height: 150px;object-fit: cover;"></td>
					</div>
					<div>
						<td><?php echo $_SESSION['user_info']['name']?></td>
					</div>
					
					<div>
						<td><?php echo $_SESSION['user_info']['email']?></td>
					</div>

					<a href="profile.php?action=edit">
						<button>Edit profile</button>
					</a>

					<a href="profile.php?action=delete">
						<button>Delete profile</button>
					</a>

				</div>
				<br>
				<hr>
				<h5>Create a post</h5>
				<form method="post" enctype="multipart/form-data" style="margin: auto;padding:10px;">
					
					image: <input type="file" name="image"><br>
					<textarea name="post" rows="8"></textarea><br>

					<button>Post</button>
				</form>

			<?php endif;?>

		</div>
	<?php require "footer.php";?>

</body>
</html>