<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Évènements</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
    <main>
        <div id="event">
            <div id="eventList">
                <ul>
                    <li class="month"><button class="monthBtn">Août <img src="../Icons/arrow-down.png" alt=""></button>
                        <ul>
                            <li>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="submit" name="event"value="Event name">
                                </form>
                                <p>01/09/2024</p>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="submit" name="event"value="Event name">
                                </form>
                                <p>01/09/2024</p>
                            </li>
                        </ul>
                    </li>
                    <li class="month"><button class="monthBtn">Septembre <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Octobre <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Novembre <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Décembre <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Janvier <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Février <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Mars <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Avril <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Mai <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Juin <img src="../Icons/arrow-down.png" alt=""></button></li>
                    <li class="month"><button class="monthBtn">Juillet <img src="../Icons/arrow-down.png" alt=""></button></li>
                </ul>
            </div>
            <article>
                <h2>
                    Nom évènement
                </h2>
                <img src="../Pictures/soiree-jeux.webp" alt="image">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quisquam aspernatur assumenda excepturi, architecto sit ipsum odit adipisci eveniet provident, consectetur reprehenderit quidem illo! Eligendi a adipisci magnam dolores repellendus!</p>
                
                <div class="row">
                    <form action="" method="post">
                        <input type="submit" value="Participer">
                    </form>
                    <h3>
                        3€
                    </h3>
                </div>
            </article>
        </div>
    </main>
    <?php include '../Views/footer.php'; ?>
    <script src="../Script/script.js"></script>
</body>
</html>
