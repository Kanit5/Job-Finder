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

    <section class = "job-filter">
        <h1 class = "heading">filter jobs</h1>

        <form action = "" method = "post">
            <div class = "flex">
                <div class = "box">
                    <p>job title<span>*</span></p>
                    <input type = "text" name = "title" placeholder="Keyword , Category or Company" required maxlength="20" class = "input">
                </div>
                <div class = "box">
                    <p>Job location</p>
                    <input type = "text" name = "location" placeholder="City , State or Country" required maxlength="50" class = "input">
                </div>
            </div>
            <div class="dropdown-container">
                <div class="dropdown">
                    <input type="text" readonly placeholder="date posted" name="date" maxlength="20" class="output">
                    <div class="lists">
                        <p class="items">today</p>
                        <p class="items">3 days ago</p>
                        <p class="items">7 days ago</p>
                        <p class="items">10 days ago</p>
                        <p class="items">15 days ago</p>
                        <p class="items">30 days ago</p>
                    </div>
                </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="estimated salary" maxlength="20" class="output">
                <div class="lists">
                    <p class="items">1k or less</p>
                    <p class="items">1k - 5k</p>
                    <p class="items">5k - 10k</p>
                    <p class="items">10k - 15k</p>
                    <p class="items">15k - 20k</p>
                    <p class="items">20k - 25k</p>
                    <p class="items">25k - 30k</p>
                    <p class="items">30k - 35k</p>
                </div>
            </div>   
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="job type" maxlength="20" class="output">
                <div class="lists">
                    <p class="items">full-time</p>
                    <p class="items">part-time</p>
                    <p class="items">intership</p>
                    <p class="items">contract</p>
                    <p class="items">temperary</p>
                    <p class="items">fresher</p>
                </div>
            </div> 
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="education level" maxlength="20" class="output">
                <div class="lists">
                    <p class="items">10th pass</p>
                    <p class="items">12th pass</p>
                    <p class="items">bachelor degree</p>
                    <p class="items">master degree</p>
                    <p class="items">diploma</p>
                </div>
            </div>
            <div class="dropdown">
                <input type="text" readonly name="date" placeholder="work shifts" maxlength="20" class="output">
                <div class="lists">
                    <p class="items">day shift</p>
                    <p class="items">night shift</p>
                    <p class="items">flexible shift</p>
                    <p class="items">fixed shift</p>
                </div>
            </div>
            </div>
            <div class = "flex">
                <div class = "box" >
                    <a href = "#" class = "btn" style = "background-color: var(--main-color);color:var(--white);">Filter Search</a>
                    
                </div>
            </div>
        </form>
    </section>

<section class="jobs-container">

    <h1 class="heading">All Jobs</h1>

    <div class="box-container">
        <div class="box">
            <div class="company">
                <img src="photo.1.png" alt="Company Logo">
            </div>
            <h3>IT Infosys Co.</h3>
            <p>2 days ago</p>
            <h3 class="job-title">Senior Web Developer</h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span>Pristina,Pristina</span></p>
           <div class="tags">
            <p><i class="fas fa-dollar-sign"></i> <span>10k - 20k</span></p>
            <p><i class="fas fa-briefcase"></i> <span>Part-time</span></p>
            <p><i class="fas fa-clock"></i> <span>Day shift</span></p>
           </div> 
           <div class="flex-btn">
            <a href="view_job.html" class="btn">View Details</a>
            <button type="submit" class="far fa-heart" name="save"></button>            
        </div>
    </div>
    <div class="box">
        <div class="company">
            <img src="photo.2.png" alt="Company Logo">
        </div>
        <h3>All Media ITD</h3>
        <p>2 days ago</p>
        <h3 class="job-title">Qualified Developer</h3>
        <p class="location"><i class="fas fa-map-marker-alt"></i> <span>Pristina, Pristina</span></p>
        <div class="tags">
        <p><i class="fas fa-dollar-sign"></i> <span>9000</span></p>
        <p><i class="fas fa-briefcase"></i> <span>Full-time</span></p>
        <p><i class="fas fa-clock"></i> <span>Flexible shift</span></p>
        </div>
        <div class="flex-btn">
        <a href="view_job.html" class="btn">View Details</a>
        <button type="submit" class="far fa-heart" name="save"></button>
    </div>
    </div>

     <div class="box">
        <div class="company">
        <img src="photo.3.png" alt="Company Logo">
        </div>
        <h3>Software Solutions</h3>
        <p>Posted Today</p>
          <h3 class="job-title">JavaScript Developer</h3>
         <p class="location"><i class="fas fa-map-marker-alt"></i> <span>Pristina, Pristina</span></p>
           <div class="tags">
          <p><i class="fas fa-dollar-sign"></i> <span>10k-30k</span></p>
         <p><i class="fas fa-briefcase"></i> <span>Internship</span></p>
          <p><i class="fas fa-clock"></i> <span>Night shift</span></p>
           </div>
        <div class="flex-btn">
         <a href="view_job.html" class="btn">View Details</a>
        <button type="submit" class="far fa-heart" name="save"></button>
    </div>
    </div>
    <div class="box">
        <div class="company">
        <img src="photo.4.png" alt="Company Logo">
           </div>
         <h3>IT World</h3>
           <p>19 days ago</p>
         <h3 class="job-title">Bootstrap Developer</h3>
          <p class="location"><i class="fas fa-map-marker-alt"></i> <span>Pristina, Pristina</span></p>
         <div class="tags">
        <p><i class="fas fa-dollar-sign"></i> <span>20k - 50k</span></p>
         <p><i class="fas fa-briefcase"></i> <span>Contract</span></p>
          <p><i class="fas fa-clock"></i> <span>Fixed shift</span></p>
          </div>
           <div class="flex-btn">
         <a href="view_job.html" class="btn">View Details</a>
        <button type="submit" class="far fa-heart" name="save"></button>
    </div>
    </div>
    <div class="box">
        <div class="company">
        <img src="photo.6.png" alt="Company Logo">
         </div>
         <h3>IT World</h3>
          <p>2 days ago</p>
          <h3 class="job-title">MySQL Database</h3>
          <p class="location"><i class="fas fa-map-marker-alt"></i> <span>Pristina, Pristina</span></p>
          <div class="tags">
             <p><i class="fas fa-dollar-sign"></i> <span>8k - 15k</span></p>
            <p><i class="fas fa-briefcase"></i> <span>Temporary</span></p>
           <p><i class="fas fa-clock"></i> <span>Flexible shift</span></p>
         </div>
          <div class="flex-btn">
            <a href="view_job.html" class="btn">View Details</a>
           <button type="submit" class="far fa-heart" name="save"></button>
          </div>
         </div>
         <div class="box">
            <div class="company">
             <img src="photo.5.png" alt="Company Logo" >
              </div>
             <h3>Mass Idea</h3>
            <p>2 days ago</p>
            <h3 class="job-title">PHP Developer</h3>
             <p class="location"><i class="fas fa-map-marker-alt"></i> <span>Pristina, Pristina</span></p>
             <div class="tags">
              <p><i class="fas fa-dollar-sign"></i> <span>15k - 25k</span></p>
                <p><i class="fas fa-briefcase"></i> <span>Fresher</span></p>
              <p><i class="fas fa-clock"></i> <span>Full shift</span></p>
            </div>
              <div class="flex-btn">
                <a href="view_job.html" class="btn">View Details</a>
            <button type="submit" class="far fa-heart" name="save"></button>    
            </div>
         </div>
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
    
    <script>
    
    let dropdown_items = document.querySelectorAll('.job-filter form .dropdown-container .dropdown .lists .items');
    
    dropdown_items.forEach(items => {
        items.onclick = () =>{
            items_parent = items.parentElement.parentElement;
            let output = items_parent.querySelector('.output');
            output.value = items.innerText;
        }
    });
    
    
    
    </script>




   
</body>
</html>