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
  
// Fonction qui télécharge les fichiers .ics sur le serveur
  function downloadIcsFiles() {
    const groups = Object.keys(resourceIds);
    groups.forEach(group => {
      const link = getDownloadLink(group);
      fetch(link, {
        mode: 'no-cors'
      })
        .then(response => response.text())
        .then(data => {
          const filename = `../Calendar/${group}.ics`;
          const blob = new Blob([data], {type: 'text/calendar'});
          const url = URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = filename;
          a.click();
        })
        .catch(error => console.error('Erreur lors du téléchargement du fichier :', error));
    });
  }
  
// Fonction qui charge les événements depuis les fichiers .ics
  function loadEvents(group) {
    const filename = `../Calendar/${group}.ics`;
    fetch(filename)
      .then(response => response.text())
      .then(data => {
        const events = parseIcs(data);
        renderEvents(events);
      })
      .catch(error => console.error('Erreur lors du chargement du fichier :', error));
  }
  
  // Fonction qui parse le fichier .ics
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
  
  // Fonction qui affiche les événements
  function renderEvents(events) {
    const eventList = document.getElementById('eventList');
    eventList.innerHTML = '';
  
    events.forEach(event => {
      const html = `
        <li>
          <button>${event.SUMMARY}</button>
          <ul>
            <li>${event.DESCRIPTION}</li>
          </ul>
        </li>
      `;
      eventList.innerHTML += html;
    });
  }
  
  // Appel de la fonction pour télécharger les fichiers .ics
  downloadIcsFiles();
  
  // Écouteur d'événements pour le bouton de chargement des événements
  document.getElementById('load-ics').addEventListener('click', () => {
    const group = document.getElementById('group-select').value;
    loadEvents(group);
  });