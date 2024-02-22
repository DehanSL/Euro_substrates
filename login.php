<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h2 class="title">Employee Login</h2>

    <div class="container"> 
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
    <form action="login_process.php" method="POST">
        <label>NIC Number: </label> <input type="text" name="nic_number" required><br>
        <label>Password: </label> <input type="password" name="password" required><br>

        <div class="btns">
        <input type="submit" class="btn" value="Login">     
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
