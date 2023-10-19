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