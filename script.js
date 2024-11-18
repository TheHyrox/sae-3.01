const slides = document.querySelectorAll('.slide');
const monthBtns = document.querySelectorAll('.monthBtn');
const months = document.querySelectorAll('.month');
const agenda = document.getElementById('agenda');
const eventList = document.getElementById('eventList');


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

monthBtns.forEach((button, index) => {
    button.addEventListener('click', () => monthClick(index));
});

function monthClick(index) {
    months[index].classList.toggle('active');
}

// Charger les événements depuis le fichier .ics
fetch('events.ics')
  .then(response => response.text())
  .then(data => {
    const events = parseIcs(data);
    renderEvents(events);
  })
  .catch(error => console.error('Erreur lors du chargement des événements :', error));

// Fonction pour parser le fichier .ics
function parseIcs(data) {
  const events = [];
  const lines = data.split('\n');
  let currentEvent = null;

  lines.forEach(line => {
    if (line.startsWith('BEGIN:VEVENT')) {
      currentEvent = {};
    } else if (line.startsWith('END:VEVENT')) {
      events.push(currentEvent);
      currentEvent = null;
    } else if (currentEvent) {
      const [key, value] = line.split(':');
      currentEvent[key] = value;
    }
  });

  return events;
}

// Fonction pour afficher les événements
function renderEvents(events) {
  const html = events.map(event => {
    return `
      <li>
        <button>${event.SUMMARY}</button>
        <ul>
          <li>${event.DESCRIPTION}</li>
        </ul>
      </li>
    `;
  }).join('');

  eventList.innerHTML = html;
}

document.getElementById('load-ics').addEventListener('click', () => {
    fetch('events.ics')
      .then(response => response.text())
      .then(data => {
        const events = parseIcs(data);
        renderEvents(events);
      })
      .catch(error => console.error('Erreur lors du chargement des événements :', error));
  });