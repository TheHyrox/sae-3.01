<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ical.js/1.3.0/ical.min.js"></script>
    <script src="/Script/agenda.js" defer></script>
    <style>
        :root {
            --primary: #192025;
            --secondary: #040D12;
            --green: #4EB674;
            --orange: #D97D12;
            --white: #faf0e6;
        }
    
        html, body {
            padding: 0;
            margin: 0;
            background-color: var(--secondary);
            color: var(--white);
            font-family: 'Josefin Sans', sans-serif;
        }
    
        h1 {
            text-align: center;
            margin: 20px 0;
            color: var(--green);
        }
    
        label, select, button {
            display: block;
            margin: 10px auto;
            font-size: 1.2em;
        }
    
        select, button {
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: var(--green);
            color: var(--white);
            cursor: pointer;
        }
    
        button:hover {
            background-color: var(--orange);
        }
    
        .week-navigation {
            display: flex;
            justify-content: flex-end;
            margin: 10px;
        }
    
        .week-navigation button {
            background-color: var(--green);
            color: var(--white);
            border: none;
            padding: 10px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
        }
    
        .week-navigation button:hover {
            background-color: var(--orange);
        }
    
        .schedule-container {
            position: relative;
            width: 90%;
            margin: 0 auto;
        }

        .time-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            position: relative;
        }

        .time-table th, .time-table td {
            border: 1px solid var(--primary);
            padding: 5px;
            text-align: center;
            vertical-align: top;
        }

        .time-table th {
            background-color: var(--primary);
            color: var(--white);
        }

        .time-table td {
            background-color: var(--secondary);
            height: 100px;
            position: relative;
            overflow: hidden;
        }

        .time-table td div {
            background-color: #9a4bff; /* Couleur de fond */
            color: #fff; /* Texte blanc */
            border-radius: 5px; /* Coins arrondis */
            padding: 5px;
            margin: 5px 0;
            font-size: 0.9em;
            text-align: center;
            overflow: hidden; /* Empêche le débordement */
            white-space: nowrap;
            text-overflow: ellipsis; /* Ajoute "..." si le texte est trop long */
        }


        #events-container {
            position: absolute;
            top: 2.20%;
            left: 0;
            width: 100%;
            height: 98%;
            display: flex;
            pointer-events: none;
        }

    
        /* Scroll bar */
        ::-webkit-scrollbar {
            width: 15px;
        }
    
        ::-webkit-scrollbar-track {
            background-color: var(--primary);
            border-radius: 2px;
        }
    
        ::-webkit-scrollbar-thumb {
            background-color: var(--green);
            border-radius: 2px;
        }
    
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
    
        th, td {
            border: 1px solid var(--white);
            padding: 10px;
            text-align: center;
        }
    
        .hour-column {
            width: 5%;
        }
    
        .day-column {
            width: 18%;
            height: 100%;
            top: 0;
            position: relative;
        }

        #event-heure {
            width: 5.55%;
        }

        #event-lundi, #event-mardi, #event-mercredi, #event-jeudi, #event-vendredi {
            width: 17.90%;
            padding: 1%;
        }

        .event {
            position: absolute;
            width: 98%;
            left: 1%;
            box-sizing: border-box;
            background-color: var(--primary);
            border: #4EB674 1px solid;
            border-radius: 5px;
        }

        p {
            margin: 0;
            text-align: center;
            padding: 5px;
        }

        .current-time-arrow {
            display: none;
            color: #D97D12;
            font-size: 1.5em;
            font-weight: bold;
        }

    </style>
    
</head>
<body>

    <?php include '../Views/header.php'; ?>

    <h1>Agenda</h1>
    <label for="group-select">Choisissez un groupe :</label>
    <select id="group-select">
        <option value="TP11A">TP11A</option>
        <option value="TP11B">TP11B</option>
        <option value="TP12C">TP12C</option>
        <option value="TP12D">TP12D</option>
        <option value="TP21A">TP21A</option>
        <option value="TP21B">TP21B</option>
        <option value="TP22C">TP22C</option>
        <option value="TP22D">TP22D</option>
        <option value="TP31A">TP31A</option>
        <option value="TP31B">TP31B</option>
        <option value="TP32C">TP32C</option>
        <option value="TP32D">TP32D</option>
    </select>
    <button id="load-ics">Charger les événements</button>

    <div class="week-navigation">
        <button id="prev-week">&larr; Semaine précédente</button>
        <button id="today">Aujourd'hui</button>
        <button id="next-week">Semaine suivante &rarr;</button>
    </div>

    <h2>Liste des événements</h2>
    <div class="schedule-container">
    <table class="time-table">
        <thead>
            <tr>
                <th class="hour-column">Heure</th>
                <th class="day-column">Lundi <span id="monday-date"></span></th>
                <th class="day-column">Mardi <span id="tuesday-date"></span></th>
                <th class="day-column">Mercredi <span id="wednesday-date"></span></th>
                <th class="day-column">Jeudi <span id="thursday-date"></span></th>
                <th class="day-column">Vendredi <span id="friday-date"></span></th>
            </tr>
        </thead>
        <tbody id="time-table-body">
            <tr>
                <td>8:00 <span class="current-time-arrow" id="arrow-8"></span></td>
                <td id="monday-8"></td>
                <td id="tuesday-8"></td>
                <td id="wednesday-8"></td>
                <td id="thursday-8"></td>
                <td id="friday-8"></td>
            </tr>
            <tr>
                <td>9:00 <span class="current-time-arrow" id="arrow-9"></span></td>
                <td id="monday-9"></td>
                <td id="tuesday-9"></td>
                <td id="wednesday-9"></td>
                <td id="thursday-9"></td>
                <td id="friday-9"></td>
            </tr>
            <tr>
                <td>10:00 <span class="current-time-arrow" id="arrow-10"></span></td>
                <td id="monday-10"></td>
                <td id="tuesday-10"></td>
                <td id="wednesday-10"></td>
                <td id="thursday-10"></td>
                <td id="friday-10"></td>
            </tr>
            <tr>
                <td>11:00 <span class="current-time-arrow" id="arrow-11"></span></td>
                <td id="monday-11"></td>
                <td id="tuesday-11"></td>
                <td id="wednesday-11"></td>
                <td id="thursday-11"></td>
                <td id="friday-11"></td>
            </tr>
            <tr>
                <td>12:00 <span class="current-time-arrow" id="arrow-12"></span></td>
                <td id="monday-12"></td>
                <td id="tuesday-12"></td>
                <td id="wednesday-12"></td>
                <td id="thursday-12"></td>
                <td id="friday-12"></td>
            </tr>
            <tr>
                <td>13:00 <span class="current-time-arrow" id="arrow-13"></span></td>
                <td id="monday-13"></td>
                <td id="tuesday-13"></td>
                <td id="wednesday-13"></td>
                <td id="thursday-13"></td>
                <td id="friday-13"></td>
            </tr>
            <tr>
                <td>14:00 <span class="current-time-arrow" id="arrow-14"></span></td>
                <td id="monday-14"></td>
                <td id="tuesday-14"></td>
                <td id="wednesday-14"></td>
                <td id="thursday-14"></td>
                <td id="friday-14"></td>
            </tr>
            <tr>
                <td>15:00 <span class="current-time-arrow" id="arrow-15"></span></td>
                <td id="monday-15"></td>
                <td id="tuesday-15"></td>
                <td id="wednesday-15"></td>
                <td id="thursday-15"></td>
                <td id="friday-15"></td>
            </tr>
            <tr>
                <td>16:00 <span class="current-time-arrow" id="arrow-16"></span></td>
                <td id="monday-16"></td>
                <td id="tuesday-16"></td>
                <td id="wednesday-16"></td>
                <td id="thursday-16"></td>
                <td id="friday-16"></td>
            </tr>
            <tr>
                <td>17:00 <span class="current-time-arrow" id="arrow-17"></span></td>
                <td id="monday-17"></td>
                <td id="tuesday-17"></td>
                <td id="wednesday-17"></td>
                <td id="thursday-17"></td>
                <td id="friday-17"></td>
            </tr>
            <tr>
                <td>18:00 <span class="current-time-arrow" id="arrow-18"></span></td>
                <td id="monday-18"></td>
                <td id="tuesday-18"></td>
                <td id="wednesday-18"></td>
                <td id="thursday-18"></td>
                <td id="friday-18"></td>
            </tr>
            <tr>
                <td>19:00 <span class="current-time-arrow" id="arrow-19"></span></td>
                <td id="monday-19"></td>
                <td id="tuesday-19"></td>
                <td id="wednesday-19"></td>
                <td id="thursday-19"></td>
                <td id="friday-19"></td>
            </tr>
        </tbody>
    </table>
    <div id="events-container">
        <div id="event-heure" class="day-column"></div>
        <div id="event-lundi" class="day-column"></div>
        <div id="event-mardi" class="day-column"></div>
        <div id="event-mercredi" class="day-column"></div>
        <div id="event-jeudi" class="day-column"></div>
        <div id="event-vendredi" class="day-column"></div>
        <div id="current-time-line" style="position: absolute; width: 100%; height: 2px; background-color: #D97D12; z-index: 1;"></div>
    </div>

</body>
<?php include '../Views/footer.php'; ?>
</html>