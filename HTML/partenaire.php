<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/styles.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Partenaires</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
  <main>
    <form id="news-add" action='' method='post'>
      <input type='submit' value='Ajouter un partenaire'>
    </form>
    <article class="partenaire">
      <img src="../Pictures/mathis.jpg" alt="">
      <div>
        <div>
          <h2>Nom entreprise</h2>
          <h3>titre</h3>
          <p>Description du partenaire a quoi il sert ect...</p>
        </div>
        <a href="mailto:prenom.nom.etu@univ-lemans.fr">
          <img src="../Icons/mail.png" alt="Email"> contact.entreprise@laposte.net
        </a>
      </div>
      <form action="" method="post">
        <button type="submit"><img src="../Icons/bin.png" alt=""></button>
      </form>
    </article>
  </main>
  <script src="../Script/script.js"></script>
</body>
</html>
