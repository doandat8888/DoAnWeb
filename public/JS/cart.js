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
// const cartItems = document.querySelectorAll('.cart .cart-item');
// var count = 0;

// var cartQuantity = document.querySelector('.cart-title .quantity');

// var totalPrice = 0;
// const productPrices = document.querySelectorAll('.cart-item-price');
// const productQuantities = document.querySelectorAll('.cart-item-quantity-input');
// for(let i = 0; i < cartItems.length; i++) {
//     let productPrice = formatNumber(productPrices[i].innerText);
//     let productQuantity = productQuantities[i].value;
//     count += Number.parseInt(productQuantity);
//     console.log(Number.parseInt(productPrice) * productQuantity);
//     totalPrice += productPrice * productQuantity;
// }
// const totalMoney = document.querySelector('.cart-total-money');
// totalMoney.innerHTML = numberWithCommat(totalPrice) + 'đ';
// cartQuantity.innerHTML = count;
// var cartNumber = document.querySelector('.cart-number');
// cartNumber.innerHTML = count;
// var cartInfoTxt = document.querySelector('.cart-info-txt');
// cartInfoTxt.innerText = `Bạn đang có ${count} sản phẩm trong giỏ hàng`;
// var totalMoneyTxt = document.querySelector('.cart-info-content-price-money');
// totalMoneyTxt.innerText = numberWithCommat(totalPrice) + 'đ';


// //Xóa sản phẩm khỏi giỏ hàng và tính lại tổng tiền
// var cancelBtns = document.querySelectorAll('.del-icon');
// console.log(cancelBtns);
// for(let i = 0; i < cancelBtns.length; i++) {
//     var cancelBtn = cancelBtns[i];
//     cancelBtn.addEventListener('click', function(event) {
//         let btnClicked = event.target;
//         btnClicked.parentElement.parentElement.parentElement.parentElement.remove();
//         updateCartTotal();
//     });
// }

// //Update số lượng
// var totalUpdate = 0;
// var quantityUpdate = 0;
// var cartProductContainer = document.getElementsByClassName('cart-products')[1];
// var cartItemContainer = cartProductContainer.getElementsByClassName('cart-item');
// var minusBtns = cartProductContainer.querySelectorAll('.cart-item-quantity-minus');
// console.log(minusBtns);
// var plusBtns = cartProductContainer.querySelectorAll('.cart-item-quantity-plus');
// console.log(plusBtns);
// for(let i = 0; i < cartItemContainer.length; i++) {
//     minusBtns[i].onclick = function() {
//         let productQuantityInput = cartItemContainer[i].querySelector('.cart-item-quantity-input');
//         let productQuantity = Number.parseInt(productQuantityInput.value);
//         if(productQuantity <= 1) {
//             productQuantityInput.value = 1;
//         }else {
//             productQuantity = productQuantity - 1;
//             productQuantityInput.value = productQuantity;
//         }
//         updateCartTotal();
//     }
//     plusBtns[i].onclick = function() {
//         let productQuantityInput = cartItemContainer[i].querySelector('.cart-item-quantity-input');
//         let productQuantity = Number.parseInt(productQuantityInput.value);
//         productQuantity = productQuantity + 1;
//         productQuantityInput.value = productQuantity;
//         updateCartTotal();
//     }
    
// }

// //Tính tổng giỏ hàng
// function updateCartTotal() {
//     let cartProducts = document.getElementsByClassName('cart-products')[1];
//     console.log(cartProducts);
//     let totalNew = 0;
//     let quantityNew = 0;
//     let cartItems = cartProducts.getElementsByClassName('cart-item');
//     for(let i = 0; i < cartItems.length; i++) {
//         var productPrice = formatNumber((cartItems[i].querySelector('.cart-item-price')).innerText);
//         var productQuantity = (cartItems[i].querySelector('.cart-item-quantity-input')).value;
//         quantityNew += Number.parseInt(productQuantity);
//         totalNew += productPrice * productQuantity;
//     }
//     totalMoneyTxt.innerText = numberWithCommat(totalNew) + 'đ';
//     cartInfoTxt.innerText = `Bạn đang có ${quantityNew} sản phẩm trong giỏ hàng`;
//     cartNumber.innerText = quantityNew;
//     cartQuantity.innerText = quantityNew;
// }

//scrollToTop
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