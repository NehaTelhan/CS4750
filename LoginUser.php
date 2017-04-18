<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//Make the variables you'll need from post request.
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash('$password', PASSWORD_DEFAULT).
//REMEMBER, the HASHED PASSWORD is stored in the database

  // What I want to do is get the UID associated with this e-mail address and check to see the hashed password we have saved matches the password
$query1 = mysql_query("SELECT email FROM User WHERE email='$email'");
$query2 = mysql_query("SELECT password FROM User WHERE password='$hashed_password'");

/*
if ($email == $query1 && $hashed_password == $query2) {
  $_SESSION["logged_in"] = true;
  $_SESSION["email"] = $email;
  echo "consider yourself logged in!";
}
else {
  echo "The username or password are incorrect.";
    }
*/

if (password_verify($password, $query2) && $email == $query1){
  echo "Consider yourself Logged in!";
}
else {
  echo "Invalid Credentials";
}


if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {
  echo "1 record added"; // Output to user
  echo "'$hashed_password'";
  }
mysqli_close($con);
?>
