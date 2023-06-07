<!DOCTYPE html>
<?php

session_start();

if (!isset($_SERVER['HTTPS'])) {

    $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    //$url = 'https://localhost:8278'. $_SERVER['REQUEST_URI'];  

    header("Location: " . $url);
    exit();
}


?>

<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $itemId = $_POST["itemId"];
    $itemName = $_POST["itemName"];
    $price = $_POST["price"];
    $unitsInStock = $_POST["unitsInStock"];

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

    // Insert the new item into the database
    $sql = "INSERT INTO items (ItemID, ItemName, Price, UnitsInStock) VALUES ('$itemId', '$itemName', '$price', '$unitsInStock')";

    if ($conn->query($sql) === TRUE) {
        $message = "Item added successfully";
    } else {
        $message = "Error adding item: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<html>

<head>
    <title>Insert Item</title>
    <link rel="stylesheet" type="text/css" href="css/insert_stylesheet.css">
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
        
        echo '<h1>Insert Item</h1>
            <?php if (isset($message)) { ?>
                <div class="message"><?php echo $message; ?></div>
            <?php } ?>
            <form method="post">
                <label for="itemId">Item ID:</label>
                <input type="text" id="itemId" name="itemId" required>
        
                <label for="itemName">Item Name:</label>
                <input type="text" id="itemName" name="itemName" required>
        
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
        
                <label for="unitsInStock">Units in Stock:</label>
                <input type="text" id="unitsInStock" name="unitsInStock" required>
        
                <input type="submit" value="Insert Item">
            </form>
            <a href="index.html">Back to Home</a>';
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