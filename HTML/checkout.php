<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Panier</title>
</head>
<body>
<?php include '../Views/header.php'; ?>
    <main>
        <article id="panier">
            <h2>Panier</h2>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                </tr>
                <tr>
                    <td>Grade diamant</td>
                    <td>13€</td>
                    <td><!-- truc quantité --></td>
                </tr>
                <tr>
                    <td>Grade diamant</td>
                    <td>13€</td>
                    <td><!-- truc quantité --></td>
                </tr>
            </table>
            <div id="total">
                <p>Total</p>
                <h3>150€</h3>
            </div>
        </article>
        <article id="paiement">
            <h2>Paiement</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Informations personnelles</th>
                        <th>Adresse</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="fname" id="fname" placeholder="Nom" required></td>
                        <td><input type="text" name="adress" id="adress" placeholder="Adresse (N° de rue et nom)" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="lname" id="lname" placeholder="Prénom" required></td>
                        <td><input type="text" name="city" id="city" placeholder="Ville" required></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" id="email" placeholder="Adresse Mail (univ-lemans)" required></td>
                        <td><input type="text" name="city-code" id="city-code" pattern="[0-9]{5}" placeholder="Code postal" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="birthday" name="birthday" pattern="\d{2}-\d{2}-\d{4}" placeholder="Date de naissance (JJ-MM-AAAA)" required></td>
                        <td><input type="submit" value="Acheter"></td>
                    </tr>
                </table>
            </form>
            
        </article>
    </main>
    <?php include '../Views/footer.php'; ?>
    <script src="../Script/script.js"></script>
</body>
</html>
