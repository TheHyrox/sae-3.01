<?php
include '../Views/header.php';
require '../Controllers/eventController.php';

$controller = new eventController();
$events = $controller->getEvents();
$eventsByMonth = [];

foreach ($events as $event) {
    $month = date('n', strtotime($event['Date_Event']));
    $eventsByMonth[$month][] = $event;
}

$months = [
    9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre', 1 => 'Janvier', 2 => 'Février',
    3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
];
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
<main>
    <h2>Évènements</h2>
    <div id="event">
        <div id="eventList">
            <ul>
                <?php foreach ($months as $num => $name): ?>
                    <li class="month">
                        <button class="monthBtn"><?= $name ?> <img src="../Icons/arrow-down.png" alt=""></button>
                        <?php if (isset($eventsByMonth[$num])): ?>
                            <ul class="eventList">
                                <?php foreach ($eventsByMonth[$num] as $event): ?>
                                    <li class="eventItem" data-id="<?= $event['Id_Event'] ?>" data-name="<?= htmlspecialchars($event['Nom_Event']) ?>" data-date="<?= date('d/m/Y', strtotime($event['Date_Event'])) ?>" data-description="Description de l'événement">
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $event['Id_Event'] ?>">
                                            <input type="submit" name="event" value="<?= htmlspecialchars($event['Nom_Event']) ?>">
                                        </form>
                                        <p><?= date('d/m/Y', strtotime($event['Date_Event'])) ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <article id="eventDetails">
            <h2>Nom évènement</h2>
            <img src="../Pictures/soiree-jeux.webp" alt="image">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quisquam aspernatur assumenda excepturi, architecto sit ipsum odit adipisci eveniet provident, consectetur reprehenderit quidem illo! Eligendi a adipisci magnam dolores repellendus!</p>
            <div class="row">
                <form action="" method="post">
                    <input type="submit" value="Participer">
                </form>
                <h3>3€</h3>
            </div>
        </article>
    </div>
</main>
<?php include '../Views/footer.php'; ?>
<script src="../Script/script.js"></script>
</body>
</html>