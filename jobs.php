<?php
include_once 'connection.php';
include_once 'Job.php';

$db = new Database();
$connection = $db->getConnection();
$job = new Job($connection);
$jobs = $job->getJobs();


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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header class = "header">
        <section class = "flex">
            <div id = "menu-btn" class = "fas fa-bars-staggered"></div>
                <a href = "home.php" class = "logo"><i class = "fas fa-briefcase"></i>JobFinder</a>

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
                <a href = "post.php" class = "btn" style = "margin-top: 0;">Post Job</a>
        </section>
    </header>

    

<section class="jobs-container">

    <h1 class="heading">All Jobs</h1>

    <div class="box-container">
    <?php foreach ($jobs as $job): ?>
            <div class="box">
            <div class="company">
                <img src="techcompany.png" alt="Company Logo">
            </div>
            <h2><?= htmlspecialchars($job['Company']) ?></h2>
            <p><?= htmlspecialchars($job['DatePosted']) ?></p>
            <h3 class="job-title"><?= htmlspecialchars($job['Title']) ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= htmlspecialchars($job['City']) ?></span></p>
           <div class="tags">
            <p><i class="fas fa-dollar-sign"></i> <span><?= htmlspecialchars($job['Salary']) ?></span></p>
            <p><i class="fas fa-briefcase"></i> <span><?= htmlspecialchars($job['JobType']) ?></span></p>
            
            </div>
        </div> 
        <?php endforeach; ?>
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