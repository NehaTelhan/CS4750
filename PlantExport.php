<?php
require "dbconnect.php";
require "PlantSelect.php";

 while($stmt->fetch()) {
    fwrite($fp, json_encode($posts));

  }

fclose($fp);
?>
