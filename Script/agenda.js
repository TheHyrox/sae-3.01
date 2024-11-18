document.addEventListener('DOMContentLoaded', () => {
  let currentWeekStart = new Date(); // Start of the current week

  // Define resourceIds mapping
  const resourceIds = {
    'TP11A': 282,
    'TP11B': 567,
    'TP12C': 861,
    'TP12D': 869,
    'TP21A': 2667,
    'TP21B': 2668,
    'TP22C': 3113,
    'TP22D': 3115,
    'TP31A': 5269,
    'TP31B': 5419,
    'TP32C': 6239,
    'TP32D': 6241
  };

  // Function to get the start of the week for a given date
  function getWeekStart(date) {
      const day = date.getDay();
      const diff = date.getDate() - day + (day === 0 ? -6 : 1); // Adjust when day is sunday
      return new Date(date.setDate(diff));
  }

  // Function to set the dates in the table headers
  function setWeekDates(startDate) {
      const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
      days.forEach((day, index) => {
          const date = new Date(startDate);
          date.setDate(startDate.getDate() + index);
          document.getElementById(`${day}-date`).textContent = date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' });
      });
  }

  // Fonction qui génère le lien de téléchargement pour un groupe donné
  function getDownloadLink(group) {
    const resourceId = resourceIds[group];
    const baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
    const params = `resources=${resourceId}&projectId=7&calType=ical&nbWeeks=4`;
    return `${baseUrl}?${params}`;
  }

  // Function to render events for the current week
  function renderEvents(events) {
    const days = {
        1: 'monday',
        2: 'tuesday',
        3: 'wednesday',
        4: 'thursday',
        5: 'friday'
    };

    // Clear previous events
    const eventsContainer = document.getElementById('events-container');
    eventsContainer.innerHTML = ''; // Clear previous events

    events.forEach(event => {
        const summary = event.getFirstPropertyValue('summary');
        const description = event.getFirstPropertyValue('description');
        const location = event.getFirstPropertyValue('location');
        const startDate = new Date(event.getFirstPropertyValue('dtstart').toString());
        const endDate = new Date(event.getFirstPropertyValue('dtend').toString());
        const day = startDate.getDay();
        const startHour = startDate.getHours();
        const endHour = endDate.getHours();
        const startMinutes = startDate.getMinutes();
        const endMinutes = endDate.getMinutes();

        // Extract the professor's name from the description
        const professorMatch = description.match(/\n\n(?:Grp \d+\w+|BUT INFO1|TD\d+)\n(.+?)\n/);
        const professor = professorMatch ? professorMatch[1] : 'N/A';

        const durationInMinutes = (endHour * 60 + endMinutes) - (startHour * 60 + startMinutes);
        const topPosition = ((startHour - 8) * 60 + startMinutes) * (100 / (11 * 60)); // Adjusted for 8:00 to 19:00
        const height = (durationInMinutes / 60) * 100;

        const html = `
            <div class="event" style="top: ${topPosition}%; height: ${height}%; left: ${((day - 1) * 20)}%; width: 20%;">
                <button>${summary}</button>
                <ul>
                    <li>Professeur : ${professor}</li>
                    <li>Localisation : ${location}</li>
                </ul>
            </div>
        `;

        // Check if the event is in the current week
        const weekStart = getWeekStart(new Date(currentWeekStart));
        const weekEnd = new Date(weekStart);
        weekEnd.setDate(weekEnd.getDate() + 4); // End of the week (Friday)

        if (startDate >= weekStart && startDate <= weekEnd && days[day]) {
            eventsContainer.insertAdjacentHTML('beforeend', html);
        }
    });

    // Set the dates in the table headers
    setWeekDates(getWeekStart(new Date(currentWeekStart)));
  }

  // Function to load events for the selected group
  function loadEvents(group) {
      const url = `../Script/proxy.php?url=${encodeURIComponent(getDownloadLink(group))}`;
      fetch(url)
          .then(response => {
              if (!response.ok) {
                  throw new Error(`Erreur HTTP : ${response.status}`);
              }
              return response.text();
          })
          .then(data => {
              // Analyse le fichier ICS avec ICAL.js
              const parsed = ICAL.parse(data);
              const component = new ICAL.Component(parsed);
              const events = component.getAllSubcomponents('vevent');
              renderEvents(events);
          })
          .catch(error => console.error('Erreur lors du chargement des événements :', error));
  }

  // Event listeners for week navigation buttons
  document.getElementById('prev-week').addEventListener('click', () => {
      currentWeekStart.setDate(currentWeekStart.getDate() - 7);
      loadEvents(document.getElementById('group-select').value);
  });

  document.getElementById('next-week').addEventListener('click', () => {
      currentWeekStart.setDate(currentWeekStart.getDate() + 7);
      loadEvents(document.getElementById('group-select').value);
  });

  // Initial load
  document.getElementById('load-ics').addEventListener('click', () => {
      currentWeekStart = getWeekStart(new Date()); // Reset to current week
      loadEvents(document.getElementById('group-select').value);
  });
});