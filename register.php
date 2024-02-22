<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <h2 class="title">Employee Registration</h2>



    <div class="container"> 
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
    <form action="register_process.php" method="POST">
        <label>First Name: </label> <input type="text" class="fieldf" name="first_name" required><br>
        <label>Last Name: </label> <input type="text" class="fieldl" name="last_name" required><br>
        <label>Phone Number: </label> <input type="text" class="fieldp" name="phone_number" required><br>
        <label>NIC Number: </label> <input type="text" class="fieldn" name="nic_number" required><br>
        <label>Password: </label> <input type="password" class="fieldp" name="password" required><br>
        <label>Repeat Password: </label> <input type="password" class="fieldr" name="repeat_password" required><br>
       
       <div class="btns">
        <input type="submit" class="btn" value="Register">
        </div>
    </form>
     </div>
    </div>
    </div>
</body>
</html>
