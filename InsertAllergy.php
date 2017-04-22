<?php include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Form the SQL query (an INSERT query)
$allergy_name = $_POST['plantname'];

session_start();
printr($_SESSION);

$uid = $_SESSION['UID'];

$query = "SELECT PID,Common_Name FROM Plant";
$result = $con->query($query) or die ("Invalid Selection" . $con->error);

$rows = $result->num_rows;

for ($i=0; $i<$rows; $i++) {
  if ($result->fetch_array()['Common_Name']==$allergy_name) {
    $pid = $result->fetch_array()['PID'];
    $sql="INSERT INTO Allergic_to (UID, PID) VALUES ('$uid', '$pid')";
  }
  else
    {
      echo "Failed to Insert";
    }
}
$_SESSION['Email'] = $email;

echo $_SESSION["Email"];
echo "UID: $uid";

//                  $sql="INSERT INTO Allergic_To (UID) VALUES ()";

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
    //echo
  }
mysqli_close($con);
?>
