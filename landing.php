<?php
session_start();

include("connection/db.php");
include("func/func.php");

if(isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="landingstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <div class ="fbody" id="fbody">
      <div class="forgot-pass" id="forgot-pass">
        <form action="#">
          <a href="#" class="close3"><i class="lni lni-close"></i></a>
          <h1>Reset your password</h1>
          <input type="email" placeholder="Email">
          <button>Reset</button>
        </form>
      </div>
    </div>
    <div class="popup_body" id="popup_body">
        <div class="container" id="container">
          <div class="form-container register-container">
            <a href="#" class="close1" id="close1"><i class="lni lni-close"></i></a>
            <form method="post" action="signup.php" id="registrationForm">
              <h1>Register Here.</h1>
              <select name="course" id="course" class="course">
                <option>Course</option>
                <option value="BS Computer Science">BS Computer Science</option>
                <option value="BS Information Technology">BS Information Technology</option>
                <option value="BS Information Systems">BS Information Systems</option>
                <option value="Associate in Computer Technology">Associate in Computer Technology</option>
              </select>
              <input type="text" placeholder="First Name" name="firstname" id="firstname" required>
              <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>
              <input type="text" placeholder="Middle Name(Optional)" name="middlename" id="middlename">
              <input type="email" placeholder="DHVSU Email" name="email" id="email" required>
              <input type="password" placeholder="Password" id="npassword" name="password" required>
              <input type="password" placeholder="Re-type Password" id="conpassword" name="repassword" required>
              <label class="checkbox1">
                <p>I agree to the <a href="#" class="tooltip" data-tooltip="View the terms and conditions">terms and conditions</a> and <a href="#" class="tooltip" data-tooltip="Read our data privacy policy">data privacy policy</a></p>
                <input type="checkbox" id="checkmark12">
                <span class="checkmark"></span>
            </label>
              <button type="submit" id="reg">Register</button>
            </form>
          </div>
      
          <div class="form-container login-container">
              <a href="#" class="close" id="close"><i class="lni lni-close"></i></a>
              <form action="login.php" method="post" onsubmit="return loginUser(this);">
                  <h1>Login Here.</h1>
                  <div id="error-messages" style="display: none;" class="error-messages"></div>
                  <input type="email" placeholder="Email" name="email" id="email" required>
                  <input type="password" placeholder="Password" name="password" id="password" required>
                  <div class="content">
                      <div class="checkbox">
                          <input type="checkbox" name="checkbox" id="rememberMeCheckbox">
                          <label for="rememberMeCheckbox">Remember me</label>
                      </div>
                      <div class="pass-link">
                          <a href="#" id="forgot-pass1">Forgot password?</a>
                      </div>
                  </div>
                  <button name="login" type="submit" id="loginForm">Login</button>
              </form>
          </div>



          <div class="overlay-container">
            <div class="overlay">
              <div class="overlay-panel overlay-left">
                <h1 class="title">Hello</h1>
                <h2 class="title">Code-Hearted Foxes! </h2>
                <p>if you have an account, log in here. </p>
                <button class="ghost" id="login">Login
                  <i class="lni lni-arrow-left login"></i>
                </button>
              </div>
              <div class="overlay-panel overlay-right">
                <h1 class="title">Hello</h1>
                <h2 class="title">Code-Hearted Foxes! </h2>
                <p>if you don't have an account yet, register here.</p>
                <button class="ghost" id="register">Register
                  <i class="lni lni-arrow-right register"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="inv_container">
        <div class="head_container" id="head_container">
            <div class ="c_pic">
                <img src="imgs/dv.png" alt="dabsu-logo">
            </div>
            <header>
                <h1>DHVSU CCS HELP DESK</h1>
            </header>
            <h2>College of Computing Studies</h2>
        </div>
    </div>
    <div class="page-container">
    <div class="right_container">
        <div class="ccs_pic">
            <img id="ccs_pic1" src="imgs/ccs.png" alt="CCS-logo">
        </div>
    </div>
    <div class="left_container">
        <div class="welcome">
            <h1 id="welText">Welcome to the CCS HELP DESK,<br> CODE-HEARTED FOXES!</h1>
        </div>
        <a href="#" class ="get-started" id="get-started">
            <h2 id="h2get">Get Started</h2>
        </a>
      </div>
    </div>
    <div id="popup12" class="popup12">
        <div class="popup12-content">
        <a href="#" class="popupclose"><i class="lni lni-close"></i></a>
        <p id="popup-message"></p>
    </div>
</div>
</div>
</body>
<footer>
    <div class="footer">
        <p>www.ccshelpdesk.com | ©2023 DHVSU CCS HELP DESK | @ccshelpdesksite</p>
        <a href="#" class ="footer2"> About Us</a>
        <i class="bi bi-moon-fill" class="dl_mode" id="toggleDark" placeholder="Toggle Dark"></i>
    </div>
</footer>
<script src="jscript.js"></script>
</html>