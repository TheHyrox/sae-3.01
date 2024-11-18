<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/account.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Compte</title>
</head>
<body>
<nav>
    <h2>Mon compte</h2>
    <ul>
        <li><a href="" class="red">Retour</a></li> <!--Faut garger la page précédante pour la rouvrir là -->
        <li><a href="">Mes informations personnelles</a></li>
        <li><a href="">Mes inscriptions</a></li>
        <li><a href="../Utils/logout.php" class="red">Déconnexion</a></li> <!-- Updated link to logout.php -->
    </ul>
</nav>
<main>
    <div>
        <h2>Mes informations personnelles</h2>
        <div>
            <div class="row">
                <p>Nom : </p>
                <h3>---</h3>
                <button class="icon"><img src="../Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Prénom : </p>
                <h3>---</h3>
                <button class="icon"><img src="../Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Adresse mail : </p>
                <h3>---</h3>
                <button class="icon"><img src="../Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Mot de passe : </p>
                <h3>******</h3>
                <button class="icon"><img src="../Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Groupe TP : </p>
                <h3>---</h3>
                <button class="icon"><img src="../Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Role : </p>
                <h3>---</h3>
            </div>
        </div>
        <div>
            <h2>Mes inscriptions</h2>
            <div class="row">
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
                <article>
                    <h2>event</h2>
                    <img src="" alt="">
                    <p>descr</p>
                    <form action="" method="post">
                        <input type="submit" value="Se déinscrire">
                    </form>
                </article>
            </div>
        </div>
    </div>
</main>
</body>
</html>