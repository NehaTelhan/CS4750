<?php include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Form the SQL query (an INSERT query)
$allergy_name = $_POST['allergy'];

session_start();
printr($_SESSION);

$uid = $_SESSION['uid'];
$email = $_SESSION['Email'];

$query = "SELECT pid FROM Plant";
$result = mysqli_query($con->query($query)) or die ("Invalid Selection" . $con->error);
$rows = $result->num_rows;

for ($i=0; $i<$rows; $i++) {
  if ($result->fetch_array()['cname']==$allergy_name) {
    $pid = $result->fetch_array()['pid'];
    $sql = "INSERT INTO Allergic_To (uid, pid) VALUES ('$uid', '$pid')";
  }
  else
    {
      echo "Failed to Insert";
    }
}


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
