<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DbConnect.php';

class QuizResultsDashboard {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayResults() {
        $sql = "SELECT username, time_taken, score FROM result";
        $result = $this->conn->query($sql);
        return $result;
    
}
}
$resultsDashboard = new QuizResultsDashboard($conn);
$result = $resultsDashboard->displayResults();