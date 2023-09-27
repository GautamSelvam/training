<?php
session_start();
include "dbconnect.php";

class UserAuthController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser() {
        try {

            $errorMessage = '';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['userName'];
                $password = $_POST['password'];

    
                $sql = "SELECT * FROM usersCredentials WHERE userName = :username AND Password = :password";
                $stmt = $this->conn->prepare($sql);
    
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
    
                $stmt->execute();
    
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($row) {
                    
                    if ($row["usertype"] == 'admin') {
                        header("location: admin_Home.php");
                        exit;
                    } elseif ($row["usertype"] == 'user') {
                        $_SESSION['username'] = $row['userName'];
                        header("location: user_Home.php");
                        exit;
                    }
                } else {
                    $errorMessage = "Username or password incorrect";
                }
            }
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
}

$userAuthController = new UserAuthController($conn);
$errorMessage =$userAuthController->loginUser();


?>
