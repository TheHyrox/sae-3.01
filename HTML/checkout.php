<?php
require '../Controllers/panierController.php';
$panierController = new panierController();

// Handle adding an item to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
    ];
    $panierController->addToCart($item);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Handle updating the quantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];
    $panierController->updateQuantity($index, $quantity);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Handle removing an item from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $index = $_POST['index'];
    $panierController->removeFromCart($index);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

$cart = $panierController->getCart();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Anton">
    <title>ADIIL - Panier</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
<main>
    <article id="panier">
        <h2>Panier</h2>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cart as $index => $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['price']) ?>€</td>
                    <td>
                        <form action="" method="post" style="display: inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <input type="hidden" name="quantity" value="<?= $item['quantity'] - 1 ?>">
                            <button type="submit" name="update_quantity">-</button>
                        </form>
                        <?= htmlspecialchars($item['quantity']) ?>
                        <form action="" method="post" style="display: inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <input type="hidden" name="quantity" value="<?= $item['quantity'] + 1 ?>">
                            <button type="submit" name="update_quantity">+</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <input type="submit" name="remove_item" value="Supprimer">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="total">
            <p>Total</p>
            <h3>
                <?php
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
                echo $total . '€';
                ?>
            </h3>
        </div>
    </article>
    <article id="paiement">
        <h2>Paiement</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Informations personnelles</th>
                    <th>Adresse</th>
                </tr>
                <tr>
                    <td><input type="text" name="fname" id="fname" placeholder="Nom" required></td>
                    <td><input type="text" name="adress" id="adress" placeholder="Adresse (N° de rue et nom)" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="lname" id="lname" placeholder="Prénom" required></td>
                    <td><input type="text" name="city" id="city" placeholder="Ville" required></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" id="email" placeholder="Adresse Mail (univ-lemans)" required></td>
                    <td><input type="text" name="city-code" id="city-code" pattern="[0-9]{5}" placeholder="Code postal" required></td>
                </tr>
                <tr>
                    <td><input type="text" id="birthday" name="birthday" pattern="\d{2}-\d{2}-\d{4}" placeholder="Date de naissance (JJ-MM-AAAA)" required></td>
                    <td><input type="submit" value="Acheter"></td>
                </tr>
            </table>
        </form>
    </article>
</main>
<?php include '../Views/footer.php'; ?>
<script src="../Script/script.js"></script>
</body>
</html>