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

<div class = "adminpg">
    <h1 style = "margin-left: 10%">Dashboard</h1>

</div>
<section class = "contact">
    <div class = "box-container">
        <?php
        include("connection.php");
        try{
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_count_rows($result);
            if($count>0){
                echo "<div class = 'box'>
                <i class = 'fas fa-user'></i>
                <h2>$count users</h2>
                </div>";
            }
        }catch(Exception $e){
            echo "<script>window.alert('Couldn't retrieve data');</script>";
            header("Location: login.html");

        }
        
        ?>
        </div>
    </section>




