
<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Form the SQL query (an INSERT query)
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];

echo "$first_name";
echo "$last_name";

//$sql="INSERT INTO User (First_Name, Last_Name) VALUES ('$first_name', '$last_name')";
$sql="INSERT INTO User VALUES (50, 'Jack', 'Dawson')";


if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
  echo "1 record added"; // Output to user
  }
mysqli_close($con);
?>
