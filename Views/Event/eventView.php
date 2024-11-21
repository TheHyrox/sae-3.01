<?php





$months = [
    9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre', 1 => 'Janvier', 2 => 'Février',
    3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
];
?>
    <div id="event">
        <div id="eventList">
            <ul>
                <?php foreach ($months as $num => $name): ?>
                    <li class="month">
                        <button class="monthBtn"><?= $name ?> <img src="../../Icons/arrow-down.png" alt=""></button>
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
        <?php
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
            include 'eventCardAdminView.php';
        } else {
            include 'eventCardView.php';
        }
        ?>
    </div>
<script src="../../Script/script.js"></script>