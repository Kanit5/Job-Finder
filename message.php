<?php
class Message{
    private $conn;
    private $table_name = "contact";

    public function __construct($db){
        $this -> conn = $db;
    }

    public function new_message($name, $email, $number, $role, $msg){
        $query = "INSERT INTO [$this->table_name} (Name, Email, Number, Role, Message) values (?,?,?,?,?)";

        $stmt = $this->conn->prepare($query);
        if (!$stmt){
            die ("Prepare failed" . $this -> conn -> error);
        }


        // Bind parameters
        $stmt->bind_param("ssiss", $name, $email, $number, $role, $msg);

        if ($stmt->execute()){
            return true;
        }
        return false;
    }

    public function count_Messages(){
        $sql = "SELECT COUNT(*) AS message_count FROM {$this->table_name}";
        $result = $this->conn->query($sql);

        if ($result){
            $row = $result->fetch_assoc();
            return $row['message_count'];
        } else {
            die ("Query failed" . $this->conn->error);
        }
    }

    public function showMessageCount (){
        $count = $this->count_Messages();

        if ($count > 0){
            echo "<div class = 'box'>
            <i class = 'fas-fa-message'></i>
            <h2>$count Messages</h2><br>
            <a href = '#' class = 'btn' style = 'color:white;'>View all Messages</a>

            </div>";
        } else {
         echo "<div class = 'box'><h2>No messages</h2></div>";
        }
    }
    public function getMessages() {
        $sql = "SELECT * FROM contact";
        $result = $this->conn->query($sql);

        $msgs = [];
        while ($row = $result->fetch_assoc()) {
            $msgs[] = $row;
        }

        return $msgs;
    }

    public function deleteMessages($id){
        $sql = "DELETE FROM contact WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
