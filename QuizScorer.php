<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DbConnect.php';
session_start();
$username = $_SESSION["username"];

class QuizScorer
{
    private $conn;
    private $username;

    public function __construct($conn, $username)
    {
        $this->conn = $conn;
        $this->username = $username;
    }

    public function calculateScore($userAnswers)
    {
        $score = 0;
        $totalQuestions = 0;
        $correctAnswers = [];

        $sql = "SELECT question_id, correct_option FROM questions";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $questionId = $row['question_id'];
            $correctOption = $row['correct_option'];
            $correctAnswers[$questionId] = $correctOption;
            $totalQuestions++;
        }

        foreach ($userAnswers as $questionId => $selectedOption) {
            if (isset($correctAnswers[$questionId]) && $correctAnswers[$questionId] == $selectedOption) {
                $score++;
            }
        }

        return ['score' => $score, 'totalQuestions' => $totalQuestions];
    }

    public function insertScore($scorePercentage, $timeTaken)
    {
        $scoreInsertSql = "INSERT INTO result (score, time_taken, username) VALUES (:scorePercentage, :timeTaken, :username)";
        $stmt = $this->conn->prepare($scoreInsertSql);
        $stmt->bindParam(':scorePercentage', $scorePercentage, PDO::PARAM_STR);
        $stmt->bindParam(':timeTaken', $timeTaken, PDO::PARAM_STR);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->execute();
    }
}

$quizScorer = new QuizScorer($conn, $username);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION["username"];
    
    if (isset($_POST['answer']) && is_array($_POST['answer'])) {
        $scoreInfo = $quizScorer->calculateScore($_POST['answer']);
    } else {
        $scoreInfo = ['score' => 0, 'totalQuestions' => 0];
    }

    if (isset($_COOKIE['time_taken'])) {
        $timeTaken = $_COOKIE['time_taken'];
    }

    $score = $scoreInfo['score'];
    $totalQuestions = $scoreInfo['totalQuestions'];

    if ($totalQuestions === 0) {
        $scorePercentage = 0;
    } else {
        $scorePercentage = ($score / $totalQuestions) * 100;
    }

    $quizScorer->insertScore($scorePercentage, $timeTaken);
    header("Location: user_Home.php");
    exit();
}
?>
