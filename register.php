<?php
include_once 'connection.php';
include_once 'User.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //Register the user
    if ($user->register($name,$email,$password)) {
        header("Location: home.php");
        session_start();
        exit;
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

            <form action="" method="post" onsubmit="return validateRegister()">
                <h3>create new account</h3>
                <input type="text" required id = "name" name="name" maxlength="20" placeholder="enter your name" class="input">
            <input type="email" required id = "email2" name="email" maxlength="50" placeholder="enter your email" class="input">
            <input type="password" required id = "pass2" name="pass" maxlength="20" placeholder="enter your password" class="input">
            <input type="password" required id = "passconfirm" name="c_pass" maxlength="20" placeholder="confirm your password" class="input">
            <p>already have an account?  <a href="account.html">login now</a></p> 
            <input type="submit" value="register now" name="submit" class="btn">
    
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
    </html>