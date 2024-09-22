const btnAddCart = document.querySelector(".add_cart");
const qty = document.querySelector(".qty_numbers");
const decr = document.querySelector(".decr");
const incr = document.querySelector(".incr");

//modal image
const thumImg = document.querySelectorAll(".numbertext img");
const imgLarge = document.querySelector(".numbertext img");
//modal
const modalEl = document.querySelector(".modal");
const closeModal = document.querySelector(".close_icon");
const nextImg = document.querySelector(".next img");
const prevImg = document.querySelector(".prev img");
const modalImgs = document.querySelectorAll(".img_small_modal img");
const modalLImg = document.querySelector(".m_img");

let proPrice = 125;
let totalQty = qty.innerHTML;
let totalPrice;


//creation of increment function
let data=0;

const inc = document.getElementById("inc");
const dec = document.getElementById("dec");

inc.addEventListener("click", () => {
   data=data+1;
  document.getElementById("input").innerHTML = data;
});

dec.addEventListener("click", () => {
  if (input.value > 0) {
   data=data-1;
  }
  input.innerText = data;
});

//add to carts
btnAddCart.addEventListener("click", () => {
  qtyLable.style.display = "block";
  qtyLable.innerHTML = totalQty;
  proContainer.innerHTML = "";
  let html = `<img src="./images/image-product-1-thumbnail.jpg" alt="" />
  <div class="p_details">
    <p class="pro_txt">Fall Limited Edition Sneakers</p>
    <p class="price">
      $125.00 <span>x</span><span class="times">${totalQty}</span>
      $<span class="total">${totalPrice}</span>
    </p>
  </div>
  <div class="trash">
    <img src="./images/icon-delete.svg" alt="" class="trash_img" />
  </div>`;
  proContainer.insertAdjacentHTML("afterbegin", html);
  cartEmpty.innerHTML = "";
  document.querySelector(".trash_img").addEventListener("click", () => {
    cartEmpty.innerHTML = "Your cart is empty :)";
    proContainer.innerHTML = "";
    qtyLable.style.display = "none";
  });
});

// display thumbnail images
thumImg.forEach((img, indx) => {
  indx++;
  img.addEventListener("click", (e) => {
    imgLarge.src = `images/image-product-${indx}.jpg`;
    thumImg.forEach((thumb) => thumb.classList.remove("active"));
    img.classList.add("active");
  });
});

//acordian
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

//slide image
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active","");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
