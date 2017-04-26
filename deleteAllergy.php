<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
//print_r($_SESSION);
$email = $_SESSION['Email'];
$query1 = "SELECT uid,email FROM User";
$result = mysqli_query($con, $query1);
while($row = mysqli_fetch_array($result)) {
  if($row['email'] == $email) {
    $uid = $row['uid'];
  }
}
$uid = $_SESSION['UID'];

$delete_me = $_POST['delete'];

$sql="DELETE FROM Allergic_To WHERE PID=$delete_me";

if($con->query($sql) == True) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

mysqli_close($con);
?>