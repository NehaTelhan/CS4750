

<?php


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

?>

