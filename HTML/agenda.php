<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../Utils/DBConfig/Database.php';

$groupTP = $_SESSION['groupeTP'] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADIIL - Agenda</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ical.js/1.3.0/ical.min.js"></script>
    <script src="/Script/agenda.js" defer></script>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body id="agenda-page">
    <?php include '../Views/header.php'; ?>
    <h1 id="titre">Agenda</h1>
    <?php if ($groupTP === null): ?>
    <div class="group-select-container">
        <label for="group-select">&emsp;Choisissez un groupe :</label>
        <select id="group-select">
            <option value="11A">11A</option>
            <option value="11B">11B</option>
            <option value="12C">12C</option>
            <option value="12D">12D</option>
            <option value="21A">21A</option>
            <option value="21B">21B</option>
            <option value="22C">22C</option>
            <option value="22D">22D</option>
            <option value="31A">31A</option>
            <option value="31B">31B</option>
            <option value="32C">32C</option>
            <option value="32D">32D</option>
        </select>
        <button id="load-ics">Charger les événements</button>
    </div>
    <?php else: ?>
        <input type="hidden" id="group-tp" value="<?php echo htmlspecialchars($groupTP); ?>">
    <?php endif; ?>

    <div class="week-navigation">
        <button id="prev-week">&larr; Semaine précédente</button>
        <button id="today">Aujourd'hui</button>
        <button id="next-week">Semaine suivante &rarr;</button>
    </div>
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
            <div id="event-heure" class="hour-column"></div>
            <div id="event-lundi" class="day-column"></div>
            <div id="event-mardi" class="day-column"></div>
            <div id="event-mercredi" class="day-column"></div>
            <div id="event-jeudi" class="day-column"></div>
            <div id="event-vendredi" class="day-column"></div>
            <div id="current-time-line" style="position: absolute; width: 100%; height: 2px; background-color: orange;"></div>
        </div>
        <?php include '../Views/footer.php'; ?>
</body>

</html>