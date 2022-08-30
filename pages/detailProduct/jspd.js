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
(function() {
 
	window.inputNumber = function(el) {
  
	  var min = el.attr('min') || false;
	  var max = el.attr('max') || false;
  
	  var els = {};
  
	  els.dec = el.prev();
	  els.inc = el.next();
  
	  el.each(function() {
		init($(this));
	  });
  
	  function init(el) {
  
		els.dec.on('click', decrement);
		els.inc.on('click', increment);
  
		function decrement() {
		  var value = el[0].value;
		  value--;
		  if(!min || value >= min) {
			el[0].value = value;
		  }
		}
  
		function increment() {
		  var value = el[0].value;
		  value++;
		  if(!max || value <= max) {
			el[0].value = value++;
		  }
		}
	  }
	}
  })();
  
inputNumber($('.detail-number'));

//LOAD MORE
$(document).ready (function () {  
	$(".products").slice(0, 4).show();  
	$("#pro-load-more").on("click", function(e){  
	    e.preventDefault();  
	    $(".products:hidden").slice(0, 4).show().slideDown();  
	    if ($(".products:hidden").length == 0) {  
			$("#pro-load-more").style.display = 'none'  
	    }  
	});  
})