<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/styles.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton"
    />
    <title>ADIIL - Galerie</title>
  </head>
  <body>
  <?php include '../Views/header.php'; ?>
    <main>
        <article class="photo">
            <img src="../Pictures/mathis.jpg" alt="">
            <div>
                <h2>Mathis</h2> 
            </div>
        </article>
        <article class="photo">
            <img src="../Pictures/enzo.jpg" alt="">
            <div>
                <h2>Enzo</h2> 
            </div>
        </article>
    </main>
    <?php include '../Views/footer.php'; ?>
    <script src="../Script/script.js"></script>
  </body>
</html>
