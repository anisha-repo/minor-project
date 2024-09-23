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
let data=1;

const inc = document.getElementById("inc");
const dec = document.getElementById("dec");

inc.addEventListener("click", () => {
   if(data<5){
    data=data+1;
  document.getElementById("counting").innerHTML = data;
   }
});

dec.addEventListener("click", () => {
  if (data > 1 && data <=5) {
    data=data-1;
    document.getElementById("counting").innerHTML = data;
  }
  input.innerText = data;
});

//shoe size
function check() {
  document.getElementsByClassName("btn-check").checked = true;
  return 1;
}
document.getElementById('addToCart').addEventListener('click', function() {
  const sizeSelect = document.querySelector('input[name="btnradio"]:checked');
  const selectedSize = sizeSelect.nextElementSibling.getAttribute('value');
    const message = document.getElementById('message');
    let c=check();

    if (c==1) {
        message.textContent = `You have added size ${selectedSize} to your cart.`;
        message.style.color = 'green';
        // Here you can add code to actually add the item to the cart
    }
    else {
        message.textContent = 'Please select a size before adding to cart.';
        message.style.color = 'red';
    }
});

//add to carts


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
