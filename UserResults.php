<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'DbConnect.php';

class UserResults {
    private $conn;
    private $username;

    public function __construct($conn,$username) {
        $this->conn = $conn;
        $this->username =$username;
    }

    public function getUserResults() {
        $sql = "SELECT score, time_taken, test_taken FROM result WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->execute();
        $userResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $userResults;
}
}
// $userTestResults = new QuizResultsDashboard($conn);
// $userTestResults->displayResults();
$userResultsData = []; //Needed an empty array bcoz the value was storing as NULL

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $userResults = new UserResults($conn, $username);
    $userResultsData = $userResults->getUserResults();

}
?>