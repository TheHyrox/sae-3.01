document.addEventListener('DOMContentLoaded', () => {
    let currentWeekStart = new Date(); 

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

    function getDownloadLink(group) {
        const resourceId = resourceIds[group];
        const baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
        const params = `resources=${resourceId}&projectId=7&calType=ical&nbWeeks=4`;
        return `${baseUrl}?${params}`;
    }

    function getWeekStart(date) {
        const day = date.getDay();
        const diff = date.getDate() - day + (day === 0 ? -6 : 1);
        return new Date(date.setDate(diff));
    }

    function setWeekDates(startDate) {
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        days.forEach((day, index) => {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + index);
            document.getElementById(`${day}-date`).textContent = date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'short' });
        });
    }

    function renderEvents(events) {
        const days = {
            1: 'lundi',
            2: 'mardi',
            3: 'mercredi',
            4: 'jeudi',
            5: 'vendredi'
        };

        Object.values(days).forEach(day => {
            document.getElementById(`event-${day}`).innerHTML = '';
        });

        events.sort((a, b) => {
            const startA = new Date(a.getFirstPropertyValue('dtstart').toString());
            const startB = new Date(b.getFirstPropertyValue('dtstart').toString());
            return startA - startB;
        });

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
            const startDecimalHour = startHour + (startMinutes / 60);
            const professorMatch = description.match(/\n\n(?:Grp \d+\w+|BUT INFO1|TD\d+)\n(.+?)\n/);
            const professor = professorMatch ? professorMatch[1] : 'N/A';

            const durationInMinutes = (endHour * 60 + endMinutes) - (startHour * 60 + startMinutes);
            
            let height = 0;
            let fontsize = 0;

            switch (durationInMinutes) {
                case 180:
                    height = 24.43;
                    break;
                case 150:
                    height = 20,3583333332;
                    break;
                case 120:
                    height = 16,2866666666;
                    break;
                case 90:
                    height = 12,215;
                    break;
                case 60:
                    height = 8,1433333333;
                    fontsize = 75;
                    break;
                default:
                    height = (durationInMinutes / 60) * (100 / 11);
                    break;
            }

            const topPositionMap = {
                8: 0,
                8.25: 2.045,
                8.5: 4.09,
                8.75: 6.135,
                9: 8.18,
                9.25: 10.225,
                9.5: 12.27,
                9.75: 14.315,
                10: 16.36,
                10.25: 18.405,
                10.5: 20.45,
                10.75: 22.495,
                11: 24.54,
                11.25: 26.585,
                11.5: 28.63,
                11.75: 30.675,
                12: 32.72,
                12.25: 34.765,
                12.5: 36.81,
                12.75: 38.855,
                13: 40.9,
                13.25: 42.945,
                13.5: 44.99,
                13.75: 47.035,
                14: 49.08,
                14.25: 51.125,
                14.5: 53.17,
                14.75: 55.215,
                15: 57.26,
                15.25: 59.305,
                15.5: 61.35,
                15.75: 63.395,
                16: 65.44,
                16.25: 67.485,
                16.5: 69.53,
                16.75: 71.575,
                17: 73.62,
                17.25: 75.665,
                17.5: 77.71,
                17.75: 79.755,
                18: 81.8,
                18.25: 83.845,
                18.5: 85.89,
                18.75: 87.935,
                19: 89.98,
                19.25: 92.025,
                19.5: 94.07,
                19.75: 96.115,
            };
            
            const topPosition = topPositionMap[startDecimalHour] || 0;


            const html = `
                <div class="event" style="top: ${topPosition}%; height: ${height}%">
                    <button style="width: 95%; margin-bottom:0">${summary}</button>
                    <p style="margin-left: 2.5%; margin-right: 2%; font-size:${fontsize || 100}%">${location} - ${professor}<br/>${startHour}h${startMinutes.toString().padStart(2, '0')} - ${endHour}h${endMinutes.toString().padStart(2, '0')}</p>
                </div>
            `;

            const weekStart = getWeekStart(new Date(currentWeekStart));
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekEnd.getDate() + 4); 

            if (startDate >= weekStart && startDate <= weekEnd && days[day]) {
                document.getElementById(`event-${days[day]}`).insertAdjacentHTML('beforeend', html);
            }
        });

        setWeekDates(currentWeekStart);
    }

    function loadEvents(group) {
        const url = `../Script/proxy.php?url=${encodeURIComponent(getDownloadLink(group))}`;
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const jcalData = ICAL.parse(data);
                const comp = new ICAL.Component(jcalData);
                const vevents = comp.getAllSubcomponents('vevent');
                renderEvents(vevents);
            })
            .catch(error => console.error('Erreur lors du chargement des événements :', error));
    }

    document.getElementById('prev-week').addEventListener('click', () => {
        currentWeekStart.setDate(currentWeekStart.getDate() - 7);
        loadEvents(document.getElementById('group-select').value);
    });

    document.getElementById('next-week').addEventListener('click', () => {
        currentWeekStart.setDate(currentWeekStart.getDate() + 7);
        loadEvents(document.getElementById('group-select').value);
    });

    document.getElementById('load-ics').addEventListener('click', () => {
        currentWeekStart = getWeekStart(new Date()); // Reset to current week
        loadEvents(document.getElementById('group-select').value);
    });
});