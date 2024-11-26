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

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ical.js/1.4.0/ical.min.js'></script>
    <script src="../Script/agenda.js"></script>

    <link rel="stylesheet" href="../CSS/styles.css">

    <style>

        #agenda-titre {
            color: var(--green);
            text-align: center;
        }

        .fc-col-header-cell-cushion {
            color: var(--white);
        }

        .fc-view-harness.fc-view-harness-active {
            background-color: var(--secondary); 
            height: 700px !important; 
        }

        .fc-timegrid-axis-cushion.fc-scrollgrid-shrink-cushion.fc-scrollgrid-sync-inner, .fc-timegrid-slot-label-cushion.fc-scrollgrid-shrink-cushion {
            color: var(--white);
            font-family: Josefin Sans;
        }

        .fc-today-button.fc-button.fc-button-primary, .fc-prev-button, .fc-next-button {
            background: var(--linearClassic);
            font-family: Josefin Sans;
            color: var(--white);
        }

        #calendar {
            background-color: var(--primary);
            padding: 1%;
            border-radius: 10px;
            color: var(--white);
        }

        .group-select-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }

        .group-select-container label {
            font-size: 1.2em;
            color: var(--green);
            font-family: Josefin Sans;
            margin-bottom: 10px;
            text-align: center;
        }

        .select-button-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Adjust the gap as needed */
            width: 100%;
        }

        .group-select-container select {
            padding: 10px;
            font-size: 1em;
            border: 2px solid var(--green);
            border-radius: 5px;
            background-color: var(--primary);
            color: var(--white);
            width: auto; /* Adjust width as needed */
        }

        .group-select-container button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: var(--green);
            color: var(--white);
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: auto; /* Adjust width as needed */
        }

    </style>

    <style data-fullcalendar="">
        :root {
            --fc-border-color: #192025 ;
        }
    </style>

</head>
<body>
    <?php include '../Views/header.php'; ?>
    <main>
        <h1 id="agenda-titre">Agenda</h1>

        <?php if ($groupTP === null): ?>
    
            <div class="group-select-container">
                <label for="group-select">&emsp;Choisissez un groupe :</label>
                <div class="select-button-container">
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
            </div>

        <?php else: ?>
            <input type="hidden" id="group-tp" value="<?php echo htmlspecialchars($groupTP); ?>">
        <?php endif; ?>

        <div id="calendar"></div>


    </main>
    <?php include '../Views/footer.php'; ?>
    
</body>
</html>