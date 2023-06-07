<!DOCTYPE html>
<html>
    <head>
        <title>Insert New Item Results</title>
        <nav>
            <a href="logout.php">Logout</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </head>

    <body>
        <?php
        require_once "config.php";

        //make sure all required fields filled
        //check attribute names from database schema
        if (!($_POST['ItemID']) || !($_POST['ItemName']) 
        || !($_POST['Price']) || !($_POST['UnitsInStock'])) {
      echo "<p>You have not entered all the required details.<br />
            Please go back and try again.</p>";
      exit;
   }

   //crete short variable names
   $id=$_POST['ItemID'];
   $name=$_POST['ItemName'];
   $price=$_POST['Price'];
   $units=$_POST['UnitsInStock'];

   //set up for PDO
   $user = 'root';
   $pass = '';
   $host = 'localhost';
   $db_name = 'project';

   $dsn = "mysql:host=$host;dbname=$db_name";

   try{
    $db = new PDO($dsn, $user, $pass);

    $query = "INSERT INTO  items VALUES(?,?,?,?)";
    $stmt = $db->prepare($query);  
    $stmt->bindParam(1,$id);
    $stmt->bindParam(2,$name);
    $stmt->bindParam(3,$price);
    $stmt->bindParam(4,$units);

    $stmt->execute(); 

    // get number of returned rows  
    echo "<p>Number of items Inserted into database: ".$stmt->rowCount()."</p>"; 

    // display each returned row
    while($result = $stmt->fetch(PDO::FETCH_OBJ)) {                                                       
      echo "<p><strong>Item ID: ".$result->ItemID."</strong>";                               
      echo "<br />Item Name: ".$result->ItemName;                                              
      echo "<br />Price ".$result->Price;                                                  
      echo "<br />Units: ".$result->UnitsInStock."</p>";                                         
    } 
//disconnect from database
$db = null;
   }
   catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
    exit;
  }
 
   

        ?>

    </body>
    <footer>
        <div class="container">
          <p>&copy; Final Project - By Prabhi Boyal</p>
        </div>
      </footer>
</html>