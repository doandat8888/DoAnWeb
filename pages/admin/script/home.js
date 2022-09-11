var pageHeaderIcon = document.querySelector('.pages-header-icon');
var menu = document.querySelector('.menu');
var pages = document.querySelector('.pages');
console.log(menu);
pageHeaderIcon.onclick = function() {
    menu.classList.toggle('translateX');
    pages.classList.toggle('left-0');
}