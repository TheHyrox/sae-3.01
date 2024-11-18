let currentWeekStart = new Date(); // Start of the current week

// Function to get the start of the week for a given date
function getWeekStart(date) {
    const day = date.getDay();
    const diff = date.getDate() - day + (day === 0 ? -6 : 1); // Adjust when day is sunday
    return new Date(date.setDate(diff));
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
    Object.values(days).forEach(day => {
        document.getElementById(day).innerHTML = '';
    });

    events.forEach(event => {
        const summary = event.getFirstPropertyValue('summary');
        const description = event.getFirstPropertyValue('description');
        const startDate = new Date(event.getFirstPropertyValue('dtstart').toString());
        const day = startDate.getDay();

        const html = `
            <div class="event">
                <button>${summary}</button>
                <ul>
                    <li>Description : ${description}</li>
                    <li>Date de début : ${startDate}</li>
                </ul>
            </div>
        `;

        // Check if the event is in the current week
        const weekStart = getWeekStart(new Date(currentWeekStart));
        const weekEnd = new Date(weekStart);
        weekEnd.setDate(weekEnd.getDate() + 4); // End of the week (Friday)

        if (startDate >= weekStart && startDate <= weekEnd && days[day]) {
            document.getElementById(days[day]).innerHTML += html;
        }
    });
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