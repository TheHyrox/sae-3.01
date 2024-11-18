<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
</head>
<body>
<header>
    <div><h1>ADIIL</h1>
        <ul>
            <li><a href="./index.php">accueil</a></li>
            <li><a href="./event.php">évènements</a></li>
            <li><a href="./shop.php">boutique</a></li>
            <li><a href="./agenda.html">agenda</a></li>
            <li><a href="./newsletter.php">newsletter</a></li>
            <li><a href="./checkout.php">panier</a></li>
        </ul>
    </div>
    <div>
        <!-- Hide if the user isn't connected with an admin account -->
        <label class="switch">
            <input type="checkbox"/>
            <span></span>
        </label>

        <?php if (isset($_SESSION['email'])): ?>
            <a href="../HTML/account.php">Mon compte</a>
        <?php else: ?>
            <a href="../HTML/login.php">Se connecter</a>
        <?php endif; ?>
        <!-- Put user picture -->
        <img src="../Pictures/defaultProfilePicture.png" alt="">

    </div>
</header>
</body>
</html>