<?php
class DbUtil{
  public static $user = "cs4750s17sf2ned";
  public static $pass = "nomenclature";
  public static $host = "stardock.cs.virginia.edu";
  public static $schema = "cs4750s17sf2ne";

  public static function loginConnection() {
    $db = new mysqli(DbUtil::$host, DbUtil::$user,
                     DbUtil::$pass, DbUtil::$schema);
    if($db->connect_errno) {
      echo "fail";
      $db->close();
      exit();
    }
    return $db;
  }
}
?>