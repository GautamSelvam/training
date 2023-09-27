<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/user_Login.css">

</head>
<body>
  <div>
    <h2>Login</h2>
    <form action="db_Validate.php" method="POST">
        <label for="username">Username or Email:</label>
        <input type="text" name="userName" id='username' autocomplete='off' required >
        <label for="password">Password:</label>
        <input type="password" name="password" id='password' autocomplete='off' required>
        <input type="submit" value="Login">
        <p>Don't have an account ?<a href="user_Register.php">Signup</a></p>
        
    </form>
  </div>  
</body>
</html>