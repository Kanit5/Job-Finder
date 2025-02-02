<?php

include_once 'connection.php';
include_once 'Job.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['session_expire'])) {
    session_unset();     
    session_destroy();   
    header("Location: login.php"); 
    exit();
}
$_SESSION['last_activity'] = time();

if ($_SERVER["REQUEST_METHOD"]=='POST'){
    $db = new Database();
    $connection = $db->getConnection();
    $job = new Job($connection);

    $company = $_POST['company'];
    $title = $_POST['jobttl'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $jtype = $_POST['type'];

   
    if ($job->new_job($company,$title,$city,$email,$salary,$jtype)) {
        echo "<script>alert('Job added succesfully');</script>"; 
    }else{
        echo"<script>alert('Something went wrong');</script>";
    } 
   
}  

?>


<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>
<body>
 
    <header class="header">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars-staggered"></div>

            <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobFinder</a>

            <nav class="navbar">
                <a href="home.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="jobs.php">All Jobs</a>
                <a href="contact.php">Contact Us</a>
                <a href="login.php">Account</a>
            </nav>
            <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<a href = 'logout.php' class = 'btn' style = 'margin-top:0;'>Log Out</a>";
                }
            ?>   
            <a href="post.php" class="btn" style="margin-top: 0;">Post Job</a>

        </section>
    </header>

    <div class="account-form-container">
        <section class="account-form">

            <form action="" method="post" onsubmit="return validatePostJob()">
                <h3>Post a job</h3>
                <input type="text" required id = "name2" name="company" maxlength="20" placeholder="Name of the Company" class="input">
                <input type="text" required id = "jobttl" name="jobttl" maxlength="50" placeholder="Job Title" class="input">
                <select name="city" required class="input">
                        <option value="Prishtina">Prishtina</option>
                        <option value="Mitrovica">Mitrovica</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Peje">Peje</option>
                        <option value="Gjakove">Gjakove</option>
                    </select>
                <input type="email" required id = "email3" name="email" maxlength="50" placeholder="Enter your email" class="input">
                <input type = "number" required id = "salary" name = "salary" placeholder = "Monthly salary" class = "input">
                <select name="type" required class="input">
                    <option value="Internship">Internship</option>
                    <option value="Full-time">Full-Time</option>
                    <option value="Part-time">Part-time</option>
                </select>
                <input type="submit" value="Post Job" name="submit" class="btn">
            </form>
        </section>
    </div>




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
