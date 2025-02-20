<?php
class Admin{
    private $conn;
    private $table_name = 'admin';

    public function __construct($db){
        $this -> conn = $db;
    }

    public function login($email, $password){
        $query = "SELECT Id, Emri, Email, Pass FROM {$this -> table_name} WHERE Email = ? and Pass = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt){
            die("Prepare failed: " .$this->conn->error);
        }
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['user_id'] = $row['Id'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['last_activity'] = time();
            $_SESSION['session_expire'] = 600;

            return true;
        }
        return false;
    }
}