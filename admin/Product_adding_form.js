// Handle form submission
function handleSubmit(event) {
    event.preventDefault(); // Prevent default form submission
  
    const productName = document.getElementById('inputEmail3').value;
    const productID = document.querySelector('input[type="text"]').value;
    const price = document.querySelector('input[type="number"]').value;
    const stockStatus = document.querySelector('input[name="gridRadios"]:checked').value;
  
    if (!productName || !productID || !price) {
      alert('Please fill in all the required fields.');
      return;
    }
  
    alert("Product ${productName} added successfully!\nProduct ID: ${productID}\nPrice: ${price}\nStock: ${stockStatus}");
  }
  
  // Dropdown item selection handling
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  dropdownItems.forEach(item => {
    item.addEventListener('click', function () {
      const dropdownButton = this.closest('.input-group').querySelector('.btn');
      dropdownButton.textContent = this.textContent;
    });
  });