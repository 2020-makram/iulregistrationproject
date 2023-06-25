<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=2">
  </head>
  <body>
    <header class="header">
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Signup</a></li>
        </ul>
      </nav>
    </header>

    <main class="form-container">
      <h2>Signup</h2>
	  <br>
      <p>Please provide the following information to create your account:</p>
	  <br>
	  <br>

      <form method="post" action="signup_action.php">
        <div class="form-group">
          <label for="id">University ID:</label>
          <input type="text" id="id" name="id" placeholder="Enter your university ID" required>
        </div>

        <div class="form-group">
          <label for="name">Full Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="form-group">
          <button type="submit">Sign up</button>
        </div>
      </form>
    </main>

    <footer>
      <?php require "footer.php";?>
    </footer>
  </body>
</html>