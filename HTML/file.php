<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Changer le CSS car en version utilisateur -->
    <link rel="stylesheet" href="../CSS/admin.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans|Anton">
    <title>ADIIL - Fichiers</title>
</head>
<body>
<?php include '../Views/header.php'; ?>

    <main>
        <div class="folderfond">
            <div class="folder">
            <a href="" class="image-folder">
                <img src="../Icons/folder.svg" alt="Folder">
            </a>
                <span>Dossier 1</span>
            </div>
            <!-- Duplicate the "folder" div for additional folders -->
            <div class="folder">
            <a href="" class="image-folder">
                <img src="../Icons/folder.svg" alt="Folder">
            </a>
                <span>Dossier 2</span>
            </div>
            <div class="folder">
            <a href="" class="image-folder">
                <img src="../Icons/folder.svg" alt="Folder">
            </a>
                <span>Dossier 3</span>
            </div>
            <div class="file">
            <a href="" class="image-file">
                <img src="../Icons/file.svg" alt="file">
            </a>
                <span>Fichier 1</span>
            </div>
            
        </div>
    </main>
    <script src="../Script/script.js"></script>
</body>
</html>
