<?php
include "dbconnect.php";

// 1. USERS TABLE
$sql1 = "CREATE TABLE IF NOT EXISTS users (
    userID INT PRIMARY KEY,
    userName VARCHAR(40) NOT NULL,
    userEmail VARCHAR(100) NOT NULL,
    userPassword VARCHAR(255) NOT NULL,
    userRole VARCHAR(35) NOT NULL
)";
if (mysqli_query($conn, $sql1))
    echo "Users table created<br>";

// 2. ADMIN TABLE
$sql2 = "CREATE TABLE IF NOT EXISTS admin (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    AdminLevel VARCHAR(40),
    Department VARCHAR(45),
    LastLoginAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
)";
if (mysqli_query($conn, $sql2))
    echo "Admin table created<br>";

// 3. PLAYERS TABLE
$sql3 = "CREATE TABLE IF NOT EXISTS players (
    PlayerID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    PlayerName VARCHAR(30),
    Position VARCHAR(35),
    PreferredFoot VARCHAR(40),
    MarketValue DECIMAL(9, 2),
    JerseyNumber INT,
    CurrentTeam VARCHAR(100),
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
)";
if (mysqli_query($conn, $sql3))
    echo "Players table created<br>";

// 4. AGENT TABLE
$sql4 = "CREATE TABLE IF NOT EXISTS agent (
    AgentID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    AgentName VARCHAR(40),
    LicenseNumber VARCHAR(40),
    YearsExperience INT,
    TotalClients INT,
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
)";
if (mysqli_query($conn, $sql4))
    echo "Agent table created<br>";

// 5. CLUB MANAGERS TABLE
$sql5 = "CREATE TABLE IF NOT EXISTS clubmanagers (
    ManagerID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    ClubName VARCHAR(100),
    ClubLeague VARCHAR(50),
    ClubBudget DECIMAL(12, 2),
    TransferBudget DECIMAL(12, 2),
    StadiumName VARCHAR(100),
    FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
)";
if (mysqli_query($conn, $sql5))
    echo "Club Managers table created<br>";

echo "<br><h3> All 5 Tables Created!</h3>";
echo "<a href='multiplerecords.php'>Insert 10+ records in each table</a><br>";
echo "<a href='index.php'>Go to CRUD System</a>";

mysqli_close($conn);
?>