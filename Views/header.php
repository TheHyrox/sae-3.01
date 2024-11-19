<?php
if (!isset($_SESSION)) {
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
    <div id="linksContainer">
        <?php
            include '../Views/headerLinksView.php';
        ?>
    </div>

    <div>
        <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
            <label class="switch">
                <input type="checkbox" id="adminSwitch" name="demoCheckBox">
                <span></span>
            </label>
        <?php endif; ?>

        <?php if (isset($_SESSION['email'])): ?>
            <a href="../HTML/account.php" data-default-link="../HTML/account.php" data-admin-link="../HTML/adminAccount.php">Mon compte</a>
        <?php else: ?>
            <a href="../HTML/login.php" data-default-link="../HTML/login.php" data-admin-link="../HTML/adminLogin.php">Se connecter</a>
        <?php endif; ?>
        <!-- Put user picture -->
        <img src="../Pictures/defaultProfilePicture.png" alt="">
    </div>
</header>

<script src="../Utils/header.js"></script>
</body>
</html>
