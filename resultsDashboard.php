<?php
    include 'QuizResultsDashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results Dashboard</title>
    <link rel="stylesheet" href="css/resultsDashboard.css">
</head>
<body>
    <!-- <header>
        <h1>Quiz Results Dashboard</h1>
    </header> -->
    <div class="container">
        <div class="main-content">
            <div class="header">
                <h2>Test App</h2>
                <h2><a href="user_Login.html">Log out</a></h2>
            </div>
        </div>
        
        <div class="results-table">
        <h2>Test Results Dashboard</h2>
        <table>
            <tr>
                <th>User Name</th>
                <!-- <th>Test Taken</th> -->
                <th>Time Taken (seconds)</th>
                <th>Score</th>
            </tr>

            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['username']; ?></td>
                   
                    <td><?php echo $row['time_taken']; ?></td>
                    <td><?php echo $row['score']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <p><a class="back-link" href="admin_Home.html">Back</a></p>
    </div>

    </div>
    
</body>
</html>
