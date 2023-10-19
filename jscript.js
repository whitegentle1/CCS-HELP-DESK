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
});

document.querySelector(".close3").addEventListener("click", function () {
    document.getElementById("popup_body").style.display = "none";
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
//registration function-------------------------------------------------------
document.getElementById("registrationForm").addEventListener("submit", function(event) {
  event.preventDefault();

  var course = document.getElementById("course").value;
  var fname = document.getElementById("firstname").value;
  var lname = document.getElementById("lastname").value;
  var mname = document.getElementById("middlename").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("npassword").value;
  var confirmPassword = document.getElementById("conpassword").value;
  var agreeCheckbox = document.getElementById("checkmark12");

  var modalMessage = document.getElementById("popup-message");

  var modal = document.getElementById("popup12");
  if (!modal) {
    // Create the modal element if it doesn't exist
    modal = document.createElement("div");
    modal.id = "popup12";
    modal.className = "popup12";
    modal.innerHTML = `
      <div class="popup12-content">
        <a href="#" class="popupclose"><i class="lni lni-close"></i></a>
        <p id="popup-message"></p>
      </div>
    `;
    document.body.appendChild(modal);
  }

  if (fname == "" || lname == "" || mname == "" || email == "" || password == ""){
    modalMessage.innerText = "Please fill the empty form/s.";
  } 
  else if (!email.endsWith("@dhvsu.edu.ph")) {
    modalMessage.innerText = "Please use your DHVSU account (2000123456@dhvsu.edu.ph).";
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
    modalMessage.innerText = "Registration successful!";
    this.submit();
  }
  
  modal.style.display = "flex";
});

// Close the modal when the close button is clicked
document.querySelector(".popupclose").addEventListener("click", function() {
  var modal = document.getElementById("popup12");
  if (modal) {
    modal.style.display = "none";
  }
});

// Close the modal when the user clicks outside the modal
window.addEventListener("click", function(event) {
  var modal = document.getElementById("popup12");
  if (modal && event.target == modal) {
    modal.style.display = "none";
  }
});
