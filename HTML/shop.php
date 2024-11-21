<?php
if(!isset($_SESSION)) {
    session_start();
}
require '../Controllers/productController.php';
require '../Models/userModel.php';

$controller = new productController();
$userModel = new UserModel();
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
        include '../Views/Shop/gradesView.php';
        echo "</div></div>";
    }

    $categories = $controller->getCategories();
    foreach ($categories as $categorie) {
        echo "<div><h2>" . ucfirst($categorie) . "</h2><div class='produits'>";
        $products = $controller->getProductsByCategory($categorie);
        if ($products) {
            foreach ($products as $row) {
                include '../Views/Shop/productsView.php';
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