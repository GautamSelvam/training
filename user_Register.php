
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/user_Register.css">
</head>
<body>
    <div>
    <h2>SIGN UP</h2>
        <form action="db_Register.php" method="POST">
           
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" autocomplete='off'><br>
            
            <label for="username">Username:</label>
            <input type="text" name="userName" id="username" autocomplete='off'><br>

            <!-- <label for="email">Email:</label>
            <input type="email" name="email" id="email" autocomplete='off'><br> -->
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            
            <input type="submit" value="Submit">
        </form>
        <form action="user_Login.php">
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>