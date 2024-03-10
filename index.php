<?php
    session_start();
    if(!isset($_SESSION["user"])){
    }
    $username = $_SESSION["user_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<p class="username"><strong>Welcome, <?php echo $username; ?></strong></p>
    <p><a href="logout.php"><strong>Logout</strong></a></p>
    <div class="container">
        <nav>
            <img src="niki.png" class="niki">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="header-text">
            <h1>Hi, I'm <span>Curt</span><br> Castillo From IT-221</h1>
        </div>
    </div>
</div>
<!-- -----------about---------- -->
<div id="about">    
    <div class="container">
        <div class="row">
            <div class="about-col-1">
                <img src="gegege.png">
            </div>
            <div class="about-col-2"></div>
                <h1 class="sub-title">About Me</h1>
                <p>Hello! My name is Curt Castillo, and I am currently a 2nd year student pursuing BSIT at National University. I am passionate about Dancing, and I thrive on challenges that push me to think creatively and critically.</p>
                <p>In addition to my academic pursuits, I am actively involved in Basketball Intrams, where I have had the opportunity to Win in this game. These experiences have not only enhanced my leadership and teamwork skills but also allowed me to make meaningful connections with peers who share similar interests.</p>
            </div>
        </div>
    </div>
</div>
<!-- ---------services------------------>
<div id="services">
    <div class="container">
        <h1 class="sub-title">My Hobbies</h1>
        <div class="services-list">
            <div>
                <h2>Basketball</h2>
                <p>My hobby is basketball, and I enjoy shooting hoops and engaging in friendly games to stay active and connected with the sport.</p>
                <a href="#">Learn more</a>
            </div>
            <div>
                <h2>Watching Movie</h2>
                <p>Watching movies is my favorite hobby, providing me with a captivating escape into diverse worlds, compelling stories, and the magic of cinema.</p>
                <a href="#">Learn more</a>
            </div>
            <div>
                <h2>Exercising</h2>
                <p>Exercising is my cherished hobby, not only promoting physical well-being but also serving as a daily ritual that energizes my body and refreshes my mind.</p>
                <a href="#">Learn more</a>
            </div>
        </div>
    </div>
</div>
    

<div class="container_comment">
        <div class="col-md-8">
            <h1 id="comments" class="text-center">Leave a Comment</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="comment" id="ycomment" class="form-label">Your Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn_submit">Submit</button>
            </form>
        </div>
    </div>

    <?php

        if(isset($_POST["comment"])){
            $message = $_POST["comment"];
            $date = date("Y-m-d");

            // Get the user's ID from the session
            if(isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];
            } else {
                // Handle the case where user ID is not set in session
                die("User ID not found in session");
            }

            require_once("database.php");

            $sql = "INSERT INTO comment (ID, date, message) VALUES (?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            $preparestmt = mysqli_stmt_prepare($stmt, $sql);

            if ($preparestmt) {
                mysqli_stmt_bind_param($stmt, "sss", $user_id, $date, $message);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success center'>Comment posted successfully!</div>";
            } else {
                die("Something went wrong");
            }
        }
        ?>
</body>
</html>