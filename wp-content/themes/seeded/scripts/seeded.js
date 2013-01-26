jQuery(document).ready(function($) { 

$('.butn-link').empty();



});

window.onscroll = function () {
// Get the amount of scrolling.
var top = window.pageXOffset ? window.pageXOffset : document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
// The menu we want to stick.
var menu = document.getElementById("seeded_share");
// The thing above the menu we want to disappear.
var menutop = document.getElementById("top");
// The height of "above_menu".
var offset = 270;
if (top > offset) {
// Fix the menu to the page.
menu.style.position = "fixed";
menu.style.top = "70px";
// Set the margin of the disappearing element to the height of the stuck menu,
// to replace the space lost when the menu becomes fixed.
menutop.style.marginBottom = "32px";
}
else {
// Unstick the menu.
menu.style.position = "absolute";
menu.style.top = "170px";
// The margin underneath the disappearing element is no longer required.
menutop.style.marginBottom = "0px";
}
} 
