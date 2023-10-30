<?php
session_start();
include("connection/db.php");
include("func/func.php");

$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homestyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <title>HOME:CCS - DHVSU HELP DESK</title>
	<link href="imgs/ccslogo.png" type="image/png" rel="icon">
</head>
<body>

    <!-- Create your own design here, tignan niyo nalang yung class name sa css or create your own css file dedicated para sa home.php na 'to -->
    <div class="inv_container">
        <div class="head_container" id="head_container">
            <div class="c_pic">
                <a href="#" id="imageLink">
                    <img src="imgs/dv.png" alt="dabsu-logo">
                </a>
            </div>
            <header>
                <h1>DHVSU CCS HELP DESK</h1>
            </header>
            <h2>College of Computing Studies</h2>
        </div>
    </div>
    <!-- page container para lang mahati sa dalawa ang container -->
    <div class="page-container">
        <div class="home-left-container">

     <!-- <a href="logout.php">LOGOUT</a> -->
            <div class="navbar-container">
                <div class="navbar-contents">
                <div class="navitem"> 
                    <a class="usersubmenu">User's Name<i class="bi bi-caret-down-fill dropdown"></i></a>
                    <div class="submenu">
                        <a href="#" class="subitem"><i class="bi bi-person-circle"></i> My Profile </a>
                        <a href="#" class="subitem"><i class="bi bi-power"></i> Log out </a>
                </div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-house-fill"></i>Home</a></div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-envelope-fill"></i>Desk Chatbot</a></div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-person-fill-add"></i>Request</a></div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-cash-coin"></i>Payments and Transactions</a></div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-gear-fill"></i>Settings</a></div>
                    <div class="navitem"> <a href="#"> <i class="bi bi-question-circle-fill"></i>Help</a></div>
                </div>
            </div>
        <div class="home-right-container">
        <!-- Button Containers -->
        </div>
        </div>
    </div>
</body>
<!-- Pwede niyong palitan yung footer contents it's up to you -->
<footer>
    <div class="footer">
        <p>www.ccshelpdesk.com | ©2023 DHVSU CCS HELP DESK | @ccshelpdesksite</p>
        <a href="#" class ="footer2"> About Us</a>
        <i class="bi bi-moon-fill" class="dl_mode" id="toggleDark" placeholder="Toggle Dark"></i>
    </div>
</footer> 
<script defer src="jscript.js"></script>
</html>