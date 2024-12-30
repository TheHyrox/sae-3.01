<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'Utils/DBConfig/Database.php';

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

    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">

</head>
<body>
    <?php include 'Views/header.php'; ?>
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
    <?php include 'Views/footer.php'; ?>
    
</body>
</html>