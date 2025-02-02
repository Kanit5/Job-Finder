<?php
include_once 'connection.php';
include_once 'Message.php';

session_start();

if (!isset($_SESSION['user_id'])){
header("Location: login.php"); // Redirect to log in if not logged in
exit;
}

if(!isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['session_expire'])){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$_SESSION['last_activity'] = time();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $db = new Database();
    $connection = $db -> getConnection();
    $message = new Message($connection);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $role = $_POST['role'];
    $msg = $_POST['message'];

    // Register the user
    if ($message -> new_message($name,$email,$number,$role,$msg)){
        echo "<script>alert('Message sent!');</script>";
        header("Location: contact.php");
        exit;
    } else {
        echo "<script>alert('Error sending the message!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact us</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <header class = "header">
        <section class = "flex">
            <div id = "menu-btn" class = "fas fa-bars-staggered"></div>
                <a href = "home.php" class = "logo"><i class = "fas fa-briefcase"></i>JobFinder</a>
                <nav class = "navbar">
                    <a href = "home.php">Home</a>
                    <a href = "about.php">About us</a>
                    <a href = "jobs.php">All Jobs</a>
                    <a href = "contact.php">Contact Us</a>
                    <a href = "account.php">Account</a>
                </nav>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<a href = 'logout.php' class = 'btn' style = 'margin-top:0;'>Log Out</a>";
                }
            ?>     
                <a href = "post.php" class = "btn" style = "margin-top: 0;">Post Jobs</a>
        </section>
    </header>
    <div class = "section-title">Contact us</div>

    <section class =  "contact">
        <div class = "box-container">
            <div class = "box">
                <i class = "fas fa-phone"></i>
                <a href = "tel:049000000">049-888-999</a>
                <a href = "tel:044000000">044-888-999</a>
            </div>
            <div class = "box">
                <i class = "fas fa-envelope"></i>
                <a href = "mail:jobfinders@gmail.com">jobfinders@gmail.com</a>
                <a href = "mail:jobfinders@outlook.com">jobfinders@outlook.com</a>
            </div>

            <div class = "box">
                <i class = "fas fa-map-marker-alt"></i>
                <a href = "#">Building number 10 in the Mbreteresha Teute,Mitrovica,Kosovo</a>
            </div>
        </div>
        <form action="" method="post">
            <h3>drop your message</h3>
            <div class="flex">
                <div class="box">
                  <p>name <span>*</span></p>
                  <input type="text" id = "contactname" name="name" required maxlength="20" placeholder="enter your name" class="input">  
                </div>
                <div class="box">
                    <p>email <span>*</span></p>
                    <input type="email" id = "contactemail" name="email" required maxlength="50" placeholder="enter your email" class="input">  
                  </div>
                  <div class="box">
                    <p>number <span>*</span></p>
                    <input type="number" id = "contactnumber" name="number" required min="0" max="999999999" maxlength="20" placeholder="enter your number" class="input">  
                  </div>
                  <div class="box">
                    <p>role <span>*</span></p>
                    <select name="role" required class="input">
                        <option value="employe">job seeker (employe)</option>
                        <option value="employer">job provider (employer)</option>
                    </select>
                  </div>
            </div>
            <p>message <span>*</span></p>
            <textarea name="message" id = "contactmessage" class="input" required maxlength="1000" placeholder="enter your message" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn" onclick="return validateContact()">
        </form>
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