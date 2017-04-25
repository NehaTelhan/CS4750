<?php
require "dbconnect.php";
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();

if($stmt->prepare("select pid, symbol, genus, species, cname, family from Plant where cname like ?") or die(mysqli_error($db))) {
  $searchString = '%' . $_GET['searchName'] . '%';
  $stmt->bind_param(s, $searchString);
  $stmt->execute();
  $stmt->bind_result($pid, $symbol, $genus, $species, $cname, $family);
  echo "<table border=1><th>pid</th><th>symbol</th><th>genus</th><th>species</th><th>cname</th><th>family</th>\n";

 while($stmt->fetch()) {
    echo "<tr><td>$pid</td><td>$symbol</td><td>$genus</td><td>$species</td><td>$cname</td><td>$family</td></tr>";
  }
  echo "</table>";

  $stmt->close();
}

$db->close();


?>
