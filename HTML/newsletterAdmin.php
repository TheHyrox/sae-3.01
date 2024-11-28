<?php
require '../Controllers/newsletterController.php';

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

    <script src="../Script/script.js"></script>
</head>
<body>

<?php include '../Views/header.php'; ?>

<main>
    <form id="news-add" action='' method='post'>    
        <input type='submit' value='Ajouter un article'>
    </form>

    <?php foreach ($newsletters as $newsletter): ?>
        <?php if ($newsletter['Visible'] == 1): ?>
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

<?php include '../Views/footer.php'; ?>


</body>
</html>