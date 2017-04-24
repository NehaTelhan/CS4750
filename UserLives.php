'<?php
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

$query = "SELECT UID,Email FROM User";
$result = $con->query($query) or die ("Invalid Selection" . $con->error);

$rows = $result->num_rows;

for ($i=0; $i<$rows; $i++) {
  if ($result->fetch_array()['Email']==$email){
    $uid = $result->fetch_array()['UID'];
    echo "$uid is the User Id";
  }
}


$state = $_POST['state'];
//$region = $_POST['region'];
$sql="INSERT INTO Lives (UID, State) VALUES ('$uid', '$state')";

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
    echo "Residential Information Added!";
    echo "You live in the state $state";
  }
mysqli_close($con);
?>
