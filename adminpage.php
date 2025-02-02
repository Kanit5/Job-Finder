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
<a href = "post.php" class = "btn" style = "margin-top: 0;">Post Jobs</a>
</section>
</header>

<div class = "adminpg">
    <h1 style = "margin-left: 10%">Dashboard</h1>

</div>
<section class = "contact">
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



