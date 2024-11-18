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
<?php include '../Views/header.html'; ?>
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

    <footer>
        <div>
            <h2>
                Mentions légales
            </h2>
            <div>
                <h3>Éditeur</h3>
                <p>
                    Le site bdeinfo.fr est édité par l'association ADIIL, association loi 1901, dont le siège social est situé au 52 rue des Docteurs Calmette et Guérin, 53000 Laval. L'association ADIIL est un Bureau Des Etudiants et vise à améliorer la vie étudiante au sein de l'IUT de Laval. L'association est représentée par son président.
                </p>
            </div>
            <div>
                <h3>Cookies</h3>
                <p>
                    Lors de votre navigation sur le site, des cookies sont déposés sur votre ordinateur, votre mobile ou votre tablette. Nous n'utilisons aucun cookie à des fins publicitaires ou à des fins de récupération de données personnelles. Les cookies que nous utilisons nous permettent de vous proposer une meilleure expérience utilisateur.
                </p>
            </div>
            <div>
                <h3>Données personnelles</h3>
                <p>
                    Les données personnelles que vous nous communiquez sont utilisées dans le cadre de votre utilisation du site. Elles ne sont pas transmises à des tiers. Les données personnelles collectées sont les suivantes : nom, prénom, adresse mail, groupe TP et mot de passe. Les données personnelles collectées sont utilisées pour une utilisation du site optimale. Les données personnelles collectées sont conservées pendant une durée de 1 an. Vous pouvez à tout moment demander la suppression de vos données personnelles en nous contactant
                </p>
            </div>
        </div>
        <div>
            <h2>
                Contacts
            </h2>
            <div id="contact">
                <div>
                    <button class="icon"><img src="../Icons/discord.png" alt=""></button>
                    <button class="icon"><img src="../Icons/facebook.png" alt=""></button>
                    <button class="icon"><img src="../Icons/instagram.png" alt=""></button>
                    <button class="icon"><img src="../Icons/faq.png" alt=""></button>
                </div>
                <div>
                    <img src="../Icons/tel.png" alt="">
                    <p>07 67 10 39 95</p>
                </div>
                <div>
                    <img src="../Icons/mail.png" alt="">
                    <p>adill@univ-lemans.fr</p>
                </div>
                <form action="" method="post">
                    <input type="submit" value="Faire un feelback">
                </form>
            </div>
        </div>
    </footer>
    <script src="../Script/script.js"></script>
</body>
</html>
