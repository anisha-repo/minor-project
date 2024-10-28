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


