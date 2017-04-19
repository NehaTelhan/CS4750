/* TODO: Get the context of what user is logged in right now and use their UID to fill in the LIVES table appropriately!*/


<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Form the SQL query (an INSERT query)

$state = $_POST['state'];
$region = $_POST['region'];
$sql="INSERT INTO Lives (State, Region) VALUES ('$state', '$region')";


if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
    echo "Residential Information Added!";
    echo "You live in the state $state and the region $region";
  }
mysqli_close($con);
?>
