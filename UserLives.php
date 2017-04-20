<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Form the SQL query (an INSERT query)
$email = $_SESSION['Email'];
$user_uid = mysqli_query("SELECT UID FROM User WHERE Email='$email'");

start_session();
echo $_SESSION['Email'];

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
