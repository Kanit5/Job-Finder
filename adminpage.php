<?php

           include_once 'connection.php';
           include_once 'User.php';
           include_once 'Message.php';
           include_once 'Job.php';
            
           $db = new Database();
           $connection = $db->getConnection();
           $user = new User($connection);
           $message = new Message($connection);
           $job = new Job($connection);


           if (isset($_GET['delete_id'])) {
            $delete_id = intval($_GET['delete_id']);
                if ($user->deleteUsers($delete_id)) {
                    echo "<script>alert('User deleted successfully');</script>";
                } else {
                    echo "<script>alert('Failed to delete user');</script>";
                }
           } 
           $users = $user->getUsers();

           if (isset($_GET['delete_msg_id'])) {
            $delete_id = intval($_GET['delete_msg_id']);
                if ($message->deleteMessages($delete_id)) {
                    echo "<script>alert('Message deleted successfully');</script>";
                } else {
                    echo "<script>alert('Failed to delete message');</script>";
                }
           } 
           $msgs = $message->getMessages();


           if (isset($_GET['delete_job_id'])) {
            $delete_id = intval($_GET['delete_job_id']);
                if ($job->deleteJobs($delete_id)) {
                    echo "<script>alert('Job deleted successfully');</script>";
                } else {
                    echo "<script>alert('Failed to delete job');</script>";
                }
           } 
           $jobs = $job->getJobs();


?>

<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = "X-UA-Compatible" content = "IE-edge">
        <meta name = "viewport" content = "width = device-width, initial scale = 1.0">
        <title>Account</title>
        <link rel = "stylesheet" href = "style.css">
        <style>
            h1{
       text-align:center;
        margin-bottom:15px;
    }
    table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color:var(--main-color);
            color: white;
        }

        .delete-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background: darkred;
        }

   </style>
</head>
<body>
    <header class = "header">
        <section class = "flex">
            <div id = "menu-btn" class = "fas fa-bars-staggered"></div>
            <a href = "home.php" class = "logo"><i class = "fas fa-briefcase"></i>JobFinder</a>
            <nav class = "navbar">
                <a href = "home.php">Home</a>
                <a href = "about.php">About Us</a>
                <a href = "jobs.php">All Jobs</a>
                <a href = "contact.php">Contact Us</a>
                <a href = "login.php">Account</a>
</nav>
<a href = 'logout.php' class = 'btn' style = 'margin-top:0;'>Log Out</a>
<a href = "post.php" class = "btn" style = "margin-top: 0;">Post Jobs</a>
</section>
</header>


<section class = "contact">
    <h1 class = "heading" >Admin Dashboard</h1>
    <div class = "box-container">
        <?php
         if($user->count_Users()){
              $user->showUserCount(); 
         }
          
         if($message->count_messages()){
              $message->showMessageCount();
         }

         if($job->count_jobs()){
              $job->showJobsCount();
         }
          
          
      ?>   
        </div>
    </section>

    <h1>Users table</h1>
    <table class = "userTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Register Date</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['Id']) ?></td>
            <td><?= htmlspecialchars($user['Emri']) ?></td>
            <td><?= htmlspecialchars($user['Email']) ?></td>
            <td><?= htmlspecialchars($user['Pass']) ?></td>
            <td><?= htmlspecialchars($user['RegDate']) ?></td>
            <td><a href="?delete_id=<?= $user['Id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a></td>
        </tr>
        <?php endforeach; ?>   
        </tbody>

    </table>
<br>
    <h1>Messages table</h1>
    <table class = "messageTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Role</th>
                <th>Message</th>
                <th>Date Received</th>
                <th>Delete Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($msgs as $message): ?>
        <tr>
            <td><?= htmlspecialchars($message['Id']) ?></td>
            <td><?= htmlspecialchars($message['Name']) ?></td>
            <td><?= htmlspecialchars($message['Email']) ?></td>
            <td><?= htmlspecialchars($message['Number']) ?></td>
            <td><?= htmlspecialchars($message['Role']) ?></td>
            <td><?= htmlspecialchars($message['Message']) ?></td>
            <td><?= htmlspecialchars($message['DateSent']) ?></td>
            <td><a href="?delete_msg_id=<?= $message['Id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a></td>
        </tr>
        <?php endforeach; ?>
            
        </tbody>

    </table>
<br>
    <h1>Jobs table</h1>
    <table class = "jobtable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Company</th>
                <th>Job Title</th>
                <th>City</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Job Type</th>
                <th>Date Posted</th>
                <th>Delete Job</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
        <tr>
            <td><?= htmlspecialchars($job['Id']) ?></td>
            <td><?= htmlspecialchars($job['Company']) ?></td>
            <td><?= htmlspecialchars($job['Title']) ?></td>
            <td><?= htmlspecialchars($job['City']) ?></td>
            <td><?= htmlspecialchars($job['Email']) ?></td>
            <td><?= htmlspecialchars($job['Salary']) ?></td>
            <td><?= htmlspecialchars($job['JobType']) ?></td>
            <td><?= htmlspecialchars($job['DatePosted']) ?></td>
            <td><a href="?delete_job_id=<?= $job['Id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this job?');">Delete</a></td>
        </tr>
        <?php endforeach; ?>
            
        </tbody>

    </table>
<br>

    <footer class="footer">

        <section class="grid">
        
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
            <a href="jobs.php"><i class="fas fa-angle-right"></i>All Jobs</a>
            <a href="contact.php"><i class="fas fa-angle-right"></i>Contact Us</a>      
        </div>
        
        <div class="box">
            <h3>Extra Links</h3>
            <a href="account.php"><i class="fas fa-angle-right"></i>Account</a>
            <a href="register.php"><i class="fas fa-angle-right"></i>Register</a>
            <a href="post.php"><i class="fas fa-angle-right"></i>Post Job</a>
        
        </div>
        
        
        <div class="box">
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i>Facebook</a>
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i>Instagram</a>
            <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i>Linkedin</a>
        </div>
        
        </section>
        
    </footer>
        


    <script src="script.js"></script>
</body>
</html>



