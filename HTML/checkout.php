<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Panier</title>
</head>
<body>
<?php include '../Views/header.html'; ?>
    <main>
        <article id="panier">
            <h2>Panier</h2>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                </tr>
                <tr>
                    <td>Grade diamant</td>
                    <td>13€</td>
                    <td><!-- truc quantité --></td>
                </tr>
                <tr>
                    <td>Grade diamant</td>
                    <td>13€</td>
                    <td><!-- truc quantité --></td>
                </tr>
            </table>
            <div id="total">
                <p>Total</p>
                <h3>150€</h3>
            </div>
        </article>
        <article id="paiement">
            <h2>Paiement</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Informations personnelles</th>
                        <th>Adresse</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="fname" id="fname" placeholder="Nom" required></td>
                        <td><input type="text" name="adress" id="adress" placeholder="Adresse (N° de rue et nom)" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="lname" id="lname" placeholder="Prénom" required></td>
                        <td><input type="text" name="city" id="city" placeholder="Ville" required></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" id="email" placeholder="Adresse Mail (univ-lemans)" required></td>
                        <td><input type="text" name="city-code" id="city-code" pattern="[0-9]{5}" placeholder="Code postal" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="birthday" name="birthday" pattern="\d{2}-\d{2}-\d{4}" placeholder="Date de naissance (JJ-MM-AAAA)" required></td>
                        <td><input type="submit" value="Acheter"></td>
                    </tr>
                </table>
            </form>
            
        </article>
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
