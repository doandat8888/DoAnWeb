var pageHeaderIcon = document.querySelector('.pages-header-icon');
var menu = document.querySelector('.menu');
var pages = document.querySelector('.pages');
var searchBar = document.querySelector('.pages-header-search')
var adminInfo = document.querySelector('.admin-info');
var menuItemLink = document.querySelector('.menu-item-link');
console.log(menu);
pageHeaderIcon.onclick = function() {
    menu.classList.toggle('translateX');
    pages.classList.toggle('left-0');
    pages.classList.toggle('col-lg-9');
}

function myDisplay(x) {
    if(x.matches) {
        searchBar.classList.remove('col-5');
        pageHeaderIcon.classList.remove('col-3');
        adminInfo.classList.remove('col-4');
        pageHeaderIcon.classList.add('col-6');
        adminInfo.classList.add('col-6');
        menu.classList.add('translateX');
        menuItemLink.onclick = function() {
            menu.classList.add('translateX');
        }
    }else {
        searchBar.classList.add('col-5');
        pageHeaderIcon.classList.remove('col-6');
        adminInfo.classList.remove('col-6');
        pageHeaderIcon.classList.add('col-3');
        adminInfo.classList.add('col-4');
        menu.classList.remove('translateX');
    }
}

var x = window.matchMedia("(max-width: 1000px)");
myDisplay(x);
x.addListener(myDisplay);