<?php
include 'dbconnect.php';

class UserRegistration {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function RegisterUser() {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $username = $_POST["userName"];
                // $useremail = $_POST["email"];
                $password = $_POST["password"];

                $sql = "INSERT INTO usersCredentials (Name, userName, Password) VALUES (:name, :username, :password)";
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':username', $username);
                // $stmt->bindParam(':email', $useremail);
                $stmt->bindParam(':password', $password);

                if ($stmt->execute()) {
                    // echo "Successfully Registered";
                    // You can redirect to another page here if needed.
                    header("location: user_Login.php");
                    exit;
                } else {
                    echo "Failed to register";
                }
            }
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
}

$userRegistration = new UserRegistration($conn);
$userRegistration->RegisterUser();
?>
