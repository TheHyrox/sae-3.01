<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Activités</title>
</head>
<body>
<?php include 'Views/header.php'; ?>

    <main>
        <div class="panel-activity">
            <article id="list-member">
                <h2>Liste des membres</h2>
                <div id="research">
                    <form action="" method="post">
                        <input type="text" name="research" id="research" placeholder="Rechercher..." required>
                        <button type="submit" value="search"><img src="Icons/search.png" alt=""></button>
                    </form>
                </div>
                <div id="list-result">
                    <div class="profil-bar">
                        <div>
                            <img src="../Pictures/DefaultProfilePicture.png" alt="">
                            <p>Nom Prénom - TP22C</p>
                        </div>
                        <form action="" method="post">
                            <button type="submit" value="id de la personne/grade">Voir</button>
                        </form>
                    </div>
                    <div class="profil-bar">
                        <div>
                            <img src="../Pictures/DefaultProfilePicture.png" alt="">
                            <p>Nom Prénom - TP22C</p>
                        </div>
                        <form action="" method="post">
                            <button type="submit" value="id de la personne/grade">Voir</button>
                        </form>
                    </div>
                </div>
            </article>
            <article id="activity">
                <h2>Activités globales</h2> <!-- "Activités du membre" si quelqu'un est selectionné -->
                <div id="activities">
                    <p>[HH:MM] - Name action</p>
                    <p>[HH:MM] - Name action</p>
                    <p>[HH:MM] - Name action</p>
                    <p>[HH:MM] - Name action</p>
                    <p>[HH:MM] - Name action</p>
                </div>
            </article>
        </div>
    </main>

    <script src="../Script/script.js"></script>
</body>
</html>
