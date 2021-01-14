<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sharedspace";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully\n";

?>