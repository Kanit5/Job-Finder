<?php
    class Database{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "jobfinder";
        private $conn;

        public function __construct(){
            try{
                $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            }catch(Exception $e){
                die("Connection failed: " . $e->getMessage());
            }
        }

        public function getConnection(){
            return $this->conn;
        }

    }