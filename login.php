<!DOCTYPE html>
<html>
<?php
session_start();

require_once("config.php");
if (isset($_POST['submit'])) {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);


	$sql = "select * from users where email = '" . $email . "'";
	$rs = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($rs);

	if ($numRows  == 1) {
		$row = mysqli_fetch_assoc($rs);
		if (password_verify($password, $row['password'])) {
			echo "Password verified";
		} else {
			echo "Wrong Password";
		}
	} else {
		echo "No User found";
	}
	if ($email == "admin@abc.ca") {
		$_SESSION['admin_user'] = $email;
	} else
		$_SESSION['valid_user'] = $email; // SESSION VARIABLE
}
?>

<head>
<nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          
        </nav>

		<link rel="stylesheet" type="text/css" href="css/login_stylesheet.css">

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h1>Login</h1>
			</div>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="col-sm-4">
					<input type="text" name="email" value="" placeholder="Email">
					<input type="password" name="password" value="" placeholder="Password">
				</div>
				<br>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary" name="submit">Submit</submit>
					</button>
			</form>
		</div>
		<br>
		<div class="col-sm-4">

			<a href="index.html"><button>Back to Home</button></a>
		</div>
	</div>
</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>

</html>