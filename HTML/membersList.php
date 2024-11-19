<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/adminStyles.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Membres</title>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <div class="row">
            <article id="option">
                <h2>Options</h2>
                <ul>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="ShowMembersSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>Voir les membres</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="ShowAdminsSwitch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>Voir les administrateurs</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="ShowBut1Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT1</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="ShowBut2Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT2</p>
                    </li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="ShowBut3Switch" name="demoCheckBox">
                            <span></span>
                        </label>
                        <p>BUT3</p>
                    </li>
                </ul>
            </article>
            <article id="list-management">
                <h2>Liste des membres</h2>
                <div id="research">
                    <form action="" method="post">
                        <input type="text" name="research" id="research" placeholder="Rechercher..." required>
                        <button type="submit" value="search"><img src="../Icons/search.png" alt=""></button>
                    </form>
                </div>
            </article>
        </div>
    </main>

    <script src="../Script/script.js"></script>
</body>
</html>
