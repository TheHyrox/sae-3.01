<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Membres</title>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <div class="panel-list-member">
            <article id="settings">
                <h2>Options</h2>
                <label class="switch switch-text">
                    <input type="checkbox" id="memberRoleSwitch" name="demoCheckBox">
                    <span class="s-text"></span>
                    <span></span>
                </label>
                <ul>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showMembersSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>Voir les membres</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showAdminsSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>Voir les administrateurs</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut1Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT1</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut2Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT2</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="showBut3Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT3</p>
                    </li>
                </ul>
            </article>
            <article id="list-member">
                <h2>Liste des membres</h2>
                <div id="research">
                    <form action="" method="post">
                        <input type="text" name="research" id="research" placeholder="Rechercher..." required>
                        <button type="submit" value="search"><img src="../Icons/search.png" alt=""></button>
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
        </div>
    </main>

    <script src="../Script/script.js"></script>
</body>
</html>
