
const formatNumber = (number) => {
    return Number(number.replace(/[^0-9,-]+/g,""));
}
const numberWithCommat = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
}
var navBtn = document.getElementById('navigation-bar');
var category = document.querySelector('.category');

navBtn.onclick = function() {
    category.classList.add('translateX');
}
var cancelBtnCategory = document.querySelector('.category .cancel-icon');
cancelBtnCategory.onclick = function() {
    category.classList.remove('translateX');
}
var typeList = document.getElementsByClassName('type-item');
var listType = document.querySelectorAll('.type-content-list');
for(let i = 0; i < typeList.length; i++) {
    typeList[i].onclick = function() {
        for(let j = 0; j < typeList.length; j++) {
            if(typeList[j].classList.contains('border-active')) {
                if(i !== j) {
                    typeList[j].classList.remove('border-active');
                    typeList[i].classList.add('border-active');
                    listType[j].classList.remove('block');
                    listType[i].classList.add('block');
                }
            }
        }
    }
}
var isActiveBorder = true;
var heartIconList = document.querySelectorAll('.favorite-icon');
console.log(heartIconList);
for(let i = 0; i < heartIconList.length; i++) {
    heartIconList[i].onclick = function() {
        heartIconList[i].classList.toggle('active2')
    }
}
const searchIcon = document.querySelector('.search-icon');
console.log(searchIcon);
const searchSection = document.querySelector('.search-section');
console.log(searchSection);
searchIcon.onclick = function() {
    searchSection.classList.add('translateY');
}
const cancleBtnSearch = document.querySelector('.search-section .cancel-icon');
console.log(cancleBtnSearch);
cancleBtnSearch.onclick = function() {
    searchSection.classList.remove('translateY');
}
const cartBtn = document.querySelector('.nav-icon .cart-icon');
console.log(cartBtn);
const cartMenu = document.querySelector('.cart');
cartBtn.onclick = function() {
    cartMenu.classList.add('translateX');
}
const cancleBtnCart = document.querySelector('.cart-header .cancel-icon');
cancleBtnCart.onclick = function() {
    cartMenu.classList.remove('translateX');
}
const cartItems = document.querySelectorAll('.cart-item');
var count = 0;
for(let i = 0; i < cartItems.length; i++) {
    count++;
}
const cartQuantity = document.querySelector('.cart-title .quantity');
cartQuantity.innerHTML = count;
var totalPrice = 0;
const productPrices = document.querySelectorAll('.cart-item-price');
const productQuantities = document.querySelectorAll('.cart-item-quantity-input');
for(let i = 0; i < cartItems.length; i++) {
    let productPrice = formatNumber(productPrices[i].innerText);
    let productQuantity = productQuantities[i].value;
    console.log(Number.parseInt(productPrice) * productQuantity);
    totalPrice += productPrice * productQuantity;
}
const totalMoney = document.querySelector('.cart-total-money');
totalMoney.innerHTML = numberWithCommat(totalPrice) + 'đ';

var cartInfoTxt = document.querySelector('.cart-info-txt');
cartInfoTxt.innerText = `Bạn đang có ${count} sản phẩm trong giỏ hàng`;
var totalMoneyTxt = document.querySelector('.cart-info-content-price-money');
totalMoneyTxt.innerText = numberWithCommat(totalPrice) + 'đ';