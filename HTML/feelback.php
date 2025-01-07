<?php
require 'Controllers/panierController.php';
$panierController = new panierController();

// Handle adding an item to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
        'modifiable' => filter_var($_POST['modifiable'], FILTER_VALIDATE_BOOLEAN)
    ];
    $panierController->addToCart($item);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Handle updating the quantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];
    $panierController->updateQuantity($index, $quantity);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Handle removing an item from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $index = $_POST['index'];
    $panierController->removeFromCart($index);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

$cart = $panierController->getCart();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Anton">
    <title>ADIIL - Panier</title>
</head>
<body>
<?php include 'Views/header.php'; ?>
<main>
    <article>
        <h1>Nous contacter</h1>
        <form id="emailForm">
            <label for="topic">Objet :</label><br>
            <input type="text" id="topic" name="topic" required><br><br>
    
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="name">NOM Prénom :</label><br>
            <input type="email" id="name" name="name" required><br><br>
    
            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
    
            <button type="button" onclick="sendEmail()">Envoyer</button>
        </form>
    </article>
</main>
<?php include 'Views/footer.php'; ?>
    <script>
        function sendEmail() {
            const topic = document.getElementById("topic").value;
            const email = document.getElementById("email").value;
            const nom = document.getElementById("name").value;
            const message = document.getElementById("message").value;
            

            Email.send({
                Host: "smtp.elasticemail.com",
                Port: 2525,
                Username: "gaelquem44@gmail.com", // adresse e-mail Elastic Email
                Password: "89C5B2C284BED968C3F71DDD47A26E807726", // mot de passe Elastic Email
                To: "gaelquem44@gmail.com", // Destinataire
                From: "gaelquem44@gmail.com", // L'adresse vérifiée (dans Elastic Email)
                Subject: `${topic}`,
                Body: `
                    <p><strong>Email de l'expéditeur : </strong> ${email}</p>
                    <p><strong>Nom de l'expéditeur : </strong> ${nom}</p>
                    <p><strong>Message : </strong><br>${message}</p>
                `
            }).then(response => {
                if (response === "OK") {
                    alert("E-mail envoyé avec succès !");
                } else {
                    console.error("Erreur SMTP.js :", response);
                    alert("Une erreur est survenue lors de l'envoi de l'e-mail.");
                }
            }).catch(error => {
                console.error("Erreur :", error);
                alert("Erreur inattendue lors de l'envoi.");
            });
        }
    </script>
<script src="../Script/script.js"></script>
</body>
</html>