<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_userTestQ.php';
class UserResults {
    private $conn;
    private $username;

    public function __construct($conn, $username) {
        $this->conn = $conn;
        $this->username = $username;
    }

    public function hasTakenTest() {
        $sql = "SELECT COUNT(*) FROM result WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count > 0;
    }
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $userResults = new UserResults($conn, $username);

    if ($userResults->hasTakenTest()) {
        $alreadyTakenMessage = "You have already taken the test.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Timer</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/user_Test.css">
</head>
<body>

<div id="timer"></div>
<?php if (!empty($alreadyTakenMessage)) : ?>
    <div class="already-taken-message">
        <?php echo $alreadyTakenMessage; ?>
        <a class="back-link" href="user_Login.php">Log out</a>
    </div>
<?php else : ?>
<div>
<form method="post" name="quizForm" action="quiz_Results.php" id="quizForm">
<script src="timer.js"></script>

<div class="container">
    <?php foreach ($getQuestions as $row): ?>
        <div class="question">
            <p><?php echo $row['question_text']; ?></p>
            <input type="radio" name="answer[<?php echo $row['question_id']; ?>]" value="1"> <?php echo $row['option_1']; ?> <br>
            <input type="radio" name="answer[<?php echo $row['question_id']; ?>]" value="2"> <?php echo $row['option_2']; ?> <br>
            <input type="radio" name="answer[<?php echo $row['question_id']; ?>]" value="3"> <?php echo $row['option_3']; ?> <br>
            <input type="radio" name="answer[<?php echo $row['question_id']; ?>]" value="4"> <?php echo $row['option_4']; ?> <br>
        </div>
    <?php endforeach; ?>
</div>


    <input type="hidden" id="timeLeft" name="timeLeft" value="">

    <input type="submit" id="submit" value="Submit" name="submit">
</form>
<button id="reviewButton">Review Answers</button>
    <script>
        document.getElementById('reviewButton').addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    </script>
</div>
<?php endif; ?>
</body>
</html>