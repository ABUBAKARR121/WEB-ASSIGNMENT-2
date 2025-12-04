<?php
include "dbconnect.php";

echo "<h2>Inserting 10+ Records in Each Table...</h2>";

// Inserting records to tables
// Users
$sql1 = "INSERT INTO users (userID, userName, userEmail, userPassword, userRole) VALUES
(1, 'Emmanuel James', 'james@gmail.com', 'pass123', 'Club Manager'),
(2, 'Peter Sam', 'sam@gmail.com', 'pass123', 'Agent'),
(3, 'Komba Aiah', 'aiag@gmail.com', 'pass123', 'Player'),
(4, 'Aruna Mansary', 'mansary@gmail.com', 'pass123', 'Admin'),
(5, 'Alhaji Turay', 'turay@gmail.com', 'pass123', 'Club Manager'),
(6, 'Daniel Harding', 'harding@gmail.com', 'pass123', 'Agent'),
(7, 'Mohamed Vandi', 'vandi@gmail.com', 'pass123', 'Admin'),
(8, 'Alfred Jalloh', 'jalloh@gmail.com', 'pass123', 'Player'),
(9, 'Musa Bah', 'bah@gmail.com', 'pass123', 'Agent'),
(10, 'Alex Coker', 'coker@gmail.com', 'pass123', 'Club Manager'),
(11, 'Sarah Conteh', 'conteh@gmail.com', 'pass123', 'Scout'),
(12, 'Michael Kargbo', 'kargbo@gmail.com', 'pass123', 'Player'),
(13, 'Fatmata Sesay', 'sesay@gmail.com', 'pass123', 'Admin'),
(14, 'David Kamara', 'kamara@gmail.com', 'pass123', 'Agent'),
(15, 'Aminata Bangura', 'bangura@gmail.com', 'pass123', 'Club Manager')";
if (mysqli_query($conn, $sql1))
    echo "Users: 15 records<br>";

// ADMIN
$sql2 = "INSERT INTO admin (userID, AdminLevel, Department) VALUES
(4, 'Super Admin', 'IT Department'),
(7, 'Content Admin', 'Marketing'),
(13, 'User Admin', 'HR Department'),
(4, 'System Admin', 'Technical Support'),
(7, 'Database Admin', 'IT Department'),
(13, 'Security Admin', 'Cybersecurity'),
(1, 'Network Admin', 'Infrastructure'),
(4, 'Application Admin', 'Software'),
(7, 'Web Admin', 'Development'),
(13, 'Server Admin', 'Operations'),
(1, 'Backup Admin', 'Data Management'),
(4, 'Cloud Admin', 'Cloud Services')";
if (mysqli_query($conn, $sql2))
    echo "Admin: 12 records<br>";

// PLAYERS
$sql3 = "INSERT INTO players (userID, PlayerName, Position, PreferredFoot, MarketValue, JerseyNumber, CurrentTeam) VALUES
(3, 'John Momoh', 'Forward', 'Left', 50000000.00, 10, 'Diamond Star FC'),
(8, 'Saio Mansary', 'Midfielder', 'Right', 35000000.00, 8, 'Diamond Star FC'),
(12, 'Gida Koroma', 'Defender', 'Right', 25000000.00, 4, 'Diamond Star FC'),
(NULL, 'Hassan Kamara', 'Goalkeeper', 'Right', 15000000.00, 1, 'Diamond Star FC'),
(NULL, 'Paul Saquee', 'Forward', 'Right', 75000000.00, 7, 'Diamond Star FC'),
(NULL, 'Musa Jalloh', 'Midfielder', 'Left', 28000000.00, 6, 'Diamond Star FC'),
(NULL, 'Alpha Bah', 'Defender', 'Left', 22000000.00, 3, 'Diamond Star FC'),
(NULL, 'Mohamed Osman', 'Forward', 'Both', 45000000.00, 9, 'Diamond Star FC'),
(NULL, 'Yayah Senesie', 'Midfielder', 'Right', 32000000.00, 14, 'Diamond Star FC'),
(3, 'Samuel Conteh', 'Forward', 'Right', 38000000.00, 11, 'Diamond Star FC'),
(8, 'Ibrahim Kamara', 'Defender', 'Right', 18000000.00, 2, 'Diamond Star FC'),
(12, 'Abdul Bangura', 'Midfielder', 'Left', 29000000.00, 15, 'Diamond Star FC')";
if (mysqli_query($conn, $sql3))
    echo "Players: 12 records<br>";

// AGENT
$sql4 = "INSERT INTO agent (userID, AgentName, LicenseNumber, YearsExperience, TotalClients) VALUES
(2, 'Peter John', 'AGENT001', 8, 15),
(6, 'Mary Dumbuya', 'AGENT002', 12, 22),
(9, 'Alhaji Sorie', 'AGENT003', 5, 8),
(14, 'Sarah Kamara', 'AGENT004', 15, 30),
(NULL, 'Michael Koroma', 'AGENT005', 7, 12),
(NULL, 'David Mansary', 'AGENT006', 10, 18),
(NULL, 'Ibrahim Paul', 'AGENT007', 20, 35),
(NULL, 'Seray Harding', 'AGENT008', 6, 10),
(NULL, 'Thomas Koroma', 'AGENT009', 9, 16),
(NULL, 'Yayah Kallon', 'AGENT010', 11, 20),
(2, 'James Cole', 'AGENT011', 4, 6),
(6, 'Susan Williams', 'AGENT012', 18, 28)";
if (mysqli_query($conn, $sql4))
    echo "Agent: 12 records<br>";

// CLUB MANAGERS
$sql5 = "INSERT INTO clubmanagers (userID, ClubName, ClubLeague, ClubBudget, TransferBudget, StadiumName) VALUES
(1, 'Bullon Stars', 'Sierra Leone Premier League', 500000000.00, 150000000.00, 'Bullon Stars Stadium'),
(5, 'Wusum Stars', 'Sierra Leone Premier League', 450000000.00, 120000000.00, 'Wusum Stars Stadium'),
(10, 'Old Edwardians', 'Sierra Leone Premier League', 480000000.00, 130000000.00, 'Old Edwardians Stadium'),
(15, 'Bai Bureh Warriors', 'Sierra Leone Premier League', 420000000.00, 110000000.00, 'Bai Bureh Warriors Stadium'),
(NULL, 'BO Rangers', 'Sierra Leone Premier League', 600000000.00, 200000000.00, 'BO Rangers Stadium'),
(NULL, 'Wilberforce FC', 'Sierra Leone Premier League', 400000000.00, 100000000.00, 'Wilberforce FC Stadium'),
(NULL, 'Freetown FC', 'Sierra Leone Premier League', 350000000.00, 80000000.00, 'Freetown FC Stadium'),
(NULL, 'FC Kallon', 'Sierra Leone Premier League', 300000000.00, 70000000.00, 'FC Kallon Stadium'),
(NULL, 'Mighty Blackpool', 'Sierra Leone Premier League', 320000000.00, 75000000.00, 'Mighty Blackpool Stadium'),
(NULL, 'Diamond Star FC', 'Sierra Leone Premier League', 280000000.00, 60000000.00, 'Diamond Star FC Stadium'),
(1, 'East End Lions', 'Sierra Leone Premier League', 520000000.00, 160000000.00, 'National Stadium'),
(5, 'Ports Authority FC', 'Sierra Leone Premier League', 380000000.00, 90000000.00, 'Siaka Stevens Stadium')";
if (mysqli_query($conn, $sql5))
    echo "Club Managers: 12 records<br>";

echo "<h3>ALL TABLES HAVE 10+ RECORDS!</h3>";
echo "<a href='index.php'>Go to CRUD System</a>";

mysqli_close($conn);
?>