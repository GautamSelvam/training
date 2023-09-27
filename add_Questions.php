
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/add_Questions.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['success_message'])) {
        echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']); // Clear the success message
    }
    ?>
<div class="container">
        <form  action="db_addQuestions.php" method="POST">
            <!-- <label for="">Question:</label> -->
            Question:<input type="text" name="question_text" required><br>

            <!-- <label>Option 1:</label> -->
            Option 1:<input type="text" name="option1" required><br>

            <!-- <label>Option 2:</label> -->
            Option 2:<input type="text" name="option2" required><br>

            <!-- <label>Option 3:</label> -->
            Option 3:<input type="text" name="option3" required><br>

            <!-- <label>Option 4:</label> -->
            Option 4:<input type="text" name="option4" required><br>

            <!-- <label>Correct Option:</label> -->
            Correct Option:<input type="text" name="correct_option" required>

            <input type="submit" value="Add Question">
        </form>
        <a class="back-link" href="admin_Home.php">Back</a>
    </div>
</body>
</html>