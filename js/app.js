var hamburger  = document.getElementById("hamburger");
hamburger.addEventListener("click", myNav);

function myNav(){
  var menu = document.querySelector(".main-menu");
  menu.classList.toggle("responsive");
}




