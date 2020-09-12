/******* NAVBAR ******/
var menu_toggle = document.querySelector(".menu-toggle");
var navbar = document.querySelector(".navbar");

menu_toggle.addEventListener("click", function () {
  navbar.classList.toggle("navbar-open");
  menu_toggle.classList.toggle("open");
});


/******* OPEN CLOSE BUTTON DASHBOARD ******/
$(document).ready(function () {
    $('.open-close-button__wrapper').click(function(){
      $(this).toggleClass("arrow-up");
      let x = $(this).attr('name');
      $('#'+x).toggleClass("ostalo-info-open");
    })
  });