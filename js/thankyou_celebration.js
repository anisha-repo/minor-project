window.onload = function() {
    setTimeout(function() {
        document.getElementById('celebration-popup').classList.remove('hidden');
        startConfetti();
    }, 2000);
};
function startConfetti() {
    const confettiContainer = document.getElementById('confetti-container');
    
    for (let i = 0; i < 100; i++) {
        const confettiPiece = document.createElement('div');
        confettiPiece.classList.add('confetti-piece');
        confettiPiece.style.left = Math.random() * 100 + 'vw';
        confettiPiece.style.animationDuration = Math.random() * 3 + 2 + 's';
        confettiContainer.appendChild(confettiPiece);
    }

    setTimeout(function() {
        confettiContainer.innerHTML = '';
    }, 5000);
}
