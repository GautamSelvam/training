<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'dbconnect.php';

class QuizTimer {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getQuestions()
    {
        $sql = "SELECT question_id, question_text, option_1, option_2, option_3, option_4 FROM questions";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
$quizTimer = new QuizTimer($conn);
$getQuestions = $quizTimer->getQuestions();

?>
