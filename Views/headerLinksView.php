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
    <h1>ADIIL</h1>
    <ul>
        <li><a href="../HTML/index.php">accueil</a></li>
        <li><a href="../HTML/event.php">évènements</a></li>
        <li><a href="../HTML/shop.php">boutique</a></li>
        <li><a href="../HTML/agenda.html">agenda</a></li>
        <li><a href="../HTML/newsletter.php">newsletter</a></li>
        <li><a href="../HTML/checkout.php">panier
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