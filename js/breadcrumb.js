// script.js
document.querySelectorAll('.breadcrumb-item a').forEach(link => {
    link.addEventListener('click', function() {
        console.log('Breadcrumb clicked: ' + this.textContent);
    });
});
