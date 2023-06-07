<?php

session_start();
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ItemID from the form
    $itemId = $_POST["ItemID"];

    // Delete the item from the database
    $sql = "DELETE FROM items WHERE ItemID=$itemId";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<html>
<head>
    <title>Delete Item</title>
    <link rel="stylesheet" href="css/delete_stylesheet.css">
    <nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
    </nav>
</head>
<body>
    <h1>Delete Item</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Item ID: <input type="text" name="ItemID"><br>
        <input type="submit" value="Delete">
    </form>
    <a href="index.html">Return to home page</a>
</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>
</html>
