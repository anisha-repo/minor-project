// Handle form submission
function handleSubmit(event) {
    event.preventDefault(); // Prevent page reload on form submission
  
    const brandName = document.querySelector('input[type="text"]').value;
    const brand_id = document.querySelector('input[type="text"]').value;
  
    if (!brandName || !brand_id ) {
      alert('Please fill out all required fields.');
      return;
    }
  
  }
  
  // Add new sub-category input field
 
  
  // Add an initial sub-category input field when the page loads
  