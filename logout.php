<?php
  session_start();

  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];
  unset($_SESSION['valid_user']);
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          
        </nav>
   <title>Log Out</title>

   <style>

body {
  background-color: #f2f2f2;
  font-family: 'Courier New', Courier, monospace;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
}

h1 {
  text-align: center;
  font-size: 36px;
  margin-bottom: 30px;
}

a{
  color: #007bff;
  text-decoration: none;
  background-color: transparent;
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
  <div class="container-fluid">
<h1>Logged Out</h1>
<?php
  if (!empty($old_user))
  {
    echo '<p>You have been logged out.</p>';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo '<p>You were not logged in, and so have not been logged out.</p>';
  }
?>
<p><a href="index.html">Back to Home Page</a></p>
  </div>
</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>
</html>