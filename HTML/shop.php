<?php
if(!isset($_SESSION)) {
    session_start();
}
require '../Controllers/productController.php';
require '../Models/userModel.php';

$controller = new productController();
$userModel = new UserModel();
$userId = $_SESSION['email']; // Assuming user ID is stored in session
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Anton">
    <title>ADIIL - Boutique</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
<main>
    <?php
    $grades = $controller->getGrades();
    if ($grades) {
        echo "<div><h2>Les grades</h2><div class='grades'>";
        foreach ($grades as $row) {
            if (isset($row['Id_Grade'])) {
                echo "<article>
                    <h2>" . htmlspecialchars($row['Nom_Grade']) . "</h2>
                    <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Grade']) . "' alt=''></div>
                    <p>" . htmlspecialchars($row['Desc_Grade']) . "</p>
                    <div class='row'>
                        <form action='checkout.php' method='post'>
                            <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Grade']) . "'>
                            <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Grade']) . "'>
                            <input type='hidden' name='quantity' value='1'>
                            <input type='submit' name='add_to_cart' value='Acheter'>
                        </form>
                        <h3>" . htmlspecialchars($row['Prix_Grade']) . "€</h3>
                    </div>
                  </article>";
            }
        }
        echo "</div></div>";
    }

    $categories = $controller->getCategories();
    foreach ($categories as $categorie) {
        echo "<div><h2>" . ucfirst($categorie) . "</h2><div class='produits'>";
        $products = $controller->getProductsByCategory($categorie);
        if ($products) {
            foreach ($products as $row) {
                echo "<article>
                    <h2>" . htmlspecialchars($row['Nom_Produit']) . "</h2>
                    <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
                    <p>" . htmlspecialchars($row['Desc_Produit']) . "</p>
                    <div class='row'>
                        <form action='checkout.php' method='post'>
                            <input type='hidden' name='name' value='" . htmlspecialchars($row['Nom_Produit']) . "'>
                            <input type='hidden' name='price' value='" . htmlspecialchars($row['Prix_Produit']) . "'>
                            <input type='hidden' name='quantity' value='1'>
                            <input type='submit' name='add_to_cart' value='Acheter'>
                        </form>
                        <h3>" . htmlspecialchars($row['Prix_Produit']) . "€</h3>
                    </div>
                  </article>";
            }
        }
        echo "</div></div>";
    }
    ?>
</main>
<?php include '../Views/footer.php'; ?>
<script src="../Script/script.js"></script>
</body>
</html>