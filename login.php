<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel = "stylesheet" href="style.css">
    <script>
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
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
    <div class = "account-form-container">
        <section class = "account-form">
            <form action="" method="post">
                <h3>Login Form</h3><br>
                <a href="adminlogin.php" class="btn" style="width:61%;"><i class="fas fa-lock" style="margin-right: 8px;"></i>Login as Admin</a>
                <a href="account.php" class="btn" style="width:61%;"><i class="fas fa-user" style="margin-right: 8px;"></i>Login as User</a><br>
                <p>Don't have an account?   <a href = "register.php">Register now!</a></p>
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