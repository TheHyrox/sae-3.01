<?php

use Controllers\loginController;

require '../Controllers/loginController.php';
$controller = new loginController();
$controller->loginRequest();
if(isset($_SESSION['email'])){
    header('Location: ../HTML/account.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - ADIIL</title>
    <link rel="stylesheet" href="CSS/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton" />
</head>
<body>
<?php include '../Views/header.php'; ?>
    <main>
    <div class="login-register">
        <div>
            <form class="form-login" action="" method="POST" name="loginUser">
                <h2>Connexion</h2>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $controller->errorMessage): ?>
                    <p class="error-message"><?php echo $controller->errorMessage; ?></p>
                <?php endif; ?>
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="loginUser" value="Se connecter">
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