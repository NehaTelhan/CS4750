<?php
require "dbconnect.php";
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();

if($stmt->prepare("select pid, symbol, genus, species, cname, family from Plant where cname like ?") or die(mysqli_error($db))) {
  $searchString = '%' . $_GET['searchName'] . '%';
  $stmt->bind_param(s, $searchString);
  $stmt->execute();
  $stmt->bind_result($pid, $symbol, $genus, $species, $cname, $family);
  echo "
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #aee5c9;
}
</style>
<table border=1>
<th><strong>Symbol</strong></th>
<th><strong>Genus</strong></th>
<th><strong>Species</strong></th>
<th><strong>Common Name</strong></th>
<th><strong>Family</strong></th>
\n";

 while($stmt->fetch()) {
    echo "<tr><td>$symbol</td><td>$genus</td><td>$species</td><td>$cname</td><td>$family</td></tr>";
  }
  echo "</table>";

  $stmt->close();
}

$db->close();


?>
