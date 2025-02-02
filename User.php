<?php
class User{
    private $conn;
    private $table_name = "users";

    public function __construct($db){
        $this->conn = $db;
    }

    public function register($name,$email,$password){
        $query = "INSERT INTO {$this->table_name} (Emri,Email,Pass) VALUES (?,?,?)";

        $stmt = $this->conn->prepare("SELECT Email From users Where Email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "<script>alert('Email already taken!');</script>";
        } else {
            $insert_stmt = $this->conn->prepare($query);
            if(!$insert_stmt){
                die("Prepare failed" . $this->conn->error);
            }

            // Bind parameters
            $insert_stmt->bind_param("sss", $name,$email, $password);

            if ($insert_stmt->execute()) {
                return true;
            }
        }
            return false;
    }

    public function login($email,$password){
        $query = "SELECT Id,Emri,Email,Pass FROM {$this->table_name} Where Email = ? and Pass = ?";

        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            die("Prepare failed" . $this->conn->error);
        }

        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            if(session_status()==PHP_SESSION_NONE){
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

    public function count_Users(){
        $sql = "SELECT COUNT(*) AS user_count FROM {$this->table_name}";
        $result = $this->conn->query($sql);

        if($result){
            $row = $result->fetch_assoc();
            return $row['user_count'];
        }else{
            die("Query failed" . $this->conn->error);
        }
    }

    public function showUserCount(){
        $count = $this->count_Users();

        if($count>0){
            echo "<div class='box'>
                    <i class='fas fa-user'></i>  
                    <h2>$count Users</h2><br>
                    
                </div>";
        } else {
            echo "<div class='box'><h2>No Users</h2></div>";
        }
    }
    
    public function getUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()){
            $users[] = $row;
        }
        return $users;
    }

    public function deleteUsers($id){
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
}