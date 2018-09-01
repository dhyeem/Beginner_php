<?php


/**
  *
  * Get the Database connection
  *
  *
  * @return object connectoin to mysql server
  *
  */
function getDB(){

// Database connection:
$db_host = 'localhost';
$db_name = 'cms';
$db_username = 'cms_www';
$db_password = 'fODVvNd7WrZ46fzT';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);


// check the db connctoin
if (mysqli_connect_error()) {
  echo mysqli_connect_error();
  exit;
  }
  return $conn;
}
 ?>
