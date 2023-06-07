<!DOCTYPE html>
<html>
<?php
require_once("config.php");
if (isset($_POST['submit'])) {
	$firstName = $_POST['first_name'];
	$surName = $_POST['surname'];
	$email 	= $_POST['email'];
	$password = $_POST['password'];
	// Check that the two email addresses match
if ($email !== $confirmEmail) {
	echo "Email addresses do not match.";
	exit();
}

// Validate the email address format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "Invalid email address.";
	exit();
}

	$options = array("cost" => 4);
	$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

	$sql = "insert into users (first_name, last_name,email, password) value('" . $firstName . "', '" . $surName . "', '" . $email . "','" . $hashPassword . "')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "Registration successful";
	}
}
?>

<head>



	<title>Register</title>
	<script>
			// Validate email fields
			function validateEmails() {
			var email = document.getElementById("email").value;
			var confirmEmail = document.getElementById("confirm_email").value;
			if (email !== confirmEmail) {
				alert("Email addresses do not match.");
				return false;
			}
			if (!/\S+@\S+\.\S+/.test(email)) {
			alert("Invalid email address.");
			return false;
			}
			return true;
			}

	</script>

	<nav>
			<a href="logout.php">Logout</a>
			<a href="login.php">Login</a>
			<a href="register.php">Register</a>
		  
		</nav>

<style>
	/* Global styles */
body {
  background-color: #f2f2f2;
  font-family: 'Courier New', Courier, monospace;
}

.container {
  width: 60%;
  margin: 0 auto;
  padding-top: 50px;
}

h1 {
  text-align: center;
  font-size: 36px;
  margin-bottom: 30px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-bottom: 1px solid #ccc;
  background-color: transparent;
}

input[type="text"]:focus,
input[type="password"]:focus {
  outline: none;
  border-bottom: 1px solid #007bff;
}

input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-bottom: 1px solid #ccc;
  background-color: transparent;
}

input[type="email"]:focus {
  outline: none;
  border-bottom: 1px solid #007bff;
}

button[type="submit"] {
  display: block;
  margin: 0 auto;
  background-color: #000;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  border: none;
}

button[type="submit"]:hover {
  background-color: #333;
}



.btn {
  display: inline-block;
  background-color: #000;
  color: #fff;
  padding: 10px 20px;
  margin-top: 20px;
  border-radius: 5px;
  cursor: pointer;
  border: none;
}

.btn:hover {
  background-color: #333;
}

a {
  text-decoration: none;
  color: #007bff;
}

nav {
  background-color: #000;
  padding: 10px;
  margin-bottom: 30px;
  display: flex;
  justify-content: flex-end;
}


nav a {
  margin-right: 20px;
  color: #fff;
}

nav a:last-child {
  margin-right: 0;
}

/* Media queries */
@media screen and (max-width: 768px) {
  .container {
    width: 80%;
  }
}

footer {
    background-color: #f2f2f2;
    padding: 20px;
    margin-top: 50px;
  }
  
  .container {
    max-width: 960px;
    margin: 0 auto;
  }
  
  p {
    text-align: center;
    font-size: 14px;
    color: #666;
  }


</style>
</head>

<body>
	<div class="container">
		<h1>Registration</h1>
		<br>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div>
				<label for="first_name">First Name</label>
				<input type="text" name="first_name" value="" placeholder="First Name" required>
			</div>

			<div>
				<label for="surname">Surname</label>
				<input type="text" name="surname" value="" placeholder="Surname" required>
			</div>

			<br>

			<div>
				<label for="email">Email</label>
				<input type="email" name="email" value="" placeholder="Email" required>
			</div>

			<div>
				<label for="confirm_email">Confirm Email</label>
				<input type="email" name="confirm_email" value="" placeholder="Confirm Email" required>

			<div>
				<label for="password">Password</label>
				<input type="password" name="password" value="" placeholder="Password" required>
			</div>

			<br>

			<button type="submit" name="submit">Submit</button>
		</form>

		<a href="index.html"><button>Back to Home</button></a>
	</div>
</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>

</html>
