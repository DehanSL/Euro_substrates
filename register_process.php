<?php
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
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$nic_number = $_POST['nic_number'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert data into the employees table
$sql = "INSERT INTO employees (first_name, last_name, phone_number, nic_number, password)
        VALUES ('$first_name', '$last_name', '$phone_number', '$nic_number', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful! <br>";
    echo '<a href="login.php">Login</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
