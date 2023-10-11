<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "DbConnect.php";

class QuestionManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addQuestion($question_text, $option1, $option2, $option3, $option4, $correct_option) {
        try {
            $sql = "INSERT INTO questions (question_text, option_1, option_2, option_3, option_4, correct_option) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(1, $question_text, PDO::PARAM_STR);
            $stmt->bindParam(2, $option1, PDO::PARAM_STR);
            $stmt->bindParam(3, $option2, PDO::PARAM_STR);
            $stmt->bindParam(4, $option3, PDO::PARAM_STR);
            $stmt->bindParam(5, $option4, PDO::PARAM_STR);
            $stmt->bindParam(6, $correct_option, PDO::PARAM_STR);

            if ($stmt->execute()) {
                session_start();
                $_SESSION['success_message'] = "Question added successfully!";

                header("location: add_Questions.phtml");
                exit;
            } else {
                echo "failed to add questions"; // Failure
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // Error
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new DbConnect();
    $conn = $db->getConnection();
    $questionManager = new QuestionManager($conn);

    // Get form data
    $question_text = $_POST['question_text'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_option = $_POST['correct_option'];

    // Add question using the QuestionManager class
    $questionManager->addQuestion($question_text, $option1, $option2, $option3, $option4, $correct_option);
}
?>
