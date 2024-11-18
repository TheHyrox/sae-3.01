<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ADIIL</title>
    <link rel="stylesheet" href="../CSS/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton" />
</head>
<body>
<?php include '../Views/header.html'; ?>
    <main>
    <div class="login-register">
        <div>
            <form class="form-login" action="">
                <h2>Connexion</h2>
                <label for="username">Identifiant</label>
                <input type="email" id="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" required>
                <input type="submit" value="Se connecter">
            </form>
            <form action="./register.php" class="form-other">
                <input type="submit" value="S'inscrire">
            </form>
        </div>
        <div>
            <h2>Connexion au site de l'ADIIL</h2>
        </div>
    </div>
    </main>
</body>
</html>