<?php
require "dbconnect.php";
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();
$fp = fopen('arbor_result.json', 'w');
if (!$fp){ echo 'you done fucked up';}
if($stmt->prepare("select arborname, numspecies from Arboretum where arborname like ?") or die(mysqli_error($db))) {
  $searchString = '%' . $_GET['searchName'] . '%';
  $stmt->bind_param(s, $searchString);
  $stmt->execute();
  $stmt->bind_result($arborname, $numspecies);
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
<caption></caption>
<th><strong>Arboretum Name</strong></th>
<th><strong>Number of Species</strong></th>
\n";

 while($stmt->fetch()) {
    echo "<tr><td>$arborname</td><td>$numspecies</td></tr>";
    fwrite($fp, json_encode(array("$arborname", "$numspecies")));
  }
  echo "</table>";
  echo "<br>";
  echo "<div style='text-align: center'> <button type='button' class='btn btn-primary btn-lg'  <font color='black'><a href='arbor_result.json' download='arborreport.json' style='color:white'></font>Export</a></button> </div>";
  $stmt->close();
}

$db->close();
?>
