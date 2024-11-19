<?php
require '../Controllers/productController.php';
$controller = new productController();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Boutique</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
<main>
    <?php

    $categories = ['Boissons', 'Confiserie', 'Snacks'];
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
                        <form action='' method='post'>
                            <input type='submit' value='Acheter'>
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