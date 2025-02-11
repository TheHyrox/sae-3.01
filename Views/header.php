<?php
if(!isset($_SESSION)) {
    session_start();
}
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
$itemCount = array_sum(array_column($cart, 'quantity'));

$isAdminView = $_SESSION['isAdminView'] ?? false;
$linearClassic = $_SESSION['linearClassic'] ?? 'linear-gradient(90deg, rgba(0, 151, 178, 1) 0%, rgba(32, 164, 153, 1) 27%, rgba(78, 182, 116, 1) 100%)';
$linearAdmin = $_SESSION['linearAdmin'] ?? 'linear-gradient(90deg, rgba(217, 125, 18, 1) 0%, rgba(233, 83, 19, 1) 27%, rgba(237, 40, 217, 1) 100%)';
?>
<style>
    :root {
        --linearClassic: <?php echo $linearClassic; ?>;
        --linearAdmin: <?php echo $linearAdmin; ?>;
    }
</style>
<header>
    <div id="linksContainer">
        <?php
        if ($isAdminView) {
            include __DIR__ . '/headerLinksAdminView.php';
        } else {
            include __DIR__ . '/headerLinksView.php';
        }
        ?>
    </div>

    <div id="accountHeader">
        <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
            <label class="switch switch-admin">
                <input type="checkbox" id="adminSwitch" name="demoCheckBox">
                <span></span>
            </label>
        <?php endif; ?>

        <?php if (isset($_SESSION['email'])): ?>
            <a href="account" data-default-link="account" data-admin-link="adminAccount">Mon compte</a>
        <?php else: ?>
            <a href="login" data-default-link="login" data-admin-link="adminLogin">Se connecter</a>
        <?php endif; ?>
        <img src="Pictures/defaultProfilePicture.png" alt="">
    </div>
</header>

<script src="Utils/header.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const adminSwitch = document.getElementById('adminSwitch');
        const isAdminView = localStorage.getItem('isAdminView') === 'true';
        const linearClassic = localStorage.getItem('linearClassic');
        const linearAdmin = localStorage.getItem('linearAdmin');

        if (adminSwitch) {
            adminSwitch.checked = isAdminView;
            document.documentElement.style.setProperty('--linearClassic', linearClassic);
            document.documentElement.style.setProperty('--linearAdmin', linearAdmin);

            adminSwitch.addEventListener('change', function() {
                localStorage.setItem('isAdminView', adminSwitch.checked);
                localStorage.setItem('linearClassic', getComputedStyle(document.documentElement).getPropertyValue('--linearClassic'));
                localStorage.setItem('linearAdmin', getComputedStyle(document.documentElement).getPropertyValue('--linearAdmin'));
            });
        }
    });
</script>
<script>
    document.querySelector('#accountHeader img').addEventListener('click', function() {
        const accountLink = document.querySelector('#accountHeader a');
        if (accountLink) {
            window.location.href = accountLink.href;
        }
    });
</script>