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
            let professor = professorMatch ? professorMatch[1] : 'N/A';
            if (professor.includes('Exported')) {
                professor = 'N/A';
            }

            const durationInMinutes = (endHour * 60 + endMinutes) - (startHour * 60 + startMinutes);
            
            let height = 0;
            let fontsize = 0;
            let marginTop = 3.556;


            switch (durationInMinutes) {
                case 240:
                    height = 24.7;
                    break;
                case 210:
                    height = 21.8;
                    break;
                case 180:
                    height = 18.5;
                    break;
                case 150:
                    height = 15.621;
                    break;
                case 120:
                    height = 12.257;
                    break;
                case 90:
                    height = 9.207; // 9.507 de hauteur réelle si boite complète et 9.207 si boite pas collé avec 2px mac 
                    fontsize = 95;
                    break;
                case 60:
                    height = 6; 
                    fontsize = 75;
                    break;
                case 30:
                    height = 3;
                    fontsize = 0.1;
                    marginTop = 2.4;
                    break;
                default:
                    height = (durationInMinutes / 60) * (100 / 11);
                    break;
            }

            const topPositionMap = {
                8.0: -0.50, 
                8.25: 1.43, 
                8.5: 2.50, 
                8.75: 4.15, 
                9.0: 5.75, 
                9.25: 7.13, 
                9.5: 8.80, 
                9.75: 14.32, 
                10.0: 12.00, 
                10.25: 18.41, 
                10.5: 15.02, 
                10.75: 16.42, 
                11.0: 18.28, 
                11.25: 19.77, 
                11.5: 21.27, 
                11.75: 22.76, 
                12.0: 24.26, 
                12.25: 25.75, 
                12.5: 27.43, 
                12.75: 29.12, 
                13.0: 30.80, 
                13.25: 32.20, 
                13.5: 33.90, 
                13.75: 35.25, 
                14.0: 37.05, 
                14.25: 38.60, 
                14.5: 40.16, 
                14.75: 41.71, 
                15.0: 43.26, 
                15.25: 44.85, 
                15.5: 46.43, 
                15.75: 48.02, 
                16.0: 49.60,
                16.25: 51.19, 
                16.5: 52.77, 
                16.75: 54.36, 
                17.0: 55.94, 
                17.25: 57.53, 
                17.5: 59.11, 
                17.75: 60.70, 
                18.0: 62.28, 
                18.25: 63.87, 
                18.5: 65.45, 
                18.75: 67.04, 
                19.0: 68.62, 
                19.25: 70.21, 
                19.5: 71.79, 
                19.75: 73.38, 
                20.0: 74.96
            };
            
            const topPosition = topPositionMap[startDecimalHour] || 150;

            const html = `
            <div class="event" style="top: ${topPosition}%; height: ${height}%">
                    <button style="width: 95%; margin-bottom:0; margin-top: ${marginTop}%">${summary}</button>
                    ${durationInMinutes !== 30 ? `<p style="margin-left: 2.5%; margin-right: 2%; font-size:${fontsize || 100}%">${location} - ${professor}<br/>${startHour}h${startMinutes.toString().padStart(2, '0')} - ${endHour}h${endMinutes.toString().padStart(2, '0')}</p>` : ''}
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

    function updateCurrentTimeLine() {
        const now = new Date();
        const currentHour = now.getHours();
        const currentMinutes = now.getMinutes();
        const totalMinutes = (currentHour - 8) * 60 + currentMinutes; 
        const percentageOfDay = (totalMinutes / (11 * 60)) * 100; 
        const currentTimeLine = document.getElementById('current-time-line');
        const currentTimeArrow = document.getElementById(`arrow-${currentHour}`);
    
        document.querySelectorAll('.current-time-arrow').forEach(arrow => {
            arrow.style.display = 'none';
        });

        if (currentTimeArrow) {
            currentTimeArrow.style.display = 'inline';
            currentTimeArrow.textContent = '>';
        }
    
        currentTimeLine.style.top = `${percentageOfDay}%`;
        currentTimeLine.style.display = 'none';
    
        const day = now.getDay();
        const days = {
            1: 'lundi',
            2: 'mardi',
            3: 'mercredi',
            4: 'jeudi',
            5: 'vendredi'
        };
    
        if (days[day]) {
            const eventsContainer = document.getElementById(`event-${days[day]}`);
            const events = eventsContainer.querySelectorAll('.event');
            events.forEach(event => {
                const eventTop = parseFloat(event.style.top);
                const eventHeight = parseFloat(event.style.height);
                if (percentageOfDay >= eventTop && percentageOfDay <= (eventTop + eventHeight)) {
                    currentTimeLine.style.display = 'block';
                    currentTimeLine.style.top = `${percentageOfDay}%`;
                    currentTimeLine.style.left = `${eventsContainer.offsetLeft}px`;
                    currentTimeLine.style.width = `${eventsContainer.offsetWidth}px`;
                }
            });
        }
    }
    
    document.getElementById('prev-week').addEventListener('click', () => {
        currentWeekStart.setDate(currentWeekStart.getDate() - 7);
        loadEvents(document.getElementById('group-select').value);
    });
    
    document.getElementById('next-week').addEventListener('click', () => {
        currentWeekStart.setDate(currentWeekStart.getDate() + 7);
        loadEvents(document.getElementById('group-select').value);
    });
    
    document.getElementById('today').addEventListener('click', () => {
        currentWeekStart = getWeekStart(new Date()); 
        loadEvents(document.getElementById('group-select').value);
    });
    
    document.getElementById('load-ics').addEventListener('click', () => {
        currentWeekStart = getWeekStart(new Date()); 
        loadEvents(document.getElementById('group-select').value);
    });
    
    setInterval(updateCurrentTimeLine, 1000); 
    updateCurrentTimeLine(); 
});