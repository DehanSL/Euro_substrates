<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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

// Retrieve user's details
$user_id = $_SESSION['user_id'];
$user_query = "SELECT first_name, last_name FROM employees WHERE id = '$user_id'";
$user_result = $conn->query($user_query);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $employee_name = $user_row['first_name'] . ' ' . $user_row['last_name'];
} else {
    $employee_name = "Employee not found";
}

// Retrieve user's salary details
$salary_query = "SELECT * FROM salaries WHERE employee_id = '$user_id'";
$salary_result = $conn->query($salary_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Summary</title>
    <link rel="stylesheet" href="salary_summary.css"> <!-- Include your CSS file -->
</head>
<body>
    <h2 class="title">Salary Summary for <?php echo $employee_name; ?></h2>

    <div class="container">
    <?php
    if ($salary_result->num_rows > 0) {
        $salary_row = $salary_result->fetch_assoc();
        
        // Calculate net salary
        $net_salary = $salary_row['basic_salary'] - ($salary_row['epf'] + $salary_row['etf'] + $salary_row['loan']) + $salary_row['allowance'];
        
        // Display salary details
        echo "<p>Basic Salary: " . $salary_row['basic_salary'] . "</p>";
        echo "<p>EPF: " . $salary_row['epf'] . "</p>";
        echo "<p>ETF: " . $salary_row['etf'] . "</p>";
        echo "<p>Loan: " . $salary_row['loan'] . "</p>";
        echo "<p>Allowance: " . $salary_row['allowance'] . "</p>";
        echo "<p>Net Salary: " . $net_salary . "</p>";
    } else {
        echo "Salary details not found!";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
