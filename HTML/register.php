<?php
require '../Controllers/registerController.php';
$controller = new registerController();
$controller->registerRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ADIIL</title>
    <link rel="stylesheet" href="../CSS/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton" />
</head>
<body>
<header>
    <div>
        <h1>ADIIL</h1>
        <ul>
            <li><a href="./index.html">accueil</a></li>
            <li><a href="./event.html">évènements</a></li>
            <li><a href="./shop.html">boutique</a></li>
            <li><a href="./agenda.html">agenda</a></li>
            <li><a href="./newsletter.html">newsletter</a></li>
            <li><a href="./checkout.html">panier</a></li>
        </ul>
    </div>
    <div>
        <!-- Hide if the user isn't connected with an admin account -->
        <label class="switch">
            <input type="checkbox" />
            <span></span>
        </label>

        <a href="">Mon compte</a>
        <!-- Put user picture -->
        <img src="../Pictures/defaultProfilePicture.png" alt="" />
    </div>
</header>
<main>
    <div class="login-register">
        <div>
            <form class="form-login" action="./register.php" method="POST" name="registerUser">
                <h2>Connexion</h2>
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <label for="password_verify">Confirmation mot de passe</label>
                <input type="password" id="password_verify" name="password_verify" required>
                <label for="tp-select">Groupe TP</label>
                <select id="tp-select" name="tp">
                    <option value="tp1">TP1</option>
                    <option value="tp2">TP2</option>
                    <option value="tp3">TP3</option>
                    <option value="tp4">TP4</option>
                </select>
                <input type="submit" name="registerUser" value="S'inscrire">
                <?php if ($controller->errorMessage): ?>
                    <p class="error-message"><?php echo $controller->errorMessage; ?></p>
                <?php endif; ?>
            </form>
            <form action="./login.html" class="form-other">
                <input type="submit" value="Se connecter">
            </form>
        </div>
        <div>
            <h2>Inscription au site de l'ADIIL</h2>
        </div>
    </div>
</main>
</body>
</html>