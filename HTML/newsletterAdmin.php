<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/styles.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - NewsletterAdmin</title>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <form id="news-add" action='' method='post'>
            <input type='submit' value='Ajouter un article'>
        </form>   
        <article class="letter">
            <img src="../Pictures/IMG_1097.jpg" alt="">
            <div>
                <div>
                    <h2>nom</h2>
                <h3>auteur</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed temporibus pariatur tempore quibusdam incidunt quaerat quos ipsum, laboriosam sit veritatis officiis dolore sequi, accusantium nihil illum molestiae, natus iusto. Maiores.</p>
                </div>
                <p>date</p>
            </div>
            <form action="" method="post">
                <button type="submit"><img src="../Icons/edit.png" alt=""></button>
            </form>
        </article>
    </main>

    <script src="../Script/script.js"></script>
    <?php include '../Views/footer.php'; ?>
</body>
</html>
