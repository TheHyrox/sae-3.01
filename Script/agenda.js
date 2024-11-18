// Objet qui mappe les IDs de ressource aux noms de groupe
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

// Fonction qui génère le lien de téléchargement pour un groupe donné
function getDownloadLink(group) {
  const resourceId = resourceIds[group];
  const baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
  const params = `resources=${resourceId}&projectId=7&calType=ical&nbWeeks=4`;
  return `${baseUrl}?${params}`;
}

// Fonction qui charge les événements depuis un fichier .ics via proxy
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

// Fonction qui affiche les événements dans la liste
function renderEvents(events) {
  const eventList = document.getElementById('eventList');
  eventList.innerHTML = '';

  events.forEach(event => {
      const summary = event.getFirstPropertyValue('summary');
      const description = event.getFirstPropertyValue('description');
      const startDate = event.getFirstPropertyValue('dtstart').toString();

      const html = `
          <li>
              <button>${summary}</button>
              <ul>
                  <li>Description : ${description}</li>
                  <li>Date de début : ${startDate}</li>
              </ul>
          </li>
      `;
      eventList.innerHTML += html;
  });
}

// Écouteur d'événements pour le bouton "Charger les événements"
document.getElementById('load-ics').addEventListener('click', () => {
  const group = document.getElementById('group-select').value;
  loadEvents(group);
});
