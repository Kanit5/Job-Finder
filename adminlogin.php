<?php
    require 'connection.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pwd = $_POST['pass'];

            $sql = "SELECT * From admin WHERE Email = '$email' and Pass = '$pwd'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($count==1){
                echo '<script>window.alert("logged in succesfully");</script>';
                header("Location: adminpage.php");
            }else{
                echo '<script>
                    window.alert("Login failed. Invalid username or password");
                </script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
    <header class = "header">
        <section class = "flex">
            <div id = "menu-btn" class = "fas fa-bars-staggered"></div>
                <a href = "home.html" class = "logo"><i class = "fas fa-briefcase"></i>JobFinder</a>
                <nav class = "navbar">
                    <a href = "home.html">Home</a>
                    <a href = "about.html">About Us</a>
                    <a href = "jobs.html">All Jobs</a>
                    <a href = "contact.html">Contact Us</a>
                    <a href = "login.html">Account</a>
                </nav>
                <a href = "post.html" class = "btn" style = "margin-top: 0;">Post Jobs</a>
        </section>
    </header>
    <div class = "account-form-container">
        <section class = "account-form">
            <form action = "" method = "post" onsubmit="return validateLogIn()">
                <h3>Welcome back admin!</h3>
                <input type = "email" required  id = "email" name = "email" maxlength = "50" placeholder="Enter your email" class = "input">
                <input type = "password" required id = "pass" name = "pass" maxlength="20" placeholder="Enter your password" class = "input">
                
                <input type = "submit" value = "Log in" name = "submit" class = "btn">
            </form>
        </section>
    </div>
    
    <footer class="footer">

        <section class="grid">
        
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home.html"><i class="fas fa-angle-right"></i>Home</a>
            <a href="about.html"><i class="fas fa-angle-right"></i>About</a>
            <a href="jobs.html"><i class="fas fa-angle-right"></i>All Jobs</a>
            <a href="contact.html"><i class="fas fa-angle-right"></i>Contact Us</a>      
        </div>
        
        <div class="box">
            <h3>Extra Links</h3>
            <a href="account.html"><i class="fas fa-angle-right"></i>Account</a>
            <a href="register.html"><i class="fas fa-angle-right"></i>Register</a>
            <a href="post.html"><i class="fas fa-angle-right"></i>Post Job</a>
        
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