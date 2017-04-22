<p>
<?php
include_once("./library.php"); // To connect to the database

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

session_start();
//Make the variables you'll need from post request.
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//REMEMBER, the HASHED PASSWORD is stored in the database

// What I want to do is get the UID associated with this e-mail address and check to see t\
he hashed password we have saved matches the password
$query1 = "SELECT UID,First_Name,Last_Name,Email,Password FROM User";

$result1 = $con->query($query1) or die ("Invalid Selection" . $con->error);

$rows1 = $result1->num_rows;

for ($i=0; $i<$rows1; $i++) {
  if ($result1->fetch_array()['Email']==$email) {
    $_SESSION['Logged_in'] = true;
    $_Session['Email'] = $email;
    $_Session['UID'] = $result1->fetch_array()['UID'];
    $_SESSION['First_Name'] = $result1->fetch_array()['First_Name'];
    $_SESSION['Last_Name'] = $result1->fetch_array()['Last_Name'];
  }
  else {
    echo "Invalid Login.";
  }
}
$pass = password_verify($password,$hashed_password);

/*if ($email == $query1 || $pass ) {
  $_SESSION["logged_in"] = true;
  $_SESSION["Email"] = $email;
  echo "Name: $first_name $last_name";
  echo "Email: $email";
  // echo select State from Lives WHERE UID = UID
  // echo select Region from Lives Where UID = UID
}
else {
  echo "Invalid Login";
  }*/

?></p>
