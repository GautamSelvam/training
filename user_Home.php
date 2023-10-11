<?php
    include 'UserResults.php';
    // var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Results</title>
    <link rel="stylesheet" href="css/user_Home.css">

    <script type="text/javascript">
        window.history.forward();
        // function noBack() {
        //     window.history.forward();
        // }
    </script>
</head>

<body>
    <header>
        <h1>Test App</h1>
        <h1><a class="back-link" href="user_Login.html">Log out</a></h1>
    </header>

    


    <div class="container">
            <h3>Welcome <?php echo $username; ?>! Are you ready to take the test on computer science?</h3>

            <a href="user_Test.php">Take test</a>
           
            <h4>Your Results</h4>
        <table>
            <tr>
                <th>Test Taken</th>
                <th>Time Taken (seconds)</th>
                <th>Score</th>
            </tr>

            <?php foreach ($userResultsData as $result): ?>
                <tr>
                    <td>
                        <?php echo $result['test_taken']; ?>
                    </td>
                    <td>
                        <?php echo $result['time_taken']; ?>
                    </td>
                    <td>
                        <?php echo $result['score']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <!-- <a class="back-link" href="User_login.php">Back</a> -->
</body>
</html>