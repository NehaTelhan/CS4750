 <?php

include_once("./library.php"); // To connect to the database

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//Make sure you can touch the database
if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
    //End the session so user is effectively logged out.
    session_start();
    session_destroy();
    header('Location: LoginUser.php');
    exit;    
  }
mysqli_close($con);
                        ?>