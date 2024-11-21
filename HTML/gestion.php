<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
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

        <h2>Grades</h2>
        <div class='grades'>
            <article class="add">
                <h2>Nouveau grade</h2>
                <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Grade']) . "' alt=''></div>
                <form action='' method='post'>
                    <input type='submit' value='Ajouter'>
                </form>
            </article>
        </div>


        <h2>Articles</h2>
        <div class='produits'>
            <article class="add">
                <h2>Nouveau produits</h2>
                <div class='imgBackground'><img src='../Pictures/" . htmlspecialchars($row['URL_Img_Produit']) . "' alt=''></div>
                <form action='' method='post'>
                    <input type='submit' value='Ajouter'>
                </form>
            </article>
        </div>

    </main>

    <script src="../Script/script.js"></script>
</body>
</html>
