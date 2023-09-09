<?php
/* Server */
// $servername = "localhost";
// $username = "si";
// $password = "nq7NqisGaJ9cA1hP";
// $dbname = "dbsmartfarming";

/* Local */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db-magetan";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

date_default_timezone_set("Asia/Jakarta");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
