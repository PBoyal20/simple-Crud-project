<!DOCTYPE html>


<?php
// Start the session
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
    // Get the values from the form
    $itemName = $_POST["ItemName"];
    $price = $_POST["Price"];
    $unitsInStock = $_POST["UnitsInStock"];

    // Update the item in the database
    $sql = "UPDATE items SET Price=$price, UnitsInStock=$unitsInStock WHERE ItemName='$itemName'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<html>

<head>


    <title>Update Item</title>
    <link rel="stylesheet" type="text/css" href="css/update_stylesheet.css">

    <nav>
        <a href="logout.php">Logout</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>

    </nav>

</head>

<body>



    <h1>Update Item</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Item Name: <input type="text" name="ItemName"><br>
        Price: <input type="text" name="Price"><br>
        Units in Stock: <input type="text" name="UnitsInStock"><br>
        <input type="submit" value="Update">
    </form>

    <a href="index.html" id="backBtn">Back to Main Page</a>';



</body>
<footer>
    <div class="container">
        <p>&copy; Final Project - By Prabhi Boyal</p>
    </div>
</footer>

</html>