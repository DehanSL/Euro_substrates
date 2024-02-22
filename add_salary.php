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

// Retrieve employee list for dropdown
$employee_query = "SELECT id, first_name, last_name FROM employees";
$employee_result = $conn->query($employee_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Salary</title>
    <link rel="stylesheet" href="add_salary.css">
</head>
<body>
    <h2 class="title">Add Salary</h2>

    <div class="container"> 
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
    <form action="add_salary_process.php" method="POST">
        <label>Employee:</label> 
        <select name="employee_id" required>
            <?php
            while ($employee_row = $employee_result->fetch_assoc()) {
                echo "<option value='".$employee_row['id']."'>".$employee_row['first_name']." ".$employee_row['last_name']."</option>";
            }
            ?>
        </select><br>
        <label>Basic Salary: <input type="text" name="basic_salary" required><br>
        <label>EPF:</label> <input type="text" name="epf" required><br>
        <label>ETF:</label> <input type="text" name="etf" required><br>
        <label>Loan:</label> <input type="text" name="loan" required><br>
        <label>Allowance:</label> <input type="text" name="allowance" required><br>
        
        <div class="btns">
        <input type="submit" class="btn" value="Add Salary">
        </div>
    </form>
        </div>
        </div>
        </div>
</body>
</html>
