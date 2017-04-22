<?php
session_start();
print_r($_SESSION);

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
//$con=mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Form the SQL query (an INSERT query)
$email = $_SESSION['Email'];

$query = "SELECT UID FROM User WHERE Email=$email;";
$result = $con->query($query);

print_r($query); //Returns" SELECT UID FROM User WHERE Email=Dalt@Smith.com;"
print_r($result); //Returns Nothing

//$row = $result->fetch_array(MYSQLI_ASSOC);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["UID"]);

//echo "RESULT -> $result";
//echo "EMAIL -> $email";


$state = $_POST['state'];
$region = $_POST['region'];
$sql="INSERT INTO Lives (UID, State, Region) VALUES ('$user_uid', '$state', '$region')";

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
    echo "$user_id";
  }
else
  {
    echo "Residential Information Added!";
    echo "You live in the state $state and the region $region";
  }
mysqli_close($con);
?>
