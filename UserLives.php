<?php
session_start();
print_r($_SESSION);

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Form the SQL query (an INSERT query)
$email = $_SESSION['Email'];
$paren = "'";

echo "$paren$email$paren";

$user_uid = mysqli_query("SELECT UID FROM User WHERE Email = $paren$email$paren");
//$uid = "SELECT UID FROM User WHERE Email=$email";
//$result = $conn->query($uid);

//echo "Result.$result";

echo "EMAIL -> $email";
echo "USER_ID -> $user_uid";

$state = $_POST['state'];
$region = $_POST['region'];
$sql="INSERT INTO Lives (UID, State, Region) VALUES ('$user_uid', '$state', '$region')";

$query1 = mysqli_query("SELECT Email FROM User WHERE Email = '$email' ");
echo "QUERY1:$query1";

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
