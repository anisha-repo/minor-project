document.addEventListener("DOMContentLoaded", () => {
  const sliderWrapper = document.querySelector(".sliderWrapper");
  const sliderItems = document.querySelectorAll(".sliderItem");
  const sliderButtonLeft = document.querySelector(".sliderButton.left");
  const sliderButtonRight = document.querySelector(".sliderButton.right");
  const menuItems = document.querySelectorAll(".menuItem");
  const productButton = document.querySelector(".productButton");
  const currentProductColors = document.querySelectorAll(".color");
  const currentProductSizes = document.querySelectorAll(".size");

  let currentIndex = 0;
  const totalSlides = sliderItems.length;

  // Slider navigation
  if (sliderButtonLeft && sliderButtonRight) {
      sliderButtonLeft.addEventListener("click", () => {
          if (currentIndex > 0) {
              currentIndex--;
              moveSlider();
          }
      });

      sliderButtonRight.addEventListener("click", () => {
          if (currentIndex < totalSlides - 1) {
              currentIndex++;
              moveSlider();
          }
      });
  }

  const moveSlider = () => {
      const offset = -currentIndex * 100;
      sliderWrapper.style.transform = `translateX(${offset}vw)`;
  };

  // Menu interactions
  if (menuItems.length) {
      menuItems.forEach((item, index) => {
          item.addEventListener("click", () => {
              currentIndex = index;
              moveSlider();
          });
      });
  }

  // Product colors and sizes
  if (currentProductColors.length) {
      currentProductColors.forEach((color, index) => {
          color.addEventListener("click", () => {
              console.log(`Color ${index + 1} clicked!`);
          });
      });
  }

  if (currentProductSizes.length) {
      currentProductSizes.forEach((size, index) => {
          size.addEventListener("click", () => {
              currentProductSizes.forEach((s) => {
                  s.style.backgroundColor = "white";
                  s.style.color = "black";
              });
              size.style.backgroundColor = "black";
              size.style.color = "white";
          });
      });
  }

  // Product button interaction
 
});

const buyButtons = document.querySelectorAll('.buyButton');

buyButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Get the product ID from the data attribute of the parent element
        const productId = this.closest('.sliderItem').getAttribute('data-product-id');
        
        // Redirect to the product detail page
        window.location.href = `detailpage.php?product_id=${productId}`;
    });
});
const productButton = document.querySelectorAll('.productButton');
productButton.forEach(button => {
    button.addEventListener('click', function() {
        // Get the product ID from the data attribute of the parent element
        const productId = this.closest('.product').getAttribute('data-product-id');
        
        // Redirect to the product detail page
        window.location.href = `detailpage.php?product_id=${productId}`;
    });
});