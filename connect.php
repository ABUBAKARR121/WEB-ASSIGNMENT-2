<?php
$serverName = "localhost";
$userName = "root";
$pass = "";

$conn = mysqli_connect($serverName, $userName, $pass);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$sql = "CREATE DATABASE IF NOT EXISTS FOOTBALLAGENTSYSTEM";
if (mysqli_query($conn, $sql)) {
    echo "<h2> Database Created!</h2>";
    echo "<a href='createtables.php'>Click to create tables</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>