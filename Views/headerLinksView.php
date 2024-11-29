<?php
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
$itemCount = array_sum(array_column($cart, 'quantity'));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div>
    <button class="burger-menu">
        <img src="../Icons/burgerMenu.svg" alt="">
    </button>
    <h1>ADIIL</h1>
    <ul class="nav-links">
        <li><a href="/index">accueil</a></li>
        <li><a href="/event">évènements</a></li>
        <li><a href="/shop">boutique</a></li>
        <li><a href="/agenda">agenda</a></li>
        <li><a href="/newsletter">newsletter</a></li>
        <li><a href="/checkout">panier
                <?php
                if ($itemCount > 0) {
                    echo '(' . $itemCount . ')';
                }
                ?>
            </a></li>
    </ul>
</div>
</body>
</html>