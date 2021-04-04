$( document ).ready(function() {
  $('.loading_wrap').fadeOut("slow");
});
function menuIcon() {
  var navigiLinkLi = document.querySelectorAll(".navigi-link-li");
  var menuLines = document.querySelectorAll(".menu-line");
  menuLines[0].classList.toggle("rotate-line1");
  menuLines[1].classList.toggle("rotate-line2");
  menuLines[2].classList.toggle("rotate-line3");
  navigiLinkLi[0].classList.toggle("navigi-link-li-d");
  navigiLinkLi[1].classList.toggle("navigi-link-li-d");
  navigiLinkLi[2].classList.toggle("navigi-link-li-d");
  navigiLinkLi[3].classList.toggle("navigi-link-li-d");
  navigiLinkLi[4].classList.toggle("navigi-link-li-d");
}