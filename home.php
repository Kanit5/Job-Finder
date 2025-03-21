<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
         * {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}

    .mySlides img{
        width: 80%;
        margin-left: 10%;
    }
    img {vertical-align: middle;}
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }
    .home-container .home {
        display: flex;
        flex-direction: column;
    }



    /* Next & previous buttons */
    .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    }
    /* Position the "next button" to the right */
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
    background-color: #717171;
    }

    /* Fading animation */
    .fade {
    animation-name: fade;
    animation-duration: 1.5s;
    }

    @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
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
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<a href = 'logout.php' class = 'btn' style = 'margin-top:0;'>Log Out</a>";
                }
            ?>     
                <a href = "post.php" class = "btn" style = "margin-top: 0;">Post Jobs</a>
        </section>
    </header>
    
    <div class = "home-container">
        <section class = "home">
            <div class="slideshow-container" style = "width: 100%;">
  

                    <div class="mySlides fade">
                      <img src="find-your-dream-job.png">
                    </div>
                    
                    <div class="mySlides fade">
                     <img src = "download.png">
                     
                    </div>
                    
                    <div class="mySlides fade">
                      <img src="download2.png" style = "height:50%;">
                      <a href = "contact.php" class = "btn" style = "display:flex;justify-content:center;">Contact us Now!!</a>
                    </div>
                    
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    
                    </div>
                
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
                
                <script>
                let slideIndex = 1;
                showSlides(slideIndex);
                
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }
                
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }
                
                function showSlides(n) {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("dot");
                  if (n > slides.length) {slideIndex = 1}    
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                  }
                  for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";  
                  dots[slideIndex-1].className += " active";
                }
                </script>
                
        </section>
    </div>

    <section class="category">
        <h1 class="heading">job categories</h1>
        <div class="box-container">
            <a href="#" class="box">
                <i class="fas fa-code"></i>
                <div>
                    <h3>Development</h3>
                    <span>2500 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-pen"></i>
                <div>
                <h3>Designer</h3>
                <span>500 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-chalkboard-user"></i>
                <div>
                    <h3>Teacher</h3>
                    <span>1500 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-bullhorn"></i>
                <div>
                    <h3>Marketing</h3>
                    <span>1200 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-headset"></i>
                <div>
                    <h3>Service</h3>
                    <span>3200 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-wrench"></i>
                <div>
                    <h3>Engineer</h3>
                    <span>400 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
                <i class="fas fa-hand-holding-dollar"></i>
                <div>
                    <h3>Finance</h3>
                    <span>1000 jobs</span>
                </div>
            </a>
            <a href="#" class="box">
            <i class="fas fa-person-digging"></i>
            <div>
                <h3>Labour</h3>
                <span>4000 jobs</span>
            </div>
            </a>

            
        </div>
    </section>
   

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