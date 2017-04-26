<?php

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Form the SQL query (an INSERT query)
//session_start();
//printr($_SESSION);

//$uid = $_SESSION['uid'];
//$email = $_SESSION['Email'];

$allergy_list = $_POST['allergy'];
echo "ALLERGY LIST: $allergy_list";
$allergy_results = str_replace( ',' , '<br />', $allergy_list);
echo "<br>";
echo "Your allergies are:";
echo "<br>"; 
echo "$allergy_results";
echo "<br>";




if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else{
  echo "PROBLEM!";
}

mysqli_close($con);

?>
