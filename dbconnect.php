<?php
$serverName = "localhost";
$userName = "root";
$pass = "";
$dbname = "FOOTBALLAGENTSYSTEM";

// Create connection
$conn = mysqli_connect($serverName, $userName, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>