<?php
require 'Controllers/newsletterController.php';

$controller = new newsletterController();
$newsletters = $controller->getNewsletters();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Anton">
    <title>ADIIL - Newsletter</title>
</head>
<body>

<?php include 'Views/header.php'; ?>

<main>
    <form id="news-add" action='' method='post'>    
        <input type='submit' value='Ajouter un article'>
    </form>

    <div id="news-popup" style="display: none;">
        <div class="popup-content">
            <span class="close">&times;</span>
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="text">Text:</label>
                <textarea id="text" name="text" required></textarea>
                <label for="visible">Visible:</label>
                <select id="visible" name="visible">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <input type="submit" value="Add Newsletter">
            </form>
        </div>
    </div>

    <?php foreach ($newsletters as $newsletter): ?>
        <?php if (isset($newsletter['Visible']) && $newsletter['Visible'] == 1): ?>
            <article class="letter">
                <img src="../Pictures/<?= htmlspecialchars($newsletter['URL_Image_News']) ?>" alt="">
                <div>
                    <div>
                        <h2><?= htmlspecialchars($newsletter['Titre_News']) ?></h2>
                        <h3><?= htmlspecialchars($newsletter['Prenom_User']) . ' ' ?><?= htmlspecialchars($newsletter['Nom_User']) ?></h3>
                        <p><?= htmlspecialchars($newsletter['Texte_News']) ?></p>
                    </div>
                    <p><?= htmlspecialchars($newsletter['Date_News']) ?></p>
                </div>
            </article>
        <?php endif; ?>
    <?php endforeach; ?>

</main>

<?php include 'Views/footer.php'; ?>
<script src="../Script/Gestion/addNews.js"></script>
</body>
</html>