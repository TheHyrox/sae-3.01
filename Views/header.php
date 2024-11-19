<?php
if (!isset($_SESSION)) {
    session_start();
}

$isAdminView = isset($_SESSION['isAdminView']) ? $_SESSION['isAdminView'] : false;
$linearClassic = isset($_SESSION['linearClassic']) ? $_SESSION['linearClassic'] : 'linear-gradient(90deg, rgba(0, 151, 178, 1) 0%, rgba(32, 164, 153, 1) 27%, rgba(78, 182, 116, 1) 100%)';
$linearAdmin = isset($_SESSION['linearAdmin']) ? $_SESSION['linearAdmin'] : 'linear-gradient(90deg, rgba(217, 125, 18, 1) 0%, rgba(233, 83, 19, 1) 27%, rgba(237, 40, 217, 1) 100%)';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <style>
        :root {
            --linearClassic: <?php echo $linearClassic; ?>;
            --linearAdmin: <?php echo $linearAdmin; ?>;
        }
    </style>
</head>
<body>
<header>
    <div id="linksContainer">
        <?php
        if ($isAdminView) {
            include '../Views/headerLinksAdminView.php';
        } else {
            include '../Views/headerLinksView.php';
        }
        ?>
    </div>

    <div>
        <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
            <label class="switch">
                <input type="checkbox" id="adminSwitch" name="demoCheckBox" <?php echo $isAdminView ? 'checked' : ''; ?>>
                <span></span>
            </label>
        <?php endif; ?>

        <?php if (isset($_SESSION['email'])): ?>
            <a href="../HTML/account.php" data-default-link="../HTML/account.php" data-admin-link="../HTML/adminAccount.php">Mon compte</a>
        <?php else: ?>
            <a href="../HTML/login.php" data-default-link="../HTML/login.php" data-admin-link="../HTML/adminLogin.php">Se connecter</a>
        <?php endif; ?>
        <img src="../Pictures/defaultProfilePicture.png" alt="">
    </div>
</header>

<script src="../Utils/header.js"></script>
</body>
</html>