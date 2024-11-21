<?php
require_once '../Controllers/gestionController.php';

$gestionController = new gestionController();
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
            <input type='submit' value='Ajouter un évènement'>
        </form>
        <?php include '../Views/Event/eventView.php' ?>

        <?php
        $grades = $gestionController->getGrades();
        if ($grades) {
            echo "<div><h2>Les grades</h2><div class='grades'>";?>
            <article class="add">
                <h2>Nouveau grade</h2>
                <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Grade']) . "' alt=''></div>
                <form action='' method='post'>
                    <input type='submit' value='Ajouter'>
                </form>
            </article>
        <?php include '../Views/Shop/gradesView.php';
            echo "</div></div>";
        }
        ?>

        <h2>Articles</h2>
        <div class='produits'></div>
        <?php
        $categories = $gestionController->getCategories();
        foreach ($categories as $categorie) {
            echo "<div><h2>" . ucfirst($categorie) . "</h2><div class='produits'>";?>
        <article class="add">
            <h2>Nouveau produits</h2>
            <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
            <form action='' method='post'>
                <input type='submit' value='Ajouter'>
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
            <input type='submit' value='Ajouter une catégorie'>
        </form>
    </main>
</body>
</html>
