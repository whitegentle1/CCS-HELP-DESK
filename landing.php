<?php
session_start();

include("connection/db.php");
include("func/func.php");

//required etong php na 'to sa lahat ng mga pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="landingstyles.css">
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
            <a href="#" class="close1"><i class="lni lni-close"></i></a>
            <!-- for signup -->
            <form method="post" action="signup.php" id="signIn">
              <h1>Register Here.</h1>
              <select name="course" id="course" class="course">
                <option>Course</option>
                <option value="BS Computer Science">BS Computer Science</option>
                <option value="BS Information Technology">BS Information Technology</option>
                <option value="BS Information Systems">BS Information Systems</option>
                <option value="Associate in Computer Technology">Associate in Computer Technology</option>
              </select>
              <input type="text" placeholder="First Name" id="fname" name="firstname">
              <input type="text" placeholder="Last Name" id="lname" name="lastname">
              <input type="text" placeholder="Middle Name" id="mname" name="middlename">
              <input type="email" placeholder="DHVSU Email" id="email" name="email">
              <input type="password" placeholder="Password" id="npassword" name="password">
              <input type="password" placeholder="Re-type Password" id="conpassword" name="repassword">
              <label class="checkbox1">I agree to the <a href="#">terms and conditions</a> and <a href=""> data privacy policy</a>
                  <input type="checkbox" id="checkBox">
                  <span class="checkmark"></span>
              </label>
              <button>Register</button>
            </form>

            <script>
              document.querySelector(".close1").addEventListener("click", function () {
                if (confirm("Are you sure you want to exit?")) {
                  document.getElementById("popup_body").style.display = "none";
                }
              });
            </script>

            <script>
              document.getElementById("signIn").addEventListener("submit", function(event) {
                  event.preventDefault();
                  
                  var fname = document.getElementById("fname").value;
                  var lname = document.getElementById("lname").value;
                  var mname = document.getElementById("mname").value;
                  var email = document.getElementById("email").value;
                  var password = document.getElementById("npassword").value;
                  var confirmPassword = document.getElementById("conpassword").value;
                  var agreeCheckbox = document.getElementById("checkBox");

                  if (
                  fname == "" ||
                  lname == "" ||
                  mname == "" ||
                  email == "" ||
                  password == "" ||
                  confirmPassword == ""
                  ){
                    alert("Please fill the empty form/s.");
                  } else if (!email.endsWith("@dhvsu.edu.ph")) {
                    alert("Please use your DHVSU account (example@dhvsu.edu.ph)."); 
                  } else if (!agreeCheckbox.checked) {
                    alert("Please agree to the terms and conditions.");
                  } else if (password != confirmPassword){
                    alert("The Password and Re-type Password does not match up.");
                  } else {
                    alert("Registration successful!");
                    this.submit();
                  }
              });
            </script>
          </div>
      
          <div class="form-container login-container">
            <a href="#" class="close"><i class="lni lni-close"></i></a>
            <!-- for login -->
            <form action="login.php" id="logIns">
              <h1>Login Here.</h1>
              <input type="email" placeholder="Email" id="Email">
              <input type="password" placeholder="Password" id="Pass">
              <div class="content">
                  <div class="checkbox">
                  <input type="checkbox" name="checkbox" id="checkbox">
                  <label>Remember me</label>
                  </div>
                  <div class="pass-link">
                  <a href="#">Forgot password?</a>
                  </div>
              </div>
              <button>Login</button>
            </form>

            <script>
              document.querySelector(".close").addEventListener("click", function () {
                if (confirm("Are you sure you want to exit?")) {
                  document.getElementById("popup_body").style.display = "none";
                }
              });
            </script>

            <script>
              document.getElementById("logIns").addEventListener("submit", function(event) {
                  event.preventDefault();

                  var Email = document.getElementById("Email").value;
                  var Pass = document.getElementById("Pass").value;

                  if (
                  Email == "" ||
                  Pass == ""
                  ){
                    alert("Please fill the empty form/s.");
                  } else if (!Email.endsWith("@dhvsu.edu.ph")) {
                    alert("Please use your DHVSU account (example@dhvsu.edu.ph)."); 
                  } else {
                    document.getElementById("signIn").submit();
                  }
              });
            </script>
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
        <div class="head_container">
            <div class ="c_pic">
                <img src="imgs/dv.png" alt="dabsu-logo">
            </div>
            <header>
                <h1>DHVSU CCS HELP DESK</h1>
            </header>
            <h2>College of Computing Studies</h2>
        </div>
    </div>
    
    <div class="right_container">
        <div class="ccs_pic">
            <img src="imgs/ccs.png" alt="CCS-logo">
        </div>
    </div>
    <div class="left_container">
        <div class="welcome">
            <h1>Welcome to the CCS HELP DESK, CODE-HEARTED FOXES!</h1>
        </div>
        <a href="#" class ="get-started" id="get-started">
            <h2>Get Started</h2>
        </a>
    </div>

</body>
<footer>
    <div class="footer">
        <p>www.ccshelpdesk.com | ©2023 DHVSU CCS HELP DESK | @ccshelpdesksite</p>
        <a href="#" class ="footer2"> About Us</a>
    </div>
</footer>
<script src="jscript.js"></script>
</html>