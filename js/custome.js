/******* NAVBAR ******/
var menu_toggle = document.querySelector(".menu-toggle");
var navbar = document.querySelector(".navbar");

menu_toggle.addEventListener("click", function () {
  navbar.classList.toggle("navbar-open");
  menu_toggle.classList.toggle("open");
});

/******* NAVBAR ZATVARANJE NA CLICK ******/
$(function () {
  $(".navbar__link").on("click touch", function () {
    $(".menu-toggle").click();
  });
});

/******* OPEN CLOSE BUTTON DASHBOARD ******/
$(document).ready(function () {
  $(".open-close-button__wrapper").click(function () {
    $(this).toggleClass("arrow-up");
    let x = $(this).attr("name");
    $("#" + x).toggleClass("ostalo-info-open");
  });
});

/******* GLIDER ******/
new Glider(document.querySelector(".glider"), {
  // `auto` allows automatic responsive
  // width calculations
  slidesToShow: 1,
  slidesToScroll: 1,

  // should have been named `itemMinWidth`
  // slides grow to fit the container viewport
  // ignored unless `slidesToShow` is set to `auto`
  itemWidth: undefined,

  // if true, slides wont be resized to fit viewport
  // requires `itemWidth` to be set
  // * this may cause fractional slides
  exactWidth: false,

  // speed aggravator - higher is slower
  duration: 0.5,

  // dot container element or selector
  dots: ".carousel__navigation",

  // arrow container elements or selector
  arrows: {
    prev: ".carousel__button--left",
    // may also pass element directly
    next: ".carousel__button--right",
  },

  // allow mouse dragging
  draggable: true,
  // how much to scroll with each mouse delta
  dragVelocity: 3.3,

  // use any custom easing function
  // compatible with most easing plugins
  easing: function (x, t, b, c, d) {
    return c * (t /= d) * t + b;
  },

  // event control
  scrollPropagate: false,
  eventPropagate: true,

  // Force centering slide after scroll event
  scrollLock: true,
  // how long to wait after scroll event before locking
  // if too low, it might interrupt normal scrolling
  scrollLockDelay: 150,

  // Force centering slide after resize event
  resizeLock: true,

  // Glider.js breakpoints are mobile-first
  // responsive: [
  //   {
  //     breakpoint: 1000,
  //     settings: {
  //       slidesToShow: 2,
  //       slidesToScroll: 2,
  //     },
  //   },
  // ],
});

/******* SELECTRIC ******/
// $(function () {
//   $("select").selectric();
// });
