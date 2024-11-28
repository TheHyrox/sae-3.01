<?php
require_once '../Controllers/gestionController.php';

$gestionController = new gestionController();
$gestionController->handleAddEvent();
$gestionController->handleEditEvent();
$gestionController->handleAddProduct();
$gestionController->handleAddGrade();
$gestionController->handleAddCategory();
$gestionController->handleEditProduct();
$gestionController->handleEditGrade();

$events = $gestionController->getEvents();

$eventsByMonth = [];
foreach ($events as $event) {
    $month = date('n', strtotime($event['Date_Event']));
    $eventsByMonth[$month][] = $event;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Gestion</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
    <main>
        <h2>Évènements</h2>
        <form id="event-add" action='' method='post'>
            <input type='submit' id="addEventButton" value='Ajouter un évènement'>
        </form>
        <?php include '../Views/Event/eventView.php' ?>

        <?php
        $grades = $gestionController->getGrades();
        if ($grades) {
            echo "<div><h2>Les grades</h2><div class='grades'>";?>
            <article class="add">
                <h2>Nouveau grade</h2>
                <div class='imgBackground'><img src='../Icons/plus.png' alt=''></div>
                <form action='' method='post'>
                    <input type='submit' id='addGradeButton' value='Ajouter'>
                </form>
            </article>
        <?php include '../Views/Shop/gradesView.php';
            echo "</div></div>";
        }
        ?>

        <div class='produits'></div>
        <?php
        $categories = $gestionController->getCategories();
        foreach ($categories as $categorie) {
            echo "<div><h2>" . ucfirst($categorie) . "</h2><div class='produits'>";?>
            <article class="add">
                <h2>Nouveau produit</h2>
                <div class='imgBackground'><img src='../Icons/plus.png' alt='' style="margin: 5px"></div>
                <form action='' method='post'>
                    <input type='hidden' name='Cat_Produit' value='<?php echo $categorie; ?>'>
                    <input type='submit' class='addProductButton' value='Ajouter'>
                </form>
            </article>
            <?php $products = $gestionController->getProductsByCategory($categorie);
            if ($products) {
                foreach ($products as $row) {
                    include '../Views/Shop/productsView.php';
                }
            }
            echo "</div></div>";
        }
        ?>
        <form id="category-add" action='' method='post'>
            <input type='text' name='Cat_Produit' placeholder='Nouvelle catégorie' required>
            <input type='submit' value='Ajouter une catégorie'>
        </form>

        <div id="addEventModal" class="modal">
            <div class="modal-content">
                <span class="close close-event">&times;</span>
                <?php include '../Views/Gestion/addEventView.php'; ?>
            </div>
        </div>


        <div id="editEventModal" class="modal">
            <div class="modal-content">
                <span class="close close-category">&times;</span>
                <?php include '../Views/Gestion/editEventView.php'; ?>
            </div>
        </div>


        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <span class="close close-product">&times;</span>
                <?php include '../Views/Gestion/addProductView.php'; ?>
            </div>
        </div>

        <div id="addGradeModal" class="modal">
            <div class="modal-content">
                <span class="close close-grade">&times;</span>
                <?php include '../Views/Gestion/addGradeView.php'; ?>
            </div>
        </div>

        <div id="editProductModal" class="modal">
            <div class="modal-content">
                <span class="close close-product">&times;</span>
                <?php include '../Views/Gestion/editProductView.php'; ?>
            </div>
        </div>

        <div id="editGradeModal" class="modal">
            <div class="modal-content">
                <span class="close close-grade">&times;</span>
                <?php include '../Views/Gestion/editGradeView.php'; ?>
            </div>
        </div>
    </main>
</body>
<script src="../Script/Gestion/addEvent.js"></script>
<script src="../Script/Gestion/editEvent.js"></script>
<script src="../Script/Gestion/addProduct.js"></script>
<script src="../Script/Gestion/addGrade.js"></script>
<script src="../Script/Gestion/editProduct.js"></script>
<script src="../Script/Gestion/editGrade.js"></script>
</html>
