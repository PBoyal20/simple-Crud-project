

<?php 


  if (!isset($_SERVER['HTTPS'])) {
    
	$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  // start with /...
	
	//$url = 'https://localhost:8278'. $_SERVER['REQUEST_URI'];  // start with /...
	
    header("Location: " . $url);  // Redirect - 302
    exit();                         // should be before any output
  }                              
?>

<?php 
$conn = mysqli_connect("localhost","root","","demo");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>