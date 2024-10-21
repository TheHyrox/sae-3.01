const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function updateSlides() {
    slides.forEach((slide) => {
        slide.classList.remove('active', 'next', 'pre');
    });
    slides[currentSlide].classList.add('active');
    const nextIndex = (currentSlide + 1) % slides.length;
    const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
    slides[nextIndex].classList.add('next');
    slides[prevIndex].classList.add('pre');
}

slides.forEach((button, index) => {
    button.addEventListener('click', () => handleClick(index));
});

function handleClick(index) {
    currentSlide = index;
    updateSlides();
}