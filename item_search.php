<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>Item Search</title>
    <link rel="stylesheet" type="text/css" href="css/search_stylesheet.css">

    <nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          
        </nav>
</head>

<body>
    <?php
        if (isset($_SESSION['valid_user'])){
            echo '<p>You are logged in as ' . $_SESSION['valid_user'] . '</p>';
        
        echo '<h1>Item Search</h1>
            <form action="res_pdo.php" method="post">
                <p><strong>Choose Search Type:</strong><br />
                    <select name="searchtype">
                        <option value="ItemName">Item Name</option>
                        <option value="Price">Item Price</option>
                    </select>
                </p>
                <p><strong>Enter Search Term:</strong><br />
                    <input name="searchterm" type="text" size="40">
                </p>

                <p><input type="submit" name="submit" class="btn btn-primary" value="Search"></p>
            </form>
            <a href="index.html" class="back-to-home">Back to Home</a>';
        }
        
     else {
        echo '<p>You must be logged in to view this page.</p>';
    }

    ?>

</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>

</html>
