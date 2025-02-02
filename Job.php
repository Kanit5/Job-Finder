<?php
class Job{
    private $conn;
    private $table_name = "jobs";

    public function __construct($db){
        $this->conn = $db;
    }

    public function new_job($company,$title,$city,$email,$salary,$type){
        $query = "INSERT INTO {$this->table_name} (Company,Title,City,Email,Salary,JobType) values (?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            die("Prepare failed" . $this->conn->error);
        }


        // Bind parameters
        $stmt->bind_param("ssssis", $company,$title,$city,$email,$salary,$type);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function count_Jobs(){
        $sql = "SELECT COUNT(*) AS job_count FROM {$this->table_name}";
        $result = $this->conn->query($sql);

        if($result){
            $row = $result->fetch_assoc();
            return $row['job_count'];
        }else{
            die("Query failed" . $this->conn->error);
        }
    }

    public function showJobsCount(){
        $count = $this->count_Jobs();

        if($count>0){
            echo "<div class='box'>
                    <i class='fas fa-briefcase'></i>  
                    <h2>$count Jobs</h2><br>
                    <a href ='#' class = 'btn' style = 'color:white;'>View all Jobs</a>

                </div>";
        } else {
            echo "<div class='box'>
                    <i class='fas fa-briefcase'></i>  
                    <h2>No Jobs</h2>
                    </div>";
        }
    }
    public function getJobs() {
        $sql = "SELECT * FROM jobs";
        $result = $this->conn->query($sql);

        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }

        return $jobs;
    }

    public function deleteJobs($id){
        $sql = "DELETE FROM jobs WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

