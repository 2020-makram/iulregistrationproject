<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		h2, label {
			font-family: "Lato", sans-serif;
		}
	</style>
</head>
<body>

	<header>
		<nav>
			<ul class="right-tabs">
				<li><a href="home.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
	</header>

	<div class="login-form">
		<?php
			if(isset($_GET['flag'])){
				if($_GET['flag']==1)
					echo "<b>ID or password is wrong !!<b>";
			} 
		?>
		<h2>Login</h2>
		<form method="post" action="login_action.php">
			<div class="form-group">
				<label for="id">ID:</label>
				<input type="text" id="id" name="id" placeholder="Enter your ID" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required>
			</div>
			<button type="submit">Login</button>
		</form>	
	</div>

	<?php require "footer.php";?>

</body>
</html>