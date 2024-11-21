<?php
require '../Controllers/eventController.php';
$controller = new eventController();
$events = $controller->getEvents();

$eventsByMonth = [];

foreach ($events as $event) {
    $month = date('n', strtotime($event['Date_Event']));
    $eventsByMonth[$month][] = $event;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Anton">
    <title>ADIIL - Évènements</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
<main>
    <h2>Évènements</h2>
    <?php include '../Views/Event/eventView.php'; ?>
</main>
<?php include '../Views/footer.php'; ?>
</body>
</html>