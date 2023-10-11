<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'DbConnect.php';

class UserRegistration {
    private $conn;

    /**
     * @param PDO $conn
     */
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    /**
     * To register an user
     *
     * @return void
     */
    // ... (previous code)

public function RegisterUser()
{
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $inputUsername = $_POST["userName"]; 
            $password = $_POST["password"];

            $checkUsernameQuery = "SELECT COUNT(*) FROM usersCredentials WHERE userName = :inputUsername";
            $checkUsernameStmt = $this->conn->prepare($checkUsernameQuery);
            $checkUsernameStmt->bindParam(':inputUsername', $inputUsername);
            $checkUsernameStmt->execute();
            $usernameExists = $checkUsernameStmt->fetchColumn();

            if ($usernameExists) {
                $_SESSION['error_message'] = "Username already exists. Please choose a different username.";
                header("location: user_Register.php");
                exit;
            }
else{
            $insertQuery = "INSERT INTO usersCredentials (Name, userName, Password) VALUES (:name, :username, :password)";
            $insertStmt = $this->conn->prepare($insertQuery);

            $insertStmt->bindParam(':name', $name);
            $insertStmt->bindParam(':username', $inputUsername); 
            $insertStmt->bindParam(':password', $password);

            if ($insertStmt->execute()) {
                // echo "Successfully Registered";
                header("location: user_Login.html");
                exit;
            } else {
                echo "Failed to register";
            }
        }
    }
    } catch (PDOException $e) {
        die("Connection error: " . $e->getMessage());
    }
}

// ... (rest of the code)
}

$userRegistration = new UserRegistration($conn);
$userRegistration->RegisterUser();
?>
