<?php
include "dbconnect.php";

// Handle CREATE/UPDATE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['userID'];
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $pass = $_POST['userPassword'];
    $role = $_POST['userRole'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE userID = $id");

    if (mysqli_num_rows($check) > 0) {
        // UPDATE
        $sql = "UPDATE users SET userName='$name', userEmail='$email', userPassword='$pass', userRole='$role' WHERE userID=$id";
        $msg = "User updated!";
    } else {
        // CREATE
        $sql = "INSERT INTO users (userID, userName, userEmail, userPassword, userRole) VALUES ($id, '$name', '$email', '$pass', '$role')";
        $msg = "User created!";
    }

    if (mysqli_query($conn, $sql)) {
        $success = $msg;
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Handle DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE userID = $id";
    if (mysqli_query($conn, $sql)) {
        $success = "User deleted!";
    } else {
        $error = "Delete error: " . mysqli_error($conn);
    }
}

// Handle SEARCH
if (isset($_GET['search'])) {
    $search_id = $_GET['search'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE userID = $search_id");
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['userID'];
        $name = $row['userName'];
        $email = $row['userEmail'];
        $pass = $row['userPassword'];
        $role = $row['userRole'];
    } else {
        $info = "User not found. You can create new user with ID: $search_id";
        $id = $search_id;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Football Agent CRUD</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .main {
            display: flex;
            gap: 20px;
        }

        .left,
        .right {
            flex: 1;
        }

        .box {
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .btn-success {
            background: #27ae60;
        }

        .btn-danger {
            background: #e74c3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Football Agent System</h1>

        <?php if (isset($success))
            echo "<div class='message success'>$success</div>"; ?>
        <?php if (isset($error))
            echo "<div class='message error'>$error</div>"; ?>
        <?php if (isset($info))
            echo "<div class='message info'>$info</div>"; ?>

        <div class="main">
            <!-- LEFT: CRUD Form -->
            <div class="left">
                <div class="box">
                    <h3>🔍 Search by UserID</h3>
                    <form method="GET">
                        <input type="number" name="search" placeholder="Enter User ID" required>
                        <button type="submit">Search</button>
                    </form>
                </div>

                <div class="box">
                    <h3>User Form</h3>
                    <form method="POST">
                        <input type="number" name="userID" value="<?php echo $id ?? ''; ?>" placeholder="User ID"
                            required>
                        <input type="text" name="userName" value="<?php echo $name ?? ''; ?>" placeholder="Full Name"
                            required>
                        <input type="email" name="userEmail" value="<?php echo $email ?? ''; ?>" placeholder="Email"
                            required>
                        <input type="text" name="userPassword" value="<?php echo $pass ?? ''; ?>" placeholder="Password"
                            required>
                        <select name="userRole" required>
                            <option value="">Select Role</option>
                            <option value="Admin" <?php echo ($role ?? '') == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="Agent" <?php echo ($role ?? '') == 'Agent' ? 'selected' : ''; ?>>Agent</option>
                            <option value="Player" <?php echo ($role ?? '') == 'Player' ? 'selected' : ''; ?>>Player
                            </option>
                            <option value="Club Manager" <?php echo ($role ?? '') == 'Club Manager' ? 'selected' : ''; ?>>
                                Club Manager</option>
                            <option value="Scout" <?php echo ($role ?? '') == 'Scout' ? 'selected' : ''; ?>>Scout</option>
                        </select>

                        <div>
                            <button type="submit" class="btn-success">Save User</button>
                            <?php if (!empty($id)): ?>
                                <a href="?delete=<?php echo $id; ?>" onclick="return confirm('Delete?')">
                                    <button type="button" class="btn-danger">Delete</button>
                                </a>
                            <?php endif; ?>
                            <a href="index.php"><button type="button">Clear</button></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT: Users Table -->
            <div class="right">
                <div class="box">
                    <h3>All Users (15 Records)</h3>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM users ORDER BY userID");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['userID'] . "</td>";
                            echo "<td>" . $row['userName'] . "</td>";
                            echo "<td>" . $row['userEmail'] . "</td>";
                            echo "<td>" . $row['userRole'] . "</td>";
                            echo "<td>";
                            echo "<a href='?search=" . $row['userID'] . "'><button>Edit</button></a>";
                            echo "<a href='?delete=" . $row['userID'] . "' onclick='return confirm(\"Delete?\")'><button class='btn-danger'>Delete</button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>

                <div class="box">
                    <h3>Database Info</h3>
                    <p><strong>5 Tables Created:</strong></p>
                    <ul>
                        <li>users (15 records)</li>
                        <li>admin (12 records)</li>
                        <li>players (12 records)</li>
                        <li>agent (12 records)</li>
                        <li>clubmanagers (12 records)</li>
                    </ul>
                    <p><a href="multiplerecords.php">View All Data</a></p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px; padding: 10px; background: #f8f9fa;">
            <p>CRUD Operations: Create, Read, Update, Delete | All in index.php</p>
            <p><a href="register.php">Registration Page</a></p>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($conn); ?>