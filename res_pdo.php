<!DOCTYPE html>
<html>

<head>
  <title>Item Search Results</title>
  <style>

    body{
      background-color: #f2f2f2;
      font-family: 'Courier New', Courier, monospace;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      padding: 10px;
      margin: auto;

    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    th {
      background-color: black;
      color: white;
    }

    h1 {
      text-align: center;
      font-size: 50px;
    }

    button{
      background-color: black;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    nav{
      background-color: black;
      color: white;
      padding: 10px;
      margin: auto;
      width: 100%;
      text-align: right;
    }

   nav a{
      color: white;
      text-decoration: none;
      background-color: transparent;
      padding: 10px;
   
      
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

<nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          
        </nav>
</head>

<body>
  <h1>Item Search Results</h1>
  <?php

  $searchtype = $_POST['searchtype'];
  $searchterm = "%{$_POST['searchterm']}%";

  if (!$searchtype || !$searchterm) {
    echo '<p>You have not entered search details.<br/>
            Please go back and try again.</p>';
    exit;
  }

  // whitelist the searchtype
  switch ($searchtype) {
    case 'ItemName':
    case 'Price':
      break;
    default:
      echo '<p>That is not a valid search type. <br/>
                Please go back and try again.</p>';
      exit;
  }

  // set up for using PDO
  $user = 'root';
  $pass = '';
  $host = 'localhost';
  $db_name = 'project';

  // set up DSN
  $dsn = "mysql:host=$host;dbname=$db_name";

  // connect to database
  try {
    $db = new PDO($dsn, $user, $pass);

    // perform query
    $query = "SELECT ItemID, ItemName, Price, UnitsInStock FROM items WHERE $searchtype like :searchterm";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':searchterm', $searchterm);
    $stmt->execute();

    // get number of returned rows  
    echo "<p>Number of items found: " . $stmt->rowCount() . "</p>";

    // display each returned row in a table
    echo "<table>";
    echo "<tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Units In Stock</th></tr>";
    while ($result = $stmt->fetch(PDO::FETCH_OBJ)) {
      echo "<tr><td>" . $result->ItemID . "</td><td>" . $result->ItemName . "</td><td>" . $result->Price . "</td><td>" . $result->UnitsInStock . "</td></tr>";
    }
    echo "</table>";

    // disconnect from database
    $db = NULL;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
  }




  ?>
  <br>
  <a href="item_search.php">
    <button>Search Again</button>
    <a href="index.html">
      <button>Home</button>
  </a>
</body>
<footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>

</html>