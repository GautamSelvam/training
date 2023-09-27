<?php
    class dbconnect {
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $conn;

        public function __construct(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "admin@123";
            $this->dbname = "testapp";

            try{
                $this-> conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);
                $this-> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
    
        public function getConnection() {
            return $this->conn;
        }
    
        // public function closeConnection() {
        //     $this->conn = null;
        // }
    }
    
    $database = new dbconnect();
    
    $conn = $database->getConnection();
    
    
    // Close the connection when done
    // $database->closeConnection();

?>