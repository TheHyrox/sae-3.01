<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/styles.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton"
    />
    <title>ADIIL - Accueil</title>
  </head>
  <body>
  <?php include 'Views/header.php'; ?>
    <main>
      <!-- show only if there is a special event and take the next one -->
      <div id="annonce">
        <div>
          <h2>Alerte évènement spécial</h2>
          <!-- get event info -->
          <p>description de l'évènement <a href="">en savoir plus</a></p>
        </div>
        <!-- change action to event page -->
        <form action="" method="post">
          <input type="submit" value="Participer" />
        </form>
      </div>

      <div class="row">
        <!-- get bde group and change data -->
        <article>
          <h2>Les membres du BDE</h2>
          <img src="Pictures/bde.jpg" alt="" />
          <p>
            Voici la nouvelle équipe de l’ADILL !!! Promis ils ne mordent pas ^^
          </p>
          <!-- add page in action -->
          <form action="membreBDE" method="post">
            <input type="submit" value="Découvrir" />
          </form>
        </article>

        <!-- rank xp users -->
        <div class="ranked">
          <h2>Classement des meilleurs étudiants</h2>
          <div>
            <img src="Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Hyrox</h3>
              <progress id="file" max="100" value="70"></progress>
              <p>Niveau 10</p>
            </div>
          </div>
          <div>
            <img src="Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Koaden</h3>
              <progress id="file" max="100" value="50"></progress>
              <p>Niveau 8</p>
            </div>
          </div>
          <div>
            <img src="Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Brokuto</h3>
              <progress id="file" max="100" value="30"></progress>
              <p>Niveau 2</p>
            </div>
          </div>
        </div>
      </div>
      <article>
        <h2>Souvenir de soirée</h2>
        <div id="carousel">
          <button class="slide active">
            <img src="Pictures/bde.jpg" alt="" />
          </button>
          <button class="slide next">
            <img src="Pictures/enzo.jpg" alt="" />
          </button>
          <button class="slide">
            <img src="Pictures/tom.jpg" alt="" />
          </button>
          <button class="slide">
            <img src="Pictures/mathis.jpg" alt="" />
          </button>
          <button class="slide pre">
            <img src="Pictures/gemino.jpg" alt="" />
          </button>
        </div>
        <form action="galerie" method="post">
          <input type="submit" value="Voir la galerie" />
        </form>
      </article>
    </main>
    <?php include 'Views/footer.php'; ?>
    <script src="Script/script.js"></script>
  </body>
</html>
