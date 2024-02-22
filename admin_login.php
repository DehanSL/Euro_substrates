<?php
session_start();

// Assuming your admin credentials are hardcoded (replace with actual database check)
$admin_username = "admin";
$admin_password = password_hash("adminpassword", PASSWORD_BCRYPT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Check if entered credentials match the admin credentials
    if ($entered_username == $admin_username && password_verify($entered_password, $admin_password)) {
        $_SESSION['admin_id'] = 1; // Set the admin session variable
        header("Location: add_salary.php"); // Redirect to the Add Salary page
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2 class="title">Admin Login</h2>

    <div class="container"> 
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
    <form action="" method="POST">
        <label>Username: </label> <input type="text" name="username" required><br>
        <label> Password: </label> <input type="password" name="password" required><br>
        <div class="btns">
        <input class="btn" type="submit" value="Login">
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
