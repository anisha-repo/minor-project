document.getElementById('profileForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block'; 
});
