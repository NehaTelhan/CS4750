<?php

/*

   THIS IS ASHLEY'S ATTEMPT I AM COMMENTING OUT TO TRY OUT MY OWN METHODS


session_start();

require "dbconnect.php"; // To connect to the database
$db = DbUtil::loginConnection();
//$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$stmt = $db->stmt_init();


if($stmt->prepare("select * from User where Common_Name like ?") or die(mysqli_error($con))) {
  $searchString = '%' . $_GET['searchName'] . '%';
  $stmt->bind_param(s, $searchString);
  $stmt->execute();

  $stmt->bind_result($Plant_ID, $Symbol, $Genus, $Species, $Common_Name, $Family);
  echo "<table border=1><th>Plant ID</th><th>Symbol</th><th>Genus</th><th>Species</th><th>Common Name</th><th>Family</th>\n";

while($stmt->fetch()) {
    echo "<tr><td>$Plant_ID</td><td>$Symbol</td><td>$Genus</td><td>$Species</td><td>$Common_Name</td><td>$Family</td></tr>";
  }
  echo "</table>";

  $stmt->close();
}

$db->close();
//mysqli_close($con);
*/


session_start();
print_r($_SESSION);

include_once("./library.php"); // To connect to the database

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
//$con=mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Form the SQL query (an INSERT query)
$email = $_SESSION['Email'];
//echo "E-MAIL: $email"; //This means the session is not connected to a logged in user right now

$plant_search = $_POST['commonname'];
echo "Searching for $plant_search ....";

//$query = "SELECT PID, Symbol, Genus, Species, Common_Name, Family FROM Plant";
$query = "SELECT PID,Common_Name FROM Plant";
$result = $con->query($query) or die ("Invalid Selection." . $con->error);

while($rows = mysql_fetch_array($query)):

       $pid = $rows['PID'];
       $symbol = $rows['Symbol'];
       $genus = $rows['Genus'];
       $species = $rows['Species'];
       $common = $rows['Common_Name']
       $family = $rows['Family']

       echo "$pid<br>$symbol<br>$genus<br>$species<br>$common<br>$family<br><br>";

       endwhile;

/*$rows = $result->$num_rows;

echo $num_rows;

for ($i-0; $i<$rows; $i++) {
  if ($result->fetch_array()['Common_Name']==$plant_search ||
      $result->fetch_array()['Genus']==$plant_search ||
      $result->fetch_array()['Species']==$plant_search ||
      $result->fetch_array()['Family']==$plant_search) {
    $pid = $result->fetch_array()['PID'];
    $symbol = $result->fetch_array()['Symbol'];
    $genus = $result->fetch_array()['Genus'];
    $species = $result->fetch_array()['Species'];
    $common_name = $result->fetch_array()['Common_Name'];
    $family = $result->fetch_array()['Family'];

    echo "Plant: $pid $symbol $genus $species $common_name $family";
  }
}

if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
else
  {

  }
mysqli_close($con); */

?>
