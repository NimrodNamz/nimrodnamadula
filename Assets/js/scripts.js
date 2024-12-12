const navLinks = document.querySelectorAll('nav a');
navLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
        link.style.backgroundColor = '#ddd';
        link.style.color = '#333';
    });
    link.addEventListener('mouseout', () => {
        link.style.backgroundColor = '#333';
        link.style.color = 'white';
    });
});
