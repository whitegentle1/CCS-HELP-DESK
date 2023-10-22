const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

document.getElementById("get-started").addEventListener("click", function(){
  document.getElementById("popup_body").style.display = "flex";
});

document.getElementById("forgot-pass1").addEventListener("click", function(){
  document.getElementById("fbody").style.display = "flex";
  document.getElementById("forgot-pass").style.display = "flex";
});

document.querySelector(".close3").addEventListener("click", function () {
    document.getElementById("forgot-pass").style.display = "none";
    document.getElementById("fbody").style.display = "none";
});
document.querySelector(".close1").addEventListener("click", function () {
  document.getElementById("popup_body").style.display = "none";
});
document.querySelector(".close").addEventListener("click", function () {
  document.getElementById("popup_body").style.display = "none";
});
//Remember me funtion------------------------------------------------------
/*const rememberMeCheckbox = document.getElementById("rememberMeCheckbox");
const loginForm = document.querySelector(".login-container form");
window.addEventListener("load", function () {
  const rememberMeToken = getRememberMeToken();
  if (rememberMeToken) {
    const emailInput = loginForm.querySelector('input[name="email"]');
    const passwordInput = loginForm.querySelector('input[name="password"]');
    emailInput.value = rememberMeToken;
    passwordInput.value = "********";
    rememberMeCheckbox.checked = true;
  }
});

loginForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const email = loginForm.querySelector('input[name="email"]').value;
  const password = loginForm.querySelector('input[name="password"]').value;
  if (rememberMeCheckbox.checked) {
    setRememberMeToken(email);
  }
});
function getRememberMeToken() {
  return Cookies.get("rememberMeToken");
}
function setRememberMeToken(token) {
  Cookies.set("rememberMeToken", token, { expires: 30 });
}*/
//dark mode function-------------------------------------------------------------------
//INITIAL SETUP -- HINDI PA KUMPLETO
let canToggle = true;
const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');
const getStarted = document.getElementById('get-started');
const h2get = document.getElementById('h2get');
const welText = document.getElementById('welText');
const imgElement = document.getElementById('ccs_pic1');
const head = document.getElementById('head_container');

toggle.addEventListener('click', function(){
  if (!canToggle) {
    return;
}
    this.classList.toggle('bi-moon-fill');
    if(this.classList.toggle('bi-brightness-high-fill')){
        body.style.backgroundImage = 'url("imgs/BG_DHVSU_DARKMODE.jpg")';
        body.style.transition = '1s';
        getStarted.classList.add('dark-mode');
        getStarted.style.transition = '1s';
        h2get.style.color = '#6E6E6E';
        h2get.style.transition = '1s';
        welText.style.color = '#6E6E6E';
        welText.style.transition = '1s';
        imgElement.src = 'imgs/ccs-dm.png';
        head.style.background = 'linear-gradient(90deg, rgba(11,11,28,0.5) 0%, rgba(30,30,81,1) 100%);'
        head.style.border = '3px solid #160c38'
        head.style.transition = '1s';

        canToggle = false;
        setTimeout(() => {
            canToggle = true;
        }, 1000);
    }else{
        body.style.backgroundImage = 'url("imgs/RegisterBG.jpg")';
        body.style.transition = '1s';
        getStarted.classList.remove('dark-mode');
        getStarted.style.transition = '1s';
        h2get.style.color = 'white';
        h2get.style.transition = '1s';
        welText.style.color = 'white';
        welText.style.transition = '1s';
        imgElement.src = 'imgs/ccs.png';
        head.style.background = 'linear-gradient(90deg, rgba(44,44,118,0.8431232) 0%, rgba(28,28,67,0.3421343413) 100%)'
        head.style.border = '3px solid #3e4a9e'
        head.style.transition = '1s';

        canToggle = false;
        setTimeout(() => {
            canToggle = true;
        }, 1000);
    }
});
//registration error handling function-------------------------------------------------------
document.getElementById("registrationForm").addEventListener("submit", function(event) {
  event.preventDefault();

  var course = document.getElementById("course").value;
  var fname = document.getElementById("firstname").value;
  var lname = document.getElementById("lastname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("npassword").value;
  var confirmPassword = document.getElementById("conpassword").value;
  var agreeCheckbox = document.getElementById("checkmark12");

  var modalMessage = document.getElementById("popup-message");
  var modal = document.getElementById("popup12");

  if (fname == "" || lname == "" || email == "" || password == ""){
    modalMessage.innerText = "Please fill the empty form/s.";
  } 
  else if (!email.endsWith("@dhvsu.edu.ph")) {
    modalMessage.innerText = "Please use your DHVSU account (ex. 2000123456@dhvsu.edu.ph).";
  } 
  else if (!agreeCheckbox.checked) {
    modalMessage.innerText = "You must agree to the terms and conditions, and data privacy policy.";
  } 
  else if (password != confirmPassword) {
    modalMessage.innerText = "Passwords do not match.";
  } 
  else if (password.length < 8) {
    modalMessage.innerText = "Password must be at least 8 characters long.";
  } 
  else if (course === "Course") {
    modalMessage.innerText = "Please select a course.";
  }
  else {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check-email.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;
        if (response === "exists") {
          modalMessage.innerText = "Email already exists";
        } else if (response === "ok") {
          modalMessage.innerText = "Registration successful!";
          document.getElementById("registrationForm").submit();
        }
        modal.style.display = "flex";
      }
    };
    xhr.send("email=" + email);
  }
  
  modal.style.display = "flex";
});


document.querySelector(".popupclose").addEventListener("click", function() {
  document.getElementById("popup12").style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == document.getElementById("popup12")) {
    document.getElementById("popup12").style.display = "none";
  }
});
//login error handling function----------------------------------------------------------------
function loginUser(form) {
    var email = form.email.value;
    var password = form.password.value;
    var errorDiv = document.getElementById("error-messages");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response === "success") {
                errorDiv.style.color = "green";
                errorDiv.innerHTML = "Login successful. Redirecting...";
                errorDiv.style.display = "block";
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 2000);
            } else {
                errorDiv.style.color = "red";
                errorDiv.innerHTML = response;
                errorDiv.style.display = "block";
            }
        }
    };

    xhr.send("email=" + email + "&password=" + password);
    return false;
}
