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
    <title>ADIIL - Accueil</title>
  </head>
  <body>
  <?php include '../Views/header.html'; ?>
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
          <img src="../Pictures/bde.jpg" alt="" />
          <p>
            Voici la nouvelle équipe de l’ADILL !!! Promis ils ne mordent pas ^^
          </p>
          <!-- add page in action -->
          <form action="" method="post">
            <input type="submit" value="Découvrir" />
          </form>
        </article>

        <!-- rank xp users -->
        <div class="ranked">
          <h2>Classement des meilleurs étudiants</h2>
          <div>
            <img src="../Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Nom</h3>
              <progress id="file" max="100" value="70"></progress>
              <p>Niveau --</p>
            </div>
          </div>
          <div>
            <img src="../Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Nom</h3>
              <progress id="file" max="100" value="50"></progress>
              <p>Niveau --</p>
            </div>
          </div>
          <div>
            <img src="../Pictures/defaultProfilePicture.png" alt="" />
            <div>
              <h3>Nom</h3>
              <progress id="file" max="100" value="30"></progress>
              <p>Niveau --</p>
            </div>
          </div>
        </div>
      </div>
      <article>
        <h2>Souvenir de soirée</h2>
        <div id="carousel">
          <button class="slide active">
            <img src="../Pictures/bde.jpg" alt="" />
          </button>
          <button class="slide next">
            <img src="../Pictures/IMG_1093.jpg" alt="" />
          </button>
          <button class="slide">
            <img src="../Pictures/IMG_1097.jpg" alt="" />
          </button>
          <button class="slide">
            <img src="../Pictures/IMG_1099.jpg" alt="" />
          </button>
          <button class="slide pre">
            <img src="../Pictures/IMG_1107.jpg" alt="" />
          </button>
        </div>
        <form action="" method="post">
          <input type="submit" value="Voir la galerie" />
        </form>
      </article>
    </main>
    <footer>
      <div>
        <h2>Mentions légales</h2>
        <div>
          <h3>Éditeur</h3>
          <p>
            Le site bdeinfo.fr est édité par l'association ADIIL, association
            loi 1901, dont le siège social est situé au 52 rue des Docteurs
            Calmette et Guérin, 53000 Laval. L'association ADIIL est un Bureau
            Des Etudiants et vise à améliorer la vie étudiante au sein de l'IUT
            de Laval. L'association est représentée par son président.
          </p>
        </div>
        <div>
          <h3>Cookies</h3>
          <p>
            Lors de votre navigation sur le site, des cookies sont déposés sur
            votre ordinateur, votre mobile ou votre tablette. Nous n'utilisons
            aucun cookie à des fins publicitaires ou à des fins de récupération
            de données personnelles. Les cookies que nous utilisons nous
            permettent de vous proposer une meilleure expérience utilisateur.
          </p>
        </div>
        <div>
          <h3>Données personnelles</h3>
          <p>
            Les données personnelles que vous nous communiquez sont utilisées
            dans le cadre de votre utilisation du site. Elles ne sont pas
            transmises à des tiers. Les données personnelles collectées sont les
            suivantes : nom, prénom, adresse mail, groupe TP et mot de passe.
            Les données personnelles collectées sont utilisées pour une
            utilisation du site optimale. Les données personnelles collectées
            sont conservées pendant une durée de 1 an. Vous pouvez à tout moment
            demander la suppression de vos données personnelles en nous
            contactant
          </p>
        </div>
      </div>
      <div>
        <h2>Contacts</h2>
        <div id="contact">
          <div>
            <button class="icon">
              <img src="../Icons/discord.png" alt="" />
            </button>
            <button class="icon">
              <img src="../Icons/facebook.png" alt="" />
            </button>
            <button class="icon">
              <img src="../Icons/instagram.png" alt="" />
            </button>
            <button class="icon"><img src="../Icons/faq.png" alt="" /></button>
          </div>
          <div>
            <img src="../Icons/tel.png" alt="" />
            <p>07 67 10 39 95</p>
          </div>
          <div>
            <img src="../Icons/mail.png" alt="" />
            <p>adill@univ-lemans.fr</p>
          </div>
          <form action="" method="post">
            <input type="submit" value="Faire un feelback" />
          </form>
        </div>
      </div>
    </footer>
    <script src="../Script/script.js"></script>
  </body>
</html>