const slides = document.querySelectorAll('.slide');
const monthBtns = document.querySelectorAll('.monthBtn');
const months = document.querySelectorAll('.month');
const burgerMenu = document.querySelector('.burger-menu');
const navLinks = document.querySelector('.nav-links');
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
    button.addEventListener('click', () => slideClick(index));
});

function slideClick(index) {
    currentSlide = index;
    updateSlides();
}



// Ajoute un événement pour afficher/masquer le menu
burgerMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    burgerMenu.classList.toggle('active');
});


monthBtns.forEach((button, index) => {
    button.addEventListener('click', () => monthClick(index));
});

function monthClick(index) {
    months[index].classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', () => {
    const monthButtons = document.querySelectorAll('.monthBtn');
    const eventItems = document.querySelectorAll('.eventItem');
    const eventDetails = document.getElementById('eventDetails');

    monthButtons.forEach(button => {
        button.addEventListener('click', () => {
            const eventList = button.nextElementSibling;
            if (eventList) {
                eventList.classList.toggle('visible');
            }
        });
    });

    eventItems.forEach(item => {
        item.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent form submission
            const id = item.getAttribute('data-id');
            const name = item.getAttribute('data-name');
            const date = item.getAttribute('data-date');
            const description = item.getAttribute('data-description');

            eventDetails.setAttribute('data-id', id);
            eventDetails.querySelector('h2').textContent = name;
            eventDetails.querySelector('p').textContent = description;
            eventDetails.querySelector('img').src = item.getAttribute('data-image') ? '../Pictures/Uploads/' + item.getAttribute('data-image') : '../Pictures/defaultProfilePicture.png';
            eventDetails.querySelector('.row h3').textContent = date;
        });
    });
});