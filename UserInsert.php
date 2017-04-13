<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection                                          
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_err\
      or();
  }
// Form the SQL query (an INSERT query)                      
 $sql="INSERT INTO User (First_Name, Last_Name, State, Region)              
 VALUES                                                      
 ('$_POST[firstname]','$_POST[lastname]','$_POST[state]', '$_POST[region]')";

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
echo "1 record added"; // Output to user                     
mysqli_close($con);
?>