<?php
session_start();

// Connect to the database (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$nic_number = $_POST['nic_number'];
$password = $_POST['password'];

// Retrieve user from the employees table
$sql = "SELECT * FROM employees WHERE nic_number = '$nic_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Store user data in session
        $_SESSION['user_id'] = $row['id'];
        header("Location: salary_summary.php");
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

$conn->close();
?>
