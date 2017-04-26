<?php
require "dbconnect_plant.php";
require "PlantSelect.php";

 while($stmt->fetch()) {
    fwrite($fp, json_encode($posts));

  }

fclose($fp);
?>
