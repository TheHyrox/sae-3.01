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
    <title>ADIIL - Membre BDE</title>
  </head>
  <body>
  <?php include 'Views/header.php'; ?>
    <main>
        <article class="member-info">
            <div>
                <div>
                    <h2>Informations du membre</h2>
                    <ul>
                        <li><p>Nom : </p><h3>Nom</h3></li>
                        <li><p>Prénom : </p><h3>Prénom</h3></li>
                        <li><p>Adresse mail : </p><h3>adresse@mail.com</h3></li>
                        <li><p>Mot de passe : </p><h3>*******</h3></li>
                        <li><p>Groupe TP : </p><h3>TP22C</h3></li>
                        <li><p>Grade : </p><h3>Iron</h3></li>
                        <li><p>Role : </p><h3>Membre</h3></li>
                        <li>
                            <form action="" method="post">
                                <input type="submit" value="Éditer">
                            </form>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2>Inscriptions</h2>
                    <div>
                        <div class="member-event">
                            <form action="" method="post">
                                <button type="submit" value="SupprimerEventID"><img src="../Icons/bin.png" alt=""></button>
                            </form>
                            <div>
                                <p>Event name</p>
                                <p>JJ/MM/AAAA</p>
                            </div>
                        </div>
                        <div class="member-event">
                            <form action="" method="post">
                                <button type="submit" value="SupprimerEventID"><img src="../Icons/bin.png" alt=""></button>
                            </form>
                            <div>
                                <p>Event name</p>
                                <p>JJ/MM/AAAA</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post" class="back">
                    <button type="submit" value="retour"><img src="../Icons/back.png" alt=""></button>
                </form>
            </div>
            <form action="" method="post">
                <input type="submit" value="Supprimer utilisateur">
                <input type="submit" value="Sauvegarder">
            </form>
        </article>
    </main>
    <script src="../Script/script.js"></script>
  </body>
</html>
