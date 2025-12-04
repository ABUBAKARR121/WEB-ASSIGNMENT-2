<?php
include "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['UserID'];
    $name = $_POST['UserName'];
    $email = $_POST['EmailAddress'];
    $pass = $_POST['Password'];
    $role = $_POST['UserRole'];

    $sql = "INSERT INTO users (userID, userName, userEmail, userPassword, userRole) 
            VALUES ($id, '$name', '$email', '$pass', '$role')";

    if (mysqli_query($conn, $sql)) {
        $success = "Registration successful!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial;
            padding: 50px;
        }

        .form-box {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #3498db;
            color: white;
        }
    </style>
</head>

<body>
    <div class="form-box">
        <h2>Register New User</h2>
        <?php if (isset($success))
            echo "<p style='color: green;'>$success</p>"; ?>
        <?php if (isset($error))
            echo "<p style='color: red;'>$error</p>"; ?>
        <form method="POST">
            <input type="number" name="UserID" placeholder="User ID" required>
            <input type="text" name="UserName" placeholder="Full Name" required>
            <input type="email" name="EmailAddress" placeholder="Email" required>
            <input type="password" name="Password" placeholder="Password" required>
            <select name="UserRole" required>
                <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Agent">Agent</option>
                <option value="Player">Player</option>
                <option value="Club Manager">Club Manager</option>
                <option value="Scout">Scout</option>
            </select>
            <button type="submit">Register</button>
            <a href="index.php">Back to CRUD</a>
        </form>
    </div>
</body>

</html>
<?php mysqli_close($conn); ?>