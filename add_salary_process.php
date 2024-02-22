<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

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
$employee_id = $_POST['employee_id'];
$basic_salary = $_POST['basic_salary'];
$epf = $_POST['epf'];
$etf = $_POST['etf'];
$loan = $_POST['loan'];
$allowance = $_POST['allowance'];

// Insert data into the salaries table
$sql = "INSERT INTO salaries (employee_id, basic_salary, epf, etf, loan, allowance)
        VALUES ('$employee_id', '$basic_salary', '$epf', '$etf', '$loan', '$allowance')";

if ($conn->query($sql) === TRUE) {
    echo "Salary added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
