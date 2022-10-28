//Navigation menu collapse + open
var navBtn = document.getElementById('navigation-bar');
var category = document.querySelector('.category');
   
navBtn.onclick = function() {
    category.classList.add('active');
}
var cancelBtn = document.querySelector('.category .cancel-icon');
cancelBtn.onclick = function() {
    category.classList.remove('active');
}

//Favorite Icon turn red
var heartIconList = document.querySelectorAll('.favorite-icon');
    console.log(heartIconList);
    for(let i = 0; i < heartIconList.length; i++) {
        heartIconList[i].onclick = function() {
            heartIconList[i].classList.toggle('active-favorite')
        }
    }

//Open filter on mobile
var filter = document.querySelector('.filter');
var filterControl = document.getElementById('filter-control');
var filterArrow = document.getElementById('filter-arrow');

filterControl.onclick = function() {
    if (filter.classList.contains('active')){
        filter.classList.remove('active');
        filterArrow.classList.replace('fa-angle-up', 'fa-angle-down');
        return;
    }

    if (!filter.classList.contains('active')){
        filter.classList.add('active');
        filterArrow.classList.replace('fa-angle-down', 'fa-angle-up');
        return;
    }
}

//Hàm biến đổi đơn vị tiền tệ thành số nguyên. VD: 20.000đ -> 20000
const formatNumber = (number) => {
    return Number(number.replace(/[^0-9,-]+/g,""));
}

//Hàm biến đổi số nguyên thành đơn vị tiền tệ
const numberWithCommat = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
}

var navBtn = document.getElementById('navigation-bar');
var category = document.querySelector('.category');

navBtn.onclick = function() {
    category.classList.add('translateX');
}
var cancelBtn = document.querySelector('.category .cancel-icon');
cancelBtn.onclick = function() {
    category.classList.remove('translateX');
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

//Tính tổng số lượng hàng & tính tổng tiền
var count = 0;

const cartQuantity = document.querySelector('.cart-title .quantity');

var totalPrice = 0;
const productPrices = document.querySelectorAll('.cart-item-price');
const productQuantities = document.querySelectorAll('.cart-item-quantity-input');
for(let i = 0; i < cartItems.length; i++) {
    let productPrice = formatNumber(productPrices[i].innerText);
    let productQuantity = productQuantities[i].value;
    count += Number.parseInt(productQuantity);
    console.log(Number.parseInt(productPrice) * productQuantity);
    totalPrice += productPrice * productQuantity;
}
cartQuantity.innerHTML = count;
const cartNumber = document.querySelector('.cart-number');
cartNumber.innerHTML = count;
const totalMoney = document.querySelector('.cart-total-money');
totalMoney.innerHTML = numberWithCommat(totalPrice) + 'đ';

//Slider function
const rangeInput = document.querySelectorAll(".range-input input");
priceInput = document.querySelectorAll(".price-input input");
progress = document.querySelector(".slider .progress");

let priceGap = 500000;

priceInput.forEach(input=>{
    input.addEventListener("input", e=>{
        let minVal = parseInt(priceInput[0].value),
        maxVal = parseInt(priceInput[1].value);

        if (minVal == '' || maxVal == ''){
            rangeInput[0].value = 0;
            rangeInput[1].value = 10000000;
        }
        else{
            if ((maxVal - minVal >= priceGap)){
                if (maxVal <= 10000000){
                    if(e.target.className === "input-min"){
                        rangeInput[0].value = minVal;
                        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    }
                    else{
                        rangeInput[1].value = maxVal;
                        progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                    }
                }
            }
            else{
                rangeInput[1].value = 10000000;
            }   
        }
    })
})

rangeInput.forEach(input=>{
    input.addEventListener("input", e=>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap;
            }
            else{
                rangeInput[1].value = minVal + priceGap;
            }
        }
        else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    })
})
