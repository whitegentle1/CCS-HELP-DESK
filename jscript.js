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

document.querySelector(".close").addEventListener("click", function(){
  document.getElementById("popup_body").style.display = "none";
});

document.querySelector(".close1").addEventListener("click", function(){
  document.getElementById("popup_body").style.display = "none";
});

document.querySelector(".close3").addEventListener("click", function(){
  document.getElementById("fbody").style.display = "none";
});
