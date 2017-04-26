<?php
require "dbconnect.php";
$db = DbUtil::loginConnection();
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
$stmt = $db->stmt_init();
$response = array();
$posts = array();
$fp = fopen('results.json', 'w');
//if (false === $fp) {
//    throw new RuntimeException('Unable to open log file for writing');
//}
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

table#t01 th {
    background-color: #aee5c9;
    color: black;
}

</style>
<table id=t01 style=width:100%  border=1>
<th><strong>PlantID</strong></th>
<th><strong>Symbol</strong></th>
<th><strong>Genus</strong></th>
<th><strong>Species</strong></th>
<th><strong>Common Name</strong></th>
<th><strong>Family</strong></th>
\n"
;

 while($stmt->fetch()) {
    echo "<tr><td>$pid</td><td>$symbol</td><td>$genus</td><td>$species</td><td>$cname</td><td>$family</td></tr>";
   // $posts[] = array("$pid", "$symbol", "$genus", "$species", "$cname", "$family");
    fwrite($fp, json_encode(array("$pid", "$symbol", "$genus", "$species", "$cname", "$family")));

  }
  echo "</table>";

echo "<div style='text-align: center'><font color='white'><a href='results.json' download='plantreport.json'></font>Export</a></div>";

//  $response[] = $posts;
  $stmt->close();
}
$db->close();


//fwrite($fp, json_encode($posts));
fclose($fp);


?>
