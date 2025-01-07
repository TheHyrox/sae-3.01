document.addEventListener('DOMContentLoaded', () => {

    const COLORS = {
        PRIMARY: '#192025',
        SECONDARY: '#040D12',
        GREEN: '#4EB674',
        ORANGE: '#D97D12',
        LINEAR_CLASSIC: 'linear-gradient(90deg, rgba(0, 151, 178, 1) 0%, rgba(32, 164, 153, 1) 27%, rgba(78, 182, 116, 1) 100%)',
        LINEAR_ADMIN: 'linear-gradient(90deg, rgba(217, 125, 18, 1) 0%, rgba(233, 83, 19, 1) 27%, rgba(237, 40, 217, 1) 100%)',
        WHITE: '#faf0e6',
        RED: '#E95313'
    };


    const resourceIds = {
        '11A': 282,
        '11B': 567,
        '12C': 861,
        '12D': 869,
        '21A': 2667,
        '21B': 2668,
        '22C': 3113,
        '22D': 3115,
        '31A': 5269,
        '31B': 5419,
        '32C': 6239,
        '32D': 6241
    };

    function getDownloadLink(group) {
        const resourceId = resourceIds[group];
        const baseUrl = 'http://planning.univ-lemans.fr/jsp/custom/modules/plannings/anonymous_cal.jsp';
        const params = `resources=${resourceId}&projectId=7&calType=ical&nbWeeks=4`;
        return `${baseUrl}?${params}`;
    }

    function loadEvents(group) {
        const urlIcal = `Script/proxy.php?url=${encodeURIComponent(getDownloadLink(group))}`;
        fetch(urlIcal)
            .then(response => response.text())
            .then(data => {
                const jcalData = ICAL.parse(data);
                const comp = new ICAL.Component(jcalData);
                const vevents = comp.getAllSubcomponents('vevent');
                const events = vevents.map(event => {
                    const summary = event.getFirstPropertyValue('summary');
                    const location = event.getFirstPropertyValue('location');
                    const startDate = new Date(event.getFirstPropertyValue('dtstart').toString());
                    const endDate = new Date(event.getFirstPropertyValue('dtend').toString());

                    startDate.setHours(startDate.getHours() + 1);
                    endDate.setHours(endDate.getHours() + 1);

                    return {
                        id: String(Math.random()),
                        title: summary,
                        start: startDate,
                        end: endDate,
                        location: location,
                        allDay: false // Adjust this based on your event data
                    };
                });
                calendar.removeAllEvents();
                calendar.addEventSource(events);
            })
            .catch(error => console.error('Erreur lors du chargement des événements :', error));
    }

    const loadIcsButton = document.getElementById('load-ics');
    if (loadIcsButton) {
        loadIcsButton.addEventListener('click', () => {
            const groupSelect = document.getElementById('group-select');
            if (groupSelect) {
                loadEvents(groupSelect.value);
            }
        });
    }

    const groupTPInput = document.getElementById('group-tp');
    if (groupTPInput) {
        loadEvents(groupTPInput.value);
    }

    var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            weekends: false,
            allDaySlot: false,

            slotMinTime: '08:00:00',
            slotMaxTime: '22:00:00',
            
            slotDuration: '00:30:00',

            locale: 'fr',
            timeZone: 'Europe/Paris', 
            themeSystem: 'Cyborg',
            

            weekNumbers: true,
            weekText: 'S',

            eventColor: COLORS.GREEN,

        });


        calendar.render();

});