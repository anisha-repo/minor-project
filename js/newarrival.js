// JavaScript for subtle pulsing effect on "Coming Soon" section
const comingSoonSection = document.querySelector('.coming-soon');

comingSoonSection.addEventListener('mouseenter', () => {
    comingSoonSection.style.transform = 'scale(1.02)';
});

comingSoonSection.addEventListener('mouseleave', () => {
    comingSoonSection.style.transform = 'scale(1)';
});
