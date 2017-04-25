<?php
require "dbconnect.php";
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();

if($stmt->prepare("select * from Plant where common_name like ?") or die(mysqli_error($db))) {
  $searchString = '%' . $_GET['searchName'] . '%';
  $stmt->bind_param(s, $searchString);
  $stmt->execute();
  $stmt->bind_result($pid, $symbol, $genus, $species, $cname, $family);
  echo "<table border=1><th>pid</th><th>symbol</th><th>genus</th><th>species</th><th>cname/th><th>family</th>\n";

 while($stmt->fetch()) {
    echo "<tr><td>$pid</td><td>$symbol</td><td>$genus</td><td>$species</td>$cname<td>$family</td></tr>";
  }
  echo "</table>";

  $stmt->close();
}

$db->close();


?>

// Neha's version
/*session_start();
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
$query = mysql_query("SELECT PID,Common_Name FROM Plant") or die (mysql_error());
//$result = $con->query($query) or die ("Invalid Selection." . $con->error);

while($rows = mysql_fetch_array($query)){

       $pid = $rows['PID'];
       $symbol = $rows['Symbol'];
       $genus = $rows['Genus'];
       $species = $rows['Species'];
       $common = $rows['Common_Name']
       $family = $rows['Family']

       echo "$pid<br>$symbol<br>$genus<br>$species<br>$common<br>$family<br><br>";

       endwhile;
     }

$rows = $result->$num_rows;

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
mysqli_close($con);
*/
