
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
        <form action="UserRegistration.php" method="POST">
           
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" autocomplete='off' required><br>
            
            <label for="username">Username:</label>
            <input type="text" name="userName" id="username" autocomplete='off' required><br>

            <!-- <label for="email">Email:</label>
            <input type="email" name="email" id="email" autocomplete='off'><br> -->
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            
            <input type="submit" value="Submit">
        </form>
        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']); // Clear the session variable
        }
        ?>
        <form action="user_Login.html">
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>