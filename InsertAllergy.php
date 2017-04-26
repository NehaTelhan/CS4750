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
$allergy_list = $_POST['allergy'];
echo "ALLERGY LIST: $allergy_list";
$parsed = explode(',', $allergy_list);
$cart = array();

foreach($parsed as $value) {
  $sql = "SELECT pid, cname FROM Plant";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['cname'] == $value) {
      $insert_pid = $row['pid'];
      array_push($cart, $insert_pid);
 
    }
  }
}

foreach($cart as $item) {
  echo "<br>";
  echo "$item";
  echo "<br>";
  $query = "INSERT INTO Allergic_To (uid, pid) VALUES ('$uid', '$item')";
}
  //Printing to User

if (!mysqli_query($con,$query))
  {
    die('Error: ' . mysqli_error($con));
  }
else{
}

mysqli_close($con);
?>
