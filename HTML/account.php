<?php
if (!isset($_SESSION)) {
    session_start();
}

require '../Controllers/accountController.php';

$accountController = new accountController();
$userEvents = $accountController->getUserEvents($_SESSION['Id_User']);

if (isset($_POST['saveNom'])){
    var_dump($_POST['saveNom']);
    $accountController->setNom($_POST['saveNom']);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/account.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Compte</title>
</head>
<body>
<nav class="nav-links">
    <h2>Mon compte</h2>
    <ul>
        <li><a href="" class="red">Retour</a></li> <!--Faut garger la page précédante pour la rouvrir là -->
        <li><a href="#info-perso">Mes informations personnelles</a></li>
        <li><a href="#inscr">Mes inscriptions</a></li>
        <li><a href="Utils/logout.php" class="red">Déconnexion</a></li> <!-- Updated link to logout.php -->
    </ul>
</nav>
<button class="burger-menu">
    <img src="Icons/arrow-right.png" alt="">
</button>
<main>
    <?php $user = $accountController->getUserByEmail($_SESSION['email']) ?>
    <div>
        <h2 id="info-perso">Mes informations personnelles</h2>
        <div>
            <div class="row">
                <p>Nom : </p>
                <?php if(isset($_POST['setNom'])): ?>
                    <form method="post">
                        <input type="text" name="saveNom" id="setNom" placeholder="Nom">
                        <input type="submit" value="sauvegarder">
                    </form>
                <?php else: ?>
                    <?php echo '<h3>'.$user['Nom_User'].'</h3>' ?>
                    <form method="post">
                        <input type="hidden" name="setNom">
                        <button class="icon" type="submit"><img src="Icons/edit.png" alt=""></button>
                    </form>
                <?php endif ?>
            </div>
            <div class="row">
                <p>Prénom : </p>
                <?php echo '<h3>'.$user['Prenom_User'].'</h3>' ?>
                <button class="icon"><img src="Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Adresse mail : </p>
                <?php echo '<h3>'.$user['Mail_User'].'</h3>' ?>
                <button class="icon"><img src="Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Mot de passe : </p>
                <h3>**********</h3>
                <button class="icon"><img src="Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Groupe TP : </p>
                <?php echo '<h3>'.$user['Grp_TP_User'].'</h3>' ?>
                <button class="icon"><img src="Icons/edit.png" alt=""></button>
            </div>
            <div class="row">
                <p>Role : </p>
                <?php echo '<h3>'.$user['Titre_User'].'</h3>' ?>
            </div>
        </div>
        <div class="events">
            <h2 id="inscr">Mes inscriptions</h2>
            <div class="row">
                <?php foreach ($userEvents as $event): ?>
                    <article>
                        <h2><?= htmlspecialchars($event['Nom_Event']) ?></h2>
                        <img src="<?= htmlspecialchars($event['URL_Img_Event']) ?>" alt="">
                        <p><?= htmlspecialchars($event['Desc_Event']) ?></p>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $event['Id_Event'] ?>">
                            <input type="submit" name="unsubscribe" value="Se désinscrire">
                        </form>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<script src="../Script/script.js"></script>
</body>
</html>