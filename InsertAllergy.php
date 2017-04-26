<?php

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


//session_start();
//printr($_SESSION);

//$uid = $_SESSION['uid'];
//$email = $_SESSION['Email'];

$allergy_list = $_POST['allergy'];
echo "ALLERGY LIST: $allergy_list";

$parsed = explode(',', $allergy_list);
echo "Array: $parsed";

$cart = array();

foreach($parsed as $value) {
  $sql = "SELECT pid, cname FROM Plant";
  $result = mysqli_query($con, $sql);
  
  while ($row = mysqli_fetch_array($result)) {
    if ($row['cname'] == $value) {
      $insert_pid = $row['pid'];
      //      echo "INSERT PID: $insert_pid";
      //      echo "<br>";
      
      array_push($cart, $insert_pid);

    }
  }
}
//print_r(array_values($cart));

foreach($cart as $item) {
  //  echo "$item";
  //  echo "<br>";

  $query = "INSERT INTO Allergic_To (uid, pid) VALUES ('$uid', '$item')";
}


if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else{
  echo "PROBLEM!";
}

mysqli_close($con);

?>
