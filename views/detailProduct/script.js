// HEADER
var menuitems = document.getElementById('menuitems');
var searchbar = document.getElementById('search-bar');
var searchbtn = document.getElementById('searchbtn');
var closebar  = document.getElementById('close-bar');
// menuitems.style.maxHeight = "0px";
// searchbar.style.visibility = "hidden";
function menutoggle(){
	if(menuitems.style.maxHeight=="0px"){
		menuitems.style.maxHeight= "220px";
	}else{
		menuitems.style.maxHeight = "0px";
	}
}
function showsearchbar(){
	if(searchbar.style.visibility == "hidden")
		searchbar.style.visibility = "visible";
		searchbar.style.right = "0";

}
function hidesearchbar(){
	searchbar.style.visibility = "hidden";
	searchbar.style.right = "-1500px";
}

// CONTENT
var ProductImg = document.getElementById("ProductImg");
console.log(ProductImg);
var SmallImg = document.getElementsByClassName("small-img");

	SmallImg[0].onclick = function()
	{
		ProductImg.src = SmallImg[0].src;
	}
	SmallImg[1].onclick = function()
	{
		ProductImg.src = SmallImg[1].src;
	}
	SmallImg[2].onclick = function()
	{
		ProductImg.src = SmallImg[2].src;
	}
	SmallImg[3].onclick = function()
	{
		ProductImg.src = SmallImg[3].src;
	}

//FOOTER
// BACK_TO_TOP
mybutton = document.getElementById("back-to-top");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
  
}
function scrollToTop() {
  
	window.scrollTo(0, 0);
}

// quantity action
function increaseCount(a,b) {
	var input = b.previousElementSibling;
	var value = parseInt(input.value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	input.value = value;
}
function decreaseCount(a,b) {
	var input = b.nextElementSibling;
	var value = parseInt(input.value, 10);
	if(value > 1) {
		value = isNaN(value) ? 0 : value;
		value--;
		input.value = value;
	}
}

//Heart active
var isActiveBorder = true;
	var heartIconList = document.querySelectorAll('.favorite-icon');
	console.log(heartIconList);
	for(let i = 0; i < heartIconList.length; i++) {
		heartIconList[i].onclick = function() {
		heartIconList[i].classList.toggle('active2')
	}
}

//Hàm biến đổi đơn vị tiền tệ thành số nguyên. VD: 20.000đ -> 20000
const formatNumber = (number) => {
	return Number(number.replace(/[^0-9,-]+/g,""));
}
//Hàm biến đổi số nguyên thành đơn vị tiền tệ
const numberWithCommat = (number) => {
	return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
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
var infoList = document.getElementsByClassName('info-item');
var listinfo = document.querySelectorAll('.info-content-item');
console.log(listinfo)
for(let i = 0; i < infoList.length; i++) {
	infoList[i].onclick = function() {
		for(let j = 0; j < infoList.length; j++) {
			if(infoList[j].classList.contains('border-active')) {
				if(i !== j) {
					infoList[j].classList.remove('border-active');
					infoList[i].classList.add('border-active');
					listinfo[j].classList.remove('block');
					listinfo[i].classList.add('block');
				}
			}
		}
	}
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

//LOAD MORE
let loadMoreBtn = document.querySelector('#pro-load-more');
let currentItem = 4;

loadMoreBtn.onclick = () => {
	let boxes = [...document.querySelectorAll('.pro-list .products')];
	for(var i = currentItem; i < currentItem + 4; i++) {
		boxes[i].style.display = 'flex';
	}
	currentItem += 4;
	if(currentItem >= boxes.length) {
		loadMoreBtn.style.display = 'none';
	}
}
//Add cart
const btn = document.querySelectorAll('.add-cart')
for (var i = 0; i < array.length; index++) {
	const element = array[index];
	
}