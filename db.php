<?php

$db_server = "192.168.25.103";
$db_database = "dev";
$db_user = "dev";
$db_passwd = "Dev2016";

try{
  $db = new PDO("sqlsrv:server=$db_server;database=$db_database;", $db_user, $db_passwd);
}catch(PDOException $e) {
  echo $e->getMessage();
}

?>
